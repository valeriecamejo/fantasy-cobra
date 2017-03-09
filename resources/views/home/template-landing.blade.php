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
        {!! Html::script('js/deposit.js') !!}
        {!! Html::script('js/competition.js') !!}
        {!! Html::script('js/jquery-ui.min.js') !!}
        {!! Html::script('js/date.js') !!}
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
                            <li class="scroll" onclick="document.getElementById('bloquea').style.display='block'">{!! Html::link('home','Lobby') !!}</li>
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

        @if(Session::get('danger'))
            <div id="danger" class="alert alert-danger">
              <strong>¡Error! </strong>{{ Session::get('danger') }}
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
        @include('modal/opponent')
        @include('modal/team')

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
                        <li onclick="document.getElementById('bloquea').style.display='block'">
                            {!! Html::link('/','Lobby') !!}
                        </li>
                        <li onclick="document.getElementById('bloquea').style.display='block'">
                            {!! Html::link('terminos-y-servicios','Términos y servicios'); !!}
                        </li>
                        <li onclick="document.getElementById('bloquea').style.display='block'">
                            {!! Html::link('politicas-de-privacidad','Políticas de privacidad'); !!}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <ul class="social-icons">
                        <li onclick="document.getElementById('bloquea').style.display='block'">
                            {!! Html::link('como-jugar','¿Cómo jugar?'); !!}
                        </li>
                        <li onclick="document.getElementById('bloquea').style.display='block'">
                            {!! Html::link('reglas','Reglas'); !!}
                        </li>
                        <li>
                            <a href=".contacto" data-toggle="modal">Contáctanos</a>
                        </li>
                        <li onclick="document.getElementById('bloquea').style.display='block'">
                            {!! Html::link('puntos','Puntos'); !!}
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
                        <li onclick="document.getElementById('bloquea').style.display='block'">
                            <a href="skype:contacto_11689?call">
                              {!! Html::image('images/skype-3.png') !!}
                          </a>
                        </li>
                    </ul>
                </div>

            </div>
        </footer>
        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
                n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
                    document,'script','https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1527940264153802');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1527940264153802&ev=PageView&noscript=1"/></noscript>
        <!-- DO NOT MODIFY -->
        <!-- End Facebook Pixel Code -->

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

        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('js/http://maps.google.com/maps/api/js?sensor=true.js') !!}
        {!! Html::script('js/mousescroll.js') !!}
        {!! Html::script('js/smoothscroll.js') !!}
        {!! Html::script('js/jquery.prettyPhoto.js') !!}
        {!! Html::script('js/jquery.isotope.min.js') !!}
        {!! Html::script('js/jquery.inview.min.js') !!}
        {!! Html::script('js/wow.min.js') !!}
        {!! Html::script('js/webservice.js') !!}
        {!! Html::script('js/main.js') !!}
        {!! Html::script('js/login.js') !!}
    </body>
</html>
