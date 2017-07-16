<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = ['path'];

  // relations
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
