<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/insert-material', [MaterialController::class, 'store']);
Route::put('/update-material/{id}', [MaterialController::class, 'update']);