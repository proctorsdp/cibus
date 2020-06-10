<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function ingredients() 
    {
        return $this->hasMany('App\Ingredient');
    }
}
