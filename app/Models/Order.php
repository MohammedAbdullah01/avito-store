<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'total', 'size', 'city', 'status', 'payment_status', 'color', 'number', 'tax',

        'first_name',  'email', 'address', 'post_alcode', 'phone', 'country', 'discount',
    ];

    protected static function booted()
    {
        static::creating(function (Order $order) {
            $now = Carbon::now();
            $max = Order::whereYear('created_at', $now->year)->max('number');
            if (!$max) {
                $max = $now->year . rand(1, 5000000000000);
            }
            $order->number = $max + 1;
        });
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'order_product',
            'order_id',
            'product_id',
            'id',
            'id'
        )->withPivot([
            'price', 'quantity', 'product_name', 'size', 'color',
        ])->using(order_product::class)
            ->as('item');
    }


    public function items()
    {
        return $this->hasMany(order_product::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getOrderStatusAttribute()
    {
        if ($this->status == 'paid') {

            return 'badge bg-success bi bi-check-circle me-1';

        } elseif ($this->status == 'pending') {

            return 'badge bg-warning text-dark bi bi-exclamation-triangle me-1';

        } elseif ($this->status == 'canceled') {

            return 'badge bg-danger bi bi-exclamation-octagon me-1';
        }
        elseif ($this->status == 'shipped') {

            return 'badge bg-primary bi bi-star me-1';
        }
    }


    public function getOrderPyamentStatusAttribute()
    {
        if ($this->payment_status == 'paid') {

            return 'badge bg-success bi bi-check-circle me-1';

        } elseif ($this->payment_status == 'pending') {

            return 'badge bg-warning text-dark bi bi-exclamation-triangle me-1';

        } elseif ($this->payment_status == 'faild') {

            return 'badge bg-danger bi bi-exclamation-octagon me-1';
        }
    }
}
