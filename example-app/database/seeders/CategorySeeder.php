<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Flagship'],
            ['name' => 'Tầm trung'],
            ['name' => 'Giá rẻ'],
            ['name' => 'Gaming Phone'],
            ['name' => 'Camera Phone']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
