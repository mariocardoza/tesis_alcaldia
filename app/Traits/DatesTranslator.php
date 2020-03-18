<?php

namespace App\Traits;

use Jenssegers\Date\Date;

trait DatesTranslator
{
  public function getCreatedAtAttribute($created_at)
  {
    return new Date($created_at);
  }

  public function getFechaInicioAttribute($fecha_inicio)
  {
    return new Date($fecha_inicio);
  }

  public function getFechaFinAttribute($fecha_fin)
  {
    return new Date($fecha_fin);
  }

  public function getFechaLimiteAttribute($fecha_limite)
  {
    return new Date($fecha_limite);
  }
}
