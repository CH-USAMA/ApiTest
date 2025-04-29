<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;




Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// use of invoke method controller
Route::get('Hello', TestController::class);
Route::get('test', [TestController::class, 'test']);
