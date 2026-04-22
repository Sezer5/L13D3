<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\KeywordController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login',[AdminController::class,"login"])->name('admin.login');
Route::post('/admin/auth',[AdminController::class,"auth"])->name('admin.auth');

Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('home',[AdminController::class,"index"])->name('home');
    Route::get('logout',[AdminController::class,"logout"])->name('logout');

    //CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES 
    //CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES CRUD ROUTES 

    Route::resource('category',CategoryController::class);
    Route::resource('keyword',KeywordController::class);
    Route::resource('article',ArticleController::class);
    Route::resource('gallery',GalleryController::class);
});
