<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    //

    /*
    protected $table = 'minombredetabla';
    protected $primarykey = "nombreidpersonalizada";
    */
    public $timestamps = false;//Sobreescribe el dato miembro de model
    protected $fillable = ["name", "level", "n1","n2","n3"];

    
}
