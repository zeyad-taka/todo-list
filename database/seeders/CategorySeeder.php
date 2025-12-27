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
        // مسح البيانات القديمة أولاً عشان ميتكررش Error
        // Category::truncate(); 

        Category::create([
            'name' => 'Electronics',
            'description' => 'Latest smartphones, laptops, and gadgets'
        ]);

        Category::create([
            'name' => 'Fashion',
            'description' => 'Trendy clothes, shoes, and accessories'
        ]);

        Category::create([
            'name' => 'Home & Kitchen',
            'description' => 'Modern furniture and kitchen appliances'
        ]);

        Category::create([
            'name' => 'Books',
            'description' => 'A wide variety of fiction and non-fiction books'
        ]);
    }
}