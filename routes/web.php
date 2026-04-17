<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\KeywordsController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login',[AdminController::class,"login"])->name('admin.login');
Route::post('admin/auth',[AdminController::class,"auth"])->name('admin.auth');

Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('home',[AdminController::class,"index"])->name('home');
    Route::get('logout',[AdminController::class,"logout"])->name('logout');
    Route::resource("category",CategoryController::class);
    Route::resource("keywords",KeywordsController::class);
    Route::resource("article",ArticleController::class);
});