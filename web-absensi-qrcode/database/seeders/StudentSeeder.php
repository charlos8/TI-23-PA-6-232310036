<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['name' => 'Adhimas Dwi Putra', 'npm' => '232310001', 'class' => 'TI-23-PA', 'major' => 'Teknologi Informasi', 'semester' => '4 (Empat)'],
            ['name' => 'Muhammad Fadly Syiraz', 'npm' => '232310002', 'class' => 'TI-23-PA', 'major' => 'Teknologi Informasi', 'semester' => '4 (Empat)'],
            ['name' => 'Muhammad Arya NS', 'npm' => '232310003', 'class' => 'TI-23-PA', 'major' => 'Teknologi Informasi', 'semester' => '4 (Empat)'],
            ['name' => 'Muhammad Toriq Robbani', 'npm' => '232310004', 'class' => 'TI-23-PA', 'major' => 'Teknologi Informasi', 'semester' => '4 (Empat)'],
            ['name' => 'Charlos Ferdinand DH', 'npm' => '232310005', 'class' => 'TI-23-PA', 'major' => 'Teknologi Informasi', 'semester' => '4 (Empat)'],
            ['name' => 'Muhammad Junaedi', 'npm' => '232310044', 'class' => 'TI-23-PA', 'major' => 'Teknologi Informasi', 'semester' => '4 (Empat)'],
            ['name' => 'Muhammad Firgiawan', 'npm' => '232310007', 'class' => 'TI-23-PA', 'major' => 'Teknologi Informasi', 'semester' => '4 (Empat)'],
            ['name' => 'Fadhil Luki Pratama', 'npm' => '232310008', 'class' => 'TI-23-PA', 'major' => 'Teknologi Informasi', 'semester' => '4 (Empat)'],
        ];

        foreach ($students as $studentData) {
            Student::create($studentData);
        }
    }
}