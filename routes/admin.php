<?php
use App\Http\Controllers\{
    AdminController,
    PostController,
    SettingController,
    TagController,
    CategoryController,
};
use Illuminate\Support\Facades\Route;


Route::prefix('admin/')->middleware('isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'redirect_admin']);
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::get('profile/{user}', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('profile/update/{user}', [AdminController::class, 'update'])->name('admin.update');;
    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
});
