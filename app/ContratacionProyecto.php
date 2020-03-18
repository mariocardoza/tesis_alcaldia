<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratacionProyecto extends Model
{
    protected $guarded = [];

    public function epfuncione()
    {
      return $this->hasMany('App\EPFuncione','contratacionproyecto_id');
    }

    public function empleado()
    {
      return $this->belongsTo('App\Empleado');
    }

    public function contratoproyecto()
    {
      return $this->belongsTo('App\ContratoProyecto');
    }
}
