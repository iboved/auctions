<?php

namespace App\Http\Controllers;

use App\Auctioneer;
use Illuminate\Http\Request;

class AuctioneerController extends Controller
{
    public function index()
    {
        $auctioneers = Auctioneer::where('is_enabled', true)
            ->where('type', Auctioneer::AUCTIONEER)
            ->orderBy('name', 'asc')
            ->paginate(15);

        return view('auctioneer.index', ['auctioneers' => $auctioneers]);
    }

    public function show(Auctioneer $auctioneer)
    {
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
