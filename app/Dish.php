<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function menu()
    {
        return $this->belongsTo('App\Menu', 'Menu_id', 'id');
    }

    public function dishes()
    {
      return $this->hasOne('App\OrderDish');
    }

}
