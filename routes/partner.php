<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;

Route::get('/partners', [PartnerController::class, 'allPartnerView'])->name('pages.all-partners');
Route::get('/partner/{id}', [PartnerController::class, 'getInvoiceByPartner'])->name('pages.single-partner');