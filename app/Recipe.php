<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function author() 
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->using('App\IngredientRecipe')->withPivot(['quantity', 'unit_id']);
    }

    public function ingredient_units()
    {
        return $this->belongsToMany('App\Unit', 'ingredient_recipe')->using('App\IngredientRecipe')->withPivot(['quantity', 'ingredient_id']);
    }

    public function directions()
    {
        return $this->hasMany('App\Direction');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->using('App\RecipeTag');
    }

    public function ratings()
    {
        return $this->belongsToMany('App\User', 'ratings')->using('App\Rating')->withPivot(['score', 'created_at', 'updated_at']);
    }

    public function time_unit()
    {
        return $this->belongsTo('App\Unit', 'unit_id');
    }
}
