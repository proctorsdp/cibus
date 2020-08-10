<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IngredientRecipe;
use Faker\Generator as Faker;

$factory->define(IngredientRecipe::class, function (Faker $faker) {
    return [
        'quantity' => $faker->randomDigitNotNull,
    ];
});

$factory->afterMaking(IngredientRecipe::class, function ($ingredientRecipe, $faker) {
    $ingredientRecipe->ingredient()->associate(App\Ingredient::all()->random());
    $ingredientRecipe->recipe()->associate(App\Recipe::all()->random());
    $ingredientRecipe->unit()->associate(App\Unit::all()->random());
});