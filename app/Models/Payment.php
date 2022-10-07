<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'method','amount','data_payment' , 'order_id'
    ];

    protected $casts = [
        'data_payment' => 'json'
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
