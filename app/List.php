<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
    'name' => 'string',
    'volume' => 'integer',
    'user_id' => 'integer',
  );

  public function getData()
  {
    return  $this->name . $this->volume;
  }
}
