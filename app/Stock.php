<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
      'category_id' => 'integer',
      'name' => 'string',
      'volume' => 'integer',
      'user_id' => 'integer',
    );

    public function getData()
    {
      return  $this->name . $this->volume;
    }
}
