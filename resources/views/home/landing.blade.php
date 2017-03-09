@extends ('home.template-landing')

@section ('content')

<div class="container-fluid gradohome">
    <div class="container Promocont1">
        <img src="images/logosolo.png" alt="">
        <p class="phome1">Construye tu equipo</p>
        <p class="phome2">Cambia la manera de ver el deporte</p>
        <p class="phome3"><!--¡GANA DINERO YA!--></p>
        <p class="phome1">Demuestra tu pasión</p>
        <p><a class="btn btn-primary5 btn-lg" href="#anchor" data-toggle="modal">JUEGA YA</a></p>
    </div>
</div>

<div class="container-fluid negrohome">
    <div class="container">
        <h1 class="phome2"><!--¡MÁS DE <span style="color: #eec133;">1.000.000 BS.</span> PAGADOS!--></h1>
    </div>
</div>

<div class = "container-fluid blanhome">
  <div class = "container">
    <h2 style = "text-align: center; padding-bottom: 20px;" class="fadeInUp wow" data-wow-duration="300ms" data-wow-delay="0ms">¿Cómo jugar?</h2>

      <div class="Ingresodatosiframe" style="padding-top:0px;">
          <iframe class="embed-responsive-item" id="vidmayor" width="560" height="315" src="https://www.youtube.com/embed/tm2KfUJ_htY" frameborder="0" allowfullscreen></iframe>
          <iframe class="embed-responsive-item" id="vidmenor" width="420" height="315" src="https://www.youtube.com/embed/tm2KfUJ_htY" frameborder="0" allowfullscreen></iframe>
          <iframe class="embed-responsive-item" id="vidxs" width="250" height="145" src="https://www.youtube.com/embed/tm2KfUJ_htY" frameborder="0" allowfullscreen></iframe>
      </div>
      <p style="font-style: italic;font-weight: 500;color: #4a4a4a;">¡Juega a <span style="font-weight: 900;color: #eec133;font-size: initial;">Fantasy Cobra</span> en tan sólo 4 pasos! <br>¿Qué esperas?</p>
  </div>
</div>

<div class="container-fluid blanhome2">
  <div class="container">
    <div class="row" style="margin-bottom:50px;">
      <h1>TESTIMONIOS</h1>
      <h3 class="fadeInUp wow" data-wow-duration="300ms" data-wow-delay="100ms">¡De algunos de nuestros ganadores!</h3>
      <div class="features">
        <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
          <div class="media service-box">
            <div class="" style="width:100%; margin-bottom:25px;">
              {!! Html::image('images/ico/icono.png','',array('class' => 'testim')) !!}
            </div>
            <div class="media-body">
              <h4 class="media-heading">Alonso Méndez</h4>
              <!--<h5>Coordinador de FLIPS</h5>-->
              <p>"Saber de béisbol me ha dado la oportunidad de ganar mucho y divertirme en el proceso. En Fantasy Cobra creamos una comunidad de fanáticos interesados por el deporte"</p>
            </div>
          </div>
        </div><!--/.col-md-4-->

        <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="450ms">
          <div class="media service-box">
            <div class="" style="width:100%; margin-bottom:25px;">
              {!! Html::image('images/ico/icono.png','',array('class' => 'testim')) !!}
            </div>
            <div class="media-body">
              <h4 class="media-heading">Iván Aranaga</h4>
              <!--<h5>Mesera de El Fogón de Don Andrés</h5>-->
              <p>"Todos los días participo y le ligo a mis peloteros mientras veo el juego. Cambió la manera de ver el deporte"</p>
            </div>
          </div>
        </div><!--/.col-md-4-->

        <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="550ms">
          <div class="media service-box">
            <div class="" style="width:100%; margin-bottom:25px;">
              {!! Html::image('images/ico/icono.png','',array('class' => 'testim')) !!}
            </div>
            <div class="media-body">
              <h4 class="media-heading">Armando Gutierrez</h4>
              <!--<h5>Padre de familia</h5>-->
              <p>"Me gusta el béisbol, siempre he hecho deportes, ahora puedo vivir mi pasión de otra manera"</p>
            </div>
          </div>
        </div><!--/.col-md-4-->
      </div>
    </div><!--/.row-->
  </div><!--/.container-->
</div>

{!! Form::open(array('url' => 'register-short', 'method' => 'post')) !!}

<a id="anchor"></a>
<div class="container-fluid fondoregistro">
  <div class="container registry fadeInUp wow" data-wow-duration="300ms" data-wow-delay="800ms" style="text-align: -webkit-center;text-align: -moz-center;">
    <p class="phome2 registya">¡REGÍSTRATE YA!</p>

    <div class="regisinput2" style="margin-top: 26px;">
      <p>Correo Electrónico</p>
      <input type="text" placeholder="Correo electrónico" name="email" value="{{ Input::old('email') }}">
      @if($errors->has('email'))
        <span class="incompleto">×</span>
        @foreach($errors->get('email') as $error)
          <span class="messageerror3">{!! $error !!}</span>
        @endforeach
      @endif
    </div>

    <div class="regisinput2">
      <p>Usuario</p>
      <input type="text" placeholder="Nombre de usuario" name="username" value="{{Input::old('username')}}">
      @if($errors->has('username'))
        <span class="incompleto">×</span>
        @foreach($errors->get('username') as $error)
          <span class="messageerror3">{!! $error !!}</span>
        @endforeach
      @endif
    </div>

    <div class="regisinput2" style="margin-bottom: 20px;">
      <p>Contraseña</p>
      <input type="password" placeholder="Ingresa contraseña" name="password" value="{{Input::old('username')}}">
      @if($errors->has('password'))
        <span class="incompleto">×</span>
        @foreach($errors->get('password') as $error)
          <span class="messageerror3">{!! $error !!}</span>
        @endforeach
      @endif
    </div>

    <div class="regisinput2" style="margin-bottom: 20px;">
      <p>Confirmar Contraseña</p>
      <input type="password" placeholder="Confirma contraseña" name="password_repeat">
      @if($errors->has('password_repeat'))
        <span class="incompleto">×</span>
        @foreach($errors->get('password_repeat') as $error)
          <span class="messageerror3">{!! $error !!}</span>
        @endforeach
      @endif
    </div>

    <div class="Center5" style="margin-top:25px; display:block;">
        <div class="checkboxbox" style="width: 100%;">
            <div>
                <input type="checkbox" name="terms_politics" checked="checked">
            </div>
            <div>
                <p>Acepto los {!! Html::link('terminos-y-servicios','términos') !!} y {!! Html::link('politicas-de-privacidad','políticas de privacidad') !!}</p>
            </div>
            @if($errors->has('terms_politics'))
              <span class="messageerror4"></span>
            @endif
        </div>
        <div class="checkboxbox" style="width: 100%;">
            <div>
                <input type="checkbox" name="adult" checked="checked">
            </div>
            <div>
                <p>Confirmo que soy mayor de 18 años.</p>
            </div>
            @if($errors->has('adult'))
                <span class="messageerror4"></span>
            @endif
        </div>
    </div>
    <p class="regisbtn2" style="margin-top:15px;display:-webkit-box;">
      <button type="submit" class="btn btn-primary3 btn-lg">REGÍSTRATE</button>
    </p>

  </div>
  @include('includes/footer-mobile')
</div>
{!! Form::close() !!}

<script>
  $(function(){
    $('a[href*=#]').click(function(){
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname){
          var $target = $(this.hash);
          $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
          if ($target.length) {
          var targetOffset = $target.offset().top;
          $('html,body').animate({scrollTop: targetOffset}, 1000);
          return false;
        }
      }
    });
  });
</script>

@stop
