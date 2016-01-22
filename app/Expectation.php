<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expectation extends Model
{
  public function expectations()
{
    return $this->belongsToMany('App\Expectation');
}
}
