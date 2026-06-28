<!DOCTYPE html>
@php
    $landingDir = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection();
@endphp
<html lang="{{ app()->getLocale() }}" dir="{{ $landingDir }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('messages.landing_meta_title'))</title>
    <meta name="description" content="{{ __('messages.landing_meta_description') }}">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    @if ($landingDir === 'rtl')
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
        <style>body { font-family: 'Inter', 'Roboto', sans-serif; }</style>
    @endif

    @if ($landingDir === 'rtl')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ URL::asset('css/landing.css') }}" rel="stylesheet">
</head>

<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('js/landing-counters.js') }}"></script>
</body>

</html>
