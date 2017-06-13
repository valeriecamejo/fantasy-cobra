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
    <meta name="og:description" content="La Nueva forma de apostar.">
    <meta property="og:title" content="Fantasy Cobra" />
    <meta name="author" content="">

    <link rel="icon" href="{!! URL::asset('images/favicon.ico') !!}">

    <title>Fantasy Cobra</title>
    <!-- core CSS -->
{!! Html::style('css/bootstrap.min.css', array('media' => 'screen')) !!}
{!! Html::style('css/font-awesome.min.css', array('media' => 'screen')) !!}
{!! Html::style('css/animate.min.css', array('media' => 'screen')) !!}

{!! Html::style('css/owl.carousel.css', array('media' => 'screen')) !!}
{!! Html::style('css/owl.transitions.css', array('media' => 'screen')) !!}
{!! Html::style('css/prettyPhoto.css', array('media' => 'screen')) !!}
{!! Html::style('css/main.css', array('media' => 'screen')) !!}
{!! Html::style('css/responsive.css', array('media' => 'screen')) !!}
{!! Html::style('css/simple-sidebar.css', array('media' => 'screen')) !!}
{!! Html::style('css/jquery-ui.min.css', array('media' => 'screen')) !!}

<!--JS-->
{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/jquery-ui.min.js') !!}
{!! Html::script('js/messageanimate.js') !!}

<!--JS-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body id="home" class="homepage">

<header class="headhome">
    <nav id="main-menu" class="navbar navbar-default navbar-home" role="banner">
        <div class="container">
            <div class="navbar-right">
                <ul class="nav navbar-nav navhome">
                    <li class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('lobby','Lobby') !!}</li>
                    <li class="scroll" id="Crearcuenta"><a href="#anchor">Crear cuenta</a></li>
                    <li class="scroll navnohide" id="Ingrese2"><a href=".login" data-toggle="modal">Ingrese</a></li>
                    <li class="scroll navhide" id="Ingrese2"><a href=".login" data-toggle="modal">Ingrese</a></li>
                </ul>
            </div>
        </div>
        <!--/.container-->
    </nav>
    <!--/nav-->
</header>
<!--/header-->

@if(Session::has('danger') || (count($errors) > 0))
    <div id="danger" class="alert alert-danger">
        <strong>¡Por favor verifica los datos ingresados! </strong>{{ Session::get('danger') }}
    </div>
@endif

@yield('content')

<!--TODO agregar el modal de competition

        <!-- -------------------------------- MODALES -------------------------------- -->
@include('modal/awards')
@include('modal/cashier')
@include('modal/contact')
@include('modal/forgot-password')
@include('modal/login')

<!-- -------------------------------- LOADING -------------------------------- -->
@include('includes/cargando')

<!-- -------------------------------- FOOTER DESKTOP -------------------------------- -->
<footer id="footer" class="" style="position: absolute !important; border-top: 5px solid #cd9f3d;">
    <div class="container">
        <div class="col-sm-3 logofootres" style="text-align: center;">
            {!! Html::image('images/logo-footer2.png') !!}
        </div>
        <div class="col-sm-2">
            <ul class="social-icons">
                <li>
                    {!! Html::link('lobby','Lobby') !!}
                </li>
                <li>
                    {!! Html::link('terminos-y-servicios','Términos y servicios') !!}
                </li>
                <li>
                    {!! Html::link('politicas-de-privacidad','Políticas de privacidad') !!}
                </li>
            </ul>
        </div>
        <div class="col-sm-2">
            <ul class="social-icons">
                <li>
                    {!! Html::link('como-jugar','¿Cómo jugar?') !!}
                </li>
                <li>
                    {!! Html::link('reglas','Reglas') !!}
                </li>
                <li>
                    <a href=".contacto" data-toggle="modal">Contáctanos</a>
                </li>
                <li>
                    {!! Html::link('puntos','Puntos') !!}
                </li>
            </ul>
        </div>
        <div class="Siguenos2">Síguenos en nuestras redes:</div>
        <div class="col-sm-5 redesfoot linkredes2" style="">
            <ul class="social-icons" style="display: -webkit-inline-box;">
                <li class="Siguenos">Síguenos en nuestras redes:</li>
                <li>
                    <a href="https://www.facebook.com/fantasycobra/?fref=ts">
                        {!! Html::image('images/fb2.png') !!}
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/Fantasy_Cobra">
                        {!! Html::image('images/tw2.png') !!}
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/fantasycobra">
                        {!! Html::image('images/insta2.png') !!}
                    </a>
                </li>
                <li>
                    <a href="skype:contacto_11689?call">
                        {!! Html::image('images/skype-3.png') !!}
                    </a>
                </li>
            </ul>
        </div>

    </div>
</footer>

{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/http://maps.google.com/maps/api/js?sensor=true.js') !!}
{!! Html::script('js/mousescroll.js') !!}
{!! Html::script('js/smoothscroll.js') !!}
{!! Html::script('js/jquery.prettyPhoto.js') !!}
{!! Html::script('js/jquery.isotope.min.js') !!}
{!! Html::script('js/jquery.inview.min.js') !!}
{!! Html::script('js/wow.min.js') !!}
{!! Html::script('js/main.js') !!}
</body>
</html>
