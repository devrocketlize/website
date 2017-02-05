<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use MP;
use anlutro\cURL\cURL;
use App\Servico;
use App\Pedido;
use App\Pagamento;

class MercadoPagoController extends Controller
{
  private $mp;

  protected $credenciais = array(
    /*
     * Definição da URL de Retorno
     */
    'returnUrl' => 'https://rocketlize.com',
    //'returnUrl' => 'http://www.rocketlize.com',
    /*
     * Credenciais de DESENVOLVIMENTO
     */
    'sandbox' => array(
      'CLIENT_ID' => '5746304420360665',
      'CLIENT_SECRET' => '6qyXoOeeA2Vna9PisOfV19FqDdTfqfa6',
      'redirectUrl' => 'sandbox_init_point',
    ),
    /*
     * Credenciais de PRODUÇÂO
     */
    'live' => array(
      'CLIENT_ID' => '5746304420360665',
      'CLIENT_SECRET' => '6qyXoOeeA2Vna9PisOfV19FqDdTfqfa6',
      'redirectUrl' => 'init_point',
    ),
  );

  function __construct()
  {
    $this->mp = new MP(
      $this->credenciais[env('MERCADOPAGO_AMBIENTE', 'sandbox')]['CLIENT_ID'],
      $this->credenciais[env('MERCADOPAGO_AMBIENTE', 'sandbox')]['CLIENT_SECRET']
    );
  }

  public function pagamento($id)
  {
    $pedido = Pedido::find($id);
    if($pedido == null)
      abort(400);

    $servico = $pedido->servico;

    // Criar uma requisição de pagamento
    $preference_data = array(
      'items' => array(
        array(
          'title' => $servico->quantidade . ' ' . $servico->tiposervico->desc . ' no ' . $servico->tiposervico->media->desc . ' por ' . $pedido->emailCliente,
          'quantity' => 1,
          'currency_id' => 'BRL',
          'unit_price' => (float) $pedido->valor,
        ),
      ),
      "back_urls" => array(
        "success" => $this->credenciais['returnUrl'] . "/mercadopago/retorno",
        //"failure" => "http://www.failure.com",
        "pending" => $this->credenciais['returnUrl'] . "/mercadopago/retorno"
      ),
      "external_reference" => $pedido->id,
    );

    $preference = $this->mp->create_preference($preference_data);

    if ($preference['status'] == 201) {
      $pagamento = $pedido->pagamento;

      $pagamento->referencia = $preference['response']['id'];
      $pagamento->save();

      return redirect()->to($preference['response'][$this->credenciais[env('MERCADOPAGO_AMBIENTE', 'sandbox')]['redirectUrl']]);

      //return redirect()->to($preference['response'][$this->credenciais[env('MERCADOPAGO_AMBIENTE', 'sandbox')]['redirectUrl']]);
    }
  }

  public function retorno()
  {
    if (Input::get('preapproval_id') !== null) {
      $paymentInfo = $this->mp->get(
        array(
          "uri" => "/preapproval/" . Input::get('preapproval_id'),
        )
      );

      $pagamento = Pagamento::where('referencia', '=', $paymentInfo['response']['id'])->first();
      $pedido = $pagamento->pedido;

      if ($pedido !== null) {
        return redirect()->to('/obrigado/' . $pedido->pds_id);
      } else {
        return redirect()->to('/obrigado');
      }
    }  else if (Input::get('external_reference') !== null) {
      return redirect()->to('/obrigado/' . Input::get('external_reference'));
    } else {
      return redirect()->to('/obrigado');
    }
  }
}
