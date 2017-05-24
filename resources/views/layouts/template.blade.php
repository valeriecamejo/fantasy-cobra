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
  <!-- Load jQuery -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  {!! Html::script('js/jquery-ui.min.js') !!}
  {!! Html::script('js/templates/load.js') !!}
  {!! Html::script('js/messageanimate.js') !!}
  {!! Html::script('js/moment.js') !!}
  {!! Html::script('js/password_perfil.js') !!}
  {!! Html::script('js/menu.js') !!}
  {!! Html::script('js/sports.js') !!}
  {!! Html::script('js/responsiveslides.min.js') !!}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.8/handlebars.min.js"></script>

  @if(App::environment('production'))
    <script src="https://unpkg.com/vue"></script>
  @else
  {!! Html::script('js/vuejs/vue.js') !!}
  @endif
   <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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
                  @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('usuario','Lobby') !!}</li>
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('usuario/terminos-y-servicios','Términos y servicios') !!}</li>
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('usuario/politicas-de-privacidad','Políticas de privacidad') !!}</li>
                  @else
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('/','Lobby') !!}</li>
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('terminos-y-servicios','Términos y servicios') !!}</li>
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('politicas-de-privacidad','Políticas de privacidad') !!}</li>
                  @endif
                </ul>
              </div>
              <div class="col-sm-2">
                <ul class="social-icons">
                  @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('usuario/como-jugar','¿Cómo jugar?') !!}</li>
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('usuario/reglas','Reglas') !!}</li>
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('usuario/puntos','Puntos') !!}</li>
                  @else
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('como-jugar','¿Cómo jugar?') !!}</li>
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('reglas','Reglas') !!}</li>
                    <li onclick="document.getElementById('bloquea').style.display='block'">
                      {!! Html::link('puntos','Puntos') !!}</li>
                  @endif
                </ul>
              </div>
              <div class="Siguenos2">Síguenos en nuestras redes:</div>
              <div class="col-sm-5 redesfoot linkredes2" style="">
                <ul class="social-icons" style="display: -webkit-inline-box;">
                  <li class="Siguenos">Síguenos en nuestras redes:</li>
                  <li onclick="document.getElementById('bloquea').style.display='block'"><a
                      href="https://www.facebook.com/fantasycobra/?fref=ts">{!! Html::image('images/fb2.png') !!}</a>
                  </li>
                  <li onclick="document.getElementById('bloquea').style.display='block'"><a
                      href="https://twitter.com/Fantasy_Cobra">{!! Html::image('images/tw2.png') !!}</a></li>
                  <li onclick="document.getElementById('bloquea').style.display='block'"><a
                      href="https://www.instagram.com/fantasycobra">{!! Html::image('images/insta2.png') !!}</a></li>
                  <li onclick="document.getElementById('bloquea').style.display='block'">
                    <a href="skype:contacto_11689?call">{!! Html::image('images/skype-3.png') !!}</a></li>
                </ul>
              </div>
            </div>
          </div>
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


