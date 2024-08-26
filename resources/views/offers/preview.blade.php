@extends('layouts.main')

@section('title', 'Preview Offer')

@section('content')
<div class="container">
    <h1>Preview Offer</h1>

    <div class="card">
        <div class="card-body">
            <h3>{{ $offer->title }}</h3>
            <p>{!! $offer->content !!}</p>
        </div>
    </div>
</div>
@endsection
