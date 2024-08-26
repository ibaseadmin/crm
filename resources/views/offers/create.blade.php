@extends('layouts.main')

@section('title', 'Create New Offer')

@section('content')
<div class="container">
    <h1>Create New Offer</h1>

    <form action="{{ route('offers.store') }}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{ $client->id }}">

        <!-- Dropdown pentru selectarea template-ului -->
        <div class="mb-3">
            <label for="template_id" class="form-label">Select Template</label>
            <select class="form-control" id="template_id" name="template_id" required>
                <option value="" disabled selected>Select a template</option>
                @foreach($templates as $template)
                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="offer_title" class="form-label">Offer Title</label>
            <input type="text" class="form-control" id="offer_title" name="offer_title" required>
        </div>

        <div class="mb-3">
            <label for="offer_content" class="form-label">Content</label>
            <textarea class="form-control" id="offer_content" name="offer_content" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Offer</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('offer_content');

    // Când se selectează un template, încarcă conținutul acestuia în editor
    document.getElementById('template_id').addEventListener('change', function() {
        var templateId = this.value;
        
        if (templateId) {
            fetch(`/templates/${templateId}/content`)
                .then(response => response.json())
                .then(data => {
                    if (data.content) {
                        CKEDITOR.instances.offer_content.setData(data.content);
                    }
                })
                .catch(error => {
                    console.error('Error fetching template content:', error);
                });
        }
    });
</script>
@endsection
