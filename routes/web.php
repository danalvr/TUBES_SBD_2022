<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
});
Route::get('/book-stock', function () {
    return view('dashboard.supplier.index');
});
Route::get('/transaction', function () {
    return view('dashboard.cashier.index');
});

Route::resource('/book-stock', SupplierController::class);
Route::resource('/transaction', TransactionController::class);
