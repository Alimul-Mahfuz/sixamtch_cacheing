<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $total = 100000;
        $chunkSize = 1000;

        for ($i = 0; $i < $total; $i += $chunkSize) {
            Product::factory()->count($chunkSize)->create();
        }
    }
}
