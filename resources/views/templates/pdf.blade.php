<!DOCTYPE html>
<html>
<head>
    <title>{{ $template->name }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h3 {
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h3>{{ $template->name }}</h3>
    <div class="content">
        {!! $template->content !!}
    </div>
</body>
</html>
