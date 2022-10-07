<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";

    protected $fillable = ['name', 'slug', 'description', 'avatar'];

    /**
     * @param int $id
     * @param string $required
     */
    public static function rules(int $id = null, string $required = "required" )
    {
        return [
            'name'        => "required|alpha|between:5,35|unique:categories,name,$id",
            'description' => 'required|between:10,100',
            'avatar'      => "$required|image|mimes:jpg,jpeg,png|max:5048|dimensions:min_width=300,min_height=300,max_width=2000,max_height=2000"
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Image_Suppliers
    public function getAvatarCategoryAttribute()
    {
        if ($this->avatar == 'default.png') {
            return asset('admin/assets/img/default.png');
        }
        return asset('storage/categories/' . $this->avatar);
    }
}
