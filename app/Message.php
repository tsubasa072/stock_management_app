<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
    'send_user_id' => 'integer',
    'receive_user_id' => 'integer',
    'title' => 'string',
  );

  public function getData()
  {
    return  $this->title;
  }
}
