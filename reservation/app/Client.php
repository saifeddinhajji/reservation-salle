<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
  
    protected $fillable =['nom','prenom','email','fix','mobile','region'] ;
   //public    $timestamps->updated_at = false_id;

       public function reservation(){
      return $this->hasMany('App\Reservation');
      }
}
