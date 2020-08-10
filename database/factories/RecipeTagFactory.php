<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RecipeTag;
use Faker\Generator as Faker;

$factory->define(RecipeTag::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->afterMaking(RecipeTag::class, function ($recipeTag, $faker) {
    $recipeTag->recipe()->associate(App\Recipe::all()->random());
    $recipeTag->tag()->associate(App\Tag::all()->random());
});