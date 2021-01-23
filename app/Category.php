<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description'];

    public function ingredients()
    {
        return $this->hasMany('App\Ingredient')->orderBy('name');
    }
}
