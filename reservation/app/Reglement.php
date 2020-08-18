<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    protected  $table="reglements";
    protected $fillable = [
         'montant', 'reservation_id','type'
    ];
    public function cheque(){
        return $this->hasMany('App\Cheque');
      }
      public function virement(){
        return $this->hasMany('App\Virement');
      }
      public function espece(){
        return $this->hasMany('App\Espece');
      }
}
