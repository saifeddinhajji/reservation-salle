<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    protected  $table="prix-loc";
    protected $fillable =['nom', 'adresse','capaciteSal'];
}
