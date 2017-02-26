<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;
use App\Media;
use App\TipoServico;
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

            $refServico = $pedido->servico_id;
            
            $servico = Servico::find($refServico);

            $refTipo = $servico->tipo_servico_id;

            $tipo = TipoServico::find($refTipo);

            $refMedia = $tipo->media_id;

            $media = Media::find($refMedia);

        return view ('auth.editar-pedido', compact('pedido', 'servico', 'tipo', 'media'));
    }

    public function update($id, Request $request){

            $pedido = Pedido::find($id);
            $pedido->andamento = $request->andamento;
            $pedido->update();


        return redirect()->back()->with('message', 'Atualizado!');

    }
}
