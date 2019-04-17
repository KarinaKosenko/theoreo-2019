<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once app_path('Custom/helpers.php');

        View::composer(
            'widgets.categories_list', function ($view) {
            $categories = Category::whereHas('actions', function($query){
                $query->indate();
            })->get();
            $view->with([
                'categories' => $categories
            ]);
        }

        );
        View::share(['sort' =>'age']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
