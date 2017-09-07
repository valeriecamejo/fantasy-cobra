<?php
//Para que se ejecute el script la hora de Venezuela
setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
//date_default_timezone_set('America/Asuncion');
date_default_timezone_set('Etc/GMT+4');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Soluciones DDH C.A.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{!! URL::asset('/images/favicon.ico') !!}">
  <title>Fantasy Cobra</title>

  <!--core CSS-->
  {!! Html::style('css/bootstrap.min.css', array('media' => 'screen')) !!}
  {!! Html::style('css/font-awesome.min.css', array('media' => 'screen')) !!}
  {!! Html::style('css/animate.min.css', array('media' => 'screen')) !!}

  {!! Html::style('css/owl.transitions.css', array('media' => 'screen')) !!}
  {!! Html::style('css/prettyPhoto.css', array('media' => 'screen')) !!}
  {!! Html::style('css/main.css', array('media' => 'screen')) !!}
  {!! Html::style('css/responsive.css', array('media' => 'screen')) !!}
  {!! Html::style('css/simple-sidebar.css', array('media' => 'screen')) !!}
  {!! Html::style('css/jquery-ui.min.css', array('media' => 'screen')) !!}
  {!! Html::style('css/loader.css', array('media' => 'screen')) !!}

  <!--JS-->
  <!-- Load jQuery -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  {!! Html::script('js/jquery-ui.min.js') !!}
  {!! Html::script('js/messageanimate.js') !!}
  {!! Html::script('js/moment.js') !!}
  {!! Html::script('js/password_perfil.js') !!}
  {!! Html::script('js/menu.js') !!}
  {!! Html::script('js/sports.js') !!}
  {!! Html::script('js/responsiveslides.min.js') !!}

  @if(App::environment('production'))
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  @else
    {!! Html::script('js/vuejs/vue.js') !!}
    {!! Html::script('js/vuejs/axios.min.js') !!}
  @endif

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
        <!-- Menu Sin Inicio de Sesion -->
        <div class="container Newcontainer">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::action('HomeController@home') }}">
              {!! Html::image('images/logo.png','logo', array('class'=>'mg-responsive')) !!}
            </a>
          </div>
          @include('includes.menu-desktop')
        </div>
        <!-- Menu con inicio de sesion -->
      </nav>
    </header>

    <!-- -------------------------------- HEADER MOBILE -------------------------------- -->
    <header id="headermovil">
      <nav id="main-menu2" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container Newcontainer">
          <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
              {!! Html::image('images/logo.png','logo', array('class'=>'mg-responsive')) !!}
            </a>
          </div>
        </div>
      </nav>
    </header>
    <!-- Abre Wrapper -->
    <div id="wrapper">
      @if(Session::get('message'))
        <div id="danger" class="alert alert-{{Session::get('class')}}" style="margin-top: 10px;">
          {{ Session::get('message') }}
        </div>
      @endif

      @include('includes.menu-mobile')

      @yield('content')
    </div>
    <!--  /Content-wrapper -->

    <!-- -------------------------------- MODALES -------------------------------- -->
    @include('modal/login')
    @include('modal/awards')
    @include('modal/cashier')
    @include('modal/contact')
    @include('modal/forgot-password')
    @include('modal/team')
    @include('modal/sports')

    <!-- -------------------------------- LOADING -------------------------------- -->
    @include('includes/cargando')

    <!-- -------------------------------- FOOTER DESKTOP -------------------------------- -->
    <footer role="contentinfo" class="site-footer oculto-movil" id="colophon">
      <div id="accordion" class="collapse-footer">
        <div class="panel">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="collapsed">
                Más información {!! Html::image('images/arrowd.png','', array('style'=>'padding-bottom:2px;')) !!}
              </a>
            </h4>
          </div>
          <div class="panel-collapse collapse" id="collapseOne" style="height: 0px;">
            <div class="container" id="footer">
              <div class="col-sm-3 logofootres" style="text-align: center;">
                {!! Html::image('images/logo-footer2.png') !!}
              </div>
              <div class="col-sm-2">
                <ul class="social-icons">
                    <li>
                      {!! Html::link('/','Lobby') !!}
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
                      {!! Html::link('puntos','Puntos') !!}
                    </li>
                </ul>
              </div>
              <div class="Siguenos2">Síguenos en nuestras redes:</div>
              <div class="col-sm-5 redesfoot linkredes2" style="">
                <ul class="social-icons" style="display: -webkit-inline-box;">
                  <li class="Siguenos">Síguenos en nuestras redes:</li>
                  <li>
                    <a href="https://www.facebook.com/fantasycobra/?fref=ts">{!! Html::image('images/fb2.png') !!}</a>
                  </li>
                  <li>
                    <a href="https://twitter.com/Fantasy_Cobra">{!! Html::image('images/tw2.png') !!}</a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/fantasycobra">{!! Html::image('images/insta2.png') !!}</a>
                  </li>
                  <li>
                    <a href="skype:contacto_11689?call">{!! Html::image('images/skype-3.png') !!}</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script type="application/ld+json" id="configs">
    {
      "session_lifetime" : {!!  config('session.lifetime') !!}
      }
    </script>
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/jquery.js') !!}
    {!! Html::script('js/mousescroll.js') !!}
    {!! Html::script('js/smoothscroll.js') !!}
    {!! Html::script('js/jquery.prettyPhoto.js') !!}
    {!! Html::script('js/jquery.isotope.min.js') !!}
    {!! Html::script('js/jquery.inview.min.js') !!}
    {!! Html::script('js/wow.min.js') !!}
    {!! Html::script('js/main.js') !!}

    @yield('javascript')
    </body>
</html>


