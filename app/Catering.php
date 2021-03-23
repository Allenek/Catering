<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{

    public function catering()
    {
        return $this->hasOne('App\Menu');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function menu()
    {
        return $this->hasOne('App\Menu');
    }



}
