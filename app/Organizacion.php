<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $guarded=[];

    public function proyecto()
    {
        return $this->hasMany('App\Proyecto');
    }
}
