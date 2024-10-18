<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;

Route::apiResource('v1/posts', PostController::class)->only(['index', 'show', 'destroy'])->middleware('auth:sanctum');