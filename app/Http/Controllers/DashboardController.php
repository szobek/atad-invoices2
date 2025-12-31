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
        $start = Carbon::create($year)->startOfYear();
        $end = Carbon::create($year)->endOfYear();
        $dashboard_data = [];
        $stats = Invoice::select([

            DB::raw("DATE_FORMAT(date, '%Y-%m') as honap"),
            DB::raw("COUNT(*) as osszes_darab"),
            DB::raw("CAST(SUM(CASE WHEN type = 'storno' THEN 1 ELSE 0 END) AS UNSIGNED) as storno_darab")
        ])
            ->groupBy('honap')
            ->orderBy('honap')
            ->whereYear('date', $start)
            ->get();
        $szamla = $stats->pluck('osszes_darab')->toArray();
        if (empty($stats->toArray())) {
            $storno = [0];
            $szamla = [0];
        }
        foreach ($stats as $sor) {
            $storno[] = $sor->storno_darab;
        }
        $dashboard_data = [
            "all_invoice" => array_sum($szamla),
            "all_storno" => array_sum($storno),
            "start_date" => Carbon::parse($start)->format('Y.m.d'),
            "end_date" => Carbon::parse($end)->format('Y.m.d'),
        ];
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
            ->groupBy('honap')
            ->whereYear('date', $start)
            ->orderBy('honap')
            ->get()->toArray();
        foreach ($dashboard_data["amount_chart"] as $sor) {
            $dashboard_data["amount_chart_data"]['storno'][] = $sor['storno_amount'];
            $dashboard_data["amount_chart_data"]['normal'][] = $sor['normal_amount'];
        }
        $dashboard_data["donut_chart"] = [
            'invoices' => Invoice::whereYear('date', $start)->where('type', 'invoice')->count(),
            'storno' => Invoice::whereYear('date', $start)->where('type', 'storno')->count(),
        ];


        return view('pages.dashboard', compact('dashboard_data', 'year'));
    }
}
