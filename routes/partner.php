<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Models\SalespersonPartner;
use App\Http\Controllers\ImportController;

Route::middleware("role:admin,sales")->group(function () {

    Route::get('/partners', [PartnerController::class, 'allPartnerView'])
        ->name('pages.all-partners');

    Route::get('/partner/{id}', [PartnerController::class, 'getInvoiceByPartner'])
        ->name('pages.single-partner');

    Route::get('/import-partners', [ImportController::class, 'showPartnerImportForm'])
        ->name('pages.import.partners');

    Route::post('/import-partners', [ImportController::class, 'import'])
        ->name('post.import.partners');
});

Route::get("/partner-connect", function () {
    $data = SalespersonPartner::with('partner')->get();
    dd($data);
});
