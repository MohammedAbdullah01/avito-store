<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Supplier extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email_verified',
        'firstName',
        'lastName',
        'slug',
        'email',
        'password',
        'location',
        'about',
        'gander',
        'phone',
        'avatar'
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(orderProduct::class);
    }

    // Image_Suppliers
    public function getImgSupplierAttribute()
    {
        if ($this->avatar == 'default_user.png') {
            return asset('admin/assets/img/default_user.png');
        }
        return asset('storage/suppliers/' . $this->avatar);
    }

    public function orderSupplierProduct()
    {
        return $this->hasMany(orderProduct::class);
    }

    public function getSupplierNameAttribute()
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
