<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->words(3, true),
        'description' => $faker->sentences(3, true),
        'time' => $faker->numberBetween(10, 60),
    ];
});

$factory->afterMaking(Recipe::class, function ($recipe, $faker) {
    $recipe->author()->associate(App\User::all()->random());
    $recipe->time_unit()->associate(App\Unit::all()->random());
});
