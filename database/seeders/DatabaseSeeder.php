<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(12)->create();
        Category::factory(10)->create();
        $posts = Post::factory()->count(20)->create();

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'markonuoha97@gmail.com',
            'password' => Hash::make('password'),
            "isAdmin" => true,
            'role' => 'admin'
        ]);
        Follow::create([
            "follower_id" => 5,
            "followed_id" => 1

        ]);
        Follow::create([
            "follower_id" => 4,
            "followed_id" => 1

        ]);
        Follow::create([
            "follower_id" => 2,
            "followed_id" => 1
        ]);

        Follow::create([
            "follower_id" => 3,
            "followed_id" => 1
        ]);
        Follow::create([
            "follower_id" => 6,
            "followed_id" => 1
        ]);
    }
}
