@extends ('layouts.template')

@section ('content')
  {{ Form::open(array('url' => 'usuario/crear-competicion', 'method' => 'post')) }}
  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <div class="container" style="padding-right:0;">
      <div class="row blockingresoregis" style="margin-left:0;">
        <h3 class="Titregis">NUEVA COMPETICIÓN</h3>
        <div class="modal-bodycompe Top6">
          <div class="boxcompe">
            <p>Nombre Competición</p>
            @if($championship == 'lvbp')
              <select class="form-compe2" name="name">
                <option selected="selected">Cerveceros de mi bloque</option>
                <option>Peloteros del Caribe</option>
                <option>Manager de Tribuna</option>
                <option>Los que más saben de béisbol</option>
                <option>Mejores que Ozzie Guillén</option>
                <option>Los Pro</option>
                <option>Para resolver la quincena</option>
                <option>Puro Caraquista Serio</option>
                <option>Los Magallinas</option>
                <option>Los caza Leones</option>
                <option>Magallanes pa´todo el mundo</option>
                <option>Zulianos de corazón</option>
                <option>Tigreros hasta el fin</option>
                <option>La Tribu</option>
                <option>La Perla del Caribe</option>
                <option>Guaros orgullosos</option>
                <option>Pa´encima</option>
                <option>Las sardinitas</option>
                <option>El trabuco</option>
                <option>Liga la oficina</option>
                <option>Los panas</option>
                <option>Luis Aparicio “El Grande”</option>
                <option>Triplecoronado</option>
                <option>El gocho Cy Young</option>
                <option>Los novatos</option>
                <option>Rookies</option>
                <option>Los Puyados</option>
                <option>Puro Lomito</option>
                <option>Los Abonados</option>
                <option>Detrás del Home</option>
                <option>En las gradas</option>
                <option>Los VIP</option>
                <option>MVP's</option>
                <option>Cobra, con Fantasy Cobra</option>
                <option>Los Birreros</option>
                <option>A que no me ganas</option>
                <option>El Grand Slam</option>
                <option>Clase de tabla</option>
                <option>Viernes de Quincena</option>
                <option>Puro Power</option>
                <option>El Señor de los Managers</option>
                <option>Los leñadores</option>
                <option>Billy The Goat</option>
                <option>El Bambino</option>
                <option>The Big Cat</option>
                <option>Los Hitteadores</option>
                <option>Puro Cy Young</option>
                <option>“Y diganle…” que aquí ganan plata</option>
                <option>Fantasy Cobra Adictos</option>
                <option>Los salseros</option>
                <option>Un Juego Serio</option>
                <option>Solo gente seria</option>
                <option>Los MoneyMakers</option>
                <option>Juego Perfecto</option>
                <option>No Hit No Run</option>
              </select>
            @elseif($sport == 'football')
              <select class="form-compe2" name="name">
                <option selected="selected">Pasteleros reloaded</option>
                <option>Madridistas por siempre</option>
                <option>Los azulgranas</option>
                <option>Los dueños de la copa</option>
                <option>Mejores que CR7</option>
                <option>Team Messi</option>
                <option>Team Ronaldo</option>
                <option>Reyes del Fútbol</option>
                <option>Los balón de Oro</option>
                <option>La mano de Dios</option>
                <option>El cabezazo de Zidane</option>
                <option>DT de Grada</option>
                <option>La Rabona</option>
                <option>Hinchas del Fútbol</option>
                <option>90 minutos de pasión</option>
                <option>Manejando la esfera</option>
                <option>Fiebrúos del fútbol</option>
                <option>El que más golea</option>
                <option>Cobra en la cancha</option>
                <option>La barra cervecera</option>
                <option>La Promesa del fútbol</option>
                <option>Los cracks</option>
                <option>La escuadra goleadora</option>
                <option>Arquería de Reyes</option>
                <option>Chute de campeones</option>
              </select>
            @elseif($championship == 'mlb' || $championship == 'lidom')
              <select class="form-compe2" name="name">
                <option selected="selected">Los "Big Papi"</option>
                <option>La Guagua MLB</option>
                <option>Los azulgranas</option>
                <option>Rookie Turbo</option>
                <option>La Saeta Cibaeña</option>
                <option>Dígale que sí a esa plata - Dígale que sí a ese money</option>
                <option>Joyita Defensiva</option>
                <option>Play Ball</option>
                <option>Ampaya Ganador</option>
                <option>Lluvia de Gozo</option>
                <option>Gatitos del Licey</option>
                <option>Mininos del Escogido</option>
                <option>Pura Leña</option>
                <option>Aquí está el Cacao</option>
                <option>Liceistas por siempre</option>
                <option>El filetito deportivo</option>
                <option>Bailalo con swim</option>
                <option>Béisbol de Estrellas</option>
                <option>Orientales de Corazón</option>
                <option>Toros VIP</option>
                <option>Peloteros del Caribe</option>
                <option>Cerveceros de mi bloque</option>
                <option>Los que más saben de béisbol</option>
                <option>Liga "La Oficina"</option>
                <option>Los novatos</option>
                <option>Los puyados</option>
                <option>Los abonados</option>
                <option>En las gradas</option>
                <option>MVP's</option>
                <option>El Bambino</option>
                <option>Los hitteadores</option>
                <option>Puro Cy Young</option>
                <option>Los MoneyMakers</option>
              </select>
            @endif
          </div>
        </div>

        <div class="modal-bodycompe Top5" id="Competipos">
          <div class="boxcompe1">
            <input type="radio" name="duration" checked="true" onclick="duration_competition(0)" value="0"><p>Competición Corta</p>
          </div>
          {{--<div class="boxcompe2">--}}
          {{--<input type="radio" name="duration" onclick="duration_competition(1)" value="1"><p>Competición Larga</p>--}}
          {{--</div>--}}
        </div>

        <div class="modal-bodycompe" id="short_competition">
          <div class="boxcompe" >
            <p>Fecha Inicio</p>
            @if($sport == 'football')
              <select class="form-compe2" name="start_date">
               {{-- @foreach ($dates as $date)
                  --}}{{-- */ $day_week = array("Dom", "Lun", "Mar", "Mie","Jue","Vie","Sab"); /* --}}{{--
                  <option  value="{{$date}}">{{ $day_week[date('w', strtotime($date))].' ' }} {{ date("d-m-Y", strtotime($date)) }}</option>
                @endforeach--}}
              </select>
            @else
              <input type="text" name="start_date" id="datepicker" class="form-compe" placeholder="dd-mm-aaaa" value="{{Input::old('start_date')}}">
            @endif
          </div>
        </div>

        <div class="modal-bodycompe" id="large_competition" style="display:none;">
          <div class="boxcompe1" id="pad-boxcompe">
            <p>Fecha Inicio</p>
            <input type="text" name="start_date2" id="datepicker_1" class="form-compe" placeholder="dd-mm-aaaa" value="{{Input::old('start_date2')}}">
          </div>
          <div class="boxcompe2" id="pad-boxcompe">
            <p>Fecha Fin</p>
            <input type="text" name="finish_date" id="datepicker_2" class="form-compe" placeholder="dd-mm-aaaa" value="{{Input::old('finish_date')}}">
          </div>
        </div>

        <div class="modal-bodycompe Top5" id="Competipos2">
          <div class="boxcompe3">
            <input type="radio" name="privacy" checked="true" onclick="privacy_competition(0)" value="0"><p>Pública</p>
            <p class="compedescrip">Se publica en el lobby y cualquier persona puede unirse.</p>
          </div>
          <div class="boxcompe4">
            <input type="radio" name="privacy" onclick="privacy_competition(1)" value="1"><p>Privada</p>
            <p class="compedescrip">Se publica en el lobby y solo las personas que sepan la clave pueden unirse.</p>
          </div>
        </div>

        <div class="modal-bodycompe" id="private_competition" style="display:none;">
          <div class="boxcompe">
            <p>Contraseña</p>
            <input type="password" placeholder="Introduzca contraseña" class="form-compe2" id="password_competition" name="password">
            <div id="action_password">

            </div>
          </div>
        </div>

        <div class="modal-bodycompe Top4" id="information" style="border-top:none;">
          <div class="boxcompe5">
            <p>Min. Jugadores</p>
            <select class="form-control nobord" name="min_user" id="min_user">
              <option value="2" selected="selected">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="30">30</option>
              <option value="35">35</option>
              <option value="40">40</option>
              <option value="50">50</option>
            </select>
          </div>

          <div class="boxcompe6">
            <p>Máx. Jugadores</p>
            <select class="form-control nobord" name="max_user" id="max_user">
              <option value="2" selected="selected">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="30">30</option>
              <option value="35">35</option>
              <option value="40">40</option>
              <option value="50">50</option>
            </select>
          </div>

          <div class="boxcompe5">
            <p>Entrada</p>
            <select class="form-control nobord" name="cost_entry">
              <option value="500" selected="selected">500 Bs.</option>
              <option value="600">600 Bs.</option>
              <option value="700">700 Bs.</option>
              <option value="800">800 Bs.</option>
              <option value="900">900 Bs.</option>
              <option value="1000">1.000 Bs.</option>
              <option value="1250">1.250 Bs.</option>
              <option value="1500">1.500 Bs.</option>
              <option value="2000">2.000 Bs.</option>
              <option value="2500">2.500 Bs.</option>
              <option value="3000">3.000 Bs.</option>
              <option value="3500">3.500 Bs.</option>
              <option value="4000">4.000 Bs.</option>
              <option value="4500">4.500 Bs.</option>
              <option value="5000">5.000 Bs.</option>
              <option value="6000">6.000 Bs.</option>
              <option value="7000">7.000 Bs.</option>
              <option value="8000">8.000 Bs.</option>
              <option value="9000">9.000 Bs.</option>
              <option value="10000">10.000 Bs.</option>
              <option value="15000">15.000 Bs.</option>
              <option value="20000">20.000 Bs.</option>
            </select>
          </div>
        </div>

        <div class="modal-bodycompe" style="border-bottom: 1px dashed #eec133;">
          <div class="boxcompe">
            <p>Premios</p>
            <select class="form-compe2" name="award" id="awards">

            </select>
          </div>
        </div>
        <input type="hidden" value="{{$sport}}" name="sport">
        <input type="hidden" value="{{$championship}}" name="championship">
        <div class="divbtncont">
          <button type="submit" class="btn btn-primary3 btn-lg">Continuar</button>
        </div>
      </div>
    </div>
  </div>
  {{ Form::close() }}
  {!! Html::script('js/competitions/max_min_user.js') !!}

@stop