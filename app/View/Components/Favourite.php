<?php

namespace App\View\Components;

use App\Models\FavouriteProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Favourite extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

public $productid;
public $buttom;

    public function __construct($productid)
    {
        $this->productid = $productid;
        $wishlist = FavouriteProduct::get();
        foreach($wishlist as $item){

            if( $item->product_id == $productid && $item->user_id == Auth::guard('web')->id()){
                $this->buttom = "bi bi-heart-fill text-danger";
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
        return view('components.favourite');
    }
}
