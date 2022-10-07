<?php

namespace App\Repositories;

use App\Models\FavouriteProduct;
use App\Models\Rating as ModelsRating;
use App\Models\User;
use App\Repositories\Interfaces\RatingRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class Rating implements RatingRepository
{
    public function storeRatingOrUpdate($request)
    {
        $request->validate([
            'product_id'    => 'required|numeric|exists:products,id',
            'rating_number' => 'required|numeric',
        ]);

        $rating = ModelsRating::updateOrcreate([

            'product_id'    => $request->post('product_id'),
            'user_id'       => Auth::guard('web')->id(),
        ], [

            'rating_number' => $request->post('rating_number'),
        ]);
        Toastr::success('Successfully Added Rating');
        return redirect()->back();
    }
}
