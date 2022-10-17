<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Product1',
            'description' => 'The Product1',
            'price' => '500',
            'slug' => 'product',
            'sale_price' => '200',
            'category_id' => 1,
            'supplier_id' => 1,
            'admin_id' => null,
            'main_picture' => '1664356910_6334122ee2ef6_galaxy _ M62.png',
            'quantity' => '15',
            'sku' => null,
            'color' => 'black,read',
            'size' => 's,m,x,xl',
            'activate' => 1
        ]);

        Product::create([
            'title' => 'Product2',
            'description' => 'The Product2',
            'price' => '400',
            'slug' => 'products',
            'sale_price' => '300',
            'category_id' => 1,
            'supplier_id' => 2,
            'admin_id' => null,
            'main_picture' => '1664439489_633554c1b43a4_handmade-Bag-500x500.jpg',
            'quantity' => '10',
            'sku' => null,
            'color' => 'blue,white',
            'size' => 'm,x,xl',
            'activate' => 1
        ]);
    }
}
