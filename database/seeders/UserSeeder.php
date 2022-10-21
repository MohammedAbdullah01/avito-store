<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName' => 'mohamed',
            'lastName' => 'ahmed',
            'slug' => 'mohamed-user',
            'email' => 'm@m.com',
            'password' => Hash::make('password'),
            'phone' => '01154544438',
            'city' => 'cairo',
        ]);

        User::create([
            'firstName' => 'ahmed',
            'lastName' => 'mohamed',
            'slug' => 'ahmed-user',
            'email' => 'a@a.com',
            'password' => Hash::make('password'),
            'phone' => '01154544438',
            'city' => 'cairo',
        ]);


    }
}
