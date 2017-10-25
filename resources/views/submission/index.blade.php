@extends('layouts.app')

@section('title', 'Submission')

@section('content')
    <div class="page-header">
        <h1>Submission</h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('submission.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group col-sm-6">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Your name" required>
        </div>
        <div class="form-group col-sm-6">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Your email address" required>
        </div>
        <div class="form-group col-sm-12">
            <label for="message">How can we help you?</label>
            <textarea name="message" class="form-control" id="message" rows="3" placeholder="Your message" required>{{ old('message') }}</textarea>
        </div>
        <div class="form-group col-sm-12">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
@endsection
