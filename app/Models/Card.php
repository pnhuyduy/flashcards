<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deck_id', 'user_id', 'front', 'back',
    ];

    function deck() {

      return $this->belongsTo('App\Models\Deck');
    }

    function user() {

      return $this->belongsTo('App\User');
    }
}
