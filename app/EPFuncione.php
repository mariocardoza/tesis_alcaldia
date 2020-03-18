<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EPFuncione extends Model
{
    protected $fillable = ['funcion','contratacionproyecto_id'];

    public function contratacionproyecto()
    {
      return $this->belongsTo('App\ContratacionProyecto');
    }
}
