<?php

use App\Http\Controllers\ProfileController;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/dashboard', function () {

    $stats = Invoice::select(
        DB::raw("DATE_FORMAT(date, '%Y-%m') as honap"),
        DB::raw("COUNT(*) as osszes_darab"),
        DB::raw("CAST(SUM(CASE WHEN type = 'storno' THEN 1 ELSE 0 END) AS UNSIGNED) as storno_darab")
    )
    ->groupBy('honap')
    ->orderBy('honap', 'desc')
    ->get();
    $darabok = [];
    foreach ($stats as $sor) {
        $szamla[] = $sor->osszes_darab;
        $storno[]=$sor->storno_darab;
    }
    // dd($szamla,$storno);

    $transactions_data = [
        "invoice" => $szamla,
        "stornos" => $storno,
        "lorem" => $szamla,
        "start_date" => Carbon::parse(Invoice::first()->created_at)->format('Y.m.d'),
        "end_date" => Carbon::parse(Invoice::find(Invoice::max('id'))->created_at)->format('Y.m.d'),
    ];
    return view('pages.dashboard', compact('transactions_data'));
})
    ->middleware(['auth'])
    ->name('pages.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
require __DIR__ . '/invoice.php';
require __DIR__ . '/partner.php';
