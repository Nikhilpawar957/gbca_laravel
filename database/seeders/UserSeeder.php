<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('admin@123#'),
            'phone' => '1234567890',
            'dob' => date('Y-m-d',strtotime('-'.rand(18,30).' years -'.rand(1,12).' months -'.rand(1,28).' days' )),
            'year_of_joining' => date('Y'),
            'role' => 1,
            'blocked' => 0,
            'remember_token' => Str::random(10),
        ]);
    }
}
