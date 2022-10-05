<?php


use Illuminate\Support\Str;

class PostsTableSeeder extends \Illuminate\Database\Seeder
{
    public function run() {
        for ($i = 0 ; $i <= 100 ; $i++) {
            \App\Models\Post::create(
                [
                    'user_id'   => 2,
                    'title'         => Str::random(50),
                    'description'   => Str::random(2000)
                ]
            );
        }
    }
}
