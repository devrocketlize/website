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
        
        $pedidos = Pedido::orderBy('id', 'DESC')->paginate(5);
        
       return view('home', compact('pedidos'));
    }

    public function edit($id){

            $pedido = Pedido::find($id);

            $teste->$pedido->servico_id;
            dd($teste);

        return view ('editar-pedido', compact('pedido'));
    }
}
