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

    	$users = User::all();

		foreach ($users as $user) {

		     Mail::send('emails', [], function($message) use ($user) {

		          $message->from('paulo@smcurtidas.com', 'Paulo Candido');
		          $message->to($user->email, $user->name)->subject('Teste envio de E-mail');

		      });

		}

    	return "Deu certo porra!!!";
    
    }

}
