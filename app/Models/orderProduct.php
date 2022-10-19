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

    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'supplier_id',
        'product_name',
        'price',
        'quantity',
        'total',
        'size',
        'color',
        'image',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
