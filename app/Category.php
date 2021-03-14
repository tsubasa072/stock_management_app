<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $guarded = array('id');
  public static $rules = array(
    'name' => 'string',
    'user_id' => 'integer',
  );

  public function user()
  {
    return $this->belongsto('App\user');
  }

  public function getData()
  {
    return $this->name;
  }
}
