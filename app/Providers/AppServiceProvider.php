<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Products;
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
        view()->composer('*',function ($view){
            $cart = \Cart::content();
            $categories = Categories::orderby("id","ASC")->get();
            $brands = Brands::orderby("brand_name","ASC")->get();
            $product_count = Products::all();
            $areas = Area::orderBy("name_area","ASC")->get();
            $view->with([
                "categories"        =>  $categories,
                "product_count"     =>  $product_count,
                "brands"            =>  $brands,
                "cart"              =>  $cart,
                "areas"             =>  $areas
            ]);
        });
    }
}
