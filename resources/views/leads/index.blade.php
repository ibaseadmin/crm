@extends('layouts.main')

@section('title', 'Leads')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Leads</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">{{ __('messages.lead_list') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Afișează mesajele de succes -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Form for filtering -->
<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('leads.index') }}" class="row g-3">
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
                <label for="search" class="form-label">{{ __('Search Leads') }}</label>
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
            <!-- Buton pentru adăugarea unui lead -->
            <div class="text-end p-4 pb-sm-2">
                <a href="#" class="btn btn-primary d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addLeadModal">
                    <i class="ti ti-plus f-18"></i> {{ __('messages.add_lead') }}
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.lead_list') }}</th>
                                <th>{{ __('messages.source') }}</th>
                                <th>{{ __('messages.location') }}</th>
                                <th>{{ __('messages.agent') }}</th>
                                <th>{{ __('messages.date_added') }}</th>
                                <th class="text-center">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                    <td>{{ $lead->id }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image" class="wid-40 rounded-circle" />
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-0">{{ $lead->name }}</h6>
                                                <p class="text-muted f-12 mb-0">{{ $lead->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $lead->source }}</td>
                                    <td>{{ $lead->location }}</td>
                                    <!-- Înlocuirea coloanei agent pentru a fi selectabilă -->
                                    <td>
                                        <form action="{{ route('leads.updateAgent', $lead->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="agent_id" class="form-select" onchange="this.form.submit()">
                                                @foreach($agents as $agent)
                                                    <option value="{{ $agent->id }}" {{ $lead->agent_id == $agent->id ? 'selected' : '' }}>
                                                        {{ $agent->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{ $lead->created_at->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <ul class="list-inline me-auto mb-0">
                                            <!-- Butonul pentru Make Client -->
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Make Client">
                                                <form action="{{ route('leads.makeClient', $lead->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="avtar avtar-xs btn-link-success btn-pc-default">
                                                        <i class="ti ti-check f-18"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <!-- Butonul pentru Unqualified -->
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Unqualified">
                                                <button type="button" class="avtar avtar-xs btn-link-danger btn-pc-default" 
                                                        onclick="openUnqualifiedModal({{ $lead->id }})">
                                                    <i class="ti ti-x f-18"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $leads->appends(request()->input())->links('vendor.pagination.simple-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function openUnqualifiedModal(leadId) {
        var form = document.getElementById('unqualifiedForm');
        form.action = '/leads/' + leadId + '/unqualify';
        var modal = new bootstrap.Modal(document.getElementById('unqualifiedModal'));
        modal.show();
    }
</script>

<!-- Modal pentru motivul descalificării -->
<div class="modal fade" id="unqualifiedModal" tabindex="-1" aria-labelledby="unqualifiedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unqualifiedModalLabel">Motivul descalificării</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="unqualifiedForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="unqualified_reason" class="form-label">Motivul</label>
                        <textarea class="form-control" id="unqualified_reason" name="unqualified_reason" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Mark as Unqualified</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
@endsection

@include('partials.add_lead_modal')
