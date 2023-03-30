<?php

use App\Http\Controllers\{
    AdminController,
    PostController,
    SettingController,
    TagController,
    CategoryController,
    CommentController,
    FrontendController,
    HomeController,
    ReplyController,
    UserController,
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;



//FRONTEND PAGE ROUTE
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/post/{slug}', [FrontendController::class, 'post'])->name('view.post');
Route::get('/category/{slug}', [FrontendController::class, 'category'])->name('view.category');
//comment & reply route here
Route::post('/comments', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');
Route::post('/reply', [ReplyController::class, 'store'])->name('reply.store')->middleware('auth');

//USER AUTHENTICATION ROUTE
Auth::routes();

Route::get('/profile', [HomeController::class, 'index'])->name('home')->middleware('verified');

//ADMIN PAGE ROUTE
Route::prefix('admin/')->middleware('isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'redirect_admin']);
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('users', [UserController::class, 'users'])->name('users');
    Route::get('profile/{user}', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('profile/update/{user}',[AdminController::class,'update'])->name('admin.update');
    Route::get('setting',[SettingController::class,'index'])->name('setting.index');
    Route::post('setting',[SettingController::class,'update'])->name('setting.update');
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
});


//EMAIL VERIFICATION
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
