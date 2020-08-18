<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{ protected  $table="especes";
    protected $fillable = [
         'num_virement'
    ];
    public function reglement(){
        return $this->belongsTo('App\Reglement');
      }
}
