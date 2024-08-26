@extends('layouts.main')

@section('title', 'View Offer')

@section('content')
<div class="container">
    <h1>{{ $offer->title }}</h1>

    <div class="offer-content">
        {!! $offer->content !!}
    </div>

    <div class="mt-3">
        <a href="{{ route('offers.download', $offer->id) }}" class="btn btn-secondary">Download Offer as PDF</a>
    </div>
</div>
@endsection
