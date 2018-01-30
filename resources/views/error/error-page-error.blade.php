<?php
//Para que se ejecute el script la hora de Venezuela
setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
date_default_timezone_set('America/Asuncion');
?>
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}">
    <title>Fantasy Cobra</title>
    <!-- core CSS -->
{{ HTML::style('bootstrap/css/bootstrap.min.css', array('media' => 'screen')) }}
{{ HTML::style('bootstrap/css/font-awesome.min.css', array('media' => 'screen')) }}
{{ HTML::style('bootstrap/css/animate.min.css', array('media' => 'screen')) }}

{{ HTML::style('bootstrap/css/owl.transitions.css', array('media' => 'screen')) }}
{{ HTML::style('bootstrap/css/prettyPhoto.css', array('media' => 'screen')) }}
{{ HTML::style('bootstrap/css/main.css', array('media' => 'screen')) }}
{{ HTML::style('bootstrap/css/responsive.css', array('media' => 'screen')) }}
{{ HTML::style('bootstrap/css/simple-sidebar.css', array('media' => 'screen')) }}
{{ HTML::style('bootstrap/css/jquery-ui.min.css', array('media' => 'screen')) }}
{{ HTML::style('bootstrap/css/loader.css', array('media' => 'screen')) }}

<!--JS-->
{{ HTML::script('bootstrap/js/jquery.js') }}
{{ HTML::script('bootstrap/js/deposit.js') }}
{{ HTML::script('bootstrap/js/competition.js') }}
{{ HTML::script('bootstrap/js/jquery-ui.min.js') }}
{{ HTML::script('bootstrap/js/date.js') }}
{{ HTML::script('bootstrap/js/messageanimate.js') }}
{{ HTML::script('bootstrap/js/moment.js') }}
{{ HTML::script('bootstrap/js/team.js') }}
{{ HTML::script('bootstrap/js/password_perfil.js') }}
{{ HTML::script('bootstrap/js/menu.js') }}
{{ HTML::script('bootstrap/js/sports.js') }}
{{ HTML::script('bootstrap/js/login.js') }}
{{ HTML::script('bootstrap/js/responsiveslides.min.js') }}
<!--JS-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body id="home" class="homepage">
<!-- -------------------------------- HEADER DESKTOP -------------------------------- -->
<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <!-- Menu Si Inicio de Sesion -->
        <div class="container Newcontainer">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::action('BettorBaseballController@home') }}" onclick="document.getElementById('bloquea').style.display='block'">
                    {{ HTML::image('images/logo.png','logo', array('class'=>'mg-responsive')) }}
                </a>
            </div>

        </div>
        <!-- Menu con inicio de sesion -->
    </nav>
</header>

<!-- -------------------------------- HEADER MOBILE -------------------------------- -->
<header id="headermovil">
    <nav id="main-menu2" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container Newcontainer">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::action('BettorBaseballController@home') }}" onclick="document.getElementById('bloquea').style.display='block'">
                    {{ HTML::image('images/logo.png','logo', array('class'=>'img-responsive')) }}
                </a>
            </div>
        </div>
    </nav>
</header>
<!-- Abre Wrapper -->
<div id="wrapper">
    <div class="container-fluid Ingresoprin" id="page-content-wrapper">
        <div class="container">
            <h3 class="Titulothank" style="font-size: 45px;margin-bottom: 50px;">¡UPS!</h3>
            <h3 class="thankyoup">¡Qué pena! Algo no salió muy bien.</h3>
            <h4 style="color:#f0c940; font-weight:300;">Por favor recarga Fantasy Cobra.</h4>
            <p><a class="btn btn-primary5 btn-lg" href="https://www.fantasycobra.com.ve/logout" data-toggle="modal">Recarga aquí</a></p>
        </div>
    </div>
</div>
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('bootstrap/js/mousescroll.js') }}
{{ HTML::script('bootstrap/js/smoothscroll.js') }}
{{ HTML::script('bootstrap/js/jquery.prettyPhoto.js') }}
{{ HTML::script('bootstrap/js/jquery.isotope.min.js') }}
{{ HTML::script('bootstrap/js/jquery.inview.min.js') }}
{{ HTML::script('bootstrap/js/wow.min.js') }}
{{ HTML::script('bootstrap/js/main.js') }}
{{ HTML::style('bootstrap/css/personalStyles.css', array('media' => 'screen')) }}
</body>
</html>
