<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followee extends Model
{
public function followee()
{
	return this->BelongsToMany('App\user');
}

 protected $table = 'followee_posts'; // Table associated with this model.
 protected $primaryKey='follower_id';
}
