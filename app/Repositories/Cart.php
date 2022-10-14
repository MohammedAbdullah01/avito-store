<?php

namespace App\Repositories;

use App\Models\Cart as CartModels;
use App\Repositories\Interfaces\CartRepository as InterfaceCartRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Cart implements InterfaceCartRepository
{
    public function all()
    {
        $carts = CartModels::where('cookie_id', $this->getCookieId())->orwhere('user_id', Auth::id())->get();
        return $carts;
    }


    public function add($item, $quantity = 1, $supplier, $size, $color)
    {
        $carts =  CartModels::updateOrCreate([
            'cookie_id'   => $this->getCookieId(),
            'product_id'  => $item
        ], [
            'user_id'     => Auth::id(),
            'quantity'    => DB::raw('quantity +' . $quantity),
            'supplier_id' => $supplier,
            'size'        => $size,
            'color'       => $color,
        ]);
        return $carts;
    }


    public function total()
    {
        // return
        // (float ) CartModels::where('cookie_id' , '=' , $this->getCookieId())
        //     ->join('products' , 'products.id' , '=' , 'carts.product_id')
        //     ->selectRaw('SUM(products.purchaseprice * carts.quantity) as total')
        //     ->value('total');
        return $this->all()->sum(function ($item) {
            return   $subtotal =  $item->quantity * $item->product->PurchasePrice;
        });
    }


    protected function getCookieId()
    {
        $cart_cookie_id  = Cookie::get('cart_cookie_id');

        if (!$cart_cookie_id) {
            $cart_cookie_id = Str::uuid();
            Cookie::queue('cart_cookie_id', $cart_cookie_id,  30 * 24 * 60);
        }
        return  $cart_cookie_id;
    }


    public function destory()
    {
        $carts = CartModels::where('cookie_id', $this->getCookieId())->orwhere('user_id', Auth::guard('web')->id())->forceDelete();
    }


    public function cartProductDestory($id)
    {
        $carts = CartModels::where('cookie_id', $this->getCookieId())->where('id', $id)->where('user_id', Auth::guard('web')->id())->forceDelete();
    }
}
