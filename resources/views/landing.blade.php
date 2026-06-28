@extends('layouts.landing')

@section('title', 'برنامج الفواتير - نظام إدارة فواتير متكامل')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                <i class="bi bi-receipt"></i> برنامج الفواتير
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-3 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link text-white-50" href="#features">المميزات</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#how">كيف يعمل</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#faq">الأسئلة الشائعة</a></li>
                    <li class="nav-item">
                        <a href="#" id="themeToggle" class="nav-link text-white-50" title="تبديل الوضع الليلي">
                            <i class="bi bi-moon-stars theme-icon-dark"></i>
                            <i class="bi bi-sun theme-icon-light" style="display:none"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm btn-light fw-bold px-3"
                           href="{{ route('login', ['email' => 'admin@demo.com', 'password' => 'password']) }}">
                            جرّب النسخة التجريبية
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
                    <span class="badge-soft mb-3"><i class="bi bi-stars"></i> جاهز للانطلاق فورًا</span>
                    <h1 class="display-5 mb-3">نظام متكامل لإدارة فواتيرك بكل سهولة</h1>
                    <p class="lead mb-4" style="opacity:.85">
                        إدارة الفواتير والعملاء والمدفوعات والتقارير من لوحة تحكم واحدة، مع صلاحيات مستخدمين دقيقة وتصدير
                        فوري للبيانات.
                    </p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start flex-wrap">
                        <a href="{{ route('login', ['email' => 'admin@demo.com', 'password' => 'password']) }}"
                           class="btn btn-demo btn-lg">
                            <i class="bi bi-play-circle"></i> جرّب النسخة التجريبية
                        </a>
                        <a href="#features" class="btn btn-outline-light btn-lg">اكتشف المميزات</a>
                    </div>

                    <div class="d-flex gap-4 mt-5 justify-content-center justify-content-lg-start flex-wrap stat-strip">
                        <div>
                            <h3 class="mb-0 fw-bold"><span data-count="15" data-suffix="+">0</span></h3>
                            <small class="opacity-75">صلاحية مستخدم</small>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold"><span data-count="3">0</span></h3>
                            <small class="opacity-75">حالات دفع لكل فاتورة</small>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold"><span data-count="100" data-suffix="%">0</span></h3>
                            <small class="opacity-75">دعم اللغة العربية</small>
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
                <h2 class="section-title">كل ما تحتاجه لإدارة فواتيرك</h2>
                <p class="text-muted">مميزات مصممة لتسهيل العمل اليومي وزيادة الدقة في إدارة الفواتير</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-receipt-cutoff"></i></div>
                        <h5 class="fw-bold">إدارة الفواتير</h5>
                        <p class="text-muted mb-0">إنشاء وتعديل وأرشفة الفواتير مع تتبع حالة الدفع لكل فاتورة.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-shield-lock"></i></div>
                        <h5 class="fw-bold">صلاحيات وأدوار دقيقة</h5>
                        <p class="text-muted mb-0">تحكم كامل في صلاحيات كل مستخدم عبر نظام أدوار وصلاحيات متقدم.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-bar-chart-line"></i></div>
                        <h5 class="fw-bold">تقارير وتصدير فوري</h5>
                        <p class="text-muted mb-0">تقارير تفصيلية عن الفواتير والعملاء مع إمكانية التصدير إلى Excel.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-paperclip"></i></div>
                        <h5 class="fw-bold">مرفقات الفواتير</h5>
                        <p class="text-muted mb-0">رفع وإدارة المرفقات والمستندات الخاصة بكل فاتورة بسهولة.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-archive"></i></div>
                        <h5 class="fw-bold">أرشفة واستعادة</h5>
                        <p class="text-muted mb-0">أرشفة الفواتير القديمة مع إمكانية استعادتها في أي وقت.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card bg-white">
                        <div class="feature-icon"><i class="bi bi-moon-stars"></i></div>
                        <h5 class="fw-bold">وضع ليلي ونهاري</h5>
                        <p class="text-muted mb-0">تبديل فوري بين الوضع الفاتح والداكن لراحة عينيك في أي وقت.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how" class="py-5 py-lg-6">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="section-title">يعمل النظام في 3 خطوات</h2>
                <p class="text-muted">بدون أي تهيئة، جرّب النظام كاملًا في أقل من دقيقة</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h5 class="fw-bold mt-3">سجّل الدخول بالحساب التجريبي</h5>
                        <p class="text-muted mb-0">بيانات الدخول معبأة مسبقًا، فقط اضغط دخول.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h5 class="fw-bold mt-3">استعرض لوحة التحكم</h5>
                        <p class="text-muted mb-0">بيانات تجريبية جاهزة: فواتير، أقسام، وتقارير فعلية.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h5 class="fw-bold mt-3">جرّب الإضافة والتعديل</h5>
                        <p class="text-muted mb-0">أنشئ فاتورة جديدة وغيّر حالتها وشاهد التقارير تتحدث فورًا.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-soft">
        <div class="container py-2">
            <div class="text-center mb-4">
                <h2 class="section-title">مبني على تقنيات موثوقة</h2>
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
                <h2 class="section-title">الأسئلة الشائعة</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    هل أحتاج تثبيت أي شيء لتجربة النظام؟
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">لا، فقط اضغط "جرّب النسخة التجريبية" وسيتم تسجيل دخولك مباشرة بحساب جاهز ببيانات تجريبية كاملة.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    هل يدعم النظام اللغة العربية بشكل كامل؟
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">نعم، الواجهة بالكامل بالعربية مع دعم اتجاه الكتابة من اليمين لليسار (RTL).</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    هل يمكنني التحكم في صلاحيات كل مستخدم؟
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">نعم، النظام يستخدم نظام أدوار وصلاحيات متقدم (Spatie Permissions) يتيح لك التحكم بدقة في كل ميزة لكل مستخدم.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    هل يمكن تصدير البيانات؟
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">نعم، يمكنك تصدير الفواتير والتقارير مباشرة إلى ملفات Excel من داخل لوحة التحكم.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    هل بياناتي التجريبية محفوظة بشكل دائم؟
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">الحساب التجريبي مخصص للاستكشاف فقط، ويُنصح بعدم الاعتماد عليه لتخزين بيانات حقيقية.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 text-center text-white cta-section">
        <div class="container py-3">
            <h2 class="fw-bold mb-3">جاهز لتجربة النظام؟</h2>
            <p class="mb-4 opacity-75">سجّل الدخول بحساب تجريبي جاهز وابدأ الاستكشاف فورًا، بدون أي إعداد.</p>
            <a href="{{ route('login', ['email' => 'admin@demo.com', 'password' => 'password']) }}"
               class="btn btn-demo btn-lg">
                <i class="bi bi-play-circle"></i> جرّب النسخة التجريبية الآن
            </a>
        </div>
    </section>

    <footer class="landing-footer">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <div>&copy; {{ date('Y') }} برنامج الفواتير. جميع الحقوق محفوظة.</div>
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
