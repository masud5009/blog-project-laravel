<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $category = Category::take(5)->get();
        view()->share('category', $category);
        $setting = Setting::find(1);
        view()->share('setting',$setting);
        // $user = Auth::user();
        // view()->share('user', $user);
        Paginator::useBootstrap();
    }
}
