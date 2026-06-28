@extends('layouts.master2')

@section('title')
    تسجيل الدخول - برنامج الفواتير
@endsection


@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('css/auth.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin auth-card">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/') }}"><img
                                                src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">برنامج الفواتير </h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>مرحبا بك</h2>
                                            <h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>

                                            <div class="auth-demo-hint">
                                                <i class="fas fa-info-circle text-primary"></i>
                                                حساب تجريبي جاهز: <strong>admin@demo.com</strong> /
                                                <strong>password</strong>
                                            </div>

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>البريد الالكتروني</label>
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email', request('email')) }}" required
                                                        autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>كلمة المرور</label>

                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" value="{{ request('password') }}" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="remember" id="remember"
                                                                    {{ old('remember') ? 'checked' : '' }}>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('تذكرني') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('تسجيل الدخول') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->

            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex p-0">
                <div class="auth-brand-panel w-100">
                    <div>
                        <h2 class="mb-3">نظام متكامل لإدارة فواتيرك</h2>
                        <p class="mb-0" style="opacity:.85">فواتير، تقارير، صلاحيات، وكل ما تحتاجه من لوحة واحدة.</p>
                        <ul class="auth-feature-list">
                            <li><i class="fas fa-receipt"></i> إدارة كاملة للفواتير وحالات الدفع</li>
                            <li><i class="fas fa-shield-alt"></i> صلاحيات وأدوار دقيقة لكل مستخدم</li>
                            <li><i class="fas fa-chart-line"></i> تقارير وتصدير فوري للبيانات</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
@endsection
