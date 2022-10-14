<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{

    // protected $table = 'favorite_products';
    protected $fillable = ['user_id', 'product_id'];
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class, 'favorite_products', 'user_id', 'product_id', 'id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'favorite_products', 'user_id', 'product_id', 'id', 'id');
    }
}
