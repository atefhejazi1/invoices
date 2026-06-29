@extends('layouts.master')
@section('title')
    {{ __('dashboard.title') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ __('dashboard.welcome_back') }} {{ Auth::user()->name }}</h2>
                <p class="mg-b-0">{{ __('dashboard.tagline') }}</p>
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
                    <span class="text-muted tx-12">{{ __('dashboard.total_invoices') }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-success-transparent text-success"><i class="fas fa-check-circle"></i></div>
                <div>
                    <h4 class="mb-0">{{ $count_invoices1 }}</h4>
                    <span class="text-muted tx-12">{{ __('status.paid') }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-danger-transparent text-danger"><i class="fas fa-times-circle"></i></div>
                <div>
                    <h4 class="mb-0">{{ $count_invoices2 }}</h4>
                    <span class="text-muted tx-12">{{ __('status.unpaid') }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-warning-transparent text-warning"><i class="fas fa-adjust"></i></div>
                <div>
                    <h4 class="mb-0">{{ $count_invoices3 }}</h4>
                    <span class="text-muted tx-12">{{ __('status.partial') }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-info-transparent text-info"><i class="fas fa-building"></i></div>
                <div>
                    <h4 class="mb-0">{{ $totalSections }}</h4>
                    <span class="text-muted tx-12">{{ __('dashboard.sections') }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
            <div class="stat-mini">
                <div class="stat-mini-icon bg-secondary-transparent text-secondary"><i class="fas fa-coins"></i></div>
                <div>
                    <h4 class="mb-0">{{ number_format($totalRevenue, 2) }}</h4>
                    <span class="text-muted tx-12">{{ __('dashboard.revenue') }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /slim stats strip -->

    <!-- overdue + leaderboard row (urgent items surfaced right after stats) -->
    <div class="row row-sm g-4 mb-4">
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-exclamation-triangle text-danger me-2"></i>{{ __('dashboard.overdue_invoices') }}
                        @if ($overdueCount > 0)
                            <span class="badge rounded-pill status-pill-danger status-badge ms-2">{{ $overdueCount }}</span>
                        @endif
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('dashboard.col_invoice_number') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.col_section') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.col_due_date') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.delay') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.col_total') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.col_status') }}</th>
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
                                        <td><span class="text-danger fw-bold">{{ abs((int) now()->diffInDays($invoice->Due_date, true)) }} {{ __('dashboard.day') }}</span></td>
                                        <td>{{ number_format($invoice->Total, 2) }}</td>
                                        <td><x-status-badge :status="$invoice->Value_Status" /></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">{{ __('dashboard.no_overdue_invoices') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0"><i class="fas fa-trophy text-warning me-2"></i>{{ __('dashboard.top_revenue_sections') }}</h4>
                </div>
                <div class="card-body">
                    @forelse ($topSections as $i => $row)
                        <div class="leaderboard-row">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="leaderboard-rank">#{{ $i + 1 }} {{ $row->section->section_name ?? __('dashboard.deleted_section') }}</span>
                                <strong>{{ number_format($row->revenue, 2) }}</strong>
                            </div>
                            <div class="leaderboard-bar-bg">
                                <div class="leaderboard-bar-fill" style="width: {{ $maxSectionRevenue > 0 ? round($row->revenue / $maxSectionRevenue * 100) : 0 }}%"></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted py-4 mb-0">{{ __('dashboard.not_enough_data') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- /overdue + leaderboard row -->

    <!-- chart row (analytics, below the actionable items) -->
    <div class="row row-sm g-4 mb-4">
        <div class="col-lg-7">
            <div class="card h-100">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0"><i class="fas fa-chart-line text-primary me-2"></i>{{ __('dashboard.revenue_trend') }}</h4>
                </div>
                <div class="card-body chart-card-body">
                    {!! $revenueTrendChart->render() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card h-100">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0"><i class="fas fa-chart-pie text-info me-2"></i>{{ __('dashboard.status_distribution') }}</h4>
                </div>
                <div class="card-body chart-card-body">
                    <div class="donut-chart-wrap">
                        {!! $chartjs->render() !!}
                    </div>
                    <div class="d-flex flex-column gap-2 status-legend-list">
                        <div class="d-flex justify-content-between align-items-center status-legend-row">
                            <span><span class="legend-dot bg-success"></span> {{ __('status.paid') }}</span>
                            <strong>{{ $count_invoices1 }}</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center status-legend-row">
                            <span><span class="legend-dot bg-danger"></span> {{ __('status.unpaid') }}</span>
                            <strong>{{ $count_invoices2 }}</strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center status-legend-row">
                            <span><span class="legend-dot bg-warning"></span> {{ __('status.partial') }}</span>
                            <strong>{{ $count_invoices3 }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /chart row -->

    <!-- recent invoices, full width -->
    <div class="row row-sm g-4 mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0"><i class="fas fa-history text-secondary me-2"></i>{{ __('dashboard.latest_invoices') }}</h4>
                    <a href="{{ url('invoices') }}" class="btn btn-sm btn-outline-primary">{{ __('dashboard.view_all') }}</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('dashboard.col_invoice_number') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.col_section') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.col_issue_date') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.col_total') }}</th>
                                    <th class="border-bottom-0">{{ __('dashboard.col_status') }}</th>
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
                                        <td colspan="5" class="text-center text-muted py-4">{{ __('dashboard.no_invoices_yet') }}</td>
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
