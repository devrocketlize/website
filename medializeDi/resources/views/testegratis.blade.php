<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rocketlize - TESTE GRÁTIS</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	#inner {
		 margin-top: 10px !important;
		}
    </style>
  </head>
  <body>
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    		<div id="inner">
    			<img src="https://rocketlize.com/assets/base/img/layout/logos/logo-3.png" alt="Rocketlize" title="Rocketlize">
    		</div>
    		</div>
    	</div>
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    		<br />
    		<h3>Parabéns, você poderá solicitar um teste de nossos serviços para seu Instagram!</h3>
    		@if(session()->has('message'))
			    <div class="alert alert-success">
			        {{ session()->get('message') }}
			    </div>
			@endif
			    		
    		<br /><br />
    			<form action="/enviarDados" method="POST" enctype="multipart/form-data">
    				{{ csrf_field() }}
    			<div class="col-md-6">
    				<div class="form-group">
					    <label for="exampleInputEmail1">Seu e-mail*</label>
					    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" >
					   
					  </div>
    			</div>

    			<div class="col-md-6">
    				 <div class="form-group">
					    <label for="exampleInputPassword1">Seu Whatsapp (não é obrigatório)</label>
					    <input type="text" class="form-control" name="whats" id="whats" placeholder="(00) 99999-5555">
					  </div>
					  
    			</div>

    			<div class="col-md-6">
    				<div class="form-group">
					    <label for="exampleSelect1">Gostaria de teste em outra mídia?</label>
					    <select name="midia" id="midia" class="form-control" >
					      <option value="Não">Não</option>
					      <option value="Facebook">Facebook</option>
					      <option value="YouTube">YouTube</option>
					      <option value="SoundCloud">SoundCloud</option>
					      <option value="Twitter">Twitter</option>
					    </select>
					  </div>
    			</div>

    			<div class="col-md-6">
    				  <div class="form-group">
					    <label for="exampleInputPassword1">Link para perfil*</label>
					    <input type="text" name="link" id="link" class="form-control" placeholder="https://instagram.com/seuperfil">
					  </div>
    			</div>
    			
                <div class="col-md-6">
    				 <button type="submit" class="btn btn-primary">TESTAR</button>
    			</div>
					 
					</form>
    		</div>
    	</div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>