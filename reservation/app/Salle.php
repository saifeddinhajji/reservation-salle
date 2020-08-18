<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected  $table="salles";
    protected $fillable = [
         'nom', 'adresse','capaciteSal'
    ];
    public function prix(){
        return $this->hasMany('App\Prix');
      }
      public function Reservation(){
        return $this->hasMany('App\Reservation');
      }
    
}
