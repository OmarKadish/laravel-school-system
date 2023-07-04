<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(2)->create();

         User::factory()->create([
             'name' => 'Omar',
             'email' => 'omar@test.com',
             'email_verified_at' => now(),
             'password' => Hash::make('123456789'),
             'remember_token' => Str::random(10),
         ]);
    }
}
