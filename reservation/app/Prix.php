<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prix extends Model
{
    protected  $table="prix-loc";
    protected $fillable =['salle_id','datedebut','datefin','saison','prix'];
    
    public function salle(){
        return $this->belongsTo('App\Salle');
        }
        public function Reservation(){
            return $this->hasMany('App\Reservation');
            }
}
