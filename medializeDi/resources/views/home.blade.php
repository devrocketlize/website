@extends('layouts/forms')

@section('titulo')
    Painel de controle
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
<section class="sectionUn">
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Legenda</div>

                    <div class="panel-body">

                        <span class="label label-default">Pendente</span>
                        <span class="label label-primary">Processando</span>
                        <span class="label label-success">Aprovado</span>
                        <span class="label label-info">Mediado</span>
                        <span class="label label-warning">Rejeitado</span>
                        <span class="label label-danger">Cancelado</span>
                        <span class="label label-danger">Charge/Devolvido</span>


                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Pedidos</div>

                    <div class="panel-body">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Andamento</th>
                              <th>Nome</th>
                              <th>E-mail</th>
                              <th>Whatsapp</th>
                              <th>Whatsapp</th>
                            </tr>
                          </thead>
                          <tbody>
                           @foreach($pedidos as $pedido)
                            <tr>

                              <td>{{$pedido->id}}</td>
                              <td> <span class="

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

                              ">Estado</span></td>    
                              <td>{{$pedido->nomeCliente}}</td>
                              <td>{{$pedido->emailCliente}}</td>
                              <td>{{$pedido->whatsapp}}</td>
                            </tr>

                            @endforeach
                           
                          </tbody>

                        </table>
                        {{$pedidos->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection


<div class="bs-example" data-example-id="table-within-panel"> <div class="panel panel-default"> <div class="panel-heading">Panel heading</div> <div class="panel-body"> <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> </div> <table class="table"> <thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead> <tbody> <tr> <th scope="row">1</th> <td>Mark</td> <td>Otto</td> <td>@mdo</td> </tr> <tr> <th scope="row">2</th> <td>Jacob</td> <td>Thornton</td> <td>@fat</td> </tr> <tr> <th scope="row">3</th> <td>Larry</td> <td>the Bird</td> <td>@twitter</td> </tr> </tbody> </table> </div> </div>