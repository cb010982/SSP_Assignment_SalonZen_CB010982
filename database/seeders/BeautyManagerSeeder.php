<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeautyManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'BeautyManager',
            'email' => 'beautymanager@gmail.com',
            'password' => Hash::make('Senu@123$'),
            'role' => 'beauty_manager',
        ]);
    }
}
