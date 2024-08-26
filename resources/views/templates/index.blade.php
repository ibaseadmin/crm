@extends('layouts.main')

@section('title', 'Templates List')

@section('content')
<div class="container">
    <h1>Templates</h1>
    
    <div class="row">
        @foreach($templates as $template)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $template->name }}</h5>
                        <p class="card-text">Created at: {{ $template->created_at->format('d/m/Y') }}</p>
                        <a href="{{ route('templates.show', $template->id) }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
