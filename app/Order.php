<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function menu()
    {
        return $this->hasMenu('App\Menu');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'Pracownik_id', 'id');
    }

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }

    public function orders()
    {
      return $this->hasOne('App\OrderDish');
    }


}
