<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Construccion extends Model
{
    protected $guarded = [];

    public function contribuyente()
    {
    	return $this->belongsTo('App\Contribuyente');
    }

    public function impuesto()
    {
    	return $this->belongsTo('App\Impuesto');
    }
}
