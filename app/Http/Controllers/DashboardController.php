<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    function index()
    {
         $stats = Invoice::select([

        DB::raw("DATE_FORMAT(date, '%Y-%m') as honap"),
        DB::raw("COUNT(*) as osszes_darab"),
        DB::raw("CAST(SUM(CASE WHEN type = 'storno' THEN 1 ELSE 0 END) AS UNSIGNED) as storno_darab")
    ])
    ->groupBy('honap')
    ->orderBy('honap', 'desc')
    ->get();
    $darabok = [];
    foreach ($stats as $sor) {
        $szamla[] = $sor->osszes_darab;
        $storno[]=$sor->storno_darab;
    }
    $transactions_data = [
        "invoice" => $szamla,
        "stornos" => $storno,
        "start_date" => Carbon::parse(Invoice::first()->created_at)->format('Y.m.d'),
        "end_date" => Carbon::parse(Invoice::find(Invoice::max('id'))->created_at)->format('Y.m.d'),
    ];
    return view('pages.dashboard', compact('transactions_data'));
    }
}
