<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert(
            [
                [
                    'name' => 'Facials',
                    'description' => 'Elevate your beauty with our expert skin care services, designed to enhance your natural charm and leave you feeling fabulous.',
                    'icon' => 'flaticon-facial-treatment',
                ],
                [
                    'name' => 'Makeup Pro',
                    'description' => 'Discover the secret to radiant beauty with our salon\'s harmonious blend of makeup artistry and impeccable dressing services, tailored just for you.',
                    'icon' => 'flaticon-cosmetics',
                ],
                [
                    'name' => 'Hair Style',
                    'description' => 'Unlock the power of perfect hair with our salon\'s cutting and styling expertise, where creativity and precision combine to craft your signature look.',
                    'icon' => 'flaticon-curl',
                ],
                [
                    'name' => 'Bridal Dressing & Make-Up',
                    'description' => 'Discover the perfect bridal look with us. Our expert team specializes in creating dream wedding styles that capture your unique beauty and make your special day truly unforgettable.',
                    'icon' => 'images/bride.png',
                ],
                [
                    'name' => 'Waxing',
                    'description' => 'Experience silky-smooth perfection with our waxing services. Our skilled professionals provide gentle and effective hair removal, leaving you feeling confident and refreshed.',
                    'icon' => 'images/waxing.png',
                ],
                [
                    'name' => 'Hair Coloring',
                    'description' => 'Elevate your style with our exquisite hair coloring expertise. From vibrant shades to subtle highlights, our talented colorists will transform your look with precision and creativity.',
                    'icon' => 'images/hair-dye.png',
                ],
                [
                    'name' => 'Massage',
                    'description' => 'Indulge in pure relaxation with our rejuvenating massages. Our experienced therapists tailor each session to melt away stress and leave you refreshed and revitalized.',
                    'icon' => 'images/body-massage.png',
                ],
                [
                    'name' => 'Nail treatment',
                    'description' => 'Elevate your nail game with our exquisite nail treatments. Our skilled technicians pamper your hands and feet, leaving you with stunning, perfectly manicured nails that exude elegance and style.',
                    'icon' => 'images/nail-polish.png',
                ],
                [
                    'name' => 'Eyebrow Treatment',
                    'description' => 'Enhance your natural beauty with our eyebrow treatments. Our expert aestheticians sculpt and define your brows to perfection, framing your eyes and accentuating your facial features for a flawless, captivating look.',
                    'icon' => 'images/eyebrow.png',
                ],
            ]
        );
    }
}
