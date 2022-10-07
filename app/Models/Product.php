<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'slug',
        'sale_price',
        'category_id',
        'supplier_id',
        'admin_id',
        'main_picture',
        'quantity',
        'sku',
        'color',
        'size',
        'activate'
    ];

    /**
     * @param int|Null $id
     * @param string $required
     * @return array
     */
    public static function rules(int $id = Null, string $required = 'required')
    {
        return [
            'title'         => "required|alpha_dash|min:4|max:30|unique:products,title,$id",
            'description'   => "required|string|between:5,100",
            'price'         => "required|numeric",
            'sale_price'    => "nullable|numeric",
            'quantity'      => "required|numeric",
            'size'          => "required|string|max:50",
            'color'         => "required|string|max:50",
            'main_picture'  => "$required|image|mimes:jpg,jpeg,png|max:5048|dimensions:min_width=300 , min_height=300 , max_width=2000 , max_height=2000",
            'sub_images.*'  => "image|mimes:jpg,jpeg,png|max:5048|dimensions:min_width=300 , min_height=300 , max_width=2000 , max_height=2000",
            'sub_images'    => "$required|array|size:3",
            'category'      => "required|exists:categories,id|numeric",
        ];
    }


    public function category()
    {
        return  $this->belongsTo(Category::class)->withDefault([
            'name' => '_____'
        ]);
    }
    public function supplier()
    {
        return  $this->belongsTo(Supplier::class)->withDefault([
            'name' => '_____'
        ]);
    }


    public function admin()
    {
        return  $this->belongsTo(Admin::class)->withDefault([
            'name' => '_____'
        ]);
    }

    public function images()
    {
        return $this->hasMany(ImageProduct::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function cart()
    {
        return $this->hasMany(Product::class);
    }

    public function favourites()
    {
        return $this->belongsToMany(
            User::class,
            'favourite_products',
            'product_id',
            'user_id',
            'id',
            'id'
        );
    }


    public function orders()
    {
        return $this->belongsToMany(
            Order::class,
            'order_product',
            'product_id',
            'order_id',
            'id',
            'id'
        )->withPivot([
            'price', 'quantity', 'product_name'
        ])->using(order_product::class)
            ->as('item');
    }


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tag',
            'product_id',
            'tag_id',
            'id',
            'id'
        );
    }
    //Activate
    public function getActivateProductAttribute()
    {
        if (!$this->activate) {
            return "<span class='bage bg-warning float-right' style='top:2px;'>Is Being Reviewed</span>";
        }
    }


    // Purchase_price
    public function getPurchasePriceAttribute()
    {
        if ($this->sale_price) {
            return $this->sale_price;
        }
        return $this->price;
    }

    // Image_Product
    public function getMainPictureProductAttribute()
    {
        if ($this->main_picture == 'default.png') {
            return asset('admin/assets/img/default.png');
        }
        return asset('storage/products/' . $this->main_picture);
    }

    // Product Color
    public function getTheColorsAttribute()
    {
        $colors = Str::upper($this->color);
        if ($colors) {

            return  explode(',', $colors);
        }
        return [];
    }

    // Product Size
    public function getTheSizesAttribute()
    {
        $sizes = Str::upper($this->size);
        if ($sizes) {

            return  explode(',', $sizes);
        }
        return [];
    }


    // Product Sale && New Product
    public function getSaleProductAttribute()
    {

        if ($this->sale_price) {

            return "<span class='bage float-end'>Sale</span>";
        };
    }
}
