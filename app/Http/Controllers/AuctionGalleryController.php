<?php

namespace App\Http\Controllers;

use App\Auctioneer;
use Illuminate\Http\Request;

class AuctionGalleryController extends Controller
{
    /**
     * Show all auction galleries.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $auctioneers = Auctioneer::where('is_enabled', true)
            ->where('type', Auctioneer::AUCTION_GALLERY)
            ->orderBy('name', 'asc')
            ->paginate(15);

        return view('auction-gallery.index', ['auctioneers' => $auctioneers]);
    }

    /**
     * Show one auction gallery.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $auctioneer = Auctioneer::where('is_enabled', true)
            ->where('type', Auctioneer::AUCTION_GALLERY)
            ->where('slug', $slug)
            ->first();

        if (empty($auctioneer)) {
            abort(404);
        }

        $coordinates = $auctioneer->getCoordinates();

        $mapLat = array_get($coordinates, '0.lat');
        $mapLng = array_get($coordinates, '0.lng');

        return view('auction-gallery.show', [
            'auctioneer' => $auctioneer,
            'map_lat' => $mapLat,
            'map_lng' => $mapLng,
        ]);
    }
}
