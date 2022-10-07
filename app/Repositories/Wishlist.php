<?php

namespace App\Repositories;

use App\Models\FavouriteProduct;
use App\Models\User;
use App\Repositories\Interfaces\WishlistRepository;
use Illuminate\Support\Facades\Auth;

class Wishlist implements WishlistRepository
{
    public function store($request)
    {
        $request->validate([
            'product_id'    => 'required|numeric|exists:products,id',
        ]);

        $user = User::findOrfail(Auth::guard('web')->id());

        $user->favourites()->toggle($request->post('product_id'));

        return redirect()->back();
    }
}
