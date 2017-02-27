@extends('../layouts/forms')

@section('titulo')
    Página não encontrada
@stop

@section('conteudo')
<section class="sectionUn">
    <div id="logoCenter">
        <img src="https://rocketlize.com/assets/base/img/layout/logos/logo-3.png">
    </div>
    <br />
    <div class="container">
        <div class="row">

                <div id="logoCenter">
                    <img src="https://rocketlize.com/assets/base/img/layout/logos/logo-3.png">
                </div>

                <div class="col-md-6 col-md-offset-3">
                <hgroup>
                  <h2>
                    Ocorreu algum problema, não podemos exibir esta página que o senhor(a) procura. 
                  </h2>
                  <h2>:-(</h2>
                 </hgroup>
                 <div class="well">
                    
                      
                         <a href="/" class="btn btn-info" type="submit">Voltar</a>
                      
                     
                 </div>
                
                </div>
            </div>
    </div>
</section>
@endsection
