<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/sales', [SalesController::class, 'create_sales'])->name('create_sales');
Route::post('/sales_verification', [SalesController::class, 'sales_verification'])->name('sales_verification');
Route::post('/sale_confirmation', [SalesController::class, 'saleConfirmation'])->name('sale_confirmation');