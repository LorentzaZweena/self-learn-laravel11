<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory()->create();
        Category::create([
            'name' => 'Web design',
            'slug' => 'web-design',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'Web development',
            'slug' => 'web-development',
            'color' => 'green'
        ]);

        Category::create([
            'name' => 'Mobile development',
            'slug' => 'mobile-development',
            'color' => 'blue'
        ]);

        Category::create([
            'name' => 'Data science',
            'slug' => 'data-science',
            'color' => 'yellow'
        ]);
    }
}
