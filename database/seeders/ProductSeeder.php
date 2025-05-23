<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        for ($i=1; $i <=500; $i++) { 
            Product::insert([
            [
                'name' => 'Sản phẩm ' .$i,
                'price' => rand(10000, 1000000),
                'quantity' => rand(1, 5000),
                'category_id' => rand(1,30),
                'description' => Str::random(100),
                'image' => 'uploads/products/'.rand(1,14).'.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        }
    }
}

