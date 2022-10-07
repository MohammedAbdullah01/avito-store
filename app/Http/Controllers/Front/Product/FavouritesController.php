<?php

namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\WishlistRepository;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    private $productsWishlist;

    public function __construct(WishlistRepository $wishlist)
    {
        $this->productsWishlist = $wishlist;
    }


    public function productsFavouritesStore(Request $request)
    {
        return $this->productsWishlist->store($request);
    }
}
