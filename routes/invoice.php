<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;


Route::middleware("role:admin,sales")->group(function () {
    Route::get('/invoices', [InvoiceController::class, 'index'])
        ->name('pages.invoices');

    Route::get('/invoices-to-partner', [InvoiceController::class, 'connectPartnerToTransactionView'])
        ->name('pages.invoices-to-partner');

    Route::post('/invoice-to-partner', [InvoiceController::class, 'connectPartnerToTransaction'])
        ->name('invoice-to-partner-save');
    
    Route::post('/invoice-disconnect-partner', [InvoiceController::class, 'disconnectPartnerFromTransaction'])
        ->name('invoice-disconnect-partner');


    Route::get('/invoices-create', [InvoiceController::class, 'invoiceCreateView'])
        ->name('pages.invoices-create');

    Route::post('/invoices-create', [InvoiceController::class, 'createInvoice'])
        ->name('invoices-create');

    Route::get('/invoice/{szamlaszam}', [InvoiceController::class, 'getInvoiceByNumber'])
        ->where('szamlaszam', '.*')
        ->name('pages.single-invoice');

    Route::get('/invoices', [InvoiceController::class, 'allInvoices'])
        ->name('pages.all-invoices');
});
