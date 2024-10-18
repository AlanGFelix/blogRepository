<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V2\PostController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('v2/posts', PostController::class)->only(['index', 'show'])->middleware('auth:sanctum');

Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'login']);