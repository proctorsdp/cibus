<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recipes()
    {
        return $this->belongsToMany('App\Recipe')->using('App\RecipeUser')->withPivot(['created_at', 'updated_at']);
    }

    public function submissions()
    {
        return $this->hasMany('App\Recipe');
    }

    public function reviews()
    {
        return $this->belongsToMany('App\Recipe', 'ratings')->using('App\Rating')->withPivot(['score', 'created_at', 'updated_at']);
    }
}
