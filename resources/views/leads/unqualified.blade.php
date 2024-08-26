@extends('layouts.main')

@section('title', __('messages.unqualified_leads'))

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ __('messages.unqualified_leads') }}</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">{{ __('messages.unqualified_leads') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card table-card">
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
                                <th>{{ __('messages.unqualified_at') }}</th>
                                <th>{{ __('messages.actions') }}</th>
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
                                    <td>{{ optional($lead->agent)->name ?? 'N/A' }}</td>
                                    <td>{{ $lead->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $lead->unqualified_at ? \Carbon\Carbon::parse($lead->unqualified_at)->format('d/m/Y') : 'N/A' }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="showReasonModal('{{ $lead->unqualified_reason }}')">View Reason</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $leads->links('vendor.pagination.simple-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function showReasonModal(reason) {
        alert(reason);  // Înlocuiește acest cod cu logica ta pentru a afișa modalul
    }
</script>
@endsection
