<?php


use App\Post;
use App\Category;
use Illuminate\Database\Seeder;
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

        $categoryList = [
            'cronaca',
            'viaggi',
            'sport',
            'cucina',
            'moda',
            'beauty'
        ];

        $listOfCategoryID = []; //salvo tutti gli id che di volta in volta salva

        foreach($categoryList as $category) { //partendo da una lista, salvi le categorie, poi pushati, inseriti randomicamente e salvati
            $categoryObject = new Category();
            $categoryObject->name = $category;
            $categoryObject->save();
            $listOfCategoryID[] = $categoryObject->id; //push
        }


        for ($i = 0; $i < 50; $i++) { 
            $postObject = new Post();
            $postObject->title = $faker->words(10,true);
            $postObject->cover = $faker->imageUrl(200,200,'post', true);
            $postObject->author = $faker->words(5, true);
            $postObject->content = $faker->paragraphs(7, true);
            $postObject->date = $faker->dateTime();

            $randCategoryKey = array_rand($listOfCategoryID, 1); //prendi in modo randomico gli id salvati
            $categoryID = $listOfCategoryID[$randCategoryKey];
            $postObject->category_id = $categoryID;

            $postObject->save();
        }
    }
}
