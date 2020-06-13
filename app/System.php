<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public function units()
    {
        return $this->hasMany('App\Unit');
    }
}
