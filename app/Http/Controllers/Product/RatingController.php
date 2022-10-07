<?php

namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RatingRepository;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    private $productsRating;

    public function __construct(RatingRepository $rating)
    {
        $this->productsRating = $rating;
    }

    public function store(Request $request)
    {
        return $this->productsRating->storeRatingOrUpdate($request);
    }
}
