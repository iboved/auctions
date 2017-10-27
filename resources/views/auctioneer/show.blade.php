@extends('layouts.app')

@section('title', $auctioneer->name)

@section('content')
    <div class="page-header">
        <h1>{{ $auctioneer->name }}</h1>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <address>
                <strong>Address</strong><br>
                {{ $auctioneer->street }}<br>
                {{ $auctioneer->city }}, {{ $auctioneer->state }} {{ $auctioneer->zip_code }}
            </address>
        </div>
        <div class="col-sm-3">
            <address>
                <strong>Phone Number</strong>
                <p><a href="tel:{{ $auctioneer->phone }}">{{ $auctioneer->phone }}</a></p>
            </address>
        </div>
        @if (!empty($auctioneer->fax))
            <div class="col-sm-3">
                <address>
                    <strong>Fax Number</strong>
                    <p><a href="tel:{{ $auctioneer->fax }}">{{ $auctioneer->fax }}</a></p>
                </address>
            </div>
        @endif
        @if (!empty($auctioneer->email))
            <div class="col-sm-3">
                <address>
                    <strong>Email</strong>
                    <p><a href="mailto:{{ $auctioneer->email }}">{{ $auctioneer->email }}</a></p>
                </address>
            </div>
        @endif
    </div>
    @if (!empty($auctioneer->site_url))
        <div class="row">
            <div class="col-sm-12">
                <p class="pull-left"><a href="{{ $auctioneer->site_url }}" target="_blank">Visit Their Website</a></p>
            </div>
        </div>
    @endif
    <hr>
    @if (!empty($map_lat) && !empty ($map_lng))
        <div id="map"></div>
        <input type="hidden" id="map_lat" value="{{ $map_lat }}">
        <input type="hidden" id="map_lng" value="{{ $map_lng }}">
        <input type="hidden" id="marker_title" value="{{ $auctioneer->name }}">
    @endif
    @include('partials.adsense')
@endsection

@if (!empty($map_lat) && !empty ($map_lng))
    @push('scripts')
        <script src="{{ asset('js/map.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap"></script>
    @endpush
@endif
