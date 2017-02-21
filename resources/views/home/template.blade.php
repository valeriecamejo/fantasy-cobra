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
    <link rel="icon" href="{!! URL::asset('images.favicon.ico') !!}">
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
    {!! Html::script('js/jquery.js') !!}
    {!! Html::script('js/deposit.js') !!}
    {!! Html::script('js/competition.js') !!}
    {!! Html::script('js/jquery-ui.min.js') !!}
    {!! Html::script('js/date.js') !!}
    {!! Html::script('js/messageanimate.js') !!}
    {!! Html::script('js/moment.js') !!}
    {!! Html::script('js/team.js') !!}
    {!! Html::script('js/password_perfil.js') !!}
    {!! Html::script('js/menu.js') !!}
    {!! Html::script('js/sports.js') !!}
    {!! Html::script('js/login.js') !!}
    {!! Html::script('js/responsiveslides.min.js') !!}

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  </head>

  @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()->status==1)
    <body id="home" class="homepage" onmousemove="inactivity()" onkeypress="inactivity()">
    @else
    <body id="home" class="homepage">
  @endif

  <body id="home" class="homepage">
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KC5MQD"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-KC5MQD');
        </script>

<!-- #TODO añadir la vista para los afiliados y administradores -->

  <!-- -------------------------------- HEADER DESKTOP -------------------------------- -->
        <header id="header">
            <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
                            <!-- Secciones con Inicio de Sesion -->
              <div class="container Newcontainer">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#" onclick="document.getElementById('bloquea').style.display='block'">
                          {!! Html::image('images/logo.png','logo', array('class'=>'mg-responsive')) !!}
                        </a>
                    </div>
                    <div class="collapse navbar-collapse navbar-right">
                      <ul class="nav navbar-nav">
                        @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2 && Auth::user()->status==1)
                        @endif
                          <li id="lobby" class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('usuario','Lobby'); !!}</li>
                          <li id="teams" class="scroll"><a onclick="action(3,0)">Equipos</a></li>
                          <li id="competitions" class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('usuario/ver-mis-competiciones','Competiciones'); !!}</li>
                          <li id="promotions" class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('usuario/ver-promociones', 'Promociones'); !!}</li>
                          <li class="scroll" id="Cajero2">
                            <a href=".cajero" data-toggle="modal">Cajero</a>
                          </li>
                          <li class="scroll" id="Cajero">
                            <a href=".cajero" data-toggle="modal">
                            {!! Html::image('images/Cajero.png','cajero') !!}
                            </a>
                          </li>
                           <li class="dropdown dropdown-hover">
                                    <a href="#blog" class="dropdown-toggle" data-toggle="dropdown">
                                    <span id="userbar"><?php echo Auth::user()->username ?>
                                      {!! Html::image('images/arrowd.png','flecha', array('class'=>'icon-arrow-down')) !!}
                                    </span>
                                    <span ></span>
                                    <span id="userbalance">
                                        Balance:

                                        Bs.
                                    </span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <a href=".cajero" data-toggle="modal" class="dropdown-toggle" >
                                            <li class="hide-show">
                                                <b>Balance:</b>

                                                Bs.
                                                <br>
                                                <span class="icon-money-bag">
                                                <b>Bono:</b>

                                                Bs.
                                                </span>
                                            </li>
                                        </a>
                                        <li onclick="document.getElementById('bloquea').style.display='block'">
                                            {!! Html::link('usuario/referir-amigo', 'Referir Amigo'); !!}
                                        </li>
                                        <li onclick="document.getElementById('bloquea').style.display='block'">
                                            <a href="#">Perfil Usuario</a>
                                        </li>
                                        <li onclick="document.getElementById('bloquea').style.display='block'">
                                            <a href= "{{URL::action('UserController@logout')}}">Cerrar Sesión</a>
                                        </li>
                                    </ul>
                                </li>
                      </ul>
                    </div>
      </nav>
      <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
              <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>

            <div class="row">
              @yield('content')
            </div><!--/row-->
          </div><!--/.col-xs-12.col-sm-9-->
        </div><!--/row-->
      </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    {!! Html::script('js/jquery.js') !!}

    {!! Html::script('js/bootstrap.min.js') !!}

  </body>
</html>


