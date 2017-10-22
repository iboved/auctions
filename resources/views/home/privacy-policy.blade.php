@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
    <div class="page-header">
        <h1>Privacy Policy</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! setting('site.privacy_policy') !!}
        </div>
    </div>
@endsection
