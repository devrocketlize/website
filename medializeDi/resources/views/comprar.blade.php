@extends('layouts/master')

@section('titulo')
     Efetuar pedido - Teste
@stop

@section('conteudo')
<div class="c-layout-page">
<!-- BEGIN: PAGE CONTENT -->
<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h1 class="c-font-uppercase c-font-sbold">Efetuar pagamento - {{-- $servico->tiposervico->desc --}} no {{-- $servico->tiposervico->media->desc --}}</h1>
   
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li>
                <a href="/">Home</a>
            </li>
            <li>/</li>
            <li>
                <a href="{{-- url('/comprar-' . $servico->tiposervico->link . '-' . $servico->tiposervico->media->link) --}}">Compre {{--ucfirst($servico->tiposervico->link)--}} no {{-- $servico->tiposervico->media->desc --}}</a>
            </li>
            <li>/</li>
            <li>

                <a>Efetuar pagamento</a>
            </li>
            
            
        </ul>
    </div>
</div>
<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

</div>

<div class="clear">
</div>

<div class="c-content-box c-size-lg">
    <div class="container">
        <form action="/pagar/{{ $servico->id }}" method="POST" class="c-shop-form-1">
            {{ csrf_field() }}

            <input type="hidden" name="pagamento" value="mercadopago">
            
            <div class="row">
                <!-- BEGIN: ADDRESS FORM -->
                <div class="col-md-7 c-padding-20">
                    <!-- BEGIN: BILLING ADDRESS -->
                    <h3 class="c-font-bold c-font-uppercase c-font-24">Forneça os dados</h3>
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="nome" class="form-control c-square c-theme" placeholder="Nome"> </div>
                                <div class="col-md-6">
                                    <label class="control-label">Sobrenome</label>
                                    <input type="text" name="sobrenome" class="form-control c-square c-theme" placeholder="Sobrenome"> </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control c-square c-theme" placeholder="seuemail@mail.com"> </div>
                                <div class="col-md-6">
                                    <label class="control-label">Telefone</label>
                                    <input type="tel" name="whatsapp" class="form-control c-square c-theme" placeholder="(99)99999-9999"> </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Link da rede social</label>
                                    <input type="text" name="link" class="form-control c-square c-theme" placeholder="https://instagram.com/seu.perfil"> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Modelo de comentário</label>
                                    <br />
                                    <small>Forneça comentários relacionados ao que você desejaria na caixa abaixo</small>
                                    <textarea name="comentario" rows="10" class="form-control c-square c-theme" > </textarea> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BILLING ADDRESS -->
                </div>
                <!-- END: ADDRESS FORM -->
                <!-- BEGIN: ORDER FORM -->
                <div class="col-md-5">
                    <div class="c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">
                        <h1 class="c-font-bold c-font-uppercase c-font-24">SEU PEDIDO</h1>
                        <ul class="c-order list-unstyled">
                            <li class="row c-margin-b-15">
                                <div class="col-md-6 c-font-20">
                                    <h2>Serviço</h2>
                                </div>
                                <div class="col-md-6 c-font-20">
                                    <h2>Quantidade</h2>
                                </div>
                            </li>
                            <li class="row c-border-bottom"></li>
                            
                            <li class="row c-margin-b-15 c-margin-t-15">
                                <div class="col-md-6 c-font-20">
                                    <a href="shop-product-details.html" class="c-theme-link">Nome do serviço e mídia</a>
                                </div>
                                <div class="col-md-6 c-font-20">
                                    <p class="">1000</p>
                                </div>
                            </li>

                              <li class="row c-margin-b-15 c-margin-t-15">
                                <div class="col-md-6 c-font-20">
                                    <a href="shop-product-details.html" class="c-theme-link">Forma de pagamento</a>
                                </div>
                                <div class="col-md-6 c-font-20">
                                    <p class="">Mercadopago</p>
                                </div>
                            </li>
                          
                           
                            <li class="row c-border-top c-margin-b-15"></li>
                            <li class="row">
                               
                            </li>
                            <li class="row c-margin-b-15 c-margin-t-15">
                                <div class="col-md-6 c-font-20">
                                    <p class="c-font-30">Total</p>
                                </div>
                                <div class="col-md-6 c-font-20">
                                    <p class="c-font-bold c-font-30"> R$
                                        <span class="c-shipping-total">00.00</span>
                                    </p>
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-12">
                                    <div class="c-radio-list">
                                        <div class="c-radio">
                                            <input type="radio" id="radio3" class="c-radio" name="payment">
                                            <label for="radio3" class="c-font-bold c-font-20">
                                            <img class="img-responsive" width="250" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"> </div>
                                    </div>
                                </div>
                            </li>
                            <li class="row c-margin-b-15 c-margin-t-15">
                                <div class="form-group col-md-12">
                                    <div class="c-checkbox">
                                        <input type="checkbox" id="checkbox1-11" class="c-check">
                                        <label for="checkbox1-11">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <input type="checkbox" name="termos class="box" /> Eu li e concordo com os <a href="#">Termos de uso e Políticas de pricacidade</a> </label>
                                    </div>
                                </div>
                            </li>
                            <li class="row">
                                <div class="form-group col-md-12" role="group">
                                    <input type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" value="Pagar" />
                                    <a href="{{-- url('/comprar-' . $servico->tiposervico->link . '-' . $servico->tiposervico->media->link) --}}
                                " class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold"> Cancelar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: ORDER FORM -->
            </div>
        </form>
    </div>
</div>
<!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->
<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-8 -->

@stop