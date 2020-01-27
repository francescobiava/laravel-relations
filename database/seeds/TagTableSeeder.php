<?php

use App\Tag;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) {
            $newTagData = [
                'title' => $faker->word,
                'slug' => $faker->word
            ];

            $tag = new Tag;
            $tag->fill($newTagData);
            $tag->save();

            $posts = Post::inRandomOrder()->take(rand(0,5))->get();
            $tag->posts()->attach($posts);
        }
    }
}
