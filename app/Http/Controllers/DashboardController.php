<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request, ?int $year = null)
    {
        $year = $year ?? now()->year;
        $dateRange = $this->getDateRange($year);
        
        // Egyetlen optimalizált query az összes adathoz
        $stats = $this->getInvoiceStats($dateRange['start'], $dateRange['end']);
        
        $dashboard_data = [
            'all_invoice' => $stats->sum('total_count'),
            'all_storno' => $stats->sum('storno_count'),
            'start_date' => $dateRange['start']->format('Y.m.d'),
            'end_date' => $dateRange['end']->format('Y.m.d'),
            'bar_chart' => $this->prepareBarChartData($stats),
            'amount_chart_data' => $this->prepareAmountChartData($stats),
            'donut_chart' => [
                'invoices' => $stats->sum('normal_count'),
                'storno' => $stats->sum('storno_count'),
            ]
        ];
        
        return view('pages.dashboard', compact('dashboard_data', 'year'));
    }
    
    private function getDateRange(int $year): array
    {
        return [
            'start' => Carbon::create($year)->startOfYear(),
            'end' => Carbon::create($year)->endOfYear(),
        ];
    }
    
    private function getInvoiceStats(Carbon $start, Carbon $end)
    {
        return Invoice::select([
                DB::raw("DATE_FORMAT(date, '%Y-%m') as month"),
                DB::raw("COUNT(*) as total_count"),
                DB::raw("SUM(CASE WHEN type = 'storno' THEN 1 ELSE 0 END) as storno_count"),
                DB::raw("SUM(CASE WHEN type = 'invoice' THEN 1 ELSE 0 END) as normal_count"),
                DB::raw("SUM(CASE WHEN type = 'storno' THEN amount ELSE 0 END) as storno_amount"),
                DB::raw("SUM(CASE WHEN type = 'invoice' THEN amount ELSE 0 END) as normal_amount")
            ])
            ->whereBetween('date', [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->groupBy(DB::raw("DATE_FORMAT(date, '%Y-%m')"))
            ->orderBy('month')
            ->get();
    }
    
    private function prepareBarChartData($stats): array
    {
        if ($stats->isEmpty()) {
            return ['storno' => [0], 'normal' => [0]];
        }
        
        return [
            'storno' => $stats->pluck('storno_count')->toArray(),
            'normal' => $stats->pluck('normal_count')->toArray(),
        ];
    }
    
    private function prepareAmountChartData($stats): array
    {
        if ($stats->isEmpty()) {
            return ['storno' => [0], 'normal' => [0]];
        }
        
        return [
            'storno' => $stats->pluck('storno_amount')->toArray(),
            'normal' => $stats->pluck('normal_amount')->toArray(),
        ];
    }
}