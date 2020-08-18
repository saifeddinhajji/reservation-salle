<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autre extends Model
{
    protected  $table="autres";
    protected $fillable = [
         'nom','type','adresse','nombre_chambre','espace'
    ];
}
