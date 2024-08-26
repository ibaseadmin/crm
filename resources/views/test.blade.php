<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Locale</title>
</head>
<body>
    <h1>{{ __('welcome') }}</h1>
    <p>{{ __('messages.language') }}</p>
</body>
</html>
