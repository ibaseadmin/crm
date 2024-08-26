@extends('layouts.main')

@section('title', 'Client Details')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ $client->name }}</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">{{ $client->name }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Client Details -->
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $client->name }}</h5>
                <p class="card-text">
                    <strong>Email:</strong> {{ $client->email }}<br>
                    <strong>Phone:</strong> {{ $client->phone }}<br>
                    <strong>Location:</strong> {{ $client->location }}<br>
                    <strong>Agent:</strong> {{ optional($client->agent)->name ?? 'N/A' }}<br>
                    <strong>Date Added:</strong> {{ $client->created_at->format('d/m/Y') }}
                </p>
            </div>
        </div>

        <!-- Latest Activity -->
        <div class="card feed-card mt-4">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Latest Activity</h5>
                    <div class="dropdown">
                        <a
                          class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                          href="#"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="ti ti-dots-vertical f-18"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                            <a class="dropdown-item" href="#">Monthly</a>
                        </div>
                    </div>
                </div>
            </div>

      <div class="latest-scroll" style="height: 400px; position: relative">
    <div class="card-body">
        @forelse($client->activities as $activity)
            <div class="row align-items-center m-b-30">
                <div class="col-auto p-r-0">
                    <i class="feather icon-activity bg-light-primary feed-icon text-primary"></i>
                </div>
                <div class="col">
                    <a href="#!">
                        <h6>{{ $activity->activity_type }} by {{ optional($activity->agent)->name }} 
                            <span class="text-muted float-end f-13">{{ \Carbon\Carbon::parse($activity->activity_time)->diffForHumans() }}</span>
                        </h6>
                    </a>
                </div>
            </div>
        @empty
            <p>No recent activities.</p>
        @endforelse
    </div>
</div>


            <div class="card-footer text-center">
                <a href="#!" class="b-b-primary text-primary">View all Feeds</a>
            </div>
        </div>
    </div>

    <!-- Offers and Contracts -->
    <div class="col-lg-8">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Offers</h5>
            <div>
                <a href="{{ route('offers.create', ['client_id' => $client->id]) }}" class="btn btn-primary btn-sm">Creează</a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadOfferModal">Încarcă</button>
            </div>
        </div>
        <div class="card-body">
            @if($client->offers->isEmpty())
                <p>No offers available.</p>
            @else
                <ul>
                    @foreach($client->offers as $offer)
                        <li><a href="{{ route('offers.show', $offer->id) }}">{{ $offer->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Contracts</h5>
            <div>
                <a href="{{ route('contracts.create', ['client_id' => $client->id]) }}" class="btn btn-primary btn-sm">Creează</a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadContractModal">Încarcă</button>
            </div>
        </div>
        <div class="card-body">
            @if($client->contracts->isEmpty())
                <p>No contracts available.</p>
            @else
                <ul>
                    @foreach($client->contracts as $contract)
                        <li><a href="{{ route('contracts.show', $contract->id) }}">{{ $contract->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

</div>

@endsection
