<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','username'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * A user has a profile
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
      return $this->hasOne('App\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\Post'); 
    }


/**get the users that a user wants to follow.
Many to Many 
@return \Illuminate\Database\Elouquent\Relations\BelongsTo
**/

    


  public function followee() 
  { //Fetch the followee list for the follower.
    return $this->belongsToMany('App\User', 'follower_followee', 'follower_id', 'followee_id');
        // 'User' is the model name.'follower_followee' is the name of the pivot table.
        //The third argument is the foreign key name of the model on which you are defining the relationship. (source).
        //The fourth argument is the foreign key name of the model that you are joining to. (destination.)
  }


  public function followers() {
   // fetch those that follow you.
    return $this->belongsToMany('User', 'follower_followee', 'followed_id', 'follower_id');
  }

  public function routine()
  {
    //fetch the routing for each user.
    return $this->hasMany('App\Routine');
  }
}