@extends ('layouts.template')

@section ('content')
  {!! Html::script('js/jquery.prettyPhoto.js') !!}
  {!! Html::script('js/jquery.prettyPhoto.js') !!}

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

              <div class="modal-bodyregis">
                <div class="boxregis4">
                  <p>Nombre</p>
                </div>
                <div class="input-group InicioSes5">
                  <input type="text" id="name" name="name" value="{{Auth::user()->name}}" class="form-control3 control2" placeholder="Escriba su número telefónico" aria-describedby="sizing-addon2">
                  @if($errors->has('name'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('name') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
              </div>

              <div class="modal-bodyregis">
                <div class="boxregis4">
                  <p>Apellido</p>
                </div>
                <div class="input-group InicioSes5">
                  <input type="text" id="last_name" name="last_name" value="{{Auth::user()->last_name}}" class="form-control3 control2" placeholder="Escriba su número telefónico" aria-describedby="sizing-addon2">
                  @if($errors->has('last_name'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('last_name') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
              </div>
              
              <div class="modal-bodyregis">
                <div class="boxregis4">
                  <p>Sexo</p>
                </div>
                <div class="input-group radioButtons">
                        <label for="sex0">Hombre 
                          <input type="radio" id="sex0" name="sex" value="0" class="form-control3 control2"  {{ Auth::user()->sex == 0 ? 'checked="checked"' : '' }} aria-describedby="sizing-addon2"> <br>
                        </label>
                        <label for="sex1">Mujer 
                          <input type="radio" id="sex1" name="sex" value="1" class="form-control3 control2"  {{ Auth::user()->sex == 1 ? 'checked="checked"' : '' }} aria-describedby="sizing-addon2"> <br>
                        </label>
                        <label for="sex2">Otro
                          <input type="radio" id="sex2" name="sex" value="2" class="form-control3 control2"  {{ Auth::user()->sex == 2 ? 'checked="checked"' : '' }} aria-describedby="sizing-addon2"> <br>
                        </label>

                  @if($errors->has('sex'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('sex') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
              </div>

              <div class="modal-bodyregis">
                <div class="boxregis4">
                  <p>Cédula - DNI</p>
                </div>
                <div class="input-group InicioSes5">
                  <input type="text" name="dni" value="{{Auth::user()->dni}}" class="form-control3 control2" placeholder="Escriba su número de identificación" aria-describedby="sizing-addon2">
                  @if($errors->has('dni'))
                    <span class="incompleto">×</span>
                    @foreach($errors->get('dni') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                  @endif
                </div>
              </div>

          <div class="modal-bodyregis">
            <div class="boxregis4">
              <p>Teléfono</p>
            </div>
            <div class="input-group InicioSes5">

                @php
                  if (preg_match("/^\+(\d{1,4})-/", Auth::user()->phone,$match) && $match[0]) {
                    $cod_country = $match[1]; 

                  } else {
                    $cod_country = Input::old('cod_country');
                  }

                  if (preg_match("/-(\d{10,13})$/", Auth::user()->phone,$match) && $match[0]) {
                    $phone = $match[1]; 

                  } else {
                    $phone = Input::old('phone');
                  }  

                @endphp

              <input type="text" style="width: 15%" class="form-control" placeholder="00" aria-describedby="sizing-addon2" name="cod_country" maxlength="4" value="{{$cod_country}}" pattern="^(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1|1\d{3})$" required="required">

               <input style="width: 7%" aria-describedby="sizing-addon2" class="form-control" placeholder="-" aria-describedby="sizing-addon2" disabled="true">

              <input type="text" style="width: 58%" class="form-control" placeholder="###########" aria-describedby="sizing-addon2" name="phone" minlength="10" maxlength="13" value="{{$phone}}" required="required">
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
  </div>
  </div>
@stop
