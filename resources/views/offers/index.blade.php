@extends('layouts.main')

@section('title', 'Offer List')

@section('content')
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Offers</a></li>
                            <li class="breadcrumb-item" aria-current="page">List</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Offer List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs invoice-tab border-bottom mb-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab" data-bs-target="#analytics-tab-1-pane" type="button" role="tab" aria-controls="analytics-tab-1-pane" aria-selected="true">
                                    <span class="d-flex align-items-center gap-2">All <span class="avtar rounded-circle bg-light-primary">{{ $offers->count() }}</span></span>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Offer ID</th>
                                                <th>Client Name</th>
                                                <th>Create Date</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($offers as $offer)
                                                <tr>
                                                    <td>{{ $offer->id }}</td>
                                                    <td>{{ $offer->client->name }}</td>
                                                    <td>{{ $offer->created_at->format('d/m/Y') }}</td>
                                                    <td><span class="badge bg-light-info">{{ $offer->status }}</span></td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a href="{{ route('offers.show', $offer->id) }}" class="avtar avtar-s btn-link-info btn-pc-default"><i class="ti ti-eye f-20"></i></a></li>
                                                            <li class="list-inline-item"><a href="{{ route('offers.edit', $offer->id) }}" class="avtar avtar-s btn-link-success btn-pc-default"><i class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"><a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" onclick="deleteOffer({{ $offer->id }})"><i class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Adaugă alte panouri de conținut pentru alte taburi dacă este necesar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end --> 
    </div>
</div>

<script>
    function deleteOffer(offerId) {
        if(confirm('Are you sure you want to delete this offer?')) {
            // Adaugă logica pentru ștergerea ofertei
            // De exemplu, poți folosi un AJAX request pentru a șterge oferta
        }
    }
</script>
@endsection
