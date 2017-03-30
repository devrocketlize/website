@extends('layouts/master')

@section('titulo')
	Comprar {{ $tipo->desc }} no {{ $media->desc }}
@stop

@section('conteudo')
 <!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
    <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h1 class="c-font-uppercase c-font-sbold">{{ $tipo->desc }} {{ $media->desc }}</h1>
                
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>/</li>
                <li>
                    <a>Compre {{ $tipo->desc }} no {{ $media->desc }}</a>
                </li>
                
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
   </div>

   <div class="clear">
   </div>

	<!-- BEGIN: CONTENT/PRICING/PRICING-4 -->

	<div class="container">
	    <div class="row">
	    
	    	@foreach($tipo->servicos as $servico)
		        <div class="col-xs-12 col-sm-6 col-md-3"> 
		            <!-- Price Table Item -->
		            <div class="price-table text-center">
		                <div class="price-table-heading">
		                    <h4 class="title">
		                    @if($servico->plano == 5) Até @endif
		                    {{ number_format($servico->quantidade, 0, '', '.') }} {{ $tipo->desc }}</h4>
		                </div>
		                <div class="price-table-body">
		                    <p class="value">R$ {{ str_replace('.', ',', $servico->preco) }} @if($servico->plano == 5)<small>/mês</small>@endif</p>
		                </div>
		                <ul class="list-group">
		                    
		                    <li class="list-group-item">
		                    	 	@if($servico->plano == 5) 
		                    	 		<strong>Necessário</strong> senha
		                    	 	@else
		                    			<strong>NÃO</strong> precisamos da sua senha
		                    		@endif

		                    </li>

		                    <li class="list-group-item">
		                    		@if($servico->plano == 5) 
		                    	 		Entrega automática
		                    	 	@else
		                    		Entregamos {{ $servico->entrega }} 
		                    		@endif
		                    </li>

		                    <li class="list-group-item">Seu perfil apenas precisa ser público</li>

		                    <li class="list-group-item">Garantimos reembolso</li>

		                    <li class="list-group-item">
		                    		@if($servico->plano == 5) 
		                    	 		Cobrança recorrente
		                    	 	@else
		                    		Entre 1x e 12x no cartão
		                    		@endif
		                    </li>

		                </ul>
		                <div class="price-table-footer"> <a href="{{ url('/comprar-' . $tipo->link . '-' . $media->link . '/'. $servico->seo) }}" class="btn btn-lg c-btn-green c-btn-square c-btn-border-2x">COMPRAR</a> </div>
		            </div>
		            <!-- END Price Table Item -->
		        
		            <!-- START: Will be visible in tablet and mobile devices to make gap between tow price items -->
		            <div class="col-xs-12 col-sm-12 margin-bottom-20"></div>
		            <!-- END: Will be visible in tablet and mobile devices to make gap between tow price items -->
		        </div>
		    @endforeach
	        
	    </div>
	</div>

	<!-- END: CONTENT/PRICING/PRICING-4 -->

	<!-- BEGIN: CONTENT/STEPS/STEPS-1 -->
	<div class="c-content-box c-size-md c-bg-white">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="c-content-title-1 c-margin-b-60">
	                    <h3 class="c-center c-font-uppercase c-font-bold"> Mas como vou adquirir as campanhas com a Rocketlize? </h3>
	                    <div class="c-line-center"></div>
	                    <p class="c-center c-font-uppercase c-font-17"> Não se preocupe, separamos um explicação prévia para você conseguir usufruir dos nossos serviços da melhor maneira possível sem complicações! </p>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-4 col-sm-6 wow animate fadeInLeft">
	                <div class="c-content-step-1 c-opt-1">
	                    <div class="c-icon">
	                        <span class="c-hr c-hr-first">
	                            <span class="fa fa-color fa-3x fa-hand-pointer-o"></span>
	                        </span>
	                    </div>
	                    <div class="c-title c-font-20 c-font-bold c-font-uppercase">1. Escolha o plano desejado</div>
	                    <div class="c-description c-font-17"> Antes de escolher o plano desejado, certifique-se de estar com o seu <strong>perfil público</strong> na rede social desejada (principalmente no Instagram). Pronto, agora poderá escolher e seguir para o próximo passo. </div>
	                   
	                </div>
	            </div>
	            <div class="col-md-4 col-sm-6 wow animate fadeInLeft" data-wow-delay="0.2s">
	                <div class="c-content-step-1 c-opt-1">
	                    <div class="c-icon">
	                        <span class="c-hr">
	                            <span class="fa fa-color fa-3x fa-money"></span>
	                        </span>
	                    </div>
	                    <div class="c-title c-font-20 c-font-bold c-font-uppercase">2. Efetue o pagamento</div>
	                    <div class="c-description c-font-17"> Ao chegar em nossa tela para fornecer as informações que precisamos para processar seu pedido, todo e qualquer <strong>dado passado estará seguro</strong>. O Mercadopago será acionado e você já pode pagar. </div>
	                    
	                </div>
	            </div>
	            <div class="col-md-4 col-sm-12 wow animate fadeInLeft" data-wow-delay="0.4s">
	                <div class="c-content-step-1 c-opt-1">
	                    <div class="c-icon">
	                        <span class="c-hr c-hr-last">
	                           <span class="fa fa-color fa-3x fa-smile-o"></span>
	                        </span>
	                    </div>
	                    <div class="c-title c-font-20 c-font-bold c-font-uppercase">3. Receba o serviço</div>
	                    <div class="c-description c-font-17"> Seu pagamento sendo aprovado, nossa equipe do setor de processamento entrará em ação para entregar o serviço <strong>o mais rápido possível</strong> ou até o previsto estipulado na tabela de preços. </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- END: CONTENT/STEPS/STEPS-1 -->

@include('layouts/newsletter')

@stop

