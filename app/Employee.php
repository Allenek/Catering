<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Employee extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table='employees';
    protected $fillable = [
         'Imie', 'Nazwisko', 'Uprawnienia', 'Email', 'Pozostała_kwota', 'Menu_id',
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'password', 'remember_token',
     ];

    public function catering()
    {
         return $this->belongsTo('App\Catering', 'Catering_id', 'id');
    }

    public function employee()
    {
      return $this->hasMany('App\Order');
    }
}
