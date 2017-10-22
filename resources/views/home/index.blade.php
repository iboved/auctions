@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>{{ setting('site.title') }}</h1>
        <p>{{ setting('site.intro') }}</p>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {!! setting('site.description') !!}
            <p>
                <a class="btn btn-primary btn-lg" href="#">Call to Action »</a>
            </p>
        </div>
    </div>
@endsection
