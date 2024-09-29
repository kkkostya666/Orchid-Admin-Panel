<?php

use App\Http\Controllers\IndexPhotoController;
use App\Models\IndexPhoto;
use App\Models\IntroText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/intro-text', function () {
    return IntroText::first();
});

Route::get('/index-photo', [IndexPhotoController::class, 'show']);

