<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow_request extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
    'user_id' => 'integer',
    'request_user_id' => 'string',
  );
}
