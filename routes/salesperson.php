<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalespersonController;

Route::middleware("auth")->group(function () {
    Route::get('/salespersons', [SalespersonController::class, 'index'])
        ->name('pages.all-salesperson');

    Route::get('/salesperson/partner-connect', [SalespersonController::class, 'connectPartnerToSalespersonView'])
        ->middleware(['role:admin,sales'])
        ->name('pages.salesperson.partner-connect');

    Route::post('/salesperson/connect-partner/', [SalespersonController::class, 'connectPartnerToSalesperson'])
        ->middleware(['role:admin,sales'])
        ->name('salesperson.connect-partner');

    Route::get('/salesperson/{id}', [SalespersonController::class, 'show'])
        ->middleware(['role:admin,sales'])
        ->name('pages.salesperson-detail');
});
