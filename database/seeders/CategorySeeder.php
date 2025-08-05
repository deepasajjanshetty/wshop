<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Men',
                'slug' => 'men',
                'description' => 'Stylish clothing for men with various designs and fits.',
                'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=300&fit=crop&crop=center',
                'is_active' => true,
            ],
            [
                'name' => 'Women',
                'slug' => 'women',
                'description' => 'Fashionable clothing for women with trendy designs.',
                'image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?w=400&h=300&fit=crop&crop=center',
                'is_active' => true,
            ],
            [
                'name' => 'Children',
                'slug' => 'children',
                'description' => 'Comfortable and fun clothing for kids of all ages.',
                'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400&h=300&fit=crop&crop=center',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
