<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ingredient as ResourceIngredient;
use App\Http\Resources\IngredientCollection;
use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = request('paginate') == 'false' ? 1000000 : 15;
        $search = '%' . request('search') . '%';
        $ingredients = Ingredient::where('name', 'LIKE', $search)
            ->orWhere('description', 'LIKE', $search)
            ->orderBy('name')
            ->paginate($pages);
        $ingredients->load('category');
        return new IngredientCollection($ingredients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newIngredient = Ingredient::create($request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required'
        ]));

        return new ResourceIngredient($newIngredient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required'
        ]);

        $ingredient->update($request->all());

        return new ResourceIngredient($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        return $ingredient->delete();
    }
}
