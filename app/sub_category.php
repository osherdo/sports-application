<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    public function exercises()
    {
    	return $this->belongsTo('App\exercises');
    }
}
