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
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Auctioneer name" required>
        </div>
        <div class="form-group col-sm-6">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="1"{{ old('type') == 1 ? ' selected' : '' }}>Auctioneer</option>
                <option value="2"{{ old('type') == 2 ? ' selected' : '' }}>Auction Gallery</option>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="street">Street</label>
            <input type="text" name="street" value="{{ old('street') }}" class="form-control" id="street" placeholder="Your street" required>
        </div>
        <div class="form-group col-sm-6">
            <label for="city">City</label>
            <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="city" placeholder="Your city" required>
        </div>
        <div class="form-group col-sm-6">
            <label for="state">State</label>
            <input type="text" name="state" value="FL" class="form-control" id="state" placeholder="Your state" readonly>
        </div>
        <div class="form-group col-sm-6">
            <label for="zip_code">ZIP code</label>
            <input type="text" name="zip_code" value="{{ old('zip_code') }}" class="form-control" id="zip_code" placeholder="Your ZIP code">
        </div>
        <div class="form-group col-sm-6">
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" placeholder="Your phone number" required>
        </div>
        <div class="form-group col-sm-6">
            <label for="fax">Fax</label>
            <input type="text" name="fax" value="{{ old('fax') }}" class="form-control" id="fax" placeholder="Your fax number">
        </div>
        <div class="form-group col-sm-6">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Your email address">
        </div>
        <div class="form-group col-sm-6">
            <label for="site_url">Site URL</label>
            <input type="text" name="site_url" value="{{ old('site_url') }}" class="form-control" id="site_url" placeholder="Your website URL">
        </div>
        <div class="form-group col-sm-12">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
@endsection
