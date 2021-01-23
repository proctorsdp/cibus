<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';
    protected $fillable = ['name', 'description', 'category_id'];

    public function recipes()
    {
        return $this->belongsToMany('App\Recipe')->using('App\IngredientRecipe')->withPivot(['quantity', 'unit_id', 'ingredient_id'])->orderBy('title');
    }

    public function recipe_units()
    {
        return $this->belongsToMany('App\Unit', 'ingredient_recipe')->using('App\IngredientRecipe')->withPivot(['quantity', 'ingredient_id', 'recipe_id'])->orderBy('name');
    }

    public function directions()
    {
        return $this->belongsToMany('App\Direction')->using('App\DirectionIngredient')->withPivot(['quantity', 'unit_id'])->orderBy('step_number');
    }

    public function direction_units()
    {
        return $this->belongsToMany('App\Unit', 'direction_ingredient')->using('App\DirectionIngredient')->withPivot(['quantity', 'direction_id'])->orderBy('name');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
