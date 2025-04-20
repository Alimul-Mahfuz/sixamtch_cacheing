<?php

namespace Database\Seeders;

use App\Models\Category; // Assuming you have a Category model
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 categories
        $categories = [
            'Electronics',
            'Clothing',
            'Books',
            'Furniture',
            'Toys',
            'Sports',
            'Home Appliances',
            'Groceries',
            'Health & Beauty',
            'Automotive',
            'Jewelry',
            'Office Supplies',
            'Music & Movies',
            'Garden & Outdoor',
            'Pet Supplies',
            'Baby Products',
            'Tools & Hardware',
            'Art & Craft',
            'Food & Beverage',
            'Photography'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
