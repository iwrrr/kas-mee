<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::fallback(function () {
    return redirect()->back();
});

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('kas', [CashController::class, 'index'])->name('kas');
    Route::get('transaksi', [TransactionController::class, 'index'])->name('transaksi');
});
