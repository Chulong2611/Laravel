<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            Category::insert([
                [
                    'name' => 'Danh mục ' . $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
