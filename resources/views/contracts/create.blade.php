@extends('layouts.main')

@section('title', 'Create Contract')

@section('content')
<div class="container">
    <h1>Create Contract for {{ $client->name }}</h1>
    
    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{ $client->id }}">
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Contract</button>
    </form>
</div>
@endsection
