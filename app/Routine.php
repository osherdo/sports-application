<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
	protected $table='routines';
    public $timestamps = true;
    $fillable = ['name'];

public function users()
{
	return $this->belongsTo('App\User');
}



}
