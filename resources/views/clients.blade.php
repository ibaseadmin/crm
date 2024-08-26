@extends('layouts.main')

@section('title', 'Clients')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Clients</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">{{ __('messages.client_list') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form for filtering -->
<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('clients.index') }}" class="row g-3">
            <!-- Filtrare după dată -->
            <div class="col-md-3">
                <label for="date_from" class="form-label">{{ __('messages.date_from') }}</label>
                <input type="date" name="date_from" id="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>

            <div class="col-md-3">
                <label for="date_to" class="form-label">{{ __('messages.date_to') }}</label>
                <input type="date" name="date_to" id="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>

            <!-- Filtrare după agent -->
            <div class="col-md-3">
                <label for="agent" class="form-label">{{ __('messages.filter_by_agent') }}</label>
                <select name="agent_id" id="agent" class="form-select">
                    <option value="">{{ __('messages.all_agents') }}</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}" {{ request('agent_id') == $agent->id ? 'selected' : '' }}>
                            {{ $agent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Search Field -->
            <div class="col-md-3">
                <label for="search" class="form-label">{{ __('Search Clients') }}</label>
                <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
            </div>

            <!-- Buton de filtrare -->
            <div class="col-md-12 text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-filter f-18"></i> {{ __('messages.filter') }}
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Main content -->
<div class="row">
    <div class="col-sm-12">
        <div class="card table-card">
            <!-- Buton pentru adăugarea unui client -->
            <div class="text-end p-4 pb-sm-2">
                <a href="#" class="btn btn-primary d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addClientModal">
                    <i class="ti ti-plus f-18"></i> Add Client
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.client_list') }}</th>
                                <th>{{ __('messages.location') }}</th>
                                <th>{{ __('messages.agent') }}</th>
                                <th>{{ __('messages.date_added') }}</th>
                                <th class="text-center">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image" class="wid-40 rounded-circle" />
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-0">{{ $client->name }}</h6>
                                            <p class="text-muted f-12 mb-0">{{ $client->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $client->location }}</td>
                                <td>
                                    <span class="badge bg-light-success rounded-pill f-12">
                                        {{ optional($client->agent)->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>{{ $client->created_at->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <ul class="list-inline me-auto mb-0">
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                                            <a href="{{ route('clients.show', $client->id) }}" class="avtar avtar-xs btn-link-secondary btn-pc-default">
                                                <i class="ti ti-eye f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                            <a href="{{ route('clients.edit', $client->id) }}" class="avtar avtar-xs btn-link-success btn-pc-default">
                                                <i class="ti ti-edit-circle f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="avtar avtar-xs btn-link-danger btn-pc-default">
                                                    <i class="ti ti-trash f-18"></i>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $clients->appends(request()->input())->links('vendor.pagination.simple-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
@endsection

@include('partials.add_client_modal')
