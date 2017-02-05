<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use anlutro\cURL\cURL;
use App\Servico;
use App\Pedido;
use App\Pagamento;

class PayPalController extends Controller
{
  protected $credenciais = array(
    /*
     * Definição da URL de Retorno
     */
     'returnUrl' => 'http://www.shopmmarketing.com',
    /*
     * Credenciais de DESENVOLVIMENTO
     */
    'sandbox' => array(
      'user' => 'paulo.hncandido-facilitator_api1.gmail.com',
      'password' => 'VSLLSJ9G53N7S4HB',
      'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AKlmd-LxKbsfMgCtygQbQ6tI3rY.',
      'apiEndpoint' => 'https://api-3t.sandbox.paypal.com/nvp',
      'redirect' => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
    ),
    /*
     * Credenciais de PRODUÇÂO
     */
    'live' => array(
      'user' => 'pagamento_api1.smcurtidas.com',
      'password' => 'J2RAPJND6EYM6KYE',
      'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AqEIN13ZtoA.DMa01Qk17TyNPeKo',
      'apiEndpoint' => 'https://api-3t.paypal.com/nvp',
      'redirect' => 'https://www.paypal.com/cgi-bin/webscr',
    ),
  );

  protected function responseNvp($response)
  {
    //Tratando a resposta
    $responseNvp = array();
      if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
        foreach ($matches['name'] as $offset => $name) {
          $responseNvp[$name] = urldecode($matches['value'][$offset]);
        }
      }

    //Verificando se deu tudo certo e, caso algum erro tenha ocorrido, gravamos um log para depuração.
    if (isset($responseNvp['ACK']) && $responseNvp['ACK'] != 'Success') {
      for ($i = 0; isset($responseNvp['L_ERRORCODE' . $i]); ++$i) {
        $message = sprintf("PayPal NVP %s[%d]: %s\n", $responseNvp['L_SEVERITYCODE' . $i], $responseNvp['L_ERRORCODE' . $i], $responseNvp['L_LONGMESSAGE' . $i]);
        dd($message);
      }
    }

    return $responseNvp;
  }

  protected function getExpressCheckoutDetails($token)
  {
    $curl = new cURL;
    $request = $curl->newRequest('post', $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['apiEndpoint'], [
      // Credenciais da API
      'USER' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['user'],
      'PWD' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['password'],
      'SIGNATURE' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['signature'],
      // Versão da API
      'VERSION' => '114.0',
      // Método
      'METHOD' => 'GetExpressCheckoutDetails',
      // Informações da Compra e Comprador
      'TOKEN' => $token,
    ])
    ->setOption(CURLOPT_SSL_VERIFYPEER, false)
    ->setOption(CURLOPT_RETURNTRANSFER, true);
    $response = $request->send();

    return $this->responseNvp($response->body);
  }

  public function pagamento($id)
  {
    $pedido = Pedido::find($id);
    if($pedido == null)
      abort(400);

    $servico = $pedido->servico;

    $curl = new cURL;
    $request = $curl->newRequest('post', $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['apiEndpoint'], [
      // Credenciais da API
      'USER' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['user'],
      'PWD' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['password'],
      'SIGNATURE' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['signature'],
      // Versão da API
      'VERSION' => '108.0',
      // Método
      'METHOD' => 'SetExpressCheckout',
      // Informações do Pagamento
      'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
      'PAYMENTREQUEST_0_AMT' => $pedido->valor,
      'PAYMENTREQUEST_0_CURRENCYCODE' => 'BRL',
      'PAYMENTREQUEST_0_ITEMAMT' => $pedido->valor,
      'PAYMENTREQUEST_0_INVNUM' => $pedido->id,
      // Informações do Produto
      'L_PAYMENTREQUEST_0_NAME0' => $servico->quantidade . ' ' . $servico->tiposervico->desc . ' no ' . $servico->tiposervico->media->desc . ' ' . $pedido->nomeCliente . ' ' . $pedido->emailCliente . ' '. $pedido->link,
      'L_PAYMENTREQUEST_0_DESC0' => 'Link:  ' . $pedido->link . ' WhatsApp: ' . $pedido->whatsapp,
      'L_PAYMENTREQUEST_0_AMT0' => $pedido->valor,
      'L_PAYMENTREQUEST_0_QTY0' => '1',
      // Informações de Fluxo da Aplicação
      'RETURNURL' => $this->credenciais['returnUrl'] . '/paypal/retorno',
      'CANCELURL' => $this->credenciais['returnUrl'],
      'BUTTONSOURCE' => 'BR_EC_EMPRESA'
    ])
    ->setOption(CURLOPT_SSL_VERIFYPEER, false)
    ->setOption(CURLOPT_RETURNTRANSFER, true);
    $response = $request->send();

    $responseNvp = $this->responseNvp($response->body);

    //Se a operação tiver sido bem sucedida, redirecionamos o cliente para o ambiente de pagamento.
    if (isset($responseNvp['ACK']) && $responseNvp['ACK'] == 'Success') {
      $pagamento = $pedido->pagamento;
      $pagamento->referencia = $responseNvp['TOKEN'];
      $pagamento->save();

      $query = array(
        'sandbox' => array(
          'cmd' => '_express-checkout',
          'token' => $responseNvp['TOKEN'],
        ),
        'live' => array(
          'cmd' => '_express-checkout',
          'useraction' => 'commit',
          'token' => $responseNvp['TOKEN'],
        ),
      );

      return redirect()->to(sprintf('%s?%s', $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['redirect'], http_build_query($query[env('PAYPAL_AMBIENTE', 'live')])));
    } else {
      dd($responseNvp);
    }
  }

  /*
   * Este método recebe, após um pagamento simples no PayPal, o token da transação e também um PayerID.
   *
   * Para fins de simplificação, e também por já termos o token do pagamento, neste método descartamos estas informações
   * da URL e retornamos para a página de obrigado.
   */
   public function retorno()
   {
     $expressCheckoutDetails = $this->getExpressCheckoutDetails(Input::get('token'));

     $curl = new cURL;
     $request = $curl->newRequest('post', $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['apiEndpoint'], [
       // Credenciais da API
      'USER' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['user'],
      'PWD' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['password'],
      'SIGNATURE' => $this->credenciais[env('PAYPAL_AMBIENTE', 'live')]['signature'],
      // Versão da API
      'VERSION' => '114.0',
      // Método
      'METHOD' => 'DoExpressCheckoutPayment',
      // Informações da Compra e Comprador
      'TOKEN' => Input::get('token'),
      'PAYERID' => Input::get('PayerID'),
      // Informações do Pagamento
      'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
      'PAYMENTREQUEST_0_CURRENCYCODE' => $expressCheckoutDetails['CURRENCYCODE'],
      'PAYMENTREQUEST_0_AMT' => $expressCheckoutDetails['PAYMENTREQUEST_0_AMT'], // Total da compra
      'PAYMENTREQUEST_0_ITEMAMT' => $expressCheckoutDetails['PAYMENTREQUEST_0_ITEMAMT'], // Número de produtos na compra
      'PAYMENTREQUEST_0_INVNUM' => $expressCheckoutDetails['PAYMENTREQUEST_0_INVNUM'],
      // Informações do Produto
      'L_PAYMENTREQUEST_0_NAME0' => $expressCheckoutDetails['L_PAYMENTREQUEST_0_NAME0'],
      'L_PAYMENTREQUEST_0_DESC0' => $expressCheckoutDetails['L_PAYMENTREQUEST_0_DESC0'],
      'L_PAYMENTREQUEST_0_AMT0' => $expressCheckoutDetails['L_PAYMENTREQUEST_0_AMT0'],
      'L_PAYMENTREQUEST_0_QTY0' => $expressCheckoutDetails['L_PAYMENTREQUEST_0_QTY0'],
    ])
    ->setOption(CURLOPT_SSL_VERIFYPEER, false)
    ->setOption(CURLOPT_RETURNTRANSFER, true);
    $response = $request->send();

    $responseNvp = $this->responseNvp($response->body);

    if(isset($responseNvp['ACK'], $responseNvp['PAYMENTINFO_0_ACK']) && $responseNvp['ACK'] == 'Success' && $responseNvp['PAYMENTINFO_0_ACK'] == 'Success') {
      // Pegar pedido através do INVNUM no $expressCheckoutDetails, atualizar a referencia/Token e retornar para Obrigado
      $pedido = Pedido::find($expressCheckoutDetails['INVNUM']);
      $pagamento = $pedido->pagamento;
      $pagamento->referencia = Input::get('token');
      $pagamento->save();

      return redirect()->to('/obrigado/' . $pedido->id);
    } else {
      dd($responseNvp);
    }
  }
}
