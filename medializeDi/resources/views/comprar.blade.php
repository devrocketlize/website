@extends('layouts/master')

@section('titulo')
     Efetuar pagamento -  {{ $servico->tiposervico->desc }} no {{ $servico->tiposervico->media->desc }}
@stop

@section('conteudo')
<div class="c-layout-page">
<!-- BEGIN: PAGE CONTENT -->
<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h1 class="c-font-uppercase c-font-sbold">Efetuar pagamento - {{ $servico->tiposervico->desc }} no {{ $servico->tiposervico->media->desc }}</h1>
   
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li>
                <a href="/">Home</a>
            </li>
            <li>/</li>
            <li>
                <a href="{{ url('/comprar-' . $servico->tiposervico->link . '-' . $servico->tiposervico->media->link) }}">Compre {{ucfirst($servico->tiposervico->link)}} no {{ $servico->tiposervico->media->desc }}</a>
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
        <form action="/pagar/{{ $servico->id }}" method="POST" id="buyerForm" class="c-shop-form-1">
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
                                    <input type="text" name="nome" id="nome" class="form-control c-square c-theme" placeholder="Nome"> </div>
                                <div class="col-md-6">
                                    <label class="control-label">Sobrenome</label>
                                    <input type="text" name="sobrenome" id="sobrenome" class="form-control c-square c-theme" placeholder="Sobrenome"> </div>
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
                     @if($servico->plano == 5)
                     <div class="row">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Seu perfil</label>
                                    <input type="text" name="links" maxlength="100" class="form-control c-square c-theme" placeholder="https://instagram.com/seu.perfil"> 
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Sua senha</label>
                                    <input type="password" name="senha" class="form-control c-square c-theme"> 
                                </div>
                            </div>
                        </div>
                    </div>

                     @else
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
                    @endif

                    @if($servico->plano == 5)
                     <div class="row">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Perfis do seguimento</label>
                                    <input type="text" name="perfis" maxlength="100" class="form-control c-square c-theme" placeholder="@fulano, @artista, @empresa"> 
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Hashtags do seguimento</label>
                                    <input type="text" name="hash" maxlength="100" class="form-control c-square c-theme" placeholder="#instaGood, #instaLife, #instaMais"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($servico->plano == 3)
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
                    @endif

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-radio">
                                        <label class="form-radio-label">
                                          <input type="radio" id="metodoPagamento" name="metodoPagamento" value="payPal" checked="true" class="form-radio-input">
                                         Pagar com PayPal 
                                        </label>

                                      </div>

                                      <div class="form-radio">
                                        <label class="form-radio-label">
                                          <input type="radio" id="metodoPagamento" name="metodoPagamento" value="mercadoPago"  class="form-radio-input">
                                         Pagar com MercadoPago 
                                        </label>
                                        
                                      </div>

                                      <div class="form-radio">
                                        <label class="form-radio-label">
                                          <input type="radio" id="metodoPagamento" name="metodoPagamento" value="pagSeguro"  class="form-radio-input">
                                         Pagar com PagSeguro
                                        </label>
                                        
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" id="termos" name="termos" checked="true" class="form-check-input">
                                          Eu li e concordo com os <a href="/termos-e-politicas">Termos de uso e Políticas de privacidade.</a> 
                                        </label>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" id="news" name="news" checked="true" class="form-check-input">
                                         Quero receber novidades e ofertas incríveis em meu endereço de e-mail.
                                        </label>
                                      </div>
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
                                @if($servico->plano == 5)

                                @else
                                <div class="col-md-6 c-font-20">
                                    <h2>Quantidade</h2>
                                </div>
                                @endif
                            </li>
                            <li class="row c-border-bottom"></li>
                            
                            <li class="row c-margin-b-15 c-margin-t-15">
                                <div class="col-md-6 c-font-20">
                                    <a href="shop-product-details.html" class="c-theme-link">{{ $servico->tiposervico->desc }} no {{ $servico->tiposervico->media->desc }}</a>
                                </div>
                                 @if($servico->plano == 5)

                                @else
                                <div class="col-md-6 c-font-20">
                                    <p class="">{{ number_format($servico->quantidade, 0, '', '.') }}</p>
                                </div>
                                @endif
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
                                        <span class="c-shipping-total"> {{ str_replace('.', ',', $servico->preco) }}</span>
                                    </p>
                                </div>
                            </li>
                            
                            <!--li class="row">
                                <div class="col-md-12">
                                    <div class="c-radio-list">
                                        <div class="c-radio">
                                            <input type="radio" id="radio3" class="c-radio" name="payment">
                                            <label for="radio3" class="c-font-bold c-font-20">
                                            <img class="img-responsive" width="250" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"> </div>
                                    </div>
                                </div>
                            </li-->
                           
                            <li class="row">
                                <div class="form-group col-md-12" role="group">
                                    <input type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" value="Pagar" />
                                    <a href="{{ url('/comprar-' . $servico->tiposervico->link . '-' . $servico->tiposervico->media->link) }}
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