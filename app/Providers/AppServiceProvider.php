<?php

namespace App\Providers;

use App\About;
use App\Category;
use Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Posts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $about = About::where('id', '=', 1)->first();
        $cate=Category::all();
        $posts=Posts::orderBy('id','desc')->get()->take(2);
        Schema::defaultStringLength(191);
        View::share(['about' => $about,'cate'=>$cate,'posts'=>$posts]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once __DIR__ . '/../Helpers/simple_html_dom.php';
    }
}
