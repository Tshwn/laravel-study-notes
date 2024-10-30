<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('hello',[HelloController::class, 'index']);
Route::get('hello',[HelloController::class,'index']);
Route::post('hello',[HelloController::class,'post']);