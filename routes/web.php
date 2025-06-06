<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('{code}', [App\Http\Controllers\ShortLinkController::class, 'shortenLink'])
    ->where('code', '[a-zA-Z0-9]{6}');
