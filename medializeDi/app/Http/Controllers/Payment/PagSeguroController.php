<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use anlutro\cURL\cURL;
use App\Servico;
use App\Pedido;
use App\Pagamento;

class PagSeguroController extends Controller
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
       'email' => 'pagamento@smcurtidas.com',
       'token' => 'D3EE99F2B3234347975FA93000441166',
       'baseUrlWs' => 'https://ws.sandbox.pagseguro.uol.com.br',
       'baseUrl' => 'https://sandbox.pagseguro.uol.com.br',
      ),
    /*
     * Credenciais de PRODUÇÂO
     */
     'live' => array(
       'email' => 'pagamento@smcurtidas.com',
       'token' => '07C2595CA8CA4B4E84D59C70C04CFA57',
       'baseUrlWs' => 'https://ws.pagseguro.uol.com.br',
       'baseUrl' => 'https://pagseguro.uol.com.br',
      ),
  );

  public function pagamento($id)
  {
    $pedido = Pedido::find($id);
    if($pedido == null)
      abort(400);

    $servico = $pedido->servico;

    $curl = new cURL();
    $request = $curl->newRequest('post', $this->credenciais[env('PAGSEGURO_AMBIENTE', 'live')]['baseUrlWs'] . '/v2/checkout/', [
      // Identificação da Aplicação
      'email' => $this->credenciais[env('PAGSEGURO_AMBIENTE', 'live')]['email'],
      'token' => $this->credenciais[env('PAGSEGURO_AMBIENTE', 'live')]['token'],
      // Identificação da Moeada
      'currency' => 'BRL',
      // Identificação dos Produtos
      //Item 1
      'itemId1' => '0001',
      'itemDescription1' => $servico->quantidade . ' ' . $servico->tiposervico->desc . ' no ' . $servico->tiposervico->media->desc . ' ' . $pedido->nomeCliente . ' ' . $pedido->emailCliente . ' '. $pedido->link,
      'itemAmount1' => $pedido->valor,
      'itemQuantity1' => 1,
      // Referencia da Aplicação
      'reference' => $pedido->id,
      'redirectURL' => $this->credenciais['returnUrl'],
      // Informações do Comprador
      'senderName' => $pedido->nomeCliente,
      'senderEmail' => $pedido->emailCliente,
    ])
    ->setHeader('Content-Type', 'application/x-www-form-urlencoded')
    ->setHeader('charset', 'UTF-8')
    ->setOption(CURLOPT_SSL_VERIFYPEER, false);

    $response = $request->send();

    // Tratar erros HTTP
    if ($response->statusCode == 200) {
      // Tratar erros de Parsing do XML
      $xml = simplexml_load_string($response->body);

      $pagamento = $pedido->pagamento;
      $pagamento->referencia = $xml->code;
      $pagamento->save();

      // Tratar erros do PagSeguro
      return redirect()->to($this->credenciais[env('PAGSEGURO_AMBIENTE', 'live')]['baseUrl'] . '/v2/checkout/payment.html?code=' . (string) $xml->code);
    }
  }

  /*
   * Este método só é chamado quando um pagamento simples é realizado. O caminho para este método é configurado no
   * site do PagSeguro e traz as informações do pagamento. Para assinaturas, o caminho é enviado junto a requisição
   * e as são enviadas notificações através do método 'notificacoes'.
   */
   public function retorno()
   {
     $curl = new cURL();
     $request = $curl->newRequest('get', $this->credenciais[env('PAGSEGURO_AMBIENTE', 'live')]['baseUrlWs'] . '/v2/transactions/' . Input::get('code') . '?email=' . $this->credenciais[env('PAGSEGURO_AMBIENTE', 'live')]['email'] . '&token=' . $this->credenciais[env('PAGSEGURO_AMBIENTE', 'live')]['token'], [])
     ->setOption(CURLOPT_SSL_VERIFYPEER, false);
     $response = $request->send();

     // Tratar erros HTTP
     if ($response->statusCode == 200) {
       // Tratar erros de Parsing do XML
       $xml = simplexml_load_string($response->body);

       // Recuperar Pedido pela referência
       $pedido = Pedido::find((string) $xml->reference);

       if ($pedido != null) {
         $pagamento = $pedido->pagamento;

         $pagamento->referencia = (string) $xml->code;
         $pagamento->statusCompra = (string) $xml->status;
         $pagamento->save();
       }

       return redirect()->to('/obrigado/' . $pedido->id);
      } else {
        return redirect()->to('/obrigado/');
      }

        /*
         * $xml->status
         *
         * 1 	Aguardando pagamento: o comprador iniciou a transação, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento.
         * 2 	Em análise: o comprador optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação.
         * 3 	Paga: a transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento.
         * 4 	Disponível: a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.
         * 5 	Em disputa: o comprador, dentro do prazo de liberação da transação, abriu uma disputa.
         * 6 	Devolvida: o valor da transação foi devolvido para o comprador.
         * 7 	Cancelada: a transação foi cancelada sem ter sido finalizada.
         */
  }
}
