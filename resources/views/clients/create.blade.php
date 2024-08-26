<!-- resources/views/clients/create.blade.php -->
@extends('layouts.main')

@section('title', 'Add New Client')

@section('content')
<div class="row">
  <div class="col-12">
    <h4 class="mb-3">Add New Client</h4>
    <form action="{{ route('clients.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Client Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
      <button type="submit" class="btn btn-primary">Add Client</button>
    </form>
  </div>
</div>
@endsection
