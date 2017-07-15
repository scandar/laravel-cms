<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  // Realtions
  public function users()
  {
    return $this->hasMany('App\User');
  }
}
