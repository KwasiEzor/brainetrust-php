<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        //


        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);

        view()->composer('inc.sidebar', function ($view) {
            $view->with([
                'categories' => Category::all(),
                'tags' => Tag::latest()->limit(25)->get(),
                'posts' => Post::latest('id')->limit(9)->get()
            ]);
        });
    }
}
