<div id="sidebar-wrapper" style="top:85px;">
  <ul class="sidebar-nav">
    @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)

      <li class="sidebar-brand">
          <ul>
            <a href="#" onclick="document.getElementById('bloquea').style.display='block'">
              <li id="userbar"><img src="{{ URL::asset('images/ico/usericonmenu.png') }}" alt="">username</li>
            </a>
            <a href=".cajero" data-toggle="modal">
              <li id="userbalance"><img src="{{ URL::asset('images/ico/menucoin.png') }}" alt="">Balance:  Bs.</li>
              <li id="userbonus"><img src="{{ URL::asset('images/ico/mas2.png') }}" alt="">Bono:  Bs.</li>
            </a>
          </ul>
      </li>
      <li id="lobbyM" class="active" onclick="document.getElementById('bloquea').style.display='block'">
        {!! Html::link('usuario', 'Lobby') !!}
      </li>
      <li id="teamsM" onclick="action(3,0)">
          <a>Equipos</a>
      </li>
      <li id="competitionsM" onclick="document.getElementById('bloquea').style.display='block'">
        {!! Html::link('usuario/mis-competiciones', 'Competiciones') !!}
      </li>
      @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2 && Auth::user()::STATUS_ACTIVE)

        <li class="sidebar-brand">
          <ul>
            <a href="perfil" onclick="document.getElementById('bloquea').style.display='block'">
              <li id="userbar"><img src="{{ URL::asset('images/ico/usericonmenu.png') }}" alt="">username</li>
            </a>
            <a href="cajero">
              <li id="userbalance"><img src="{{ URL::asset('images/ico/menucoin.png') }}" alt="">Balance:  Bs.</li>
            </a>
          </ul>
        </li>
        <li id="lobbyM" class="active" onclick="document.getElementById('bloquea').style.display='block'">
          {!! Html::link('afiliado', 'Home') !!}
        </li>
      @else
      <li id="userbalance2">
        <a href="registro"><p>Regístrese</p></a>
      </li>
      <li id="userlogin">
        <a href=".login" data-toggle="modal"><p>Ingrese</p></a>
      </li>
      <li onclick="document.getElementById('bloquea').style.display='block'">
        {!! Html::link('/', 'Lobby') !!}
      </li>
      <li onclick="action(3,1)">
        <a>Equipos</a>
      </li>
      <li onclick="login(4)">
        <a>Competiciones</a>
      </li>
    @endif

    <li id="promotionsM" onclick="document.getElementById('bloquea').style.display='block'">
      <a href="">Promociones</a>
    </li>
    @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)

      <li id="menuside"><a href="#">Cajero</a>
        <ul>
          <li onclick="document.getElementById('bloquea').style.display='block'">
            {!! Html::link('usuario/transferencia', 'Transferencia') !!}
          </li>
          <!--<li onclick="document.getElementById('bloquea').style.display='block'">
            {!! Html::link('usuario/cajero', 'Tarjeta de Crédito') !!}
          </li>-->
          <li onclick="document.getElementById('bloquea').style.display='block'">
            <a href="cajero">Cobra</a>
          </li>
        </ul>
      </li>
    @endif
    <li id="contactoM">
      <a href=".contacto" data-toggle="modal">Contáctanos</a>
    </li>
    @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)

      <li id="referirM" onclick="document.getElementById('bloquea').style.display='block'">
        {!! Html::link('usuario/referir-amigo', 'Referir Amigo') !!}
      </li>
        <li id="historialM" onclick="document.getElementById('bloquea').style.display='block'">
          <a href="">Historial</a>
        </li>
      <li style="margin-bottom: 150px;" onclick="document.getElementById('bloquea').style.display='block'">
        {!! Html::link('logout', 'Cerrar Sesión', array('id'=>'Cerrarmenu')) !!}
      </li>
    @endif
    @if(empty(Auth::user()->id_tipousuario) && !Auth::check())
        <li id="menuside2"> Cambiar país
          <ul>
            <!--<li onclick="document.getElementById('bloquea').style.display='block'">
              <a href="https://fantasycobra.com.ve/lobby" class="dropdown-item"><img src="images/ico/venico.png" alt="">Venezuela</a>
            </li>-->
            <li onclick="document.getElementById('bloquea').style.display='block'">
              <a href="http://fantasycobra.com/lobby" class="dropdown-item"><img src="images/ico/interico.png" alt="">Internacional</a>
            </li>
          </ul>
        </li>
    @endif


  </ul>
</div>
