<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;
use App\Pedido;
use App\Pagamento;
use Mail;
use App\Media;

class PaymentController extends Controller
{
  public function checkout($id, Request $request)
  {
    // Objeto do Serviço Vendido
    $servico = Servico::find($id);
    if($servico == null)
      abort(400);

    // Cria Pedido
    $pedido = new Pedido();
    $pedido->servico_id = $servico->id;
    $pedido->valor = $servico->preco;
    $pedido->nomeCliente = $request->nome.' '.$request->sobrenome;
    $pedido->emailCliente = $request->email;
    $pedido->link = $request->link;
    $pedido->whatsapp = $request->whatsapp;
    $pedido->save();

    // Cria Pagamento para o Pedido
    $pagamento = new Pagamento();
    $pagamento->pedido_id = $pedido->id;
    $pagamento->provedor = $request->pagamento;
    $pagamento->save();

    switch ($pagamento->provedor) {
      case 'paypal':
        return redirect()->to('/paypal/pagamento/' . $pedido->id);
        break;
      case 'pagseguro':
        return redirect()->to('/pagseguro/pagamento/' . $pedido->id);
        break;
      case 'mercadopago':
        return redirect()->to('/mercadopago/pagamento/' . $pedido->id);
        break;
      case 'mercadopago':
        return redirect()->to('/mercadopago/pagamento/' . $pedido->id);
        break;
    }
  }

  public function obrigado($pagamento)
  {
    $medias = Media::all();

    if ($pagamento != null) {
      // Informações do Pedido
      $pedido = Pedido::find($pagamento);

      // Informações do Serviço comprado
      $servico = $pedido->servico;

      // Informações do Pagamento
      $pagamento = $pedido->pagamento;


      //Dados do Email
      $data =
      [
        'mServico' => $servico->quantidade . ' ' . $servico->tiposervico->desc,
        'mNomeCliente' => $pedido->nomeCliente,
        'mEmailCliente' => $pedido->emailCliente,
        'mLink' => $pedido->link,
        'mWhatsapp' => $pedido->whatsapp,
        'mReferenciaPagamento' => $pagamento->referencia,
        'mGatewayPagamento' => $pagamento->provedor,
      ];

      $nomeCliente = $pedido->nomeCliente;

        
        //Email Teste para casos relacionados a caixa de Spam, envio demorado e alteracoes da aplicação.

        Mail::send(['text' => 'mail'], $data, function($message) use ($nomeCliente) {
          $message->to('paulo.hncandido@gmail.com', 'Serviço Marketing')->subject('Pedido relalizado por ' . $nomeCliente);
          $message->from('newsletter@rocketlize.com');
        });
  
    }

    return view('compra-sucesso');
  }
}
