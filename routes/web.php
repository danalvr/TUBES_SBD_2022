<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LoginController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/', [DashboardController::class, 'index'])->name('login')->middleware('central_admin');
Route::get('/book-stock', function () {
    return view('dashboard.supplier.index');
})->middleware('supplier_admin');
Route::get('/transaction', function () {
    return view('dashboard.cashier.index');
})->middleware('cashier_admin');

Route::resource('/book-stock', SupplierController::class)->middleware('supplier_admin');
Route::get('/book-stock/history', [SupplierController::class, 'history'])->middleware('supplier_admin');
Route::resource('/transaction', TransactionController::class)->middleware('cashier_admin');
