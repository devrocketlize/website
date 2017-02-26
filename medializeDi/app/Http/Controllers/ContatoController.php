<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContatoController extends Controller
{
    //

    public function enviarMensagem(Request $request){

    	$nomeCliente        	= $request->get(trim(strip_tags('nome')));
        $emailCliente        	= $request->get(trim(strip_tags('email')));
        $mensagemCliente    	= $request->get(trim(strip_tags('mensagem')));


        $data = ['nome' => $nomeCliente. ' '.$emailCliente,
                 'msgCliente' => $mensagemCliente,
                ];


        Mail::send(['text' => 'mail'], $data, function($message) use ($nomeCliente,$emailCliente){

            $message->to('sac@rocketlize.com', 'Rocketlize')->subject('Mensagem de '. $nomeCliente);
            $message->from($emailCliente,$nomeCliente);

        } );

        return response()->json(['status' => 'ok']);

    }
}
