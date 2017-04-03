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
    ];
});

$factory->define(App\Models\movie::class, function (Faker\Generator $faker) {

	$category = App\Models\category::all()->pluck('id');

    return [
        'title' => $faker->name,
        'categorie_id' => $category->random()
    ];
});

$factory->define(App\Models\rating::class, function (Faker\Generator $faker) {

	$movie = App\Models\movie::all()->pluck('id');
	$client = App\User::all()->pluck('id');

    return [
        'rating' => $faker->randomElement([0,1,2,3,4,5,6,7,8,9,10]),
        'movie_id' => $movie->random(),
        'user_id' => $client->random()
    ];
});
