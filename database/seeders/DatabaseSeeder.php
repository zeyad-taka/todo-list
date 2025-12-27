<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إضافة بيانات تجريبية مع مراعاة وجود عمود description
        Category::create([
            'name' => 'Electronics',
            'description' => 'All kinds of electronic devices and gadgets'
        ]);

        Category::create([
            'name' => 'Fashion',
            'description' => 'Latest trends in clothes and accessories'
        ]);

        Category::create([
            'name' => 'Home & Kitchen',
            'description' => 'Furniture and kitchen appliances'
        ]);
    }
}