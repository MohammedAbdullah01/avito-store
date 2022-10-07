<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class order_product extends pivot
{
    use HasFactory;

    public $incrementig = true;
    public $timestamps = false;
    protected $table = 'order_product';
    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }


    public function supplier()
    {
        return  $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
