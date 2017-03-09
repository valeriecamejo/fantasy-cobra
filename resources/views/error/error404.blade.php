<?php
  //Para que se ejecute el script la hora de Venezuela
    setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
    date_default_timezone_set('America/Caracas');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Soluciones DDH C.A.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}">
    <title>Fantasy Cobra</title>

    {{ HTML::style('bootstrap/css/bootstrap.css', array('media' => 'screen')) }}
    {{ HTML::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array('media' => 'screen')) }}
    <!-- Custom styles for this template -->
    {{ HTML::style('bootstrap/css/carousel.css', array('media' => 'screen')) }}
    {{ HTML::style('bootstrap/css/jquery-ui.min.css', array('media' => 'screen')) }}
    {{ HTML::style('bootstrap/css/estilos.css', array('media' => 'screen')) }}
      
      <!-- Custom js for this template -->
    {{ HTML::script('bootstrap/js/jquery.js') }}
    {{ HTML::script('bootstrap/js/resize.js') }}
    {{ HTML::script('bootstrap/js/bootstrap.js') }}
    {{ HTML::script('bootstrap/js/owl.carousel.js') }}
    {{ HTML::script('bootstrap/js/select.js') }}
    {{ HTML::script('bootstrap/js/menu.js') }}

  </head>

  <body>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KC5MQD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KC5MQD');</script>
    <!-- End Google Tag Manager -->

    <div class="stadium-bg">
    
    @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
    {{-- Form::hidden('id', Auth::user()->id); --}}
          <!--BARRA TOP-->
      <nav class="navbar navbar-default navbar-fixed-top HomeBar hidden-xs hidden-sm">
        <div class="col-sm-2">
          <a href="{{URL::action('BettorController@home_bettor')}}">{{ HTML::image('images/Logo_Menu.png','null', array('class'=>'center fullwidth', 'style'=>'outline: medium none; text-decoration: none; width: 100%; clear: both; display: block; border: medium none; height: auto; line-height: 100%; margin: 0px auto 0px 25px; float: left; max-width: 135px;', 'alt'=>'Image', 'title'=>'Image', 'align'=>'center fullwidth', 'border'=>'0', 'width'=>'100%')) }}</a>
        </div>
        <div class="col-sm-6">
              <!--MENU NAVEGACION-->
              <ul class="nav navbar-nav">
                <li>
                  {{ HTML::link('bettor', 'Inicio',array('class' => 'HomeBarLink active','id' => 'inicio','onclick' => 'document.getElementById("bloquea").style.display="block"')); }}
                </li>
                <li>
                  {{ HTML::link('bettor/list_lineups', 'Mis Lineups',array('class' => 'HomeBarLink','id' => 'mislineups','onclick' => 'document.getElementById("bloquea").style.display="block"')); }}
                </li>
                <li>
                  <a href="{{URL::action('BettorController@bettor_list_competition')}}" class="HomeBarLink" id="miscompeticiones" onclick="document.getElementById('bloquea').style.display='block'">Competiciones</a>
                </li>
                <li>
                  {{ HTML::link('bettor/list_tips', 'Cómo Jugar',array('class' => 'HomeBarLink','id' => 'consejo','onclick' => 'document.getElementById("bloquea").style.display="block"')); }}
                </li>
                <li>
                  {{ HTML::link('bettor/list_promotion', 'Promociones',array('class' => 'HomeBarLink','id' => 'promociones','onclick' => 'document.getElementById("bloquea").style.display="block"')); }}
                </li>
              </ul>
              <!--MENU NAVEGACION-->
        </div>
        <div class="col-sm-4 cashier">
              <!--MENU USUARIO-->
              <div class="cashierTitle">
                <a href="{{URL::action('BettorController@deposit')}}" class="cashierLink">Cajero</a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle HomeBarLink">
                    {{Auth::user()->username}}
                    {{ HTML::image('images/user-arrow.png') }}
                  </a>
                  <ul class="dropdown-menu user-dropwdown">
                    <li><a href="#" class="dropdown-link" data-toggle="modal" data-target="#invitaramigo">Invitar amigos</a></li>
                    <li><a href="{{ URL::action('BettorController@edit_bettor', Auth::user()->id) }}" onclick="document.getElementById('bloquea').style.display='block'" class="dropdown-link">Perfil</a></li>
                    <li><a href="{{ URL::action('BettorController@logout_bettor') }}" class="dropdown-link">Cerrar Sesión</a></li>
                  </ul>
                </li>                                                                                           
                <!--DROPDOWN USUARIO-->
                <li class="text-center user-img">
                    <a href="{{ URL::action('BettorController@edit_bettor', Auth::user()->id) }}" onclick="document.getElementById('bloquea').style.display='block'" style="padding:0px">
                    {{ HTML::image('images/user-img.png', "user", array('height' => '40')) }}
                    </a>
                </li>
                <!--BALANCE-->
                <li class="liBalance" onclick="window.location='{{ url("bettor/deposit") }}'">
                  <span class="BalanceTitle">Balance</span>
                  <br>
                  <?php 
                    $id = Auth::user()->id;
                    $result = DB::select('SELECT balance FROM bettor WHERE user_id ='.$id);
                  ?>
                  @foreach ($result as $key => $bettor)
                  <span class="Balance">{{$bettor->balance}} Bs</span>
                  @endforeach
                </li>
                <!--BALANCE-->

              </ul>
              <!--MENU USUARIO-->
        </div>
      </nav>
      <!--BARRA TOP-->
    
      
    @else
      <!--BARRA TOP-->
      <nav class="navbar navbar-default navbar-fixed-top HomeBar hidden-xs hidden-sm">
        <div class="col-sm-2">
          <a href="{{URL::action('HomeController@showWelcome')}}">{{ HTML::image('images/Logo_Menu.png','null', array('class'=>'center fullwidth', 'style'=>'outline: medium none; text-decoration: none; width: 100%; clear: both; display: block; border: medium none; height: auto; line-height: 100%; margin: 0px auto 0px 25px; float: left; max-width: 135px;', 'alt'=>'Image', 'title'=>'Image', 'align'=>'center fullwidth', 'border'=>'0', 'width'=>'100%')) }}</a>
        </div>
        <div class="col-sm-6">
              <!--MENU NAVEGACION-->
              <ul class="nav navbar-nav">
                <li>
                  {{ HTML::link('/', 'Inicio',array('class' => 'HomeBarLink','id' => 'inicio','onclick' => 'document.getElementById("bloquea").style.display="block"')); }}
                </li>
              
                <li><a href="{{URL::action('BettorController@tabshomelineup')}}"  onclick="document.getElementById('bloquea').style.display='block'" class="HomeBarLink">Mis Lineups</a></li>
                <li><a href="{{URL::action('BettorController@tabscompetitions')}}"  onclick="document.getElementById('bloquea').style.display='block'" class="HomeBarLink">Competiciones</a></li>
               
                <li><a href="{{URL::action('HomeController@tips_day')}}" class="HomeBarLink" onclick="document.getElementById('bloquea').style.display='block'" id="consejo">Cómo Jugar</a></li>

                <!--<li><a href="#" class="HomeBarLink">Promociones</a></li>-->

                <li><a href="{{URL::action('HomeController@list_promotion')}}" class="HomeBarLink" id="promociones" onclick="document.getElementById('bloquea').style.display='block'">Promociones</a></li>
              </ul>
              <!--MENU NAVEGACION-->
          </div>
        <div class="col-sm-4 cashier">
              <!--MENU USUARIO-->
              <div class="cashierTitle">
                <a href="{{URL::action('BettorController@tabscajero')}}" class="cashierLink">Cajero</a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="{{URL::action('BettorController@register_bettor')}}" onclick="document.getElementById('bloquea').style.display='block'" class="HomeBarRegLink">REGISTRESE</a>
                <li>

                <li class="text-center user-img">
                  <a href="{{URL::action('BettorController@tabsprofile')}}" onclick="document.getElementById('bloquea').style.display='block'" style="padding:0px">
                  {{ HTML::image('images/user-img.png', "user", array('height' => '40')) }}
                  </a>
                </li>

                <li><a href="#" class="HomeBarLink" data-toggle="modal" data-target="#myModal">INGRESE</a></li>

              </ul>
              <!--MENU USUARIO-->
        </div>
      </nav>
      <!--BARRA TOP-->
      @endif
          PAGNA DE ERROR error404
      @yield('content')

    </div>
     <!--Modal de carga -->
    @include('public/includes/cargando')
    <!--Modal de Inicio de Sesion -->
    @include('public/includes/login')
    <!--Modal Olvido de Contraseña -->
    @include('public/includes/forgotContrasenia')
    <!--Modal Contacto -->
    @include('public/includes/contact')
    <!--Modal Invitar -->
    @include('public/includes/invitaramigo')
    <!--Modal Desafiar -->
    @include('public/includes/desafiaramigo')
    <!--Modal Pago -->
    @include('public/includes/pago')
    
    <!-- FOOTER -->
    <div class="footer hidden-xs hidden-sm">
      <div class="container">
        <div class="row formLine" style="margin-bottom: 10px;">
          <div class="col-sm-5 text-left">
            <a href="#" class="footerLink">Inicio</a><br>
            <!--<a href="#" class="footerLink">Terminos y servicios</a>-->
            <a href="{{URL::action('HomeController@terms_conditions')}}" onclick="document.getElementById('bloquea').style.display='block'" class="footerLink">Términos y servicios</a><br>
            <a href="{{URL::action('HomeController@policy_conditions')}}" onclick="document.getElementById('bloquea').style.display='block'" class="footerLink">Políticas de privacidad</a><br>
            <a href="{{URL::action('HomeController@play_conditions')}}" onclick="document.getElementById('bloquea').style.display='block'" class="footerLink">Cómo Jugar</a><br>
            <a href="{{URL::action('HomeController@rules_conditions')}}" onclick="document.getElementById('bloquea').style.display='block'" class="footerLink">Reglas</a><br>
            <a href="#" class="footerLink" data-toggle="modal" data-target="#contactModal">Contáctanos</a><br>
            <a href="#" class="footerLink" data-toggle="modal" data-target="#pagoModal">Pago-PopUP</a><br>
            @if(Auth::check())
            <a href="#" class="footerLink" data-toggle="modal" data-target="#invitaramigo">Referir Un Amigo</a>
            @endif
          </div>
          <!--<div class="col-sm-3 text-right">
              {{ HTML::image('images/Logo_Footer.png','null', array('class'=>'center fullwidth', 'style'=>'outline: medium none; text-decoration: none; width: 100%; clear: both; display: block; border: medium none; height: auto; line-height: 100%; margin: 0px auto 0px 0px; float: left; max-width: 135px;margin-top: -8px;', 'alt'=>'Image', 'title'=>'Image', 'align'=>'center fullwidth', 'border'=>'0', 'width'=>'100%')) }}
          </div>-->
          <div class="col-sm-3 text-left">
              {{ HTML::image('images/Logo_Footer.png','null', array('class'=>'center fullwidth', 'style'=>'height: auto; max-width: 135px;margin-top: 0px;', 'alt'=>'Image', 'title'=>'Image', 'align'=>'center fullwidth', 'border'=>'0', 'width'=>'100%')) }}
          </div>
          <div class="col-sm-4 text-right">
            Sigue nuestras redes<br><br>
            <a href="https://www.facebook.com/fantasycobra/?fref=ts" target="_blank">
              {{ HTML::image('images/facebook-new.png', "facebook", array('class' => 'SocialFooter')) }}
            </a>
            <a href="https://twitter.com/Fantasy_Cobra" target="_blank">
              {{ HTML::image('images/twitter-new.png', "Twitter", array('class' => 'SocialFooter')) }}
            </a>
            <a href="https://www.instagram.com/fantasycobra/" target="_blank">
              {{ HTML::image('images/instagram-new.png', "Instagram", array('class' => 'SocialFooter')) }}
            </a>
            <a href="#">
              {{ HTML::image('images/google-plus-new.png', "Google", array('class' => 'SocialFooter')) }}
            </a>
          </div>

        </div>
      </div>
    </div>
    <!--FOOTER-->

    @yield('addjavascript')
  </body>

</html>