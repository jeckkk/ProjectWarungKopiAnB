<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::insert([
            [
                'category_id' => 1,
                'name' => 'Kopi Hitam',
                'slug' => 'kopi-hitam',
                'description' => 'Kopi hitam asli warung kopi',
                'price' => 15000,
                'status' => 'tersedia',
                'stock' => 99,
                'is_popular' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Nasi Goreng',
                'slug' => 'nasi-goreng',
                'description' => 'Nasi goreng spesial',
                'price' => 20000,
                'status' => 'tersedia',
                'stock' => 50,
                'is_popular' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Keripik Singkong',
                'slug' => 'keripik-singkong',
                'description' => 'Keripik singkong renyah',
                'price' => 10000,
                'status' => 'tersedia',
                'stock' => 25,
                'is_popular' => false,
            ]
        ]);
    }
}
