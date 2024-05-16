<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;

$panel = env('APP_PANEL');

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'packages', 'controller' => PackageController::class], function () {
    Route::get('/', 'paginate');
    Route::get('/{id}', 'detail');
});

Route::group(['prefix' => 'category', 'controller' => CategoryController::class], function () {
    Route::get('/{id}', 'paginate');
});

Route::group(['prefix' => 'guide', 'controller' => ContentController::class], function () {
    Route::get('/{id}', 'show');
});

Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'loginView'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('register', [RegisterController::class, 'registerView'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group([
    'prefix' => $panel,
    'middleware' => 'auth'
], function () use ($panel) {

    Route::get('/index', [\App\Http\Controllers\Hub\IndexController::class, 'index'])->name($panel . '.index');
    Route::get('/package/category', [\App\Http\Controllers\Hub\PackageController::class, 'getCategory'])->name($panel . '.package.category');
    Route::resource('package', \App\Http\Controllers\Hub\PackageController::class, ['as' => $panel]);
    Route::resource('category', \App\Http\Controllers\Hub\CategoryController::class, ['as' => $panel]);
    Route::resource('tag', \App\Http\Controllers\Hub\TagController::class, ['as' => $panel]);
    Route::resource('content', \App\Http\Controllers\Hub\ContentController::class, ['as' => $panel]);

});


