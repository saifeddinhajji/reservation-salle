<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
  
    protected $fillable =['salle','user_id','salle_id','engagement','permisdefete','client_id','start_date','end_date','description','prix_id','prix'] ;
   //public    $timestamps->updated_at = false_id;

       public function client(){
      return $this->belongsTo('App\Client');
      }
      public function salle(){
        return $this->belongsTo('App\Salle');
        }
        public function prix(){
            return $this->belongsTo('App\Prix');
            }
      
}
