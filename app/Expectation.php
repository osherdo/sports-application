<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expectation extends Model
{

  /**
   * The expectations table does not contain 'created_at' or 'updated_at' fields
   * @var boolean
   */
  public $timestamps = false;


  /**
   * Properties that cn be mass-assigned
   * @var array
   */
  protected $fillable = ['name'];

}
