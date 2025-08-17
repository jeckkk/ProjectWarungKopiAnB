<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Minuman', 'slug' => 'minuman', 'description' => 'Aneka minuman', 'is_active' => true, 'sort_order' => 1],
            ['name' => 'Makanan', 'slug' => 'makanan', 'description' => 'Aneka makanan', 'is_active' => true, 'sort_order' => 2],
            ['name' => 'Cemilan', 'slug' => 'cemilan', 'description' => 'Aneka cemilan', 'is_active' => true, 'sort_order' => 3],
        ]);
    }
}
