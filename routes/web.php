<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContentController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/packages', [HomeController::class, 'packages']);
Route::get('/tags', [HomeController::class, 'tags']);

Route::resource('content', ContentController::class);

