<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class IngredientRecipe extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient', 'ingredient_id');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe', 'recipe_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unit_id');
    }
}
