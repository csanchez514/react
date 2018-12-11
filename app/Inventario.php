<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $primaryKey = 'Nombre';
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'productos';
    protected $fillable = ['Nombre','Precio','Cantidad'];
}
