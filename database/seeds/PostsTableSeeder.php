<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker; //richiami il faker dentro seeder 

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) //crea i contenuti usando il faker inserendolo come argomento obbligatoriamente
    {
       for ($i = 0; $i < 50; $i++){
           $postObject = new Post();
           $postObject->title = $faker->sentence(5);
           $postObject->cover = $faker->imageUrl(300, 300, 'post', true);
           $postObject->author = $faker->words(3, true);
           $postObject->text = $faker->text(100);
           $postObject->date = $faker->dateTime();
           $postObject->save();
       }
    }
}
