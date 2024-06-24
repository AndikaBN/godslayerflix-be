<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(20)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test Andika User',
            'email' => 'andika@IoT.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        \App\Models\Genre::factory(10)->create();

        \App\Models\AnimeMovie::factory(10)->create();
    }
}
