<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'country',
        'city',
        'houseNumber',
        'streetName',
    ];

    public function getUserNameAttribute()
    {
        $userName = Str::title($this->firstName . ' ' . $this->lastName);
        return $userName;
    }

    public function getAddressAttribute()
    {
        $address =  $this->houseNumber . '/' .  $this->streetName;
        return $address;
    }
}
