<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
	protected $table='exercises';
    public $timestamps = true;
    $fillable = ['name'];

public function exercises()
{
	return $this->belongsTo('App\Routine');
}


}
