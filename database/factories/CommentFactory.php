<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\Comment::class, function (Faker $faker) {
    $posts = App\Post::pluck('id')->toArray();
    return [
        'post_id' => $faker->randomElement($posts),
        'comment_content' => $faker->paragraph(),
        'comment_name' => $faker->word(),
        'comment_mail' => $faker->word(),
        'comment_date' => now(),
    ];
}); 
