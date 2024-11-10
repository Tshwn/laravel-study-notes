<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('hello',[HelloController::class, 'index']);
Route::get('hello',[HelloController::class,'index']);
Route::post('hello',[HelloController::class,'post']);

Route::get('hello/add',[HelloController::class,'add']);
Route::post('hello/add',[HelloController::class,'create']);

Route::get('hello/edit',[HelloController::class,'edit']);
Route::post('hello/edit',[HelloController::class,'update']);

Route::get('hello/del',[HelloController::class,'del']);
Route::post('hello/del',[HelloController::class,'remove']);

Route::get('hello/show',[HelloController::class,'show']);

Route::get('person',[PersonController::class,'index']);

Route::get('person/find',[PersonController::class,'find']);
Route::post('person/find',[PersonController::class,'search']);