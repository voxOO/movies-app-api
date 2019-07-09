<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Movie;

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


$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'director' => $faker->name,
        'imageUrl' => $faker->imageUrl(),
        'duration' => rand (60, 160),
        'releaseDate' => $faker -> dateTimeThisDecade(),
        'genre' => $faker->word,
    ];
});