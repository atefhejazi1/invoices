@php
    $cssDir = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection();
    $cssFolder = $cssDir === 'rtl' ? 'css-rtl' : 'css';
@endphp
<!-- Title -->
<title> @yield('title') </title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset("assets/{$cssFolder}/sidemenu.css")}}">
@yield('css')
<!--- Style css -->
<link href="{{URL::asset("assets/{$cssFolder}/style.css")}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset("assets/{$cssFolder}/skin-modes.css")}}" rel="stylesheet">
<!-- App overrides (portfolio polish) -->
<link href="{{URL::asset('css/app-overrides.css')}}" rel="stylesheet">
@if ($cssDir === 'rtl')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
@else
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', 'Roboto', sans-serif; }</style>
@endif
