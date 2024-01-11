<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicePaginationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InvoiceController::class, 'index'])
    ->name('invoice.index');

Route::prefix('/invoices')->group(function () {
    Route::post('/update_or_create_invoice', [InvoiceController::class, 'updateOrCreate'])
        ->name('invoice.edit');

    Route::delete('/delete/{id}', [InvoiceController::class, 'delete'])
        ->name('invoice.delete');
});

Route::post('/invoicesData', [InvoicePaginationController::class, 'invoicesData'])
    ->name('invoice.invoicesData');
