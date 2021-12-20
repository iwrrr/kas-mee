<?php

use App\Http\Controllers\API\CashController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::put('user/{id}', [UserController::class, 'updateProfile']);
    Route::post('user/password', [UserController::class, 'updatePassword']);
    Route::post('user/photo', [UserController::class, 'uploadPhoto']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('cash', [CashController::class, 'all']);
    Route::get('cash', [CashController::class, 'home']);
    Route::get('cash/latest', [CashController::class, 'latest']);
    Route::get('cash/{id}', [CashController::class, 'show']);
    Route::post('cash', [CashController::class, 'store']);
    Route::post('cash/{id}', [CashController::class, 'update']);
    Route::delete('cash/{id}', [CashController::class, 'destroy']);

    Route::get('transaction', [TransactionController::class, 'all']);
    Route::get('transaction/latest', [TransactionController::class, 'latest']);
    Route::get('transaction/{id}', [TransactionController::class, 'transactionsByCash']);
    Route::get('transaction/today/{day}', [TransactionController::class, 'todayTransaction']);
    Route::post('transaction', [TransactionController::class, 'store']);
    Route::post('transaction/{id}', [TransactionController::class, 'update']);
    Route::delete('transaction/{id}', [TransactionController::class, 'destroy']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
