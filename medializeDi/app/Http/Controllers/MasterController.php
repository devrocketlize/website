<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use Illuminate\Mail\Mailer;
use Mail;

class MasterController extends Controller
{
  public function index()
  {
    $medias = Media::all();
    return view('index', compact('medias'));
  }

  public function atendimento(Request $request)
  {
    $nomeCliente        = $request->get('nome');
    $emailCliente       = $request->get('email');
    $assuntoCliente     = $request->get('assunto');
    $mensagemCliente    = $request->get('mensagem');

    $data = [
      'nome' => $nomeCliente,
      'msgCliente' => $mensagemCliente,
    ];

    Mail::send(['text' => 'mail'], $data, function($message) use ($assuntoCliente, $nomeCliente, $emailCliente){
      $message->to('sac@shopmmarketing.com', 'Paulo Candido')->subject($assuntoCliente);
      $message->from($emailCliente, $nomeCliente);
    });

    if(count(Mail::failures()) > 0) {
      return back()->with('failure', 'Houve um erro durante o envio. Por favor, tente novamente mais tarde.');
    }

    return back()->with('success', 'Mensagem enviada com sucesso!');
  }

  public function comprovante(Request $request)
    {
      $ext = $request->comprovanteAnexo->getClientOriginalExtension();
      if($ext == 'pdf' || $ext == 'jpeg' || $ext == 'jpg') {
        $fileName = rand(11111,99999).'.'.$ext; // renameing image
        $request->comprovanteAnexo->move(public_path('/comprovantes'), $fileName); // uploading file to given path

        $dadosEmail = [
          'mNomeCliente' => $request->nomeCompleto,
          'mValorDepositado' => $request->valorDeposito,
          'mServico' => $request->servico,
          'mEmailCliente' => $request->email,
          'mTelefoneCliente' => $request->telefone,
          'mPerfilCliente' => $request->linksSociais,
        ];

        Mail::send(['text' => 'deposito.mailDeposito'], $dadosEmail, function($message) use ($request, $fileName) {
          $message->to('financeiro@smcurtidas.com', 'Financeiro')->subject('Comprovante do pedido de: ' . $request->nomeCompleto);
          $message->from('contato@autolikegram.com');
          $message->attach(public_path('/comprovantes/'.$fileName));
        });

        unlink(public_path('/comprovantes/'.$fileName));

        if(count(Mail::failures()) > 0) {
          return back()->with('error', 'Ocorreu um erro durante o envio. Tente novamente!');
        }

        return back()->with('success', 'Mensagem enviada com sucesso!');
      } else {
        return back()->with('error', 'Formato do arquivo inválido!');
      }
    }

    public function termos(){

      return view('termos');
    }

}
