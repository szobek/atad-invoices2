<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalespersonController;

Route::get('/salespersons', [SalespersonController::class, 'index'])
    ->middleware(['auth'])
    ->name('pages.all-salesperson');
