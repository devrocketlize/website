<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Rocketlize - @yield('titulo')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="Rocketlize, compre curtidas e seguidores para Instagram, curtidas para Facebook, inscritos para YouTube, seguidores para Twitter e SoundCloud." name="description" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="assets/base/css/googlefonts.css" rel='stylesheet' type='text/css'>

        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>


        <link href="{{ url('assets/plugins/socicon/socicon.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/bootstrap-social/bootstrap-social.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/animate/animate.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        
        <!-- BEGIN: BASE PLUGINS  -->
        <link href="{{ url('assets/plugins/revo-slider/css/settings.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/revo-slider/css/layers.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/revo-slider/css/navigation.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/cubeportfolio/css/cubeportfolio.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/owl-carousel/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/fancybox/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/slider-for-bootstrap/css/slider.css')}}" rel="stylesheet" type="text/css" />
        <!-- END: BASE PLUGINS -->
        
        <!-- BEGIN: PAGE STYLES -->
        <link href="{{ url('assets/plugins/ilightbox/css/ilightbox.css')}}" rel="stylesheet" type="text/css" />
        <!-- END: PAGE STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="{{ url('assets/base/css/plugins.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/base/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/base/css/themes/default.css')}}" rel="stylesheet" id="style_theme" type="text/css" />
        <link href="{{ url('assets/base/css/custom.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="{{ url('assets/favicon.ico')}}" />

        <!--Start of Tawk.to Script-->
            <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/58b1bbf293cfd35572fd9591/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            </script>
        <!--End of Tawk.to Script-->

        <style type="text/css">
            .error {

                color: red !important;
            }

            .propColor{

                color: #fff !important;

            }
        </style>

    </head>

    <body class="c-layout-header-fixed c-layout-header-mobile-fixed">
        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        <!-- BEGIN: HEADER -->
        <header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
            <div class="c-navbar">
                <div class="container">
                    <!-- BEGIN: BRAND -->
                    <div class="c-navbar-wrapper clearfix">
                        <div class="c-brand c-pull-left">
                            <a href="/" class="c-logo">
                                <img src="{{ url('assets/base/img/layout/logos/logo-3.png')}}" alt="Rocketlize" class="c-desktop-logo">
                                <img src="{{ url('assets/base/img/layout/logos/logo-3.png')}}" alt="Rocketlize" class="c-desktop-logo-inverse">
                                <img src="{{ url('assets/base/img/layout/logos/logo-3.png')}}" alt="Rocketlize" class="c-mobile-logo"> </a>
                            <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                                <span class="c-line"></span>
                                <span class="c-line"></span>
                                <span class="c-line"></span>
                            </button>
                            <button class="c-topbar-toggler" type="button">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                        </div>
                        <!-- END: BRAND -->
                        <!-- BEGIN: QUICK SEARCH -->
                        <form class="c-quick-search" action="#">
                            <input type="text" name="query" placeholder="Type to search..." value="" class="form-control" autocomplete="off">
                            <span class="c-theme-link">&times;</span>
                        </form>
                        <!-- END: QUICK SEARCH -->
                        <!-- BEGIN: HOR NAV -->
                        <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                        <!-- BEGIN: MEGA MENU -->
                        <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                        <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                            <ul class="nav navbar-nav c-theme-nav">
                                <li class="c-active">
                                    <a href="/" class="c-link dropdown-toggle">Home
                                        <span class="c-arrow c-toggler"></span>
                                    </a>
                                    
                                </li>
                                
                                 @foreach($medias as $media)

                                    <li class="c-menu-type-classic">

                                        <a href="#" class="c-link dropdown-toggle">{{ $media->desc }}<span class="c-arrow c-toggler"></span></a>
                                      
                                          <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                                            
                                                @foreach($media->tiposervico as $tiposervico)
                                                
                                                    <li class="dropdown-submenu">
                                                            <a href="{{ url('/comprar-' . $tiposervico->link . '-' . $media->link) }}">{{ $tiposervico->desc }} <span class="c-arrow c-toggler"></span></a>
                                                    </li>
                                                
                                                @endforeach
                                          
                                          </ul>

                                    </li>

                                @endforeach

                            </ul>
                        </nav>
                        <!-- END: MEGA MENU -->
                        <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                        <!-- END: HOR NAV -->
                    </div>
                </div>
            </div>
        </header>
        <!-- END: HEADER -->
        <!-- END: LAYOUT/HEADERS/HEADER-1 -->

        @yield('conteudo')

        
        <!-- BEGIN: LAYOUT/FOOTERS/FOOTER-8 -->
        <a name="footer"></a>
        <footer class="c-layout-footer c-layout-footer-4 c-bg-footer-8">
            <div class="c-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 c-footer-4-p-right">
                            <!--div class="c-content-title-1">
                               <img src="#" alt="Rocketlize" title="Rocketlize">
                            </div-->
                            <p class="c-about"> <strong>Rocketlize</strong> é uma empresa especializada em marketing digital para agências e (ou) entusiastas que almejam engajamento e destaque em mídias sociais como <strong>Instagram</strong>, <strong>Facebook</strong>, <strong>YouTube</strong>, <strong>Twitter</strong> e <strong>SoundCloud</strong>. </p>
                            <div class="c-links">
                                <ul class="c-nav">
                                    <li>
                                        <a class="c-active c-theme-border c-theme-font" href="/termos-e-politicas">Termos de uso e Políticas de privacidade</a>
                                    </li>
                                   
                                </ul>
                            </div>
                            
                            <div itemscope itemtype="http://schema.org/Person">
                               
                               <p class="propColor" itemprop="email" href="mailto:rocketlize@outlook.com">Atendimento no Skype: rocketlize@outlook.com </p>

                            </div>

                           <!--p class="c-about">Siga-nos!</p>
                            <ul class="c-socials">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                
                            </ul-->
                            <p class="c-about">© 2014 - 2017 Rocketlize - Todos os direitos reservados</p>
                        </div>
                        <div class="col-md-6 c-footer-4-p-left">
                            <div class="c-feedback">
                                <h3 class="c-font-thin">Contato</h3>

                                <div class="result"></div>

                                <form id="contactForm" name="contactForm" method="POST" enctype="multipart/form-data">
                                    
                                    {{ csrf_field() }}
                                    
                                    <input type="text" placeholder="Nome" name="nome" id="nome" class="form-control">
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                    <textarea rows="8" name="menssagem" id="mensagem" placeholder="Mensagem..." class="form-control"></textarea>

                                    <button id="btnSubmit2" type="submit" class="btn c-btn-white c-btn-border-2x c-btn-uppercase btn-lg c-btn-bold c-btn-square">ENVIAR</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END: LAYOUT/FOOTERS/FOOTER-8 -->
        <!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
        <div class="c-layout-go2top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END: LAYOUT/FOOTERS/GO2TOP -->
        <!-- BEGIN: LAYOUT/BASE/BOTTOM -->
        <!-- BEGIN: CORE PLUGINS -->
        <!--[if lt IE 9]>
    <script src="../assets/global/plugins/excanvas.min.js"></script> 
    <![endif]-->
        <script src="{{ url('assets/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/jquery.easing.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/reveal-animate/wow.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/base/js/scripts/reveal-animate/reveal-animate.js')}}" type="text/javascript"></script>
        <!-- END: CORE PLUGINS -->
        <!-- BEGIN: LAYOUT PLUGINS -->
        <script src="{{ url('assets/plugins/revo-slider/js/jquery.themepunch.tools.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/revo-slider/js/jquery.themepunch.revolution.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/revo-slider/js/extensions/revolution.extension.slideanims.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/revo-slider/js/extensions/revolution.extension.layeranimation.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/revo-slider/js/extensions/revolution.extension.navigation.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/revo-slider/js/extensions/revolution.extension.video.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/fancybox/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/smooth-scroll/jquery.smooth-scroll.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/slider-for-bootstrap/js/bootstrap-slider.js')}}" type="text/javascript"></script>
        <!-- END: LAYOUT PLUGINS -->
        <!-- BEGIN: THEME SCRIPTS -->
        <script src="{{ url('assets/base/js/components.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/base/js/jquery.validate.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/base/js/components-shop.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/base/js/app.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            $("#buyerForm").validate({
            
                rules: {
                    
                    nome: {
                        required: true,
                        minlength: 4,
                        maxlength: 15
                    },

                    sobrenome: {
                        required: true,
                        minlength: 4,
                        maxlength: 15
                    },

                    email:{
                        required: true,
                        email: true
                    },
                    termos:{required: true}
                }
                
            });
        </script>
        <script>
            $(document).ready(function()
            {
                App.init(); // init core    
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                    $("#newsMessage").hide();

            });
        </script>

        <script type="text/javascript">
            
            //Subscribe
                
                $("#subscribeForm").on("submit", function (event) {
                    event.preventDefault();

                    //Valida campo vazio
                    
                    if($.trim($('#email').val()) == '' ){
                      
                      alert('Informe um email');
                      return false;

                    }

                    $.ajax({
                        url: "/subscribe",
                        type: "POST",
                        data: $("#subscribeForm").serialize(),
                        dataType: "json"
                    }).done(function(data) {
                        //$(".form-process").hide();
                        //$("#quick-contact-form style").remove();
                        
                        $(".alert").append( "<strong>Parabéns!</strong> Você foi cadastrado em nossa Newsletter!" );
                        $(".alert").show();

                        $("#subscribeFormt").prop('disabled', true);
                        $("#email").prop('disabled', true);
                        $("#btnSubmit").prop('disabled', true);
                    });
                });
             
        </script>

        <script type="text/javascript">
            
            //Contact
                
                $("#contactForm").on("submit", function (event) {
                    event.preventDefault();

                    $.ajax({
                        url: "/contato",
                        type: "POST",
                        data: $("#contactForm").serialize(),
                        dataType: "json"
                    }).done(function(data) {
                        //$(".form-process").hide();
                        //$("#quick-contact-form style").remove();
                        
                        $(".result").append( '<div class="alert alert-info alert-dismissible" role="alert"><strong>Mensagem enviada com sucesso!</strong></div>' );
                        $(".result").show();

                        $("#contactForm").prop('disabled', true);
                        $("#nome").prop('disabled', true);
                        $("#email").prop('disabled', true);
                        $("#mensagem").prop('disabled', true);
                        $("#btnSubmit2").prop('disabled', true);

                    });
                });
             
        </script>

        <!-- END: THEME SCRIPTS -->
        <!-- BEGIN: PAGE SCRIPTS -->
        <script src="{{ url('assets/base/js/scripts/revo-slider/slider-4.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/isotope/isotope.pkgd.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/isotope/imagesloaded.pkgd.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/isotope/packery-mode.pkgd.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/ilightbox/js/jquery.requestAnimationFrame.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/ilightbox/js/jquery.mousewheel.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/plugins/ilightbox/js/ilightbox.packed.js')}}" type="text/javascript"></script>
        <script src="{{ url('assets/base/js/scripts/pages/isotope-gallery.js')}}" type="text/javascript"></script>
        <!-- END: PAGE SCRIPTS -->
        <!-- END: LAYOUT/BASE/BOTTOM -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-64667612-1', 'themehats.com');
  ga('send', 'pageview');
</script>
</body>


</html>