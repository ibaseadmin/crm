@extends('layouts.main')

@section('title', 'Edit Offer')

@section('content')
<div class="container">
    <h1>Edit Offer #{{ $offer->id }}</h1>

    <form action="{{ route('offers.update', $offer->id) }}" method="POST" id="offer-editor-form">
        @csrf
        @method('PUT')

        <!-- Display the title -->
        <div class="mb-3">
            <label for="title" class="form-label">Offer Title</label>
            <input type="text" class="form-control" id="title" name="offer_title" value="{{ $offer->title }}" required>
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label for="offer_content" class="form-label">Content</label>
            <textarea class="form-control" id="offer_content" name="offer_content">{{ $offer->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Offer</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#offer_content').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endsection
