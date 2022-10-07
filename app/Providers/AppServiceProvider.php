<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart as RepositoriesCart;
use App\Repositories\Interfaces\CartRepository;
use App\Repositories\Interfaces\CrudRepository;
use App\Repositories\Products;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
