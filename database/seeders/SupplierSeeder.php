<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'firstName' => 'mohamed',
            'lastName' => 'supplier',
            'slug' => 'mohamed-supplier',
            'email' => 'm@m.com',
            'password' => Hash::make('password'),
        ]);

        Supplier::create([
            'firstName' => 'ahmed',
            'lastName' => 'supplier',
            'slug' => 'ahmed-supplier',
            'email' => 'a@a.com',
            'password' => Hash::make('password'),
        ]);
    }
}
