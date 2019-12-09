<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deck extends Model
{

    const STATUS_PUBLIC = 'Public';
    const STATUS_PRIVATE = 'Private';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id', 'user_id', 'name', 'description', 'status',
    ];

    /**
     * Default values for attributes
     * @var  array an array with attribute as key and default as value
     */
    protected $attributes = [
            'status' => self::STATUS_PUBLIC,
    ];

    function cards() {

      return $this->hasMany('App\Models\Card');
    }

    function user() {

      return $this->belongsTo('App\User');
    }

    function isPublic() {

      return $this->status == self::STATUS_PUBLIC;
    }

    function isPrivate() {

      return $this->status == self::STATUS_PRIVATE;
    }

  /*
    Scopes
  */
    function scopeStatus($query, $status) {

      return $query->where('status', $status);
    }
}
