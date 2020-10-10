<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
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
        return $this->belongsToMany('App\Recipe')->using('App\RecipeUser')->withPivot(['created_at', 'updated_at'])->orderBy('title');
    }

    public function submissions()
    {
        return $this->hasMany('App\Recipe')->orderBy('title');
    }

    public function reviews()
    {
        return $this->hasMany('App\Rating')->orderBy('created_at');
    }
}
