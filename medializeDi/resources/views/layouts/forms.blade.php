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
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="robots" content="noindex, nofollow">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>

        <link href="{{ url('assets/plugins/bootstrap-social/bootstrap-social.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
       
        <link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        
        <link href="{{ url('assets/plugins/slider-for-bootstrap/css/slider.css')}}" rel="stylesheet" type="text/css" />
      
        <link href="{{ url('assets/base/css/custom.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" />

        <style type="text/css">
        	#logoCenter {
			    width: 50%;
			    margin: 0 auto; 
			}

			.pAlter p{
				color: red !important;
			}
        </style>
        @yield('token')
     </head>
     <body>

     	@yield('conteudo')
  
	    <!--[if lt IE 9]>
		<script src="../assets/global/plugins/excanvas.min.js"></script> 
		<![endif]-->
    <script src="{{ url('assets/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
            $(document).ready(function () {
                    $("#newsMessage").hide();
                     
            });
     </script>

             <script type="text/javascript">
            
            //Subscribe
                
                $("#unsubscribeForm").on("submit", function (event) {
                    event.preventDefault();

                    $.ajax({
                        url: "/unsubscribe",
                        type: "POST",
                        data: $("#unsubscribeForm").serialize(),
                        dataType: "json"
                    }).done(function(data) {
                        //$(".form-process").hide();
                        //$("#quick-contact-form style").remove();
                        
                        $(".pAlter").append( "<p>Removido com sucesso!</p>" );
                        $(".pAlter").show();

                        $("#unsubscribeFormt").prop('disabled', true);
                        $("#email").prop('disabled', true);
                        $("#btnSubmit").prop('disabled', true);
                    });
                });
             
        </script>
        
	</body>
</html>