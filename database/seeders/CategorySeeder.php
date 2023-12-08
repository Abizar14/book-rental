<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Category::truncate();
    
        Schema::enableForeignKeyConstraints();

        $data = [
            'horror', 'western', 'comic', 'comedy', 'action', 'fantasy', 'romance', 'mystery'
        ];

        foreach($data as $val) {
            Category::create([
                'name' => $val
            ]);
        }
    }
}
