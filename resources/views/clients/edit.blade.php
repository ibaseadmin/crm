@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editare Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nume</label>
            <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $client->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefon</label>
            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Adresă</label>
            <input type="text" name="address" class="form-control" value="{{ $client->address }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvează modificările</button>
    </form>
</div>
@endsection
