<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Servico;
use App\TipoServico;

class ServicoController extends Controller
{
  public function index($service, $media)
  {
    $medias = Media::all();

    $media = Media::where('link', '=', $media)->first();
    if($media == null)
      abort(404);
 
    $tipo = $media->tiposervico()->where('link', '=', $service)->first();
    
    if($tipo == null)
      abort(404);


    return view('servicos', compact('medias', 'media', 'tipo'));
  }

  public function comprar($service, $media, $seo)
  {

    
    $medias = Media::all();

    //$servico = Servico::find($seo);

    $servico = Servico::where('seo', $seo)->first();
    
    if($servico == null)
      abort(404);   

    return view('comprar', compact('medias', 'servico'));
  }
}
