@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
    @component('partials.page-header')
        <h3>Privacy Policy</h3>
    @endcomponent
    <div class="row">
        <div class="col-sm-12">
            {!! setting('site.privacy_policy') !!}
        </div>
    </div>
@endsection
