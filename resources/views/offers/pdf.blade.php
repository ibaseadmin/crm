<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $offer->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .content {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>{{ $offer->title }}</h1>
        <div>
            {!! $offer->content !!}
        </div>
    </div>
</body>
</html>
