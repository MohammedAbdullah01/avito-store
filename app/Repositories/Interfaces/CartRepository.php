<?php

namespace App\Repositories\Interfaces;

interface CartRepository
{
    public function all();

    public function add($item, $quantity = 1, $supplier, $size, $color);

    public function total();

    public function destory();

    public function cartProductDestory($id);
}
