<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function directions()
    {
        return $this->belongsToMany('App\Direction', 'direction_ingredient')->using('App\DirectionIngredient')->withPivot(['quantity', 'ingredient_id'])->orderBy('recipe_id')->orderBy('step_number');
    }

    public function direction_ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'direction_ingredient')->using('App\DirectionIngredient')->withPivot(['quantity', 'direction_id'])->orderBy('direction_id')->orderBy('category_id')->orderBy('name');
    }

    public function recipe_ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'ingredient_recipe')->using('App\IngredientRecipe')->withPivot(['quantity', 'recipe_id'])->orderBy('recipe_id')->orderBy('category_id')->orderBy('name');
    }

    public function recipes()
    {
        return $this->belongsToMany('App\Recipe', 'ingredient_recipe')->using('App\IngredientRecipe')->withPivot(['quantity', 'ingredient_id'])->orderBy('title');
    }

    public function system()
    {
        return $this->belongsTo('App\System');
    }

    public function unitOf()
    {
        return $this->belongsTo('App\UnitOf');
    }
}
