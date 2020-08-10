<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'score' => $faker->numberBetween(0,10),
    ];
});

$factory->afterMaking(Rating::class, function ($rating, $faker) {
    $rating->recipe()->associate(App\Recipe::all()->random());
    $rating->user()->associate(App\User::all()->random());
});
