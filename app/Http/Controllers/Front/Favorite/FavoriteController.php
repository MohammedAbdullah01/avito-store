<?php

namespace App\Http\Controllers\Front\Favorite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favorite\FavoriteProductRequest;
use App\Repositories\Interfaces\WishlistRepository;

class FavoriteController extends Controller
{
    public function __construct(WishlistRepository $wishlist)
    {
        $this->productsWishlist = $wishlist;
    }

    public function Store(FavoriteProductRequest $request)
    {
        $this->productsWishlist->store($request);
        return redirect()->back();
    }
}
