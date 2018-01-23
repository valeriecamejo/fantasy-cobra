<div class="collapse navbar-collapse navbar-right">
  <ul class="nav navbar-nav">
    @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
      <!-- Secciones con Inicio de Sesion Bettor -->
      <li id="lobby" class="scroll">
        {!! Html::link('lobby','Lobby') !!}
      </li>
      <li id="teams" class="scroll">
        {!! Html::link('usuario/mis-equipos','Equipos') !!}
        <!--<a onclick="action(3,0)"> Equipos </a> -->
      </li>
      <li id="competitions" class="scroll">
        {!! Html::link('usuario/mis-competiciones','Competiciones') !!}
      </li>
      <li id="promotions" class="scroll">
        {!! Html::link('usuario/ver-promociones', 'Promociones') !!}
      </li>

      <li class="scroll" style="display:none;">
        <a href="#portfolio">¿Cómo jugar?</a>
      </li>
      <li class="scroll" style="display:none;">
        <a href="#meet-team">Consejos</a>
      </li>
      <li class="scroll" id="Contactomenu">
        <a href=".contacto" data-toggle="modal">Contáctanos</a>
      </li>

      <li class="scroll" id="Cajero2">
        <a href=".cajero" data-toggle="modal">Cajero</a>
      </li>
      <li class="scroll" id="Cajero">
        <a href=".cajero" data-toggle="modal">{!! Html::image('images/Cajero.png','cajero') !!}</a>
      </li>
      <!-- Secciones dropdown Bettor-->
      <li class="dropdown dropdown-hover">
        <a href="#blog" class="dropdown-toggle" data-toggle="dropdown">
          <span id="userbar">{{Auth::user()->username}}
            {!! Html::image('images/arrowd.png','flecha', array('class'=>'icon-arrow-down')) !!}
          </span>
          <span></span>
          <span id="userbalance">
            Balance: {{ Auth::user()->bettor->balance }} Bs.
          </span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <a href=".cajero" data-toggle="modal" class="dropdown-toggle">
            <li class="hide-show">
              <b>Balance:</b>
              {{ Auth::user()->bettor->balance }} Bs.
              <br>
              <span class="icon-money-bag">
                <b>Bono:</b>
                {{Auth::user()->bettor->bono }} Bs.
              </span>
            </li>
          </a>
          <li>
            <a href="{{ URL::action('HistoryController@history') }}">Historial</a>
          </li>
          <li>
            {!! Html::link('usuario/referir-amigo', 'Referir Amigo') !!}
          </li>
          <li>
            <a href="{{ URL::action('UserController@show_user_profile') }}">Perfil Usuario</a>
          </li>
           <li>
            <a href="{{ URL::action('Auth\ChangePasswordController@show_change_password_form') }}">Cambiar Contraseña</a>
          </li>
          <li>
            <a href="{{ URL::action('Auth\LoginController@logout') }}">Cerrar Sesión</a>
          </li>
        </ul>
      </li>
      <!-- ./FIN Secciones con Inicio de Sesion -->
    @elseif(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==2 && Auth::user()::STATUS_ACTIVE)
    <!-- Secciones con Inicio de Sesion Afiliado-->
      <li class="scroll">
        {!! Html::link('/','Home') !!}
      </li>
      <li class="scroll">
        <a href="#">{!! Html::image('images/Cajero.png','cajero') !!}</a>
      </li>
      <!-- Secciones dropdown Afiliado-->
      <li class="dropdown dropdown-hover">
        <a href="#blog" class="dropdown-toggle" data-toggle="dropdown">
                    <span id="userbar">{{Auth::user()->username}}
                      {!! Html::image('images/arrowd.png','flecha', array('class'=>'icon-arrow-down')) !!}
                    </span>
          <span></span>
          <span id="userbalance">
            Balance: {{ Auth::user()->affiliate->balance }} Bs.
          </span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <a href="#">
            <li class="hide-show">
              <b>Balance:</b> {{ Auth::user()->affiliate->balance }} Bs.
              <br>
            </li>
          </a>
          <li>
            <a href="{{ URL::action('UserController@show_user_profile') }}">Perfil Usuario</a>
          </li>
          <li>
            <a href="{{ URL::action('Auth\LoginController@logout') }}">Cerrar Sesión</a>
          </li>
        </ul>
      </li>
      <!-- ./FIN Secciones con Inicio de Sesion -->
    @else
    <!-- Menu sin Sesion -->
      <li class="scroll">
        {!! Html::link('/','Lobby') !!}
      </li>
      <li class="scroll">
        <a href=".login" data-toggle="modal">Equipos</a>
      </li>
      <li class="scroll">
        <a href=".login" data-toggle="modal">Competiciones</a>
      </li>
      <li class="scroll">
        <a href=".login" data-toggle="modal">Promociones</a>
      </li>
      <li class="scroll" id="Cajero2">
        <a href=".login" data-toggle="modal">Cajero</a>
      </li>
      <li class="scroll" id="Cajero">
        <a href=".login" data-toggle="modal">{!! Html::image('images/Cajero.png','cajero') !!}</a>
      </li>
      <!-- Secciones sin Inicio de Sesion -->
      <li class="scroll" id="Registrese">
        <a href="/registro">Regístrese</a>
      </li>
      <li class="scroll navnohide" id="Ingrese2">
        <a href=".login" data-toggle="modal">Ingrese</a>
      </li>
      <!-- ./FIN Menu sin Sesion -->
    @endif
  </ul>
</div>
