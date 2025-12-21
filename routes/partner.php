<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Models\SalespersonPartner;
use App\Http\Controllers\ImportController;

Route::middleware("role:admin,sales")->group(function () {

    Route::get('/partners', [PartnerController::class, 'allPartnerView'])
        ->name('pages.all-partners');

    Route::get('/partner/{id}', [PartnerController::class, 'showPartner'])
        ->name('pages.single-partner');

    Route::get('/import-partners', [ImportController::class, 'showPartnerImportForm'])
        ->name('pages.import.partners');

    Route::post('/import-partners', [ImportController::class, 'import'])
        ->name('post.import.partners');

    Route::delete('/partner/{id}', [PartnerController::class, 'deletePartner'])
        ->where('id', '[0-9]+')
        ->name('partner.delete');

    Route::get('/partner/{id}/edit', [PartnerController::class, 'editPartnerView'])
        ->where('id', '[0-9]+')
        ->name('partner.edit');

        Route::patch('/partner/{id}/edit', [PartnerController::class, 'editPartner'])
            ->where('id', '[0-9]+')
            ->name('partner.update');
});

Route::get("/partner-connect", function () {
    $data = SalespersonPartner::with('partner')->get();
    dd($data);
});
