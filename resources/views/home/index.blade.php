@extends('layouts.app')

@section('title', 'Auctions in Jacksonville, FL | Auctioneers in Jacksonville, Florida & Surrounding Areas')

@section('content')
    <div class="jumbotron">
        <h1>{{ setting('site.title') }}</h1>
        <p>{{ setting('site.intro') }}</p>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! setting('site.description') !!}
        </div>
    </div>
@endsection
