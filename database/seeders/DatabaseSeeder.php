<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
            'level' => 'admin'
        ]);

        Testimonial::factory()->create([
            'name' => 'Bagas',
            'school_now' => 'SMP 3',
            'testimoni' => 'test',
            'type' => 'alumni',
            'user_id' => 1
        ]);

        Testimonial::factory()->create([
            'name' => 'Rahman',
            'school_now' => 'SMP 1',
            'testimoni' => 'test',
            'type' => 'alumni',
            'user_id' => 1
        ]);
    }
}
