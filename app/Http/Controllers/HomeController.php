<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\sections;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private const ARABIC_MONTHS = [
        'يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو',
        'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر',
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_all = invoices::count();
        $count_invoices1 = invoices::where('Value_Status', 1)->count();
        $count_invoices2 = invoices::where('Value_Status', 2)->count();
        $count_invoices3 = invoices::where('Value_Status', 3)->count();
        $totalSections = sections::count();
        $totalRevenue = invoices::sum('Total');
        $recentInvoices = invoices::latest()->take(8)->get();

        $overdueInvoices = invoices::where('Due_date', '<', now())
            ->where('Value_Status', '!=', 1)
            ->orderBy('Due_date')
            ->take(8)
            ->get();
        $overdueCount = invoices::where('Due_date', '<', now())
            ->where('Value_Status', '!=', 1)
            ->count();

        $topSections = invoices::selectRaw('section_id, SUM(Total) as revenue')
            ->groupBy('section_id')
            ->orderByDesc('revenue')
            ->take(5)
            ->with('section')
            ->get();
        $maxSectionRevenue = $topSections->max('revenue') ?: 1;

        $trendLabels = [];
        $trendData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $trendLabels[] = self::ARABIC_MONTHS[$month->month - 1];
            $trendData[] = round(
                invoices::whereYear('invoice_Date', $month->year)
                    ->whereMonth('invoice_Date', $month->month)
                    ->sum('Total'),
                2
            );
        }

        $chartjs = app()->chartjs
            ->name('statusDistributionChart')
            ->type('doughnut')
            ->size(['width' => 320, 'height' => 280])
            ->labels(['مدفوعة', 'غير مدفوعة', 'مدفوعة جزئياً'])
            ->datasets([
                [
                    'backgroundColor' => ['#22c03c', '#ee335e', '#fbbc0b'],
                    'data' => [$count_invoices1, $count_invoices2, $count_invoices3],
                ],
            ])
            ->options([
                'cutoutPercentage' => 65,
                'legend' => ['position' => 'bottom'],
            ]);

        $revenueTrendChart = app()->chartjs
            ->name('revenueTrendChart')
            ->type('line')
            ->size(['width' => 600, 'height' => 260])
            ->labels($trendLabels)
            ->datasets([
                [
                    'label' => 'الايرادات',
                    'backgroundColor' => 'rgba(1, 98, 232, .12)',
                    'borderColor' => '#0162e8',
                    'data' => $trendData,
                    'fill' => true,
                    'tension' => 0.35,
                ],
            ])
            ->options([
                'legend' => ['display' => false],
            ]);

        return view('dashboard', compact(
            'chartjs',
            'revenueTrendChart',
            'count_all',
            'count_invoices1',
            'count_invoices2',
            'count_invoices3',
            'totalSections',
            'totalRevenue',
            'recentInvoices',
            'overdueInvoices',
            'overdueCount',
            'topSections',
            'maxSectionRevenue'
        ));
    }
}
