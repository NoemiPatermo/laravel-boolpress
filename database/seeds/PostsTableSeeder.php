<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) { 
            $postObject = new Post();
            $postObject->title = $faker->words(5);
            $postObject->cover = $faker->imageUrl(150, 150, 'post', true);
            $postObject->author = $faker->words(3, true);
            $postObject->text = $faker->paragraphs(5, true);
            $postObject->genre = $faker->words(1, true);
            $postObject->date = $faker->dateTime();
            $postObject->save();

        }
    }
}
