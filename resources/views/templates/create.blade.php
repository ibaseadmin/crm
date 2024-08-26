@extends('layouts.main')

@section('title', 'Create Template')

@section('content')
<div class="container">
    <h1>Create Template</h1>

    <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="template_title">Template Title</label>
            <input type="text" name="template_title" id="template_title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="template_file">Upload DOCX Template</label>
            <input type="file" name="template_file" id="template_file" class="form-control" accept=".docx" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Template</button>
    </form>
</div>
@endsection
