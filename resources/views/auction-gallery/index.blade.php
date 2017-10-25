@extends('layouts.app')

@section('title', 'Auction Galleries in Jacksonville, Florida')

@section('content')
    <div class="page-header">
        <h1>Auctions & Auction Galleries In Jacksonville, FL</h1>
    </div>
    <div class="list-group">
        @forelse ($auctioneers as $auctioneer)
            <a href="{{ route('auction_galleries.show', ['auctioneer' => $auctioneer->slug]) }}" class="list-group-item">{{ $auctioneer->name }}</a>
        @empty
            <div class="alert alert-info text-center" role="alert">There are no records</div>
        @endforelse
    </div>
    <div class="text-center">
        {{ $auctioneers->links() }}
    </div>
@endsection
