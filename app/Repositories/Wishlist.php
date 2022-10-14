<?php

namespace App\Repositories;

use App\Repositories\Interfaces\WishlistRepository;

class Wishlist implements WishlistRepository
{
    public function __construct(private UserProfile $user)
    {
        $this->user = $user;
    }

    public function store($request)
    {
        $user = $this->user->getUser();

        $user->favorite()->toggle($request->post('product_id'));
        return $user;
    }
}
