<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'Pemrograman Web',
            'code' => 'PWEB101',
            'lecturer' => 'Febri Damatraseta', // UBAH KE 'lecturer'
            'schedule' => 'Selasa, 08:00 - 10:00',
            'room' => 'Lab Komputer 1',
        ]);

        Course::create([
            'name' => 'Pemrograman Perangkat Bergerak',
            'code' => 'PPB202',
            'lecturer' => 'Febri Damatraseta', // UBAH KE 'lecturer'
            'schedule' => 'Rabu, 10:00 - 12:00',
            'room' => 'Lab Komputer 2',
        ]);

        Course::create([
            'name' => 'Basis Data Lanjut',
            'code' => 'BDL303',
            'lecturer' => 'Dr. Budi Santoso', // UBAH KE 'lecturer'
            'schedule' => 'Kamis, 13:00 - 15:00',
            'room' => 'Ruang Teori 3',
        ]);
    }
}