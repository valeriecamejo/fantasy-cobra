<?php
    //Para que se ejecute el script la hora de Venezuela
    setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
    //date_default_timezone_set('America/Asuncion');
    date_default_timezone_set('Etc/GMT+4');
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}">
        <title>Fantasy Cobra</title>
        <!-- core CSS -->
        {!! Html::style('bootstrap/css/bootstrap.min.css', array('media' => 'screen')) !!}
        {!! Html::style('bootstrap/css/font-awesome.min.css', array('media' => 'screen')) !!}
        {!! Html::style('bootstrap/css/animate.min.css', array('media' => 'screen')) !!}

        {!! Html::style('bootstrap/css/owl.transitions.css', array('media' => 'screen')) !!}
        {!! Html::style('bootstrap/css/prettyPhoto.css', array('media' => 'screen')) !!}
        {!! Html::style('bootstrap/css/main.css', array('media' => 'screen')) !!}
        {!! Html::style('bootstrap/css/responsive.css', array('media' => 'screen')) !!}
        {!! Html::style('bootstrap/css/simple-sidebar.css', array('media' => 'screen')) !!}
        {!! Html::style('bootstrap/css/jquery-ui.min.css', array('media' => 'screen')) !!}

        <!--JS-->
        {!! Html::script('bootstrap/js/jquery.js') !!}
        {!! Html::script('bootstrap/js/deposit.js') !!}
        {!! Html::script('bootstrap/js/competition.js') !!}
        {!! Html::script('bootstrap/js/jquery-ui.min.js') !!}
        {!! Html::script('bootstrap/js/date.js') !!}
        {!! Html::script('bootstrap/js/messageanimate.js') !!}
        {!! Html::script('bootstrap/js/sports.js') !!}
        {!! Html::script('bootstrap/js/login.js') !!}

        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head>

    <body id="home" class="homepage">
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KC5MQD"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KC5MQD');</script>
        <!-- End Google Tag Manager -->

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
                        <a class="navbar-brand" href="#" onclick="document.getElementById('bloquea').style.display='block'">
                          {!! Html::image('images/logo.png','logo', array('class'=>'mg-responsive')) !!}
                        </a>
                    </div>
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
                                <li id="lobby" class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('usuario','Lobby') !!}</li>
                                <li id="teams" class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('usuario/ver-equipos', 'Equipos') !!}</li>
                                <li id="competitions" class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('usuario/ver-mis-competiciones', 'Competiciones') !!}</li>
                                <li id="promotions" class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('usuario/ver-promociones', 'Promociones') !!}</li>
                            @else
                                <li class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('/','Lobby') !!}</li>
                                <li class="scroll"><a onclick="login(3)">Equipos</a></li>
                                <li class="scroll"><a onclick="login(4)">Competiciones</a></li>
                                <li class="scroll"><a onclick="login(5)">Promociones</a></li>
                            @endif

                            <li class="scroll" style="display:none;" onclick="document.getElementById('bloquea').style.display='block'"><a href="#portfolio">¿Cómo jugar?</a></li>
                            <li class="scroll" style="display:none;" onclick="document.getElementById('bloquea').style.display='block'"><a href="#meet-team">Consejos</a></li>
                            <li class="scroll" id="Contactomenu"><a href=".contacto" data-toggle="modal">Contáctanos</a></li>
                            <li class="scroll" id="Cajero2"><a href=".cajero" data-toggle="modal">Cajero</a></li>
                            <li class="scroll" id="Cajero">
                                <a href=".cajero" data-toggle="modal">
                                    {!! Html::image('images/Cajero.png','cajero') !!}
                                </a>
                            </li>
                            <!-- Secciones con Inicio de Sesion -->
                            @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
                                <li class="dropdown dropdown-hover">
                                    <a href="#blog" class="dropdown-toggle" data-toggle="dropdown">
                                <span id="userbar"><?php echo Auth::user()->username?>
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
                                            <a href="#">Historial</a>
                                        </li>
                                        <li onclick="document.getElementById('bloquea').style.display='block'">
                                            {!! Html::link('usuario/referir-amigo', 'Referir Amigo') !!}
                                        </li>
                                        <li onclick="document.getElementById('bloquea').style.display='block'">
                                            <a href="#">Perfil Usuario</a>
                                        </li>
                                        <li onclick="document.getElementById('bloquea').style.display='block'">
                                            <a href="#">Cerrar Sesión</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- ./FIN Secciones con Inicio de Sesion -->
                            @else
                            <!-- Secciones sin Inicio de Sesion -->

                                <li class="scroll" id="Registrese" onclick="document.getElementById('bloquea').style.display='block'"><a href="registro">Regístrese</a></li>
                                <li class="scroll navnohide" id="Ingrese2"><a href=".login" data-toggle="modal">Ingrese</a></li>

                            <!-- ./FIN Secciones sin Inicio de Sesion -->
                            @endif
                        </ul>
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
                        <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="" onclick="document.getElementById('bloquea').style.display='block'">
                          {!! Html::image('images/logo.png','logo', array('class'=>'mg-responsive')) !!}
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')

        <!-- -------------------------------- MODALES -------------------------------- -->
        @include('modal/awards')
        @include('modal/cashier')
        @include('modal/competition')
        @include('modal/contact')
        @include('modal/forgot-password')
        @include('modal/login')
        @include('modal/opponent')
        @include('modal/team')

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
                                @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('usuario','Lobby') !!}
                                    </li>
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('usuario/terminos-y-servicios','Términos y servicios') !!}
                                    </li>
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('usuario/politicas-de-privacidad','Políticas de privacidad') !!}
                                    </li>
                                @else
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('/','Lobby') !!}
                                    </li>
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('terminos-y-servicios','Términos y servicios') !!}
                                    </li>
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('politicas-de-privacidad','Políticas de privacidad') !!}
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-sm-2">
                            <ul class="social-icons">
                                @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('usuario/como-jugar','¿Cómo jugar?') !!}
                                    </li>
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('usuario/reglas','Reglas') !!}
                                    </li>
                                @else
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('como-jugar','¿Cómo jugar?') !!}
                                    </li>
                                    <li onclick="document.getElementById('bloquea').style.display='block'">
                                        {!! Html::link('reglas','Reglas') !!}
                                    </li>
                                @endif
                                    <li>
                                        <a href=".contacto" data-toggle="modal">Contáctanos</a>
                                    </li>
                            </ul>
                        </div>
                        <div class="Siguenos2">Síguenos en nuestras redes:</div>
                        <div class="col-sm-5 redesfoot linkredes2" style="">
                            <ul class="social-icons" style="display: -webkit-inline-box;">
                                <li class="Siguenos">Síguenos en nuestras redes:</li>
                                <li onclick="document.getElementById('bloquea').style.display='block'">
                                    <a href="https://www.facebook.com/fantasycobra/?fref=ts">
                                        {!! Html::image('images/fb2.png') !!}
                                    </a>
                                </li>
                                <li onclick="document.getElementById('bloquea').style.display='block'">
                                    <a href="https://twitter.com/Fantasy_Cobra">
                                        {!! Html::image('images/tw2.png') !!}
                                    </a>
                                </li>
                                <li onclick="document.getElementById('bloquea').style.display='block'">
                                    <a href="https://www.instagram.com/fantasycobra">
                                        {!! Html::image('images/insta2.png') !!}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- begin olark code -->
        <script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
            f[z]=function(){
            (a.s=a.s||[]).push(arguments)};var a=f[z]._={
            },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
            f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
            0:+new Date};a.P=function(u){
            a.p[u]=new Date-a.p[0]};function s(){
            a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
            hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
            return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
            b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
            b.contentWindow[g].open()}catch(w){
            c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
            var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
            b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
            loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
            /* custom configuration goes here (www.olark.com/documentation) */
            olark.identify('1701-656-10-1434');/*]]>*/
        </script>
        <noscript><a href="https://www.olark.com/site/1701-656-10-1434/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
        <!-- end olark code -->

        {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('bootstrap/js/mousescroll.js') !!}
        {!! Html::script('bootstrap/js/smoothscroll.js') !!}
        {!! Html::script('bootstrap/js/jquery.prettyPhoto.js') !!}
        {!! Html::script('bootstrap/js/jquery.isotope.min.js') !!}
        {!! Html::script('bootstrap/js/jquery.inview.min.js') !!}
        {!! Html::script('bootstrap/js/wow.min.js') !!}
        {!! Html::script('bootstrap/js/webservice.js') !!}
        {!! Html::script('bootstrap/js/main.js') !!}
    </body>
</html>
