<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request){

    	$email = new Newsletter;
    	
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

}
