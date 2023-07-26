<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'all']);
Route::get('/detail/{id}', [ProductController::class, 'detail']);

Route::get('/register', function () {
    return view('auth/register');
})->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/history', [TransactionController::class, 'transactionHistory']);
    Route::post('/buy', [TransactionController::class, 'addTransaction']);
    Route::post('/logout', [UserController::class, 'logout']);
});
