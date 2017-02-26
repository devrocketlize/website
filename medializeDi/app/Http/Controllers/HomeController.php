<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;
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
        
        $pedidos = Pedido::orderBy('id', 'desc');
        $servico = Servico::find($id);
        dd($pedidos);

       return view('home', compact('pedidos', 'servico'));
    }
}
