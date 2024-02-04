<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExpertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experts')->insert([
            [
                'name' => 'Mellisa Smith',
                'position' => 'Makeup Stylist',
                'description' => "I'm dedicated to elevating your natural beauty and confidence. With 12 years of experience, I specialize in bridal, special occasion, and photoshoot makeup.",
                'image' => 'images/person_1.jpg',
            ],
            [
                'name' => 'Marie Bush',
                'position' => 'Massage Therapist',
                'description' => 'Welcome to Salon Zen . Having 20 years of experience, I offer a range of therapeutic massage techniques tailored to your unique needs.',
                'image' => 'images/person_2.jpg',
            ],
            [
                'name' => 'Ana Holland',
                'position' => 'Nail Specialist',
                'description' => 'With a keen eye for detail and a passion for nail artistry, I create stunning, long-lasting manicures and pedicures tailored to your style.',
                'image' => 'images/person_3.jpg',
            ],
            [
                'name' => 'Iris Anderson',
                'position' => 'Hairdresser',
                'description' => 'Welcome to Salon Zen, where your dream hairstyle becomes a reality. I specialize in crafting personalized hair transformations to create your signature look.',
                'image' => 'images/work-5.jpg',
            ],
            [
                'name' => 'Michael Harris',
                'position' => 'Esthetician',
                'description' => "I'm passionate about skincare and believe that healthy skin is the foundation of beauty. My facials and treatments will leave your skin glowing and refreshed.",
                'image' => 'images/extra5.jpg',
            ],
            [
                'name' => 'Liam Robinson',
                'position' => 'Eye-Brow Specialist',
                'description' => 'Your eyebrows frame your face, and I\'m here to make them look their best. From shaping to tinting, I\'ll enhance your natural beauty.',
                'image' => 'images/extra6.jpg',
            ],
            [
                'name' => 'Ava White',
                'position' => 'Bridal Stylist',
                'description' => 'Your dream wedding look begins here. Let\'s create a bridal ensemble that\'s as special and unique as your love story.',
                'image' => 'images/work-16.jpg',
            ],
            [
                'name' => 'Olivia Davis',
                'position' => 'Waxing Specialist',
                'description' => 'Say goodbye to unwanted hair! I provide professional waxing services that 
                leave your skin smooth and hair-free. You ll love the results.',
                'image' => 'images/work-15.jpg',
            ],
        ]);
    }
}


