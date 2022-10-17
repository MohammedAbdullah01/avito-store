<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
    [
        'order_id',
        'type',
        'firstName',
        'lastName',
        'email',
        'phone',
        'address',
        'city',
        'postAlCode',
        'country',
    ];
}
