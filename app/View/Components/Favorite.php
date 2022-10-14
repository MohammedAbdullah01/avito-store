<?php

namespace App\View\Components;

use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Favorite extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

public $button;

    public function __construct(public $productId)
    {
        $this->productId = $productId;
        $wishlist = FavoriteProduct::get();
        foreach($wishlist as $item){

            if( $item->product_id == $productId && $item->user_id == Auth::guard('web')->id()){
                $this->button = "bi bi-heart-fill text-danger";
            }
        }


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.favorite');
    }
}
