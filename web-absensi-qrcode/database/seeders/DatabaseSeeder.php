<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Penting untuk user admin Anda
use Illuminate\Support\Facades\Hash; // Penting untuk hash password user admin

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil user seeder Anda
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Febri Damatraseta',
                'password' => Hash::make('password'),
            ]
        );

        // Panggil CourseSeeder Anda
        $this->call(CourseSeeder::class); // Pastikan baris ini ada
        $this->call(StudentSeeder::class); // Jika Anda punya StudentSeeder, panggil juga
    }
}