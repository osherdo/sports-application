<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
  protected $table = 'profiles';

  protected $fillable = ['gender','age','goals','activityType'];


  /**
   * A profile belongs to many Expectations
   * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function expectations()
  {
      return $this->belongsToMany('App\Expectation');
  }

  /**
   * A profile is belong to a user
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
