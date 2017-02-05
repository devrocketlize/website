<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
  protected $table = 'pedidos';
  protected $primaryKey = 'id';

  public function pagamento()
  {
    return $this->hasOne('App\Pagamento');
  }

  public function servico()
  {
    return $this->hasOne('App\Servico', 'id', 'servico_id');
  }
}
