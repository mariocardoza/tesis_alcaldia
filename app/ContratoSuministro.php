<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoSuministro extends Model
{
    protected $guarded = [];

    public function proveedor()
    {
    	return $this->belongsTo('App\Proveedor');
    }

    public function requisicion()
    {
    	return $this->belongsTo('App\Requisicion');
    }
}
