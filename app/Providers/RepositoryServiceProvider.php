<?php

namespace App\Providers;

use App\Repositories\AuthUserRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;



use App\Repositories\Auth;
use App\Repositories\AuthSupplierRepository;
use App\Repositories\Cart as RepositoriesCart;
use App\Repositories\Comment;
use App\Repositories\Dashboard;
use App\Repositories\Interfaces\AuthRepository;
use App\Repositories\Interfaces\CartRepository;
use App\Repositories\Interfaces\DashboardRepository;
use App\Repositories\Interfaces\ProfileRepository;
use App\Repositories\Interfaces\RatingRepository;
use App\Repositories\Interfaces\TagsRepository;
use App\Repositories\Interfaces\WishlistRepository;
use App\Repositories\Products;
use App\Repositories\Profile;
use App\Repositories\Rating;
use App\Repositories\Tags;
use App\Repositories\Wishlist;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartRepository::class, function ($app) {
            return new RepositoriesCart;
        });
        $this->app->bind(AuthUserRepository::class, AuthUserRepository::class);

        $this->app->bind(AuthSupplierRepository::class, AuthSupplierRepository::class);

        $this->app->bind(ProductRepository::class, ProductRepository::class);

        $this->app->bind(CategoryRepository::class, CategoryRepository::class);

        $this->app->bind(CommentRepository::class, CommentRepository::class);




        $this->app->bind(TagsRepository::class, Tags::class);

        // $this->app->bind(WishlistRepository::class  , Wishlist::class);

        // $this->app->bind(RatingRepository::class    , Rating::class);

        // $this->app->bind(CommentRepository::class   , Comment::class);

        // $this->app->bind(AuthRepository::class      , Auth::class);

        // $this->app->bind(ProfileRepository::class   , Profile::class);

        $this->app->bind(DashboardRepository::class, Dashboard::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
