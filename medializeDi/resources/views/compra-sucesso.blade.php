@extends('layouts/master')

@section('titulo')
	 Pagamento bem sucedido!
@stop

@section('conteudo')
<div class="c-layout-page">
<!-- BEGIN: PAGE CONTENT -->
<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h1 class="c-font-uppercase c-font-sbold">Pagamento bem sucedido!</h1>
            
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li>
                <a href="/">Home</a>
            </li>
            <li>/</li>
            <li>
                <a>Pagamento bem sucedido!</a>
            </li>
            
        </ul>
    </div>
</div>
<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

</div>

<div class="clear">
       </div>

       <!-- BEGIN: PAYMENT/OK-0 -->

        <div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
            <div class="container">
                <div class="c-shop-order-complete-1 c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">
                    <div class="c-content-title-1">
                        <h3 class="c-center c-font-uppercase c-font-bold">PAGAMENTO BEM SUCEDIDO :D</h3>
                        <div class="c-line-center c-theme-bg"></div>
                    </div>
                    <div class="c-theme-bg">
                        <p class="c-message c-center c-font-white c-font-20 c-font-sbold">
                            <i class="fa fa-check"></i> Obrigado pela confiança, seu pedido foi recebido! </p>
                    </div>
                    <!-- BEGIN: ORDER SUMMARY -->
                    <div class="row c-order-summary c-center">
                        <ul class="c-list-inline list-inline">
                            <li>
                                <h3>ID da transação</h3>
                                <p>HZ142Wy12V65745A8G</p>
                            </li>
                            <li>
                                <h3>Data da compra</h3>
                                <p>07/02/2017</p>
                            </li>
                            <li>
                                <h3>Valor pago</h3>
                                <p>$00.00</p>
                            </li>
                            <li>
                                <h3>Gateway de pagamento</h3>
                                <p>PayPal</p>
                            </li>
                        </ul>
                    </div>
                    <!-- END: ORDER SUMMARY -->
                    <!-- BEGIN: BANK DETAILS -->
                    <div class="c-bank-details c-margin-t-30 c-margin-b-30">
                        <p class="c-margin-b-20">Nossa equipe do setor de processamento entrará em ação para entregar o serviço <strong> mais rápido possível</strong> ou até o previsto estipulado na tabela de preços.</p>

                        <p class="c-margin-b-20">Recomendamos que você conheça outras soluções em marketing logo abaixo escolhendo alguma das mídias dos <strong>serviços em destaque</strong>, ou até mesmo receber grandes ofertas cadastrando-se em nossa <strong>Newsletter</strong>.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- END: PAYMENT/OK-0 -->

</div>
<!-- END: PAGE CONTAINER -->
<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-8 -->

@include('layouts/cards')
@include('layouts/newsletter')

@stop