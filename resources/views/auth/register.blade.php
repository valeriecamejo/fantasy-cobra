@extends ('layouts.template')

@section ('content')

  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <form role="form" method="POST" action="{{ URL::action('Auth\RegisterController@register') }}">
      {{ csrf_field() }}
      @if(isset($username))
        <input type="hidden" name="username_referred" value="{{$username}}">
      @endif

      <div class="container" style="padding-right:0;">
        <div class="row blockingresoregis" style="margin-left:0;">
          <h3 class="Titregis">REGÍSTRESE</h3>

          <div class="modal-bodyregis2 Top3">
            <div class="boxregis">
              <p>Nombre</p>
            </div>
            <div class="input-group InicioSes3">
              <input type="text" class="form-control" placeholder="Escriba su nombre" aria-describedby="sizing-addon2" name="name" value="{{Input::old('name')}}">
              @if($errors->has('name'))
                <span class="incompleto">×</span>
                @foreach($errors->get('name') as $error)
                  <span class="messageerror2">{{ $error }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="modal-bodyregis2">
            <div class="boxregis">
              <p>Apellido</p>
            </div>
            <div class="input-group InicioSes3">
              <input type="text" class="form-control" placeholder="Escriba su apellido" aria-describedby="sizing-addon2" name="last_name" value="{{Input::old('last_name')}}">
              @if($errors->has('last_name'))
                <span class="incompleto">×</span>
                @foreach($errors->get('last_name') as $error)
                  <span class="messageerror2">{{ $error }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="modal-bodyregis2">
            <div class="boxregis">
                <p>Cédula</p>
            </div>
            <div class="input-group InicioSes3">
              <input type="text" class="form-control" placeholder="Número de cédula" aria-describedby="sizing-addon2" name="dni" value="{{Input::old('dni')}}">
              @if($errors->has('dni'))
                <span class="incompleto">×</span>
                @foreach($errors->get('dni') as $error)
                  <span class="messageerror2">{{ $error }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="modal-bodyregis2 Top4">
            <div class="boxregis">
                <p>Correo Electrónico</p>
            </div>
            <div class="input-group InicioSes3">
              <input type="text" class="form-control" placeholder="Correo electrónico" aria-describedby="sizing-addon2" name="email" value="{{Input::old('email')}}">
              @if($errors->has('email'))
                <span class="incompleto">×</span>
                @foreach($errors->get('email') as $error)
                  <span class="messageerror2">{{ $error }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="modal-bodyregis2">
            <div class="boxregis">
                <p>Usuario</p>
            </div>
            <div class="input-group InicioSes3">
              <input type="text" class="form-control" placeholder="Nombre de usuario" aria-describedby="sizing-addon2" name="username" value="{{Input::old('username')}}">
              @if($errors->has('username'))
                <span class="incompleto">×</span>
                @foreach($errors->get('username') as $error)
                  <span class="messageerror2">{{ $error }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="modal-bodyregis2">
            <div class="boxregis">
              <p>Teléfono</p>
            </div>
            <div class="input-group InicioSes3">
               <input type="text" style="width: 15%" class="form-control" placeholder="00" aria-describedby="sizing-addon2" name="cod_country" maxlength="4" value="{{Input::old('cod_country')}}" pattern="^(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1|1\d{3})$">

              <input style="width: 7%" aria-describedby="sizing-addon2" class="form-control" placeholder="-" aria-describedby="sizing-addon2" disabled="true">

              <input type="text" style="width: 58%" class="form-control" placeholder="##########" aria-describedby="sizing-addon2" name="phone" maxlength="10" value="{{Input::old('phone')}}" required>
              @if($errors->has('phone') || $errors->has('cod_country'))
                <span class="incompleto">×</span>
                @foreach($errors->get('phone') as $error)
                  <span class="messageerror2">{{ $error }}</span>
                @endforeach
                 @foreach($errors->get('cod_country') as $error)
                  <br><span class="messageerror2">{{ $error }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="modal-bodyregis2 Top4">
            <div class="boxregis">
                <p>Contraseña</p>
            </div>
            <div class="input-group InicioSes3">
              <input type="password" class="form-control" placeholder="Escriba su contraseña" aria-describedby="sizing-addon2" name="password" value="{{Input::old('password')}}">
              @if($errors->has('password'))
                <span class="incompleto">×</span>
                @foreach($errors->get('password') as $error)
                  <span class="messageerror2">{{ $error }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="modal-bodyregis2">
            <div class="boxregis">
                <p>Confirmar Contraseña</p>
            </div>
            <div class="input-group InicioSes3">

              <input type="password" class="form-control" placeholder="Confirme su contraseña" aria-describedby="sizing-addon2" name="password_confirmation" value="{{Input::old('password_confirmation')}}">
              @if($errors->has('password_confirmation'))
                <span class="incompleto">×</span>
                @foreach($errors->get('password_confirmation') as $error)
                  <span class="messageerror2">{{ $error }}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="BlokCodPromocional">
            <h3 class="Titregis">CÓDIGO PROMOCIONAL</h3>
            <div class="input-group InicioSes codigo">
              <input type="text" class="form-control" placeholder="Ingrese el código promocional" aria-describedby="sizing-addon2" name="promo_code" value="{{Input::old('promo_code')}}">
            </div>
          </div>

          <div class="checkschecks">
            <div class="Center4" style="margin-top:25px;">
              <input type="checkbox" name="terms_politics" >
              <p>Acepto los <a href="#">términos</a> y <a href="#">politicas de privacidad.</a></p>
              @if($errors->has('terms_politics'))
                <span class="incompleto3">×</span>
              @endif
            </div>

            <div class="Center4">
              <input type="checkbox" name="adult" >
              <p>Confirmo que soy mayor de 18 años.</p>
              @if($errors->has('adult'))
                <span class="incompleto3">×</span>
              @endif
            </div>
          </div>

          <div class="divbtncont">
            <button type="submit" class="btn btn-primary3 btn-lg">Continuar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
