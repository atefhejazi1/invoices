@extends('layouts.master')
@section('title')
    لوحة التحكم - برنامج الفواتير
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">أهلا بعودتك أستاذ {{ Auth::user()->name }}</h2>
                <p class="mg-b-0">الحل الامثل لإدارة الفواتير الخاصة بك</p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- slim stats strip -->
    <div class="row row-sm g-3 stat-strip-row">
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-primary-transparent text-primary"><i class="fas fa-file-invoice"></i></div>
                <div>
                    <h4 class="mb-0">{{ $count_all }}</h4>
                    <span class="text-muted tx-12">اجمالي الفواتير</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-success-transparent text-success"><i class="fas fa-check-circle"></i></div>
                <div>
                    <h4 class="mb-0">{{ $count_invoices1 }}</h4>
                    <span class="text-muted tx-12">مدفوعة</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-danger-transparent text-danger"><i class="fas fa-times-circle"></i></div>
                <div>
                    <h4 class="mb-0">{{ $count_invoices2 }}</h4>
                    <span class="text-muted tx-12">غير مدفوعة</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-warning-transparent text-warning"><i class="fas fa-adjust"></i></div>
                <div>
                    <h4 class="mb-0">{{ $count_invoices3 }}</h4>
                    <span class="text-muted tx-12">مدفوعة جزئياً</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-info-transparent text-info"><i class="fas fa-building"></i></div>
                <div>
                    <h4 class="mb-0">{{ $totalSections }}</h4>
                    <span class="text-muted tx-12">الاقسام</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-secondary-transparent text-secondary"><i class="fas fa-coins"></i></div>
                <div>
                    <h4 class="mb-0">{{ number_format($totalRevenue, 2) }}</h4>
                    <span class="text-muted tx-12">الايرادات</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /slim stats strip -->

    <!-- chart-first row -->
    <div class="row row-sm">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">اتجاه الايرادات (آخر 6 أشهر)</h4>
                </div>
                <div class="card-body">
                    {!! $revenueTrendChart->render() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">توزيع حالات الفواتير</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        {!! $chartjs->render() !!}
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between align-items-center status-legend-row">
                            <span><span class="legend-dot bg-success"></span> مدفوعة</span>
                            <strong>{{ $count_invoices1 }}</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center status-legend-row">
                            <span><span class="legend-dot bg-danger"></span> غير مدفوعة</span>
                            <strong>{{ $count_invoices2 }}</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center status-legend-row">
                            <span><span class="legend-dot bg-warning"></span> مدفوعة جزئياً</span>
                            <strong>{{ $count_invoices3 }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /chart-first row -->

    <!-- overdue + leaderboard row -->
    <div class="row row-sm">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        فواتير متأخرة
                        @if ($overdueCount > 0)
                            <span class="badge bg-danger rounded-pill ms-2">{{ $overdueCount }}</span>
                        @endif
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                    <th class="border-bottom-0">القسم</th>
                                    <th class="border-bottom-0">تاريخ الاستحقاق</th>
                                    <th class="border-bottom-0">التأخير</th>
                                    <th class="border-bottom-0">الاجمالي</th>
                                    <th class="border-bottom-0">الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($overdueInvoices as $invoice)
                                    <tr>
                                        <td>
                                            <a href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->invoice_number }}</a>
                                        </td>
                                        <td>{{ $invoice->section->section_name ?? '-' }}</td>
                                        <td>{{ $invoice->Due_date }}</td>
                                        <td><span class="text-danger">{{ now()->diffInDays($invoice->Due_date) }} يوم</span></td>
                                        <td>{{ number_format($invoice->Total, 2) }}</td>
                                        <td><x-status-badge :status="$invoice->Value_Status" /></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">لا توجد فواتير متأخرة 🎉</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">أعلى الأقسام إيرادًا</h4>
                </div>
                <div class="card-body">
                    @forelse ($topSections as $i => $row)
                        <div class="leaderboard-row">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="leaderboard-rank">#{{ $i + 1 }} {{ $row->section->section_name ?? 'قسم محذوف' }}</span>
                                <strong>{{ number_format($row->revenue, 2) }}</strong>
                            </div>
                            <div class="leaderboard-bar-bg">
                                <div class="leaderboard-bar-fill" style="width: {{ $maxSectionRevenue > 0 ? round($row->revenue / $maxSectionRevenue * 100) : 0 }}%"></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted py-4 mb-0">لا توجد بيانات كافية</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- /overdue + leaderboard row -->

    <!-- recent invoices, full width -->
    <div class="row row-sm">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">أحدث الفواتير</h4>
                    <a href="{{ url('invoices') }}" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                    <th class="border-bottom-0">القسم</th>
                                    <th class="border-bottom-0">تاريخ الاصدار</th>
                                    <th class="border-bottom-0">الاجمالي</th>
                                    <th class="border-bottom-0">الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentInvoices as $invoice)
                                    <tr>
                                        <td>
                                            <a href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->invoice_number }}</a>
                                        </td>
                                        <td>{{ $invoice->section->section_name ?? '-' }}</td>
                                        <td>{{ $invoice->invoice_Date }}</td>
                                        <td>{{ number_format($invoice->Total, 2) }}</td>
                                        <td><x-status-badge :status="$invoice->Value_Status" /></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">لا توجد فواتير حتى الآن</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
@endsection
