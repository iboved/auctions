@extends('layouts.app')

@section('title', 'Auctioneers in Jacksonville, Florida')

@section('content')
    @component('partials.page-header')
        <h3>Auctioneers & Auction Companies In Jacksonville, FL</h3>
    @endcomponent
    <div class="list-group">
        @forelse ($auctioneers as $auctioneer)
            <a href="{{ route('auctioneers.show', ['auctioneer' => $auctioneer->slug]) }}" class="list-group-item">{{ $auctioneer->name }}</a>
        @empty
            <div class="alert alert-info text-center" role="alert">There are no records</div>
        @endforelse
    </div>
    <div class="text-center">
        {{ $auctioneers->links() }}
    </div>
@endsection
