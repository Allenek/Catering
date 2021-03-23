<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

  public function catering()
  {
      return $this->belongsTo('App\Catering', 'Catering_id', 'id');
  }

  public function dishes()
  {
      return $this->hasMany('App\Dish');
  }




}
