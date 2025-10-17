<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/genre', [GenreController::class, 'index']);
Route::post('/genre', [GenreController::class, 'store']);


Route::get('/author', [AuthorController::class, 'index']);
Route::post('/author', [AuthorController::class, 'store']);

Route::get('/book', [BookController::class, 'index']);
Route::post('/book', [BookController::class, 'store']);