<!-- BEGIN: CONTENT/MISC/SUBSCRIBE-FORM-1 -->
<div class="c-content-box c-size-sm c-bg-dark">
    <div class="container">
        <div class="c-content-subscribe-form-1">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="c-title c-font-30 c-font-uppercase c-font-bold">Inscreva-se em nossa newsletter</h3>
                    <div class="c-body c-font-16 c-font-uppercase c-font-sbold">Quer receber dicas incríveis de crescimento nas redes sociais? Como bombar seu blog? Quais mídias engajar ao seu site? Ofertas fantásticas? Inscreva-se!</div>
                </div>
                <div class="col-sm-6">
                <div id="newsMessage" class="alert alert-success alert-dismissible"></div>
                    <form method="POST" enctype="multipart/form-data" id="subscribeForm">
                        {{ csrf_field() }}
                        <div class="input-group input-group-lg">
                            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Seu email aqui!">
                            <span class="input-group-btn">
                                <button type="submit" id="btnSubmit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">INSCREVER</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: CONTENT/MISC/SUBSCRIBE-FORM-1 -->