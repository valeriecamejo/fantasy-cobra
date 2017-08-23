@extends ('template')

@section ('content') 

  <div id="wrapper"> <!-- Abre Wrapper -->
    @include('includes/menu-mobile')
    <div class="container-fluid Ingresoprin" id="page-content-wrapper">
      {{ Form::open(array('url' => 'login', 'method' => 'post')) }}  
        <div class="container" style="padding-right:0;">
          <h3 class="Titulo1">INGRESO AL SISTEMA</h3>
          <div class="row blockingreso">

            <div class="Ingresodatos">
              <h3 id="Subtitulo1">Correo</h3>

              <div class="input-group InicioSes">
                @if(isset($_COOKIE['correo_usuario']))
                   {{-- */ $correo = $_COOKIE['correo_usuario']; /* --}}

                   {{ Form::email('email',$correo,array('class'=>'form-control', 'placeholder'=>'Escriba su correo electrónico','aria-describedby'=>'sizing-addon2')) }}
                @else
                   {{ Form::email('email','',array('class'=>'form-control', 'placeholder'=>'Escriba su correo electrónico','aria-describedby'=>'sizing-addon2')) }}
                @endif
              </div>

              <h3 id="Subtitulo1">Contraseña</h3>

              <div class="input-group InicioSes">
                {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Escriba su contraseña','aria-describedby'=>'sizing-addon2')) }}
              </div>
            </div>

            <div class="">
              <button class="btn btn-primary3 btn-lg">Ingresar</button>
            </div>

            <div class="Center2">
              <a href="#">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="Center3">
              <span style="color: #e9e9e9; font-weight:300; ">Si no tienes cuenta <a href="#">¡Regístrate aquí!</a></span>
            </div>

            <input type="hidden" class="form-control2" id="route" name="route" value="0">
            <div id="mobile_competition_id">
                ssas
            </div>
            <div id="mobile_competition_date">
ssss
            </div>
            <div id="mobile_competition_input_name">
aas
            </div>
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
@stop

