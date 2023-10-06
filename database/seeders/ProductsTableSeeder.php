<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'DreamSkin Night Cream',
                'price' => 5000,
                'description' => 'Our night creams provide skin repair and renewal where your skin undergoes a natural repair and regeneration process during night time.',
                'image' => 'images/work-11.jpg',
            ],
            [
                'name' => 'Pure Radiance Vitamin C Boost Serum',
                'price' => 6000,
                'description' => 'One of our best facial serums for oily and acne-prone skins.',
                'image' => 'images/product3.jpg',
            ],
            [
                'name' => 'Ageless Elegance Renewal Cream',
                'price' => 3000,
                'description' => 'Our well known anti-aging cream reduces the appearance of fine lines and wrinkles on your skin.',
                'image' => 'images/product4.jpg',
            ],
            [
                'name' => 'ColorSplash Nail Polish',
                'price' => 600,
                'description' => 'These nail polishes come in an array of colors and finishes, allowing our clients to create stunning nail art and achieve their desired looks.',
                'image' => 'images/product1.jpg',
            ],
            [
                'name' => 'LuxeVelvet Cream',
                'price' => 3000,
                'description' => 'LuxeVelvet deeply hydrates and nourishes your skin, quenching its thirst for moisture and leaving it with a healthy, dewy glow.',
                'image' => 'images/product2.jpg',
            ],
            [
                'name' => 'JewelDew Hair Oil',
                'price' => 8000,
                'description' => 'Shield your hair from the rigors of daily life with our protective formula. It strengthens and fortifies, ensuring your hair maintains its vitality and resilience.',
                'image' => 'images/product7.jpg',
            ],
            [
                'name' => 'Velvet Silk Body Serum',
                'price' => 4500,
                'description' => 'This serum is your key to unlocking a newfound elegance. It leaves your skin looking and feeling so remarkable that you ll be captivated by your own reflection.',
                'image' => 'images/product9.jpg',
            ],
            [
                'name' => 'Bloom Blush Set',
                'price' => 7000,
                'description' => 'Whether you prefer a soft and subtle hint of color or a bold statement, Bloom blush is easily buildable, allowing you to create the look that matches your mood.',
                'image' => 'images/work-12.jpg',
            ],
            [
                'name' => 'AquaMist Face Oil',
                'price' => 5500,
                'description' => 'AquaMist face oil acts as a protective barrier, shielding your skin from the environmental stressors of modern life. It fortifies your skin s resilience and helps maintain its youthful appearance.',
                'image' => 'images/work-14.jpg',
            ],

            
        ]);
    }
}
