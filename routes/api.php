<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;

require __DIR__ . '/auth.php';
// use App\Http\Controllers\Api\V1\ProductController;
Route::prefix('v1')->group(function () {
    require __DIR__ . '/v1.php';
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('books', BookController::class);
});



