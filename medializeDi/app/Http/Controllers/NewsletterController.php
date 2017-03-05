<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use App\User;
use Mail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request){

    	$email = new Newsletter;

    	if($request->email == ' '){

    		return false;
    	}
    	
    	$email->FIELD1 = trim(strip_tags($request->input('email')));

    	$email->save();

    	return response()->json(['status' => 'ok']);

    }

    public function show(){

    	return view('cancelar-news');
    }

    public function unsubscribe(Request $request){

    	$input = trim(strip_tags($request->input('email')));

    	$email =  Newsletter::where('FIELD1', '=', $input)->delete();

    	return response()->json(['status' => 'ok']);
    }

    public function sendmail(){

    	$users = Newsletter::all();
      
          
		foreach ($users as $user) {

             if($user->ID >= 501 && $user->ID <= 1000){

        		  Mail::send('emails', [], function($message) use ($user) {

        		          $message->from('newsletter@rocketlize.com', 'Novidades da Rocketlize!');
        		          $message->to($user->FIELD1, 'Interessado')->subject('Rocketlize! Você gamhou um teste grátis!');

        		  });
            }

		}

    	return "Enviado com sucesso!";
    
    }

    public function testegratis(){

        return view('testegratis');
    }

    public function enviarDados( Request $request){

        $dados = new Newsletter;

        $dados->emailCliente = trim(strip_tags($request->email));
        $dados->whatsCliente = trim(strip_tags($request->whats));
        $dados->midiaSolicitada = trim(strip_tags($request->midia));
        $dados->linkSocial = trim(strip_tags($request->link));

        $dados->save();


        return redirect()->back()->with('message', 'Parabéns! Brevemente você estará testando um de nossos serviços');
    }

}
