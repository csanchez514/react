<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $primaryKey = 'ID';
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'usuarios';
    protected $fillable = ['name','email','phone'];
}
