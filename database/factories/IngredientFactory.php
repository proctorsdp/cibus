<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredient;
use Faker\Generator as Faker;

$factory->define(Ingredient::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->sentence()
    ];
});

$factory->afterMaking(Ingredient::class, function ($ingredient, $faker) {
    $ingredient->category()->associate(App\Category::all()->random());
});