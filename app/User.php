<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
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

    function decks() {

      return $this->hasMany('App\Models\Deck');
    }

    function cards() {

      return $this->hasManyThrough('App\Models\Deck', 'App\Models\Card');
    }

    /**
     * Scope a query to only include a user of a given username
     */

     public function scopeUsername($query, $type)
     {
         return $query->where('username', $type);
     }
}
