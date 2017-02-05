<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
  protected $table = 'pagamentos';
  protected $primaryKey = 'id';

  public function pedido()
  {
    return $this->belongsTo('App\Pedido');
  }
}
