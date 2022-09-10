<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ahkar Min Htut',
            'email' => 'ahkar@gmail.com',
            'password' => Hash::make('ahkar1234')
        ]);

        $categories = ["IT News","Sport","Food & Drinks","Travel"];
        foreach($categories as $category){
            Category::factory()->create([
                "title" => $category,
                "slug" => Str::slug($category),
                "user_id" => User::inRandomOrder()->first()->id,
            ]);
        }
        Post::factory(200)->create();
    }
}
