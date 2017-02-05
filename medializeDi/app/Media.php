<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  public function tiposervico()
  {
    return $this->hasMany('App\TipoServico');
  }
}
