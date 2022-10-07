<?php

namespace App\Repositories\Interfaces;

interface RatingRepository
{
    public function storeRatingOrUpdate($request);
}
