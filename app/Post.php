<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    //relations
    public function photo()
    {
      return $this->hasOne('App\Photo');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
