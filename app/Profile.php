<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
        protected $table = 'profiles';

        protected $fillable = ['gender','age','goals','activityType'];

        public function expectations()
{
    return $this->belongsToMany('App\Expectation');
}
}
