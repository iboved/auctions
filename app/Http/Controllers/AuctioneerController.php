<?php

namespace App\Http\Controllers;

use App\Auctioneer;
use Illuminate\Http\Request;

class AuctioneerController extends Controller
{
    /**
     * Show all auctioneers.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $auctioneers = Auctioneer::where('is_enabled', true)
            ->where('type', Auctioneer::AUCTIONEER)
            ->orderBy('name', 'asc')
            ->paginate(15);

        return view('auctioneer.index', ['auctioneers' => $auctioneers]);
    }

    /**
     * Show one auctioneer.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {
        $auctioneer = Auctioneer::where('is_enabled', true)
            ->where('type', Auctioneer::AUCTIONEER)
            ->where('slug', $slug)
            ->first();

        abort_if(empty($auctioneer), 404);

        $coordinates = $auctioneer->getCoordinates();

        $mapLat = array_get($coordinates, '0.lat');
        $mapLng = array_get($coordinates, '0.lng');

        return view('auctioneer.show', [
            'auctioneer' => $auctioneer,
            'map_lat' => $mapLat,
            'map_lng' => $mapLng,
        ]);
    }
}
