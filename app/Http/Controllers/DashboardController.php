<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    function index(Request $request, $year = null)
    {
        if (!$year) {
            $year = date('Y');
        }
        $start = Carbon::create($year)->startOfYear()->format('Y-m-d');
        $end = Carbon::create($year)->endOfYear()->format('Y-m-d');
        
        $dashboard_data = [];
        
        $stats = Invoice::select([
            DB::raw("DATE_FORMAT(date, '%Y-%m') as honap"),
            DB::raw("COUNT(*) as osszes_darab"),
            DB::raw("CAST(SUM(CASE WHEN type = 'storno' THEN 1 ELSE 0 END) AS UNSIGNED) as storno_darab")
        ])
            ->whereBetween('date', [$start, $end])
            ->groupBy(DB::raw("DATE_FORMAT(date, '%Y-%m')"))
            ->orderBy('honap')
            ->get();
            
        $szamla = $stats->pluck('osszes_darab')->toArray();
        $storno = [];
        
        if (empty($stats->toArray())) {
            $storno = [0];
            $szamla = [0];
        } else {
            foreach ($stats as $sor) {
                $storno[] = $sor->storno_darab;
            }
        }
        
        $dashboard_data = [
            "all_invoice" => array_sum($szamla),
            "all_storno" => array_sum($storno),
            "start_date" => Carbon::parse($start)->format('Y.m.d'),
            "end_date" => Carbon::parse($end)->format('Y.m.d'),
        ];
        
        $dashboard_data["bar_chart"] = ['storno' => [], 'normal' => []];
        foreach ($stats as $sor) {
            $dashboard_data["bar_chart"]['storno'][] = $sor->storno_darab;
            $dashboard_data["bar_chart"]['normal'][] = $sor->osszes_darab - $sor->storno_darab;
        }
        
        if (empty($dashboard_data["bar_chart"]["storno"])) {
            $dashboard_data["bar_chart"]["storno"] = [0];
            $dashboard_data["bar_chart"]["normal"] = [0];
        }
        
        $dashboard_data["amount_chart"] = Invoice::select([
            DB::raw("DATE_FORMAT(date, '%Y-%m') as honap"),
            DB::raw("CAST(SUM(CASE WHEN type = 'storno' THEN amount ELSE 0 END) AS DECIMAL(10,2)) as storno_amount"),
            DB::raw("CAST(SUM(CASE WHEN type = 'invoice' THEN amount ELSE 0 END) AS DECIMAL(10,2)) as normal_amount")
        ])
            ->whereBetween('date', [$start, $end])
            ->groupBy(DB::raw("DATE_FORMAT(date, '%Y-%m')"))
            ->orderBy('honap')
            ->get()->toArray();
            
        $dashboard_data["amount_chart_data"] = ['storno' => [], 'normal' => []];
        foreach ($dashboard_data["amount_chart"] as $sor) {
            $dashboard_data["amount_chart_data"]['storno'][] = $sor['storno_amount'];
            $dashboard_data["amount_chart_data"]['normal'][] = $sor['normal_amount'];
        }
        
        $dashboard_data["donut_chart"] = [
            'invoices' => Invoice::whereBetween('date', [$start, $end])->where('type', 'invoice')->count(),
            'storno' => Invoice::whereBetween('date', [$start, $end])->where('type', 'storno')->count(),
        ];
       
        return view('pages.dashboard', compact('dashboard_data', 'year'));
    }
}