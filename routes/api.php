<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Pembagian akses:
| - Guest (belum login): hanya bisa melihat data (index, show)
| - Customer: hanya bisa create, update, dan show
| - Admin: hanya bisa read all dan delete
|
*/

// ==================== AUTH ==================== //
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// ==================== GUEST (TANPA LOGIN) ==================== //
// Hanya bisa melihat data (index dan show)
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('books', BookController::class)->only(['index', 'show']);

// ==================== USER YANG SUDAH LOGIN ==================== //
Route::middleware(['auth:api'])->group(function () {

    // ---------- CUSTOMER (login role: customer) ----------
    // hanya bisa Create, Update, dan Show
    Route::middleware('role:customer')->group(function () {
        Route::apiResource('transactions', TransactionController::class)->only(['store', 'update', 'show']);
        Route::apiResource('books', BookController::class)->only(['store', 'update', 'show']);
        Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'show']);
        Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'show']);
    });

    // ---------- ADMIN ----------
    // hanya bisa Read All dan Destroy
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('transactions', TransactionController::class)->only(['index', 'destroy']);
        Route::apiResource('books', BookController::class)->only(['index', 'destroy']);
        Route::apiResource('authors', AuthorController::class)->only(['index', 'destroy']);
        Route::apiResource('genres', GenreController::class)->only(['index', 'destroy']);
    });
});
