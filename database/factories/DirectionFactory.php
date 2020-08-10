<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Direction;
use Faker\Generator as Faker;

$factory->define(Direction::class, function (Faker $faker) {
    return [
        'step_number' => $faker->randomDigit,
        'text' => $faker->paragraph(),
    ];
});

$factory->afterMaking(Direction::class, function ($direction, $faker) {
    $direction->recipe()->associate(App\Recipe::all()->random());
});