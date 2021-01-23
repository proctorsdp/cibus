<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/recipes', [RecipeController::class, 'index'])->middleware('auth');

Route::get('/tags', function () {
    return view('tags/index');
});

Route::get('/ingredients', function () {
    return view('ingredients/index');
});

Route::get('/categories', function () {
    return view('categories/index');
});
