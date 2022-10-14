<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class orderProduct extends pivot
{
    use HasFactory;

    public $incrementing = true;

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }

    // public function supplier()
    // {
    //     return  $this->belongsTo(Supplier::class);
    // }

    // public function user()
    // {
    //     return  $this->belongsTo(User::class);
    // }
}
