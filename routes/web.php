<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//FRONTEND PAGE ROUTE
Route::get('/',[FrontendController::class,'index']);

Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin/')->middleware('isAdmin')->group(function(){
    Route::get('/',[AdminController::class,'redirect_admin']);
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.index');
    Route::resource('category',CategoryController::class);
    Route::resource('tag',TagController::class);
    Route::resource('post',PostController::class);
});


