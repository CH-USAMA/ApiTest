<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('books', BookController::class);
});

// Route::get('/books', [BookController::class, 'index']);
// Route::get('/books/{book}', [BookController::class, 'show']);
// Route::post('/books', [BookController::class, 'store']);
// Route::put('/books/{book}', [BookController::class, 'update']);
// Route::delete('/books/{book}', [BookController::class, 'destroy']);

// php artisan vendor:publish --tag=scribe-config
// php artisan scribe:generate
