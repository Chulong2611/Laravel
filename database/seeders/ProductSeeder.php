<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Sản phẩm 1',
                'price' => 100000,
                'quantity' => 10,
                'category_id' => 1,
                'image' => 'uploads/products/nuoc-ep-cam-2.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sản phẩm 2',
                'price' => 150000,
                'quantity' => 5,
                'category_id' => 1,
                'image' => 'uploads/products/nuoc-ep-cam-tao.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sản phẩm 3',
                'price' => 150000,
                'quantity' => 5,
                'category_id' => 2,
                'image' => 'uploads/products/nuoc-ep-cam-tao.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

