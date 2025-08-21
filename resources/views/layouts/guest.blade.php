<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <title>{{ config('Pulse Survey') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">
    @yield('content')
</body>
</html>
