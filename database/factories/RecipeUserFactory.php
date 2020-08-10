<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RecipeUser;
use Faker\Generator as Faker;

$factory->define(RecipeUser::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->afterMaking(RecipeUser::class, function ($recipeUser, $faker) {
    $recipeUser->recipe()->associate(App\Recipe::all()->random());
    $recipeUser->user()->associate(App\User::all()->random());
});