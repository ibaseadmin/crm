@extends('layouts.main')

@section('title', 'Select Template')

@section('content')
<div class="container">
    <h1>Select an Offer Template</h1>
    <form action="{{ route('offers.create') }}" method="GET">
        <div class="row">
            @foreach($templates as $template)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $template->name }}</h5>
                            <p>{{ Str::limit($template->content, 100) }}</p>
                            <button type="submit" name="template_id" value="{{ $template->id }}" class="btn btn-primary">Select</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>
@endsection
