<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'cat_id'];

    //relations
    public function photo()
    {
      return $this->hasOne('App\Photo');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function category()
    {
      return $this->belongsTo('App\Category', 'cat_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
