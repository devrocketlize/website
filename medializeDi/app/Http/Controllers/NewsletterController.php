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
}
