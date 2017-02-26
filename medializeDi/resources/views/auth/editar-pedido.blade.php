@extends('../layouts/forms')

@section('titulo')
    Ediatr peido
@stop

@section('token')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
@stop

@section('conteudo')
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
               Rocketlize
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                               
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">
	<div class="row">
	<a href="/home">Voltar</a>
		<div class="col-md-12"></div>
			@if(session()->has('message'))
			    <div class="alert alert-success">
			        {{ session()->get('message') }}
			    </div>
			@endif
			<div class="panel panel-primary"> 

					<div class="panel-heading"> 
						<h3 class="panel-title">Pedido: {{$servico->quantidade}} {{$tipo->desc}} no {{$media->desc}} </h3> 
					</div> 

					<div class="panel-body"> 

						<p><strong>Nome do Cliente:</strong> {{$pedido->nomeCliente}} </p>
						<p><strong>E-mail:</strong> {{$pedido->emailCliente}} </p>
						<p><strong>Whatsapp:</strong> {{$pedido->whatsapp}} </p>
						<p><strong>Solicitação:</strong> {{$servico->quantidade}} {{$tipo->desc}} no {{$media->desc}} no valor de {{$pedido->valor}} </p>
						<p><strong>Link / Comentário:</strong> {{$pedido->link}} </p>

						<p><strong>Feito em:</strong> {{$pedido->created_at}}</p>
						<p><strong>Status:</strong> <span class="

                              @if($pedido->andamento == 'pending')
                                label label-default
                                  @elseif($pedido->andamento == 'approved')
                                    label label-success
                                  @elseif($pedido->andamento == 'in_process')
                                    label label-primary
                                  @elseif($pedido->andamento == 'in_mediation')
                                    label label-info
                                  @elseif($pedido->andamento == 'rejected')
                                    label label-warning
                                  @elseif($pedido->andamento == 'cancelled')
                                    label label-danger
                                  @elseif($pedido->andamento == 'refunded')
                                    label label-danger
                                   @else
                                    label label-danger
                              @endif

                              ">@if($pedido->andamento == 'pending')
                                   Pendente
                                  @elseif($pedido->andamento == 'approved')
                                    Aprovado
                                  @elseif($pedido->andamento == 'in_process')
                                    Processando
                                  @elseif($pedido->andamento == 'in_mediation')
                                   Mediado
                                  @elseif($pedido->andamento == 'rejected')
                                    Rejeitado
                                  @elseif($pedido->andamento == 'cancelled')
                                    Cancelado
                                  @elseif($pedido->andamento == 'refunded')
                                    Devolvido
                                   @else
                                    Charge
                              @endif</span></p>

					</div>
					<div class="col-md-10">

						<form enctype="multipart/form-data" method="POST" action="atualizar-pedido/{$peido->id}">
							 <div class="form-group">
							    <label for="exampleSelect1">Escolha o status</label>
							    <select class="form-control" id="andamento" name="andamento">
							      
							      <option value="pending">Pendente</option>
							      <option value="approved">Aprovado</option>
							      <option value="in_process">Processando</option>
							      <option value="in_mediation">Mediado</option>
							      <option value="rejected">Rejeitado</option>
							      <option value="cancelled">Cancelado</option>
							      <option value="refunded">Devolvido</option>
							      <option value="charged_back">Charge</option>

							    </select>
							</div>
							<button type="submit" class="btn btn-primary">Editar</button>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>


@endsection