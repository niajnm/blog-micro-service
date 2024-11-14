<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/niaj', function () {
    return response()->json(['message' => 'Success blog']);
});

Route::get('/mah', function () {
    return response()->json(['message' => 'Success blog']);
});

Route::middleware(['auth:sanctum'])->group(function () {
});

Route::post('/post', [PostController::class, 'store']);
Route::get('/posts', [PostController::class, 'index']);



