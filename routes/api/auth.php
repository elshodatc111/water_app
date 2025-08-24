<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/phone', [AuthController::class, 'requestUserLogin']);
Route::post('/phone/verify', [AuthController::class, 'verifyUserCode']);
Route::post('/login', [AuthController::class, 'staffLogin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/check-token', [AuthController::class, 'checkToken']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
