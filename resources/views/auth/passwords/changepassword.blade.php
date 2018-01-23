@extends ('layouts.template')

@section ('content')
  {!! Html::script('js/jquery.prettyPhoto.js') !!}
  {!! Html::script('js/jquery.prettyPhoto.js') !!}

  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <!-- Mensajes de Error -->
    
    <!-- ./Fin mensajes Error -->
    <div class="container nopadrightres">
      <div class="row blockperfil">
        <h3 class="Titregis">CAMBIAR CONTRASEÑA</h3>
        <div class="modal-bodyperfil Top3">
          <div class="boxperfil">
            <div class="datosusuarioperfilbig">
              <p>Usuario: <span><b>{{Auth::user()->username}}</b></span></p>
            </div>
          </div>


          <div class="boxperfil3">
            <form action="{{ url('usuario/cambiar-password') }}" method="POST" class='form-horizontal'>
              {{ csrf_field() }}
              <div class="modal-bodyregis ">
                <div class="boxregis4">
                  <p>Contraseña anterior</p>
                </div>
                <div class="input-group InicioSes5">
                  <input onkeypress="action_password_perfil('')" id="password_perfil" type="password" name="old_password" class="form-control3 control2" placeholder="Escriba su contraseña" aria-describedby="sizing-addon2">
                  @if($errors->has('password'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('password') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
                <div class="Edit" id="password_perfil_action">
                </div>
              </div>

              <div class="modal-bodyregis ">
                <div class="boxregis4">
                  <p>Contraseña Nueva</p>
                </div>
                <div class="input-group InicioSes5">
                  <input onkeypress="action_password_perfil('new')" id="password_perfil_new" type="password" name="password" class="form-control3 control2" placeholder="Escriba una contraseña nueva" aria-describedby="sizing-addon2">
                  @if($errors->has('password'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('password') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
                <div class="Edit" id="password_perfil_action_new">
                </div>
              </div>

              <div class="modal-bodyregis ">
                <div class="boxregis4">
                  <p>Confirmar Contraseña</p>
                </div>
                <div class="input-group InicioSes5">
                  <input onkeypress="action_password_perfil('confirm')" id="password_perfil_confirm" type="password" name="password_confirmation" value="{{Input::old('password_confirmation')}}" class="form-control3 control2" placeholder="Confirme su contraseña" aria-describedby="sizing-addon2">
                  @if($errors->has('password'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('password') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
                <div class="Edit" id="password_perfil_action_confirm">
                </div>
              </div>

          </div>
          <div class="checkschecks">
          </div>

          <div class="divbtncont">
            <button type="submit" class="btn btn-primary3 btn-lg" onclick="document.getElementById('bloquea').style.display='block'">
              Cambiar Contraseña
            </button>
          </div>
          </form>
        </div>
      </div>
    </div><br>
  </div>
  </div>
@stop
