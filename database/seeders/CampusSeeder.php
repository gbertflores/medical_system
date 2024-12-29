<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campus::create([
            'name' => 'Main Campus',
            'location' => 'Baliwasan Chico'
        ]);
        Campus::create([
            'name' => 'Siay Campus',
            'location' => 'Siay'
        ]);
        Campus::create([
            'name' => 'Kabasalan Campus',
            'location' => 'Kabasalan'
        ]);
        Campus::create([
            'name' => 'Malangas Campus',
            'location' => 'Malangas'
        ]);
        Campus::create([
            'name' => 'Vitali Campus',
            'location' => 'Vitali'
        ]);
    }
}
