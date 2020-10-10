<?php

use App\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources as Resource;
use App\Recipe;
use App\Ingredient;
use App\Rating;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** User */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/users', function () {
    return new Resource\UserCollection(User::paginate());
});

Route::middleware('auth:api')->get('/users/{user}', function (User $user) {
    return new Resource\User($user);
});

Route::middleware('auth:api')->get('/users/{user}/submissions', function (User $user) {
    return new Resource\RecipeCollection($user->submissions);
});

Route::middleware('auth:api')->get('/users/{user}/recipes', function (User $user) {
    return new Resource\RecipeCollection($user->recipes);
});

Route::middleware('auth:api')->get('/users/{user}/reviews', function (User $user) {
    return new Resource\RatingCollection($user->reviews);
});

/** Recipe */

Route::middleware('auth:api')->get('/recipes', function () {
    return new Resource\RecipeCollection(Recipe::paginate());
});

Route::middleware('auth:api')->get('/recipes/{recipe}', function (Recipe $recipe) {
    return new Resource\Recipe($recipe);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/author', function (Recipe $recipe) {
    return new Resource\User($recipe->author);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/directions', function (Recipe $recipe) {
    return new Resource\DirectionCollection($recipe->directions);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/directions/{direction:id}', function (Recipe $recipe, Direction $direction) {
    return new Resource\Direction($direction);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/directions/{direction:id}/ingredients', function (Recipe $recipe, Direction $direction) {
    return new Resource\IngredientCollection($direction->ingredients);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/directions/{direction:id}/ingredients/{ingredient:id}', function (Recipe $recipe, Direction $direction, Ingredient $ingredient) {
    return new Resource\Ingredient($ingredient);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/directions/{direction:id}/ingredients/{ingredient:id}/category', function (Recipe $recipe, Direction $direction, Ingredient $ingredient) {
    return new Resource\Category($ingredient->category);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/ingredients', function (Recipe $recipe) {
    return new Resource\IngredientCollection($recipe->ingredients);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/ingredients/{ingredient:id}', function (Recipe $recipe, Ingredient $ingredient) {
    return new Resource\Ingredient($ingredient);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/ingredients/{ingredient:id}/category', function (Recipe $recipe, Ingredient $ingredient) {
    return new Resource\Category($ingredient->category);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/ratings', function (Recipe $recipe) {
    return new Resource\RatingCollection($recipe->ratings);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/ratings/{rating:id}', function (Recipe $recipe, Rating $rating) {
    return new Resource\Rating($rating);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/ratings/{rating:id}/user', function (Recipe $recipe, Rating $rating) {
    return new Resource\User($rating->user);
});

Route::middleware('auth:api')->get('/recipes/{recipe}/tags', function (Recipe $recipe) {
    return new Resource\TagCollection($recipe->tags);
});

/** Ingredient */

Route::middleware('auth:api')->get('/ingredients', function () {
    return new Resource\IngredientCollection(Ingredient::paginate());
});

Route::middleware('auth:api')->get('/ingredients/{ingredient}', function (Ingredient $ingredient) {
    return new Resource\Ingredient($ingredient);
});
