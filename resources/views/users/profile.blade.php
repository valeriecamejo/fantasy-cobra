@extends ('layouts.template')

@section ('content')
  {!! Html::script('js/jquery.prettyPhoto.js') !!}
  {!! Html::script('js/jquery.prettyPhoto.js') !!}
  {!! Html::script('js/masJavaScript/mask.js') !!}

  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <!-- Mensajes de Error -->

    <!-- ./Fin mensajes Error -->
    <div class="container nopadrightres">
      <div class="row blockperfil">
        <h3 class="Titregis">PERFIL USUARIO</h3>
        <div class="modal-bodyperfil Top3">
          <div class="boxperfil">
            <div class="datosusuarioperfilbig">
              <p>Usuario: <span><b>{{Auth::user()->username}}</b></span></p>
            </div>
          </div>
          <div class="boxperfil2">
            <div class="textoboxperfil2">
              <div class="datosusuarioperfil2">
                <p>Balance:
                  <span><b>
                    @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2)
                        {{ Auth::user()->affiliate->balance }}
                      @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
                        {{Auth::user()->bettor->balance}}
                      @endif
                      Bs.</b>
                  </span>
                </p>
              </div>
              <div class="botonesusuarioperfil2">
                <div class="talignleft">
                  <p>Url personal:</p>
                  <p class="urlbox">
                    @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2)
                      {{Auth::user()->affiliate->promotional_url}}
                    @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
                      {{Auth::user()->bettor->url_own}}
                    @endif
                  </p>
                </div>
                <div id="th25">
                  @if(Auth::user()->user_type_id == 3 and Auth::user()::STATUS_ACTIVE)
                    <a class="btn btn-primary9 btn-lg" href=".cajero" data-toggle="modal">CAJERO</a>
                  @elseif(Auth::user()->user_type_id == 2 and Auth::user()::STATUS_ACTIVE)
                    <a class="btn btn-primary9 btn-lg" href="#">CAJERO</a>
                  @endif
                </div>
                <div id="th26">
                </div>
              </div>
            </div>
          </div>

          <div class="boxperfil3">
            <h3 class="Titperf2">INFORMACIÓN PERSONAL</h3>
            <div class="modal-bodyregis">
              <div class="boxmail">
                <p>Correo electrónico: <span><b>{{Auth::user()->email}}</b></span>
              </div>
            </div>
            <form action="{{ url('usuario/perfil-usuario') }}" method="POST" class='form-horizontal'>
              {{ csrf_field() }}
              <div class="modal-bodyregis ">
                <div class="boxregis4">
                  <p>Contraseña anterior</p>
                </div>
                <div class="input-group InicioSes5">
                  <input onkeypress="action_password_perfil()" id="password_perfil" type="password" name="old_password" class="form-control3 control2" placeholder="Escriba su contraseña" aria-describedby="sizing-addon2">
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
                  <input onkeypress="action_password_perfil()" id="password_perfil" type="password" name="password" class="form-control3 control2" placeholder="Escriba una contraseña nueva" aria-describedby="sizing-addon2">
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
                  <p>Confirmar Contraseña</p>
                </div>
                <div class="input-group InicioSes5">
                  <input onkeypress="action_password_perfil()" id="password_perfil" type="password" name="password_confirmation" value="{{Input::old('password_confirmation')}}" class="form-control3 control2" placeholder="Confirme su contraseña" aria-describedby="sizing-addon2">
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

              <div class="modal-bodyregis">
                <div class="boxregis4">
                  <p>Teléfono</p>
                </div>
                <div class="input-group InicioSes5">
                  <input type="text" id="phone" name="phone" value="{{Auth::user()->phone}}" class="form-control3 control2" placeholder="02128583928" aria-describedby="sizing-addon2">
                  @if($errors->has('phone'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('phone') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
              </div>

              <div class="modal-bodyregis">
                <div class="boxregis4">
                  <p>Cédula</p>
                </div>
                <div class="input-group InicioSes5">
                  <input type="text" name="dni" value="{{Auth::user()->dni}}" class="form-control3 control2" placeholder="19505385" aria-describedby="sizing-addon2">
                  @if($errors->has('dni'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('dni') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
              </div>
          </div>
          <div class="checkschecks">
          </div>

          <div class="divbtncont">
            <button type="submit" class="btn btn-primary3 btn-lg" onclick="document.getElementById('bloquea').style.display='block'">
              GUARDAR
            </button>
          </div>
          </form>
        </div>
      </div>
    </div><br>
    @include('includes/footer-mobile')
  </div>
  </div>
  {!! Html::script('js/masJavaScript/phone.js') !!}
@stop
