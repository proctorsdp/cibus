<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function directions()
    {
        return $this->belongsToMany('App\Direction', 'direction_ingredient')->using('App\DirectionIngredient')->withPivot(['quantity', 'ingredient_id']);
    }

    public function direction_ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'direction_ingredient')->using('App\DirectionIngredient')->withPivot(['quantity', 'direction_id']);
    }

    public function recipe_ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'ingredient_recipe')->using('App\IngredientRecipe')->withPivot(['quantity', 'recipe_id']);
    }

    public function recipes()
    {
        return $this->belongsToMany('App\Recipe', 'ingredient_recipe')->using('App\IngredientRecipe')->withPivot(['quantity', 'ingredient_id']);
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
