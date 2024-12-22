<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('linhtutkyaw'), // password
            'remember_token' => Str::random(10),
            'phone' => '09966177240',
            'department_id' => 1

        ]);

        \App\Models\User::create([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('linhtutkyaw'), // password
            'remember_token' => Str::random(10),
            'phone' => '09966177241',
            'department_id' => 1
        ]);

        \App\Models\Department::create([
            'name' => 'Department 1',
            'created_at' => NOW(),
            'updated_at' => NOW(),

        ]);

        \App\Models\Department::create([
            'name' => 'Department 2',
            'updated_at' => NOW(),
            'created_at' => NOW(),

        ]);

        \App\Models\User::factory(30)->create();
    }
}
