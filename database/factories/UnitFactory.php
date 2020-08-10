<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'symbol' => $faker->unique()->lexify('???'),
    ];
});

$factory->afterMaking(Unit::class, function ($unit, $faker) {
    $unit->unitOf()->associate(App\UnitOf::all()->random());
    $unit->system()->associate(App\System::all()->random());
});
