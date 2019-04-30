<?php

namespace App\Providers;

use App\Models\{
    Brand, Category, Tag
};
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

        View::composer(
            ['admin.parts.action_form'], function ($view) {
            $categories = Category::all();
            $tags=Tag::all();
            $brands=Brand::all();
            $tag_names=[];
            foreach ($tags as $tag){
                $tag_names[]=$tag->name;
            }
            $view->with([
                'categories' => $categories,
                'brands' => $brands,
                'tag_names' => $tag_names,
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
