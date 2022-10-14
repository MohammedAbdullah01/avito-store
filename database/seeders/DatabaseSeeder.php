<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Order;
use App\Models\order_product;
use App\Models\Product;
use App\Models\User;
use Database\Factories\OrderItemFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Categorie::factory(10)->has(Product::factory(10), 'products')->create();

        // $dates = [
        //     "2021-01-02", "2021-03-02", "2021-09-02", "2021-11-02", "2021-05-02", "2021-10-02",
        //     "2021-07-02", "2021-12-02", "2021-02-02", "2021-04-02", "2021-06-02", "2021-08-02"
        // ];


        // Order::factory(50)->state(function () use ($dates) {
        //     return [
        //         'user_id' => User::inRandomOrder()->first()->id,
        //         'created_at' => $dates[rand(0, count($dates) -4  )]
        //     ];
        // })->create();

        // $this->call(AdminSeeder::class);
        // $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
