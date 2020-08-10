<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DirectionIngredient;
use Faker\Generator as Faker;

$factory->define(DirectionIngredient::class, function (Faker $faker) {
    return [
        'quantity' => $faker->randomDigitNotNull,
    ];
});

$factory->afterMaking(DirectionIngredient::class, function ($directionIngredient, $faker) {
    $directionIngredient->ingredient()->associate(App\Ingredient::all()->random());
    $directionIngredient->direction()->associate(App\Direction::all()->random());
    $directionIngredient->unit()->associate(App\Unit::all()->random());
});