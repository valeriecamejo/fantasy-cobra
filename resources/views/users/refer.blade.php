@extends ('layouts.template')

@section ('content')
<div class="container-fluid Ingresoprin" id="page-content-wrapper">
  <div class="container-fluid Ingresoprinref" id="page-content-wrapper">
    <div class="container">
      <h3 class="Titulo1">REFERIR AMIGOS</h3>
      <div class="row col10 hidden-xs">

        <div class="blockreferir BordAma">
          <div class="Ingresodatosreferir">
            <form action="{{ url('usuario/invite_friends') }}" method="POST" class='form-signin' files='true'>
              {{ csrf_field() }}
              <h3>Invitar por email</h3>
              <h4 id="Subtitulo1">Correo Electrónico</h4>

              <div class="input-group InicioSes">
                <input type="text" name="email" class="form-control" placeholder="Ejemplo@gmail.com" aria-describedby="sizing-addon2">
              </div>
              <div class="" style="margin-top: 15px;">
                <button type="submit" class="btn btn-primary3 btn-lg">Enviar</button>
              </div>
            </form>
          </div>

          <div class="Ingresodatosreferir">
            <h3 style="color: #37c71b;">Compartir link</h3>
            <div class="linkredes">
              <li>
                <a href="javascript:window.open('http%3A%2F%2Fwww.facebook.com%2Fshare.php%3Fu%3Dhttps%3A%2F%2Fwww.fantasycobra.com.ve%2Freferido%2F<?php echo Auth::user()->username ?>', '_blank', 'width=400,height=500');void(0);">
                  {!! Html::image('images/fb2.png') !!}
                </a>
              </li>
              <li>
                <a href="javascript:window.open('http%3A%2F%2Ftwitter.com%2Fhome%3Fstatus=Fantasy%20Cobra%20La%20Nueva%20forma%20de%20apostar%20https%3A%2F%2Fwww.fantasycobra.com.ve%2Freferido%2F<?php echo Auth::user()->username?>', '_blank', 'width=400,height=500');void(0);">
                  {!! Html::image('images/tw2.png') !!}
                </a>
              </li>
            </div>
            <h4 id="Subtitulo1">Link personal</h4>

            <div class="input-group InicioSes">
              @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2)
              <input type="text" class="form-control" value="{{Auth::user()->affiliate->promotional_url}}" aria-describedby="sizing-addon2" readonly style="cursor: text;">
              @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
                <input type="text" class="form-control" value="{{Auth::user()->bettor->url_own}}" aria-describedby="sizing-addon2" readonly style="cursor: text;">
              @endif
            </div>
              <p><i>Copia tu link en Facebook, twitter o en cualquier otra red que prefieras. Cada vez que alguien entra a nuestra página con tu link, y deposita, obtienes un bono sobre su depósito total.</i></p>
            </div>
          </div>
        </div>

        <!------------------------------------------- Mobile -------------------------------------------->
        <div class="row col11 visible-xs" style="margin-left:0px;">

          <div class="blockreferir3 BordAma">
            <div class="Ingresodatosreferir3">
              <form action="{{ url('usuario/invite_friends') }}" method="POST" class='form-signin'>
                {{ csrf_field() }}
                <h3>Invitar por email</h3>
                <h4 id="Subtitulo1">Correo Electrónico</h4>
                <div class="input-group InicioSes">
                  <input type="text" class="form-control" name="email" placeholder="Ejemplo@gmail.com" aria-describedby="sizing-addon2">
                </div>
                <div class="" style="margin-top: 15px;">
                  <button type="submit" class="btn btn-primary3 btn-lg">Enviar</button>
                </div>
              </form>
            </div>
            <div class="Ingresodatosreferir3">
              <h3 style="color: #37c71b;">Compartir link</h3>
              <div class="linkredes">
                <li>
                  <a href="javascript:window.open('http%3A%2F%2Fwww.facebook.com%2Fshare.php%3Fu%3Dhttps%3A%2F%2Fwww.fantasycobra.com.ve%2Freferido%2F<?php echo Auth::user()->username?>', '_blank', 'width=400,height=500');void(0);">
                    {!! Html::image('images/fb2.png') !!}
                  </a>
                </li>
                <li>
                  <a href="javascript:window.open('http%3A%2F%2Ftwitter.com%2Fhome%3Fstatus=Fantasy%20Cobra%20La%20Nueva%20forma%20de%20apostar%20https%3A%2F%2Fwww.fantasycobra.com.ve%2Freferido%2F<?php echo Auth::user()->username?>', '_blank', 'width=400,height=500');void(0);">
                    {!! Html::image('images/tw2.png') !!}
                  </a>
                </li>
              </div>
              <h4 id="Subtitulo1">Link personal</h4>
              <div class="input-group InicioSes">
                @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2)
                  <input type="text" class="form-control" value="{{Auth::user()->affiliate->promotional_url}}" aria-describedby="sizing-addon2" readonly style="cursor: text;">
                @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
                  <input type="text" class="form-control" value="{{Auth::user()->bettor->url_own}}" aria-describedby="sizing-addon2" readonly style="cursor: text;">
                @endif
              </div>
              <p><i>Copia tu link en Facebook, twitter o en cualquier otra red que prefieras. Cada vez que alguien entra a nuestra página con tu link, y deposita, obtienes un bono sobre su depósito total.</i></p>
            </div>
          </div>
        </div>

        <div class="row col7 BRmar hidden-xs">

          <div class="blockreferir2 BordBlan" style="margin-top:30px;">
            <div class="Ingresodatosreferir2">
              <h3 style="color: #e9e9e9;">Balance por Referido</h3>
              <div class="fondotabref">
                <table class="Tablaref">
                  <tr>
                    <td><h5>Ganado este Mes</h5></td>
                    <td><h5>Amigos que Depositaron</h5></td>
                    <td><h5>Bono por Referidos</h5></td>

                  </tr>
                  <tr>
                    <td>
                      @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2)
                        <p>{{Auth::user()->affiliate->referred_friends}} Bs.</p>
                      @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
                        <p>{{Auth::user()->bettor->referred_friends}} Bs.</p>
                      @endif
                    </td>
                    <td>
                      @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2)
                        <p>{{Auth::user()->affiliate->referred_friends_pay}} Bs.</p>
                      @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
                        <p>{{Auth::user()->bettor->referred_friends_pay}}</p>
                      @endif
                    </td>

                    <td class="Bonoref">
                      <p>500 Bs.</p>
                    </td>
                  </tr>

                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid tablafiliado hidden-xs">
          <div>
            <table class="table table-hover table-responsive tabledep2">
              <thead>
                <tr>
                  <th style="width:39%">Referido</th>
                  <th style="width:17%">Estatus</th>
                  <th style="width:17%">Fecha</th>
                  <th style="width:30%">Bono</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="tabtabfiliado">
            <table class="table table-hover table-responsive tabledep2" style="margin-top:-40px;">
              <thead>
                <tr>
                  <th style="width:39%">Referido</th>
                  <th style="width:17%">Estatus</th>
                  <th style="width:17%">Fecha</th>
                  <th style="width:30%">Bono</th>
                </tr>
              </thead>
              <tbody>
                @foreach($refer_friends as $refer_friend)
                <tr>
                  <td id="tdcomp">{{$refer_friend->email}}</td>
                  <td>
                    @if($refer_friend->status == 0)
                    <span style="color: #ff0000">No Registrado</span>
                    @elseif($refer_friend->status == 1)
                    <span style="color: #0c5ee7"> Registrado</span>
                    @else
                    <span style="color: #00ff00"> Depositó</span>
                    @endif
                  </td>
                  <td>{{ date("d-m-Y", strtotime($refer_friend->date)) }}</td>
                  <td>
                    @if($refer_friend->status == 0)
                    0,00
                    @elseif($refer_friend->status == 1)
                    0,00
                    @else
                    {{$refer_friend->bonos}}
                    @endif
                    Bs.
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="afirestab col11 visible-xs">
        <div class="titafi">
          <p>REFERIDOS</p>
        </div>
        <div class="tab-content tab-contentnull tab-contentafi">
          <div role="tabpanel" class="tab-pane fade in active bordyel" id="deporetis">
            <div class="tablemovil">
              <ul>
                @foreach($refer_friends as $refer_friend)
                <li class="tmovliafi">
                  <div class="divicoafi">
                    @if($refer_friend->status == 0)
                    {!! Html::image('images/ico/retiroico2.png') !!}
                    @elseif($refer_friend->status == 1)
                    {!! Html::image('images/ico/registroico2.png') !!}
                    @else
                    {!! Html::image('images/ico/depositoico2.png') !!}
                    @endif
                  </div>
                  <h4 class="h4tmovafi">{{$refer_friend->email}}</h4>
                  <div class="divicoafi">
                    {!! Html::image('images/ico/noesp.png') !!}
                  </div>
                  <div class="tmovdatosafi">
                    <p>
                      <span>Fecha</span>{{ date("d-m-Y", strtotime($refer_friend->date)) }}
                    </p>
                    <p>
                      <span>Bono</span>
                      @if($refer_friend->status == 0)
                      0,00
                      @elseif($refer_friend->status == 1)
                      0,00
                      @else
                      {{$refer_friend->bonos}}
                      @endif
                      Bs.
                    </p>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="divtabfoot">
            <div class="divtabfooty">
            {!! Html::image('images/ico/retiroico2.png','', array('class'=>'Aumenico')) !!}
              <p class="Legend">No Registrado</p>
              {!! Html::image('images/ico/depositoico2.png','', array('class'=>'Aumenico')) !!}
              <p class="Legend">Depositó</p>
              {!! Html::image('images/ico/registroico2.png','', array('class'=>'Aumenico')) !!}
              <p class="Legend">Registrado</p>
            </div>
          </div>
        </div>

        <div class="row col11 visible-xs">
          <div class="blockreferir2 BordBlan" style="margin-top:30px;">
            <div class="Ingresodatosreferir2">
              <h3 style="color: #e9e9e9;">Balance por Referido</h3>
              <div class="fondotabref">
                <table class="Tablaref">
                  <tr>
                    <td><h5>Ganado este Mes</h5></td>
                    <td><h5>Amigos Referidos</h5></td>
                    <td><h5>Bono por Referidos</h5></td>
                  </tr>
                  <tr>
                    <td>
                      @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2)
                        <p>{{Auth::user()->affiliate->referred_friends}} Bs.</p>
                      @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
                        <p>{{Auth::user()->bettor->referred_friends}} Bs.</p>
                      @endif
                    </td>
                    <td>
                      @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2)
                        <p>{{Auth::user()->affiliate->referred_friends_pay}} Bs.</p>
                      @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3)
                        <p>{{Auth::user()->bettor->referred_friends_pay}}</p>
                      @endif
                    </td>
                    <td class="Bonoref"><p>500 Bs.</p></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><br>
      @include('includes/footer-mobile')
    </div>
  </div>
</div>
@stop
