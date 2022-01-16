<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

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
        view()->composer(
            'layouts.main',
            function ($view) {
                $view->with('messages', Message::all()->sortByDesc('id')->values());
            });
    }
}
