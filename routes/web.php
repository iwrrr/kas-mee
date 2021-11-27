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

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/{id}/show', [UserController::class, 'show'])->name('user.show');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('kas', [CashController::class, 'index'])->name('kas.index');

    Route::get('transaksi', [TransactionController::class, 'index'])->name('transaksi.index');
});
