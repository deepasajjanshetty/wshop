<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $products = [
            // Men's Clothing
            [
                'category_id' => $categories->where('slug', 'men')->first()->id,
                'name' => 'Classic Cotton T-Shirt',
                'slug' => 'classic-cotton-tshirt-men',
                'description' => 'Premium cotton clothing with a comfortable fit. Perfect for everyday wear.',
                'price' => 24.99,
                'sale_price' => null,
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'colors' => ['Black', 'White', 'Navy', 'Gray'],
                'images' => ['https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 100,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $categories->where('slug', 'men')->first()->id,
                'name' => 'Graphic Print T-Shirt',
                'slug' => 'graphic-print-tshirt-men',
                'description' => 'Stylish graphic clothing with unique designs. Made from soft, breathable fabric.',
                'price' => 29.99,
                'sale_price' => 24.99,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Black', 'White', 'Red'],
                'images' => ['https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 75,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => $categories->where('slug', 'men')->first()->id,
                'name' => 'Premium V-Neck T-Shirt',
                'slug' => 'premium-vneck-tshirt-men',
                'description' => 'Elegant v-neck clothing made from premium cotton. Perfect for casual and semi-formal occasions.',
                'price' => 34.99,
                'sale_price' => null,
                'sizes' => ['M', 'L', 'XL', 'XXL'],
                'colors' => ['Black', 'White', 'Navy'],
                'images' => ['https://images.unsplash.com/photo-1581655353564-df123a1eb820?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1581655353564-df123a1eb820?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 50,
                'is_active' => true,
                'is_featured' => true,
            ],

            // Women's Clothing
            [
                'category_id' => $categories->where('slug', 'women')->first()->id,
                'name' => 'Fashion Crop T-Shirt',
                'slug' => 'fashion-crop-tshirt-women',
                'description' => 'Trendy crop clothing with a modern fit. Perfect for fashion-forward individuals.',
                'price' => 27.99,
                'sale_price' => 22.99,
                'sizes' => ['XS', 'S', 'M', 'L'],
                'colors' => ['Pink', 'White', 'Black', 'Purple'],
                'images' => ['https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 80,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $categories->where('slug', 'women')->first()->id,
                'name' => 'Elegant Blouse T-Shirt',
                'slug' => 'elegant-blouse-tshirt-women',
                'description' => 'Sophisticated blouse-style clothing with a flattering cut. Ideal for office and casual wear.',
                'price' => 32.99,
                'sale_price' => null,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['White', 'Black', 'Blue', 'Rose'],
                'images' => ['https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 60,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => $categories->where('slug', 'women')->first()->id,
                'name' => 'Comfort Fit T-Shirt',
                'slug' => 'comfort-fit-tshirt-women',
                'description' => 'Ultra-comfortable clothing with a relaxed fit. Made from soft, stretchy fabric.',
                'price' => 25.99,
                'sale_price' => 19.99,
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'colors' => ['Gray', 'Black', 'White', 'Navy'],
                'images' => ['https://images.unsplash.com/photo-1445205170230-053b83016050?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 90,
                'is_active' => true,
                'is_featured' => false,
            ],

            // Children's Clothing
            [
                'category_id' => $categories->where('slug', 'children')->first()->id,
                'name' => 'Fun Animal Print T-Shirt',
                'slug' => 'fun-animal-print-tshirt-children',
                'description' => 'Adorable clothing with cute animal prints. Perfect for kids who love animals!',
                'price' => 18.99,
                'sale_price' => 15.99,
                'sizes' => ['2T', '3T', '4T', '5T', '6T'],
                'colors' => ['Blue', 'Pink', 'Yellow', 'Green'],
                'images' => ['https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 120,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $categories->where('slug', 'children')->first()->id,
                'name' => 'Superhero T-Shirt',
                'slug' => 'superhero-tshirt-children',
                'description' => 'Cool superhero-themed clothing. Let your child be their favorite hero!',
                'price' => 21.99,
                'sale_price' => null,
                'sizes' => ['4T', '5T', '6T', '7T', '8T'],
                'colors' => ['Red', 'Blue', 'Black'],
                'images' => ['https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 85,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => $categories->where('slug', 'children')->first()->id,
                'name' => 'Comfortable Cotton T-Shirt',
                'slug' => 'comfortable-cotton-tshirt-children',
                'description' => 'Soft cotton clothing perfect for everyday wear. Gentle on sensitive skin.',
                'price' => 16.99,
                'sale_price' => 13.99,
                'sizes' => ['2T', '3T', '4T', '5T', '6T', '7T', '8T'],
                'colors' => ['White', 'Light Blue', 'Pink', 'Yellow'],
                'images' => ['https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400&h=400&fit=crop&crop=center'],
                'main_image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400&h=400&fit=crop&crop=center',
                'stock_quantity' => 150,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
