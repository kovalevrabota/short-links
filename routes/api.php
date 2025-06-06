<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->middleware(['throttle:api'])->group(function () {
    Route::post('register', [App\Http\Controllers\Api\V1\AuthController::class, 'register']);
    Route::post('create-token', [App\Http\Controllers\Api\V1\AuthController::class, 'createToken']);

    Route::post('short-links', [App\Http\Controllers\Api\V1\ShortLinkController::class, 'store']);

    Route::get('history-short-links/statistics', [App\Http\Controllers\Api\V1\HistoryShortLinkController::class, 'statistics'])->middleware('auth:sanctum');
});
