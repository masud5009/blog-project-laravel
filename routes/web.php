<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin/')->middleware('isAdmin')->group(function(){
    Route::get('/',[AdminController::class,'redirect_admin']);
    Route::get('dashboard',[AdminController::class,'index']);
    Route::resource('category',CategoryController::class);
});


