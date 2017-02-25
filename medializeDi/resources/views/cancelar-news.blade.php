@extends('layouts/forms')

@section('titulo')
	Cncelar inscrição
@stop

@section('conteudo')

	<section>
		<div class="container">
			<div class="row">

				<div id="logoCenter">
					<img src="https://rocketlize.com/assets/base/img/layout/logos/logo-3.png">
				</div>

				<div class="col-md-6 col-md-offset-3">
		        <hgroup>
		          <h2>
		            Cancelar inscrição de nossa newsletter 
		          </h2>
		          <h1 class="free">:-(</h1>
		         </hgroup>
		    	 <div class="well">
		             <form action="#">
		              <div class="input-group">
		                 <input class="btn btn-lg" name="email" id="email" type="email" placeholder="Digite seu email" required>
		                 <button class="btn btn-info btn-lg" type="submit">Cancelar</button>
		              </div>
		             </form>
		    	 </div>
		         <small class="promise"><em>A equipe Rocketlize agradece sua interação e deseja boa sorte ao senhor(a).</em></small>
				</div>
			</div>
		</div>
	</section>

@stop