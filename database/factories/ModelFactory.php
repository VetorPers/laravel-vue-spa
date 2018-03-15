<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'avatar' => $faker->imageUrl(200, 200),
        'api_token' => str_random(60),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'user_id' => 1,
        'body' => $faker->paragraph,
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'user_id' => 1,
        'body' => $faker->paragraph(50),
    ];
});

$factory->define(App\Topic::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'bio'=>$faker->paragraph,
        'questions_count'=>1
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        'question_id' => 1,
        'user_id' => 1,
        'body' => $faker->text(),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'answer_id' => 1,
        'user_id' => 1,
        'body' => $faker->text(),
    ];
});
