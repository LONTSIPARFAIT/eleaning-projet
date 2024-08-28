<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        function hashPassword($password){
            return Hash::make($password);
        }
        $password = '12345678';
        $passwordHash = hashPassword($password);
        User::create([ 
            'name' => 'perfect',
            'email' => 'lontsiparfait12@gmail.com',
            'email_verified_at' => now(),
            'password' => $passwordHash, // password
            'remember_token' => Str::random(10),
            ]);
        $this->call([
            CourSeeder::class,
            LessonSeeder::class
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
