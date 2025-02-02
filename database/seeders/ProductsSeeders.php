<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => 10.99,
            'slug' => 'product-1',
            'image' => 'product-1.jpg',
            'id_user' => 1,
            'id_category' => 1,
        ]);
    }
}
