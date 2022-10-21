<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'payment_method',
        'user_id',
        'total',
        'status',
        'payment_status',
        'shipping',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
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
            'price', 'quantity', 'product_name', 'size', 'color', 'total'
        ])->using(orderProduct::class)
            ->as('orderProduct');
    }

    public function purchasedProducts()
    {
        return $this->hasMany(orderProduct::class);
    }

    // public function invoice()
    // {
    //     return $this->HasOne(Invoice::class);
    // }

    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

    public function billingAddress()
    {
        return $this->hasOne(OrderAddress::class, 'order_id', 'id', 'id')
            ->where('type', '=', 'billing');
    }

    public function shippingAddress()
    {
        return $this->hasOne(OrderAddress::class)
            ->where('type', '=', 'shipping');
    }

    protected static function booted()
    {
        static::creating(function (Order $order) {
            $order->number = Order::getNextOrderNumber();
        });
    }

    protected static function getNextOrderNumber()
    {
        $year   = Carbon::now()->year;
        $number =  Order::whereYear('created_at', $year)->max('number');
        if ($number) {
            return $number + 1;
        }
        return $year . '000001';
    }




    public function orderItems()
    {
        return $this->hasMany(orderProduct::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getOrderStatusAttribute()
    {
        if ($this->status == 'paid') {

            return 'label label-success';
        } elseif ($this->status == 'pending') {

            return 'label label-warning';
        } elseif ($this->status == 'canceled') {

            return 'label label-danger';
        } elseif ($this->status == 'shipped') {

            return 'label label-info';
        } elseif ($this->status == 'processing') {
            return 'label label-primary';
        }
    }


    public function getOrderPaymentStatusAttribute()
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
