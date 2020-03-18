<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoInventario extends Model
{
    protected $guarded = [];

    public function proyecto()
    {
      return $this->belongsTo('App\Proyecto');
    }
}
