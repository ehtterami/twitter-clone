<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(6)
            ->has(
                Post::factory()
                    ->count(6)
                    ->has(
                        Comment::factory()
                            ->count(6)
                            ->state(function (array $attributes, Post $post) {
                                return ['user_id' => $post->user_id];
                            })
                    )
            )
            ->create();
    }
}
