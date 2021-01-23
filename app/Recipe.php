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
        return $this->belongsToMany('App\Ingredient')->using('App\IngredientRecipe')->withPivot(['quantity', 'unit_id'])->orderBy('category_id')->orderBy('name');
    }

    public function ingredient_units()
    {
        return $this->belongsToMany('App\Unit', 'ingredient_recipe')->using('App\IngredientRecipe')->withPivot(['quantity', 'ingredient_id'])->orderBy('name');
    }

    public function directions()
    {
        return $this->hasMany('App\Direction')->orderBy('step_number');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->using('App\RecipeTag')->orderBy('name');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating')->orderBy('created_at');
        // return $this->belongsToMany('App\User', 'ratings')->using('App\Rating')->withPivot(['id', 'score', 'created_at', 'updated_at'])->orderBy('created_at');
    }

    public function time_unit()
    {
        return $this->belongsTo('App\Unit', 'unit_id');
    }
}
