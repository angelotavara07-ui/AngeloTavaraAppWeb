<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Career;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
     
        $this->call(CareerSeeder::class);

       
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'career_id' => Career::first()->id,
            'terms_accepted' => true,
        ]);
    }
}