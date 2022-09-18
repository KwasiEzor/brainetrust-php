<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Club;
use App\Models\Post;
use App\Models\Category;
use App\Models\Interclub;
use App\Models\PlayerSerie;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
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
        setlocale(LC_TIME, config('app.locale'));
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
        view()->composer('interclubs.index', function ($view) {
            $view->with([
                'clubs' => Club::all(),
                'playerSeries' => PlayerSerie::all(),
                'interclubsData' => Interclub::with('receiver_team', 'visitor_team')
                    ->latest()
                    ->get(),
                'interclubDivisions' => Interclub::select('player_serie_id')->groupBy('player_serie_id')->get()
            ]);
        });
    }
}
