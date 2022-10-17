<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'slug',
        'email',
        'password',
        'email_verified',
        'gander',
        'phone',
        'avatar',
        'location',
        'about',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorite()
    {
        return $this->belongsToMany(
            Product::class,
            'favorite_products',
            'user_id',
            'product_id',
            'id',
            'id'
        )->withPivot([
            'created_at',
            'id'
        ])->as('favorite');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function cartProducts()
    {
        return $this->belongsToMany(Product::class, 'carts')->withPivot('id', 'cookie_id', 'quantity')->as('cart');
    }

        public function purchasedProducts()
        {
            return $this->hasMany(order_product::class);
        }

        public function ratings()
        {
            return $this->hasMany(Rating::class);
        }

    // Imag_User
    public function getImagUserAttribute()
    {
        if ($this->avatar == 'default_user.png') {
            return asset('admin/assets/img/default_user.png');
        }
        return asset('storage/users/' . $this->avatar);
    }

    public function getUserNameAttribute()
    {
        $userName = Str::title($this->firstName . ' ' .$this->lastName);
        return $userName;
    }


    public static function rules($id)
    {
        return [
            'name'     => "required|min:3|max:20|string",
            'email'    => "required|email|string|unique:suppliers,email,$id",
            'phone'    => "nullable|string",
            'gander'   => "nullable|in:male,female",
            'avatar'   => "nullable|mimes:jpg,jpeg,png|max:5048|dimensions:min_width=300 , min_height=300 , max_width=2000 , max_height=2000",
            'about'    => "required|between:10,255",
            'location' => "nullable|url|string",
        ];
    }

}
