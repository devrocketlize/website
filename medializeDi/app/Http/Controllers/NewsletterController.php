<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request){

    	$email = new Newsletter;
    	
    	$email->FIELD1 = trim(strip_tags($request->input('email')));

    	dd($email);

    	$email->save();

    	return response()->json(['status' => 'ok']);

    }
}
