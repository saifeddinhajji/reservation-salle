<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
  
    protected $fillable =['salle','user_id','client_id','end_date','description','prix','avance'] ;
   //public    $timestamps->updated_at = false_id;

       public function client(){
      return $this->belongsTo('App\Client');
      }
}
