<?php

namespace App\Http\Controllers;

use App\Auctioneer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    /**
     * Show submission form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('submission.index');
    }

    /**
     * Store submission form.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required|in:1,2',
            'street' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'site_url' => 'url',
            'fax' => '',
            'state' => '',
            'zip_code' => '',
        ]);

        $auctioneer = Auctioneer::create($validatedData);

        $geocodingData = $this->geocodingAddress($auctioneer->getFormattedAddress());

        if ($geocodingData->status === 'OK') {
            $lat = $geocodingData->results[0]->geometry->location->lat;
            $lng = $geocodingData->results[0]->geometry->location->lng;

            $auctioneer->coordinates = DB::raw('ST_GeomFromText(\'POINT('.$lat.' '.$lng.')\')');
            $auctioneer->save();
        }

        return redirect(route('submission.index'))->with('status', 'Submission sent successfully');
    }

    /**
     * Return the geocoded address by Google Maps Geocoding API.
     *
     * @param $address
     * @return mixed
     */
    public function geocodingAddress($address)
    {
        $apiUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=' . env('GOOGLE_MAPS_KEY');

        return json_decode(file_get_contents($apiUrl));
    }
}
