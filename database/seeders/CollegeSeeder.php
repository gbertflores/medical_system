<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        College::create([
            'name' => 'College of Arts, Humanities and Social Sciences',
            'abbreviation' => 'CAHSS'
        ]);
        College::create([
            'name' => 'College of Engineering and Technology',
            'abbreviation' => 'CET'
        ]);
        College::create([
            'name' => 'College of Information and Computing Sciences',
            'abbreviation' => 'CICS'
        ]);
        College::create([
            'name' => 'College of Maritime Education',
            'abbreviation' => 'CME'
        ]);
        College::create([
            'name' => 'College of Physical Education and Sports',
            'abbreviation' => 'CPES'
        ]);
        College::create([
            'name' => 'College of Teacher Education',
            'abbreviation' => 'CTE'
        ]);
        College::create([
            'name' => 'External Program Delivering Unit',
            'abbreviation' => 'EPDU'
        ]);
        College::create([
            'name' => 'Institute of Technical Education',
            'abbreviation' => 'ITE'
        ]);
        College::create([
            'name' => 'School of Business Administration',
            'abbreviation' => 'SBA'
        ]);
        College::create([
            'name' => 'Senior High School',
            'abbreviation' => 'SHS'
        ]);
    }
}
