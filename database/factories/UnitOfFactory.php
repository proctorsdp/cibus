<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UnitOf;
use Faker\Generator as Faker;

$factory->define(UnitOf::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->sentence,
    ];
});
