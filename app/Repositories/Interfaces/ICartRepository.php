<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ICartRepository

{
    public function getCart();

    public function addCart(Product $product ,int $quantity = 1, $size , $color);

    public function setCart(Product $product, $id,  $quantity);

    public function deleteProductInCart($id);

    public function emptyCart();

    public function totalCart() : float;
}
