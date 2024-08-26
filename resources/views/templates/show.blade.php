@extends('layouts.main')

@section('title', 'View Template')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>View Template</h1>
        <div>
            <ul class="list-inline ms-auto mb-0 d-flex justify-content-end flex-wrap">
                <!-- Edit -->
                <li class="list-inline-item align-bottom me-2">
                    <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-warning">
                        <i class="ph-duotone ph-pencil-simple-line f-22"></i> Edit
                    </a>
                </li>
                <!-- View -->
                <li class="list-inline-item align-bottom me-2">
                    <button onclick="window.location.reload();" class="btn btn-info">
                        <i class="ph-duotone ph-eye f-22"></i> View
                    </button>
                </li>
                <!-- Download -->
                <li class="list-inline-item align-bottom me-2">
                    <a href="{{ route('templates.download', $template->id) }}" class="btn btn-success">
                        <i class="ph-duotone ph-download-simple f-22"></i> Save
                    </a>
                </li>
                <!-- Print -->
                <li class="list-inline-item align-bottom me-2">
                    <button class="btn btn-primary" onclick="printTemplate()">
                        <i class="ph-duotone ph-printer f-22"></i> Print
                    </button>
                </li>
                <!-- Send -->
                <li class="list-inline-item align-bottom me-2">
                    <button onclick="sendTemplate({{ $template->id }});" class="btn btn-secondary">
                        <i class="ph-duotone ph-paper-plane-tilt f-22"></i> Send
                    </button>
                </li>
                <!-- Share -->
                <li class="list-inline-item align-bottom me-2">
                    <button onclick="shareTemplate({{ $template->id }});" class="btn btn-dark">
                        <i class="ph-duotone ph-share-network f-22"></i> Share
                    </button>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h3>{{ $template->name }}</h3>
            <div class="mt-4" id="template-content">
                {!! $template->content !!}
            </div>
        </div>
    </div>
</div>

<script>
    function printTemplate() {
        var printContents = document.getElementById('template-content').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    function sendTemplate(templateId) {
        // Logica pentru trimiterea template-ului pe email
        alert('Template ' + templateId + ' a fost trimis!');
    }

    function shareTemplate(templateId) {
        // Logica pentru partajarea template-ului
        alert('Template ' + templateId + ' a fost partajat!');
    }
</script>
@endsection
