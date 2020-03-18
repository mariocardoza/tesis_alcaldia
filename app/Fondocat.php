<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondocat extends Model
{
    protected $guarded = [];

    public function fondo()
    {
    	return $this->hasMany('App\Fondo');
    }
}
