@extends('layouts.landing')

@section('title', __('messages.landing_meta_title'))

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                <i class="bi bi-receipt"></i> {{ __('messages.app_name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-3 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link text-white-50" href="#features">{{ __('messages.landing_nav_features') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#how">{{ __('messages.landing_nav_how') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#faq">{{ __('messages.landing_nav_faq') }}</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white-50" href="#" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-globe2"></i> {{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleNative() }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @foreach (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item {{ $localeCode === app()->getLocale() ? 'active' : '' }}"
                                       href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm btn-light fw-bold px-3"
                           href="{{ route('login', ['email' => 'admin@demo.com', 'password' => 'password']) }}">
                            {{ __('messages.landing_cta_try') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero text-center text-lg-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="badge-soft mb-3"><i class="bi bi-stars"></i> {{ __('messages.landing_badge') }}</span>
                    <h1 class="display-5 mb-3">{{ __('messages.landing_hero_title') }}</h1>
                    <p class="lead mb-4" style="opacity:.85">
                        {{ __('messages.landing_hero_lead') }}
                    </p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start flex-wrap">
                        <a href="{{ route('login', ['email' => 'admin@demo.com', 'password' => 'password']) }}"
                           class="btn btn-demo btn-lg">
                            <i class="bi bi-play-circle"></i> {{ __('messages.landing_cta_try') }}
                        </a>
                        <a href="#features" class="btn btn-outline-light btn-lg">{{ __('messages.landing_cta_features') }}</a>
                    </div>

                    <div class="d-flex gap-4 mt-5 justify-content-center justify-content-lg-start flex-wrap stat-strip">
                        <div>
                            <h3 class="mb-0 fw-bold"><span data-count="15" data-suffix="+">0</span></h3>
                            <small class="opacity-75">{{ __('messages.landing_stat_permissions') }}</small>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold"><span data-count="3">0</span></h3>
                            <small class="opacity-75">{{ __('messages.landing_stat_statuses') }}</small>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold"><span data-count="100" data-suffix="%">0</span></h3>
                            <small class="opacity-75">{{ __('messages.landing_stat_lang_support') }}</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-none d-lg-block">
                    <!-- CSS dashboard mockup (no real screenshot needed) -->
                    <div class="mockup-window">
                        <div class="mockup-titlebar">
                            <span></span><span></span><span></span>
                            <div class="mockup-url">app.invoices.local/dashboard</div>
                        </div>
                        <div class="mockup-body">
                            <div class="mockup-sidebar">
                                <div class="mockup-logo"></div>
                                <div class="mockup-nav-item active"></div>
                                <div class="mockup-nav-item"></div>
                                <div class="mockup-nav-item"></div>
                                <div class="mockup-nav-item"></div>
                                <div class="mockup-nav-item"></div>
                            </div>
                            <div class="mockup-main">
                                <div class="mockup-cards">
                                    <div class="mockup-card c1"></div>
                                    <div class="mockup-card c2"></div>
                                    <div class="mockup-card c3"></div>
                                </div>
                                <div class="mockup-chart">
                                    <svg viewBox="0 0 100 40" preserveAspectRatio="none">
                                        <polyline points="0,35 15,28 30,30 45,15 60,20 75,8 100,12" />
                                    </svg>
                                </div>
                                <div class="mockup-table">
                                    <div class="mockup-row"></div>
                                    <div class="mockup-row"></div>
                                    <div class="mockup-row"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-5 py-lg-6 bg-soft">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ __('messages.landing_features_title') }}</h2>
                <p class="text-muted">{{ __('messages.landing_features_subtitle') }}</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-receipt-cutoff"></i></div>
                        <h5 class="fw-bold">{{ __('messages.landing_feature1_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_feature1_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-shield-lock"></i></div>
                        <h5 class="fw-bold">{{ __('messages.landing_feature2_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_feature2_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-bar-chart-line"></i></div>
                        <h5 class="fw-bold">{{ __('messages.landing_feature3_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_feature3_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-paperclip"></i></div>
                        <h5 class="fw-bold">{{ __('messages.landing_feature4_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_feature4_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-archive"></i></div>
                        <h5 class="fw-bold">{{ __('messages.landing_feature5_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_feature5_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-moon-stars"></i></div>
                        <h5 class="fw-bold">{{ __('messages.landing_feature6_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_feature6_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how" class="py-5 py-lg-6">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ __('messages.landing_how_title') }}</h2>
                <p class="text-muted">{{ __('messages.landing_how_subtitle') }}</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h5 class="fw-bold mt-3">{{ __('messages.landing_step1_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_step1_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h5 class="fw-bold mt-3">{{ __('messages.landing_step2_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_step2_desc') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h5 class="fw-bold mt-3">{{ __('messages.landing_step3_title') }}</h5>
                        <p class="text-muted mb-0">{{ __('messages.landing_step3_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-soft">
        <div class="container py-2">
            <div class="text-center mb-4">
                <h2 class="section-title">{{ __('messages.landing_tech_title') }}</h2>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <span class="tech-badge"><i class="bi bi-server"></i> Laravel</span>
                <span class="tech-badge"><i class="bi bi-bootstrap"></i> Bootstrap 5</span>
                <span class="tech-badge"><i class="bi bi-database"></i> MySQL</span>
                <span class="tech-badge"><i class="bi bi-shield-check"></i> Spatie Permissions</span>
                <span class="tech-badge"><i class="bi bi-bar-chart"></i> Chart.js</span>
            </div>
        </div>
    </section>

    <section id="faq" class="py-5 py-lg-6">
        <div class="container py-2">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ __('messages.landing_nav_faq') }}</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    {{ __('messages.landing_faq1_q') }}
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">{{ __('messages.landing_faq1_a') }}</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    {{ __('messages.landing_faq2_q') }}
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">{{ __('messages.landing_faq2_a') }}</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    {{ __('messages.landing_faq3_q') }}
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">{{ __('messages.landing_faq3_a') }}</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    {{ __('messages.landing_faq4_q') }}
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">{{ __('messages.landing_faq4_a') }}</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    {{ __('messages.landing_faq5_q') }}
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">{{ __('messages.landing_faq5_a') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 text-center text-white cta-section">
        <div class="container py-3">
            <h2 class="fw-bold mb-3">{{ __('messages.landing_final_cta_title') }}</h2>
            <p class="mb-4 opacity-75">{{ __('messages.landing_final_cta_subtitle') }}</p>
            <a href="{{ route('login', ['email' => 'admin@demo.com', 'password' => 'password']) }}"
               class="btn btn-demo btn-lg">
                <i class="bi bi-play-circle"></i> {{ __('messages.landing_cta_try_now') }}
            </a>
        </div>
    </section>

    <footer class="landing-footer">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <div>&copy; {{ date('Y') }} {{ __('messages.app_name') }}. {{ __('messages.landing_footer_rights') }}</div>
            <div class="d-flex gap-3">
                <a href="https://www.upwork.com/freelancers/~019155515c3b5d1ea4" target="_blank" rel="noopener">
                    <i class="bi bi-briefcase"></i> Upwork
                </a>
                <a href="https://www.linkedin.com/in/atefhejazi" target="_blank" rel="noopener">
                    <i class="bi bi-linkedin"></i> LinkedIn
                </a>
            </div>
        </div>
    </footer>
@endsection
