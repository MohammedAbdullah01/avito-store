<?php

namespace App\View\Components;

use App\Models\Rating as ModelsRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Rating extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $productid;
    public $ratingnumber;

    public function __construct($productid)
    {
       
        $this->productid = $productid;
                $ratings = ModelsRating::get();
                foreach($ratings as $rating){
        
                    if( $rating->product_id == $productid && $rating->user_id == Auth::guard('web')->id()){
                        $this->ratingnumber = $rating->rating_number;
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
        return view('components.rating');
    }
}
