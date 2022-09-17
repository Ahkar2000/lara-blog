<?php

namespace Database\Seeders;

use App\Models\Nation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ahkar Min Htut',
            'email' => 'ahkar@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('ahkar1234'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'The Editor',
            'email' => 'editor@gmail.com',
            'role' => 'editor',
            'password' => Hash::make('ahkar1234'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'The Author',
            'email' => 'author@gmail.com',
            'role' => 'author',
            'password' => Hash::make('ahkar1234'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'The Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('ahkar1234'),
        ]);
    }
}
