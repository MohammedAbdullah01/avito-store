<?php

namespace App\Repositories\Cart;

use App\Repositories\Interfaces\ICartRepository;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;

class CartRepository implements ICartRepository
{
    public function getCart(): Collection
    {
        return  Cart::with('product')->where('cookie_id', $this->getCookieId())->get();
    }

    public function addCart(Product $product, int $quantity = 1, $size, $color)
    {
        $item = $this->getProductInCart($product->id);

        if (!$item) {
            return Cart::create([
                'cookie_id' => $this->getCookieId(),
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'size' => $size,
                'color' => $color,
                'product_quantity' => $quantity,
            ]);
        }
        return $item->increment('product_quantity', $quantity);
    }

    public function setCart(Product $product, $id,  $quantity)
    {
        Cart::where('product_id', $product->id)
            ->where('cookie_id', $this->getCookieId())
            ->findOrFail($id)
            ->update([
                'product_quantity' => $quantity,
            ]);
    }

    public function deleteProductInCart($id)
    {
        Cart::where('id', $id)
            ->where('cookie_id', $this->getCookieId())
            ->delete();
    }

    public function emptyCart()
    {
        return Cart::where('cookie_id', $this->getCookieId())
            ->forceDelete();
    }

    public function totalCart(): float
    {
        return $this->getCart()->sum(function ($item) {
            return   $subtotal =  $item->product_quantity * $item->product->PurchasePrice;
        });
    }

    public function totalOneProduct($supplierId)
    {
        return $this->getCart()->where('product.supplier_id' , $supplierId)->sum(function ($item){
            return   $subtotal =  $item->product_quantity * $item->product->PurchasePrice;
        });
    }

    protected function getCookieId()
    {
        $cart_cookie_id  = Cookie::get('cart_cookie_id');

        if (!$cart_cookie_id) {
            $cart_cookie_id = Str::uuid();
            Cookie::queue('cart_cookie_id', $cart_cookie_id, 30 * 24 * 60);
        }
        return  $cart_cookie_id;
    }

    protected function getProductInCart($productId)
    {
        return Cart::where('product_id', $productId)
            ->where('cookie_id', $this->getCookieId())->first();
    }
}
