<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User; // Add this use statement for the User model

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
   {

    User::create([
        'name'=>'ali',
        'email'=>'ali.said@gmail.com',
        'password'=>Hash::make('alisaid'),
        'departement'=>'IT',
        'service'=>'IT',
        'type'=>'Admin',
    ],);
   }

}
