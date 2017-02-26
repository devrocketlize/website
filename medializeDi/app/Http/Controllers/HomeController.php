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
        
        $pedidos = Pedido::orderBy('id', 'DESC')->paginate(15);
        
       $teste = $pedidos->servico_id;

       dd($teste);

       return view('home', compact('pedidos'));
    }
}
