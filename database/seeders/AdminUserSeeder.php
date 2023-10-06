<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin02',
            'email' => 'admin02@gmail.com',
            'password' => Hash::make('Senu@123$'),
            'role' => 'admin',
        ]);
    }
}
