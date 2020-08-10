<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Rating extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $table = 'ratings';

    public function recipe()
    {
        return $this->belongsTo('App\Recipe', 'recipe_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
