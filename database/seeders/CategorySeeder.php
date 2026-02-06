<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics', 'description' => 'Latest electronics and gadgets'],
            ['name' => 'Fashion', 'slug' => 'fashion', 'description' => 'Trendy clothing and accessories'],
            ['name' => 'Home & Kitchen', 'slug' => 'home-kitchen', 'description' => 'Home appliances and kitchen tools'],
            ['name' => 'Sports & Outdoors', 'slug' => 'sports-outdoors', 'description' => 'Sports equipment and outdoor gear'],
            ['name' => 'Beauty & Health', 'slug' => 'beauty-health', 'description' => 'Beauty products and health supplements'],
        ];

        foreach ($categories as $category) {
            Category::create($category + ['is_active' => true]);
        }
    }
}
