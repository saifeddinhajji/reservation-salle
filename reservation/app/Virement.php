<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Virement extends Model
{
    protected  $table="virements";
    protected $fillable = [
         'nombanque', 'num_virement','reglement_id'
    ];
    public function reglement(){
        return $this->belongsTo('App\Reglement');
      }
}
