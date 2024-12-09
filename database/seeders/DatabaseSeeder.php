<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Enums\UserRole;
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
        User::factory(20)->create();
        User::create([
            'name' => 'perfect',
            'email' => 'lontsiparfait12@gmail.com',
            'email_verified_at' => now(),
            'password' => $passwordHash, // password
            'remember_token' => Str::random(10),
            'role' => UserRole::ADMIN->value,
            'date_de_naissance' => '2006-03-12',
            'sexe' => 'homme',
            'lieu_de_naissance' => 'Paris',
            ]);
        User::create([
            'name' => 'perfect',
            'email' => 'parfait@gmail.com',
            'email_verified_at' => now(),
            'password' => $passwordHash, // password
            'remember_token' => Str::random(10),
            'role' => UserRole::TEACHER->value,
            'date_de_naissance' => '2002-03-14',
            'sexe' => 'homme',
            'lieu_de_naissance' => 'Douala',
            ]);
        $this->call([
            CourSeeder::class,
            LessonSeeder::class,
            ExerciseSeeder::class,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
