<?php

use App\Http\Controllers\AdvertController;
use App\Http\Middleware\CORS;
use Illuminate\Support\Facades\Route;

Route::middleware([CORS::class])->group(function () {
    Route::post('/advert', [AdvertController::class, 'create']);
    Route::get('/advert', [AdvertController::class, 'index']);
    Route::get('/seed', [AdvertController::class, 'seedDb']);
});
