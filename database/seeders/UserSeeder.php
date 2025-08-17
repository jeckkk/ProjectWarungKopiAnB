<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Warung',
            'email' => 'admin@warungkopi.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Kasir Warung',
            'email' => 'kasir@warungkopi.com',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);
        User::create([
            'name' => 'Customer 1',
            'email' => 'customer1@warungkopi.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
    }
}
