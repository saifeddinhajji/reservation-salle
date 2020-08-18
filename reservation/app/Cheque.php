<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    protected  $table="cheques";
    protected $fillable = [
         'reglement_id','num_cheque','nombanque','propriete'
    ];
    public function reglement(){
        return $this->belongsTo('App\Reglement');
      }
}
