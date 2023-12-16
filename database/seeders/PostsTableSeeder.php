<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::find(4);

        $admin->posts()->saveMany([
            new Post([
                'title' => 'post 1',
                'slug' => 'news-post-1',
                'content' => 'this is post 1',
            ]),
            new Post([
                'title' => 'post 2',
                'slug' => 'news-post-2',
                'content' => 'this is post 2',
            ]),
            new Post([
                'title' => 'post 3',
                'slug' => 'news-post-3',
                'content' => 'this is post 3',
            ]),
        ]);
    }
}
