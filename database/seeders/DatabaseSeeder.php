<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'administrator',
            'password' => ('secret'),
            'role' => 'administrator',
            'is_active' => 1
        ]);

        User::factory()->create([
            'name' => 'Anna Santos',
            'email' => 'anna@gmail.com',
            'username' => 'annasantos',
            'password' => ('secret'),
            'role' => 'medical_staff',
            'is_active' => 1
        ]);

        User::factory()->create([
            'name' => 'Michael Mundo',
            'email' => 'michael@gmail.com',
            'username' => 'michael',
            'password' => ('secret'),
            'role' => 'drrmo_staff',
            'is_active' => 1
        ]);
        
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
