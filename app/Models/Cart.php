<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class Cart extends Pivot
{
    use HasFactory;
    // protected $keyType = 'string';
    public $table = 'carts';
    public $incrementing = false;
    protected $fillable = [
        'cookie_id',
        'user_id',
        'product_id',
        // 'supplier_id',
        'product_quantity',
        'size',
        'color',
    ];

    /**
     *  Events (ObServers ) => creating , created , updating , updated , deleting , deleted , restoring , restored , retrieved
     *   saving => Updating & Creating , saved => Updated & Created
     * */

    protected static function booted()
    {
        static::creating(function (Cart $cart) {
            $cart->id = Str::uuid();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
