<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServico extends Model
{
  public function media()
  {
    return $this->belongsTo('App\Media', 'media_id', 'id');
  }

  public function servicos()
  {
    return $this->hasMany('App\Servico');
  }
}
