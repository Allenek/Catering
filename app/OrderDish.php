<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDish extends Model
{
  public function orders()
  {
    return $this->belongsTo('App\Order', 'Zamowienie_id', 'id');
  }

  public function dishes()
  {
      return $this->belongsTo('App\Dish', 'Potrawa_id', 'id');
  }

}
