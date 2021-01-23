<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeTag extends Pivot
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

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag', 'tag_id');
    }
}
