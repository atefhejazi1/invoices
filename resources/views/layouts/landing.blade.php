<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'برنامج الفواتير')</title>
    <meta name="description" content="نظام إدارة فواتير جاهز للإنتاج، مبني بـ Laravel">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ URL::asset('css/landing.css') }}" rel="stylesheet">
</head>

<body>
    <script>
        if (localStorage.getItem('app-theme') === 'dark') {
            document.body.classList.add('dark-theme');
        }
    </script>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('js/app-theme.js') }}"></script>
    <script src="{{ URL::asset('js/landing-counters.js') }}"></script>
</body>

</html>
