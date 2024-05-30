<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store']);
Route::delete('/delete/{id}', [PostController::class, 'destroy']);