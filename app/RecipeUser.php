<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeUser extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function recipe()
    {
        return $this->belongsTo('App\Recipe', 'recipe_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
