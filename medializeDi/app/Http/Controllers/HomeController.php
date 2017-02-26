<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pedidos = Pedido::all();

       dd($pedidos);
       
       return view('home', compact('pedidos'));
    }
}
