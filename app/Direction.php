<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->using('App\DirectionIngredient')->withPivot(['quantity', 'unit_id'])->orderBy('category_id')->orderBy('name');
    }

    public function units()
    {
        return $this->belongsToMany('App\Unit', 'direction_ingredient')->using('App\DirectionIngredient')->withPivot(['quantity', 'ingredient_id'])->orderBy('name');
    }
}
