<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContatoController extends Controller
{
    //

    public function enviarMensagem(Request $request){

    	$nomeCliente        	= $request->trim(strip_tags('nome'));
        $emailCliente        	= $request->trim(strip_tags('email'));
        $mensagemCliente    	= $request->trim(strip_tags('mensagem'));

        dd($mensagemCliente);


        $data = ['nome' => $nomeCliente. ' '.$emailCliente,
                 'msgCliente' => $mensagemCliente,
                ];


        Mail::send(['text' => 'mail'], $data, function($message) use ($nomeCliente,$emailCliente,$mensagemCliente){

            $message->to('saco@rocketlize.com', 'Rocketlize')->subject('Mensagem de '. $nomeCliente);
            $message->from($emailCliente,$nomeCliente);

        } );

        return response()->json(['status' => 'ok']);

    }
}
