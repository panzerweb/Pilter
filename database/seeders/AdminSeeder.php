<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'pilter_admin@gmail.com',
            'password' => bcrypt('password123'),
            'birth_date' => '2004-10-14',
            'role' => 'admin',
        ]);
    }
}
