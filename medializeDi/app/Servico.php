<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
  public function tiposervico()
  {
    return $this->belongsTo('App\TipoServico', 'tipo_servico_id', 'id');
  }
}
