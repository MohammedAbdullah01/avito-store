<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteProduct extends Model
{

   protected $table = 'favourite_products';
   protected $fillable = ['user_id', 'product_id'];
   use HasFactory;

   public function user()
   {
      return $this->belongsToMany(User::class , 'favourite_products', 'user_id', 'product_id' , 'id' , 'id');
   }

   public function product()
   {
      return $this->belongsToMany(Product::class ,'favourite_products', 'user_id', 'product_id' , 'id' , 'id');
   }
}
