<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitOf extends Model
{
    public function units()
    {
        return $this->hasMany('App\Unit');
    }
}
