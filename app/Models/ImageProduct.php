<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;

    // public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['product_id', 'sub_images'];
    protected $table = 'images_products';

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }

    // Image_Suppliers
    public function getSubPictureProductAttribute()
    {
        if ($this->sub_images == 'default.png') {
            return asset('admin/assets/img/default.png');
        }
        return asset('storage/products/sub_images/' . $this->sub_images);
    }

    public function getPermaLinkAttribute()
    {

        return route('supplier.subphoto.delete', $this->id);
    }
}
