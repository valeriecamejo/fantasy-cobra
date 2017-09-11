<script>
    window.type_play       = '{{$type}}';
    window.championship_id = '{{$championship}}';
    window.team_date       = '{{$date}}';
</script>
@extends ('layouts.template')

@section ('content')

<div id="create">

  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <div class="Enunciado2">
      <h3 class="Titulo1">CREAR NUEVO EQUIPO</h3>
      <h4 style="color:#e9e9e9;font-weight: 300;margin-top: -18px;font-size: 13pt;">Equipo para el día: {{date("d-m-Y", strtotime($date))}}<span style="color:#eec133;"></span></h4>
    </div>

<!--- Form -->
    <form class="form-horizontal" method="POST" action="{{ URL::action('TeamUserController@save_team_edited') }}">
      {{ csrf_field() }}

    <div class="modal-bodycompe">
      <div class="boxcompe">
        <p>Tipo de juego:  {{$type}} </p>
        <!--<select class="form-compe2" name="type_play" id="type_play">
          <option value="REGULAR" >Regular</option>
          <option value="TURBO" selected> Turbo</option>
        </select>
        -->
      </div>
    </div>
    <div class="hidden-xs" style="text-align:left;">
      <!-- abre contcrear -->
      <div class="CuerpoLineup cuerpoheight margrespL1">
        <div class="lineup nopadbot">
          <div class="Usuariolineup" style="text-align:center;text-indent: 0;">Jugadores Disponibles</div>
          <!--<div id="th2">
              <p id="buscar">BUSCAR</p>
              <input type="text" placeholder="Introduzca su nombre" class="filtroequipo">
          </div> -->
          <div>
            <!-- Nav tabs -->
            <div id="tabs">
              {{--<div id="tabs1">--}}
                <ul class="nav nav-tabs entirewidth" role="tablist">
                  <li role="presentation" class="active">
                    <a href="#" aria-controls="home" role="tab" data-toggle="tab" @click="players=allPlayers.PA">PA</a>
                  </li>
                  <li role="presentation">
                    <a href="#" aria-controls="profile" role="tab" data-toggle="tab" @click="players=allPlayers.C">C</a>
                  </li>
                  @if($type == "REGULAR")
                  <li role="presentation">
                    <a href="#" aria-controls="messages" role="tab" data-toggle="tab" @click="players=allPlayers['1B']">1B</a>
                  </li>
                  @endif
                  @if($type == "TURBO")
                  <li role="presentation">
                    <a href="#" aria-controls="messages" role="tab" data-toggle="tab" @click="showPlayers(['2B', 'SS'])">MI</a>
                  </li>
                  @endif
                  @if($type == "REGULAR")
                  <li role="presentation">
                    <a href="#" aria-controls="settings" role="tab" data-toggle="tab" @click="players=allPlayers['2B']">2B</a>
                  </li>
                  @endif
                  @if($type == "TURBO")
                  <li role="presentation">
                    <a href="#" aria-controls="messages" role="tab" data-toggle="tab" @click="showPlayers(['1B', '3B'])">CI</a>
                  </li>
                  @endif
                  @if($type == "REGULAR")
                  <li role="presentation">
                    <a href="#" aria-controls="settings" role="tab" data-toggle="tab" @click="players=allPlayers['3B']">3B</a>
                  </li>
                  @endif
                  @if($type == "REGULAR")
                  <li role="presentation">
                    <a href="#" aria-controls="settings" role="tab" data-toggle="tab" @click="players=allPlayers['SS']">SS</a>
                  </li>
                  @endif
                  <li role="presentation">
                    <a href="#" aria-controls="settings" role="tab" data-toggle="tab" @click="players=allPlayers['OF']">OF</a>
                  </li>
                  <li role="presentation">
                    <a href="#" aria-controls="settings" role="tab" data-toggle="tab" @click="showPlayers('BATS')">BAT</a>
                  </li>
                </ul>
              {{--</div>--}}
            </div>

            <table class="table table-striped2 table-hover2 tablelineup theadhead">
              <thead>
              <tr>
                <th id="pos">POS</th>
                <th id="jug">JUGADOR</th>
                <th id="opo">OPO</th>
                <th id="salario">SALARIO</th>
                <th id="masmas"></th>
              </tr>
              </thead>
            </table>
            <!-- Tab panes -->
            <div class="tab-content tab-contentnull scrollcreate createcontent">
              <div role="tabpanel" class="tab-pane active fade in" id="PAD">
                <list-players :players="players"></list-players>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="CD">

              </div>
              <div role="tabpanel" class="tab-pane fade" id="1BD">

              </div>
              <div role="tabpanel" class="tab-pane fade" id="2BD">

              </div>
              <div role="tabpanel" class="tab-pane fade" id="3BD">

              </div>
              <div role="tabpanel" class="tab-pane fade" id="SSD">

              </div>
              <div role="tabpanel" class="tab-pane fade" id="OFD">

              </div>
              <div role="tabpanel" class="tab-pane fade" id="MID">

              </div>
              <div role="tabpanel" class="tab-pane fade" id="CID">

              </div>
              <div role="tabpanel" class="tab-pane fade" id="BATSD">

              </div>
            </div>
          </div>
          <div id="thth">
            <p style="color:#eec133;text-align:center;width:100%;font-weight:normal;font-size: 10pt;"><i>Selecciona los mejores para tu equipo</i></p>
          </div>
        </div>
      </div>

      <div class="CuerpoLineup cuerpoheight margrespL2">

        <div class="lineup">
          <div class="Usuariolineup" style="text-align:center;text-indent: 0;">
            MI EQUIPO
          </div>
          <div id="th2">
            <p id="salariorestante">Salario Restante:</p>
            <input id="salaryrest" :value="remaining_salary" name="remaining_salary"  class="inputsalario" type="text" readonly>
          </div>
          <table class="table table-striped2 table-hover2 tablelineup theadhead">
            <thead>
            <tr>
              <th id="pos">POS</th>
              <th id="jug">JUGADOR</th>
              <th id="opo">OPO</th>
              <th id="salario">SALARIO</th>
              <th id="masmas"></th>
            </tr>
            </thead>
          </table>
          <!-- Peloteros Seleccionados -->
          <div class="tableequipoheightmax">
            <table class="table table-striped2 table-hover2 tablelineup tableequipoheight">
              <tbody>
              <tr is="my-players"
                  v-for="(myPlayer, index) in myPlayers"
                  :my-player="myPlayer"
                  :count-position="countPosition"
                  :index="index"
                  v-on:remove="myPlayers.splice(index, 1)">
              </tr>
              <tr id="playerPA">
              </tr>
              <tr id="playerC">
              </tr>
              <tr id="player1B">
              </tr>
              <tr id="playerMI">
              </tr>
              <tr id="playerCI">
              </tr>
              <tr id="player2B">
              </tr>
              <tr id="player3B">
              </tr>
              <tr id="playerSS">
              </tr>
              <tr id="playerOF">
              </tr>
              <tr id="playerOF1">
              </tr>
              <tr id="playerOF2">
              </tr>
              </tbody>
            </table>
          </div>
          <div id="thth2">
            <p style="color:white;text-align:center;width:100%;font-weight:normal;font-size: 10pt;margin: 13px 0px;"><i>JUGADORES QUE CONFORMARÁN TU EQUIPO</i></p>
          </div>
        </div>
      </div>
      <div id="th22" class="wid50">
        @if($type == "TURBO")
          <input v-if="myPlayers.length == 5" type="submit" value="Confirmar" class="btn btn-primary2 btn-lg">
        @elseif($type == "REGULAR")
          <input v-if="myPlayers.length == 9" type="submit" value="Confirmar" class="btn btn-primary2 btn-lg">
        @endif
        <input v-else type="submit" value="Confirmar" class="btn btn-primary2 btn-lg disabled">
        <a href="/usuario/mis-equipos" class="btn btn-primary2 btn-return btn-lg">Regresar</a>
        <!--<button type="submit" class="btn btn-primarycan btn-lg" name="cancellineup" onclick="">Limpiar</button>-->
        <input type="hidden" :value="JSON.stringify(myPlayers)" name="myPlayers">
        <input type="hidden" :value="JSON.stringify(currentMyPlayers)" name="currentMyPlayers">
        <div id="button_create"></div>
      </div>
    </div>
    </form>
  <!-- cierre contcrear -->

    <!--    Crear Lineup  Movil     -->
    <form class="form-horizontal" method="POST" action="{{ URL::action('TeamUserController@save_team_edited') }}">
      {{ csrf_field() }}

    <input type='hidden' name="remaining_salary" id="remaining_salary" :value="remaining_salary">
    <input type='hidden' name="myPlayers" :value="myPlayers">

    <div class="restab visible-xs" style="margin-top:30px; margin-bottom: 60px;">
      <div class="linemovbut">
        @if($type == "TURBO")
            <input v-if="myPlayers.length == 5" type="submit" class="btn btn-default btn-primary4" value="CONFIRMAR">
        @elseif($type == "REGULAR")
          <input v-if="myPlayers.length == 9" type="submit" class="btn btn-default btn-primary4" value="CONFIRMAR">
        @endif
        <a href="/lobby" type="submit" class="btn btn-default btn-primary4" name="returnhome">REGRESAR</a>
        <input type="hidden" :value="JSON.stringify(myPlayers)" name="myPlayers">
        <input type="hidden" :value="JSON.stringify(currentMyPlayers)" name="currentMyPlayers">
      </div>
      <ul class="nav nav-tabs nav-tabsnull" role="tablist">
        <li role="presentation" class="active BtnLineup10 respli"><a href="#jugcrear" aria-controls="team" role="tab" data-toggle="tab">Jugadores</a></li>
        <li role="presentation" class="respli"><a href="#equipcrear" aria-controls="equipcrear" role="tab" data-toggle="tab" id="elemento">Equipo</a></li>

      </ul>
      <!-- Tab panes -->
      <div class="tab-content tab-contentnull tab-contenthome tab-linecreate">
        <div role="tabpanel" class="tab-pane fade in active bordyel noscroll" id="jugcrear">
          <!-- Nav tabs -->

          <ul class="nav nav-tabs entirewidth" role="tablist">
            <li role="presentation" class="active">
              <a href="#PAPM" id="PAM" aria-controls="team" role="tab" data-toggle="tab" @click="players=allPlayers.PA">PA</a>
            </li>
            <li role="presentation">
              <a href="#CATCHER" aria-controls="C" id="CM" role="tab" data-toggle="tab" @click="players=allPlayers.C">C</a>
            </li>
            @if($type == "REGULAR")
            <li role="presentation">
              <a href="#1B2" aria-controls="1B" id="1BM" role="tab" data-toggle="tab" @click="players=allPlayers['1B']">1B</a>
            </li>
            @endif
            @if($type == "TURBO")
            <li role="presentation">
              <a href="#" aria-controls="messages" role="tab" data-toggle="tab" @click="showPlayers(['2B', 'SS'])">MI</a>
            </li>
            @endif
            @if($type == "REGULAR")
            <li role="presentation">
              <a href="#2B2" aria-controls="2B" id="2BM" role="tab" data-toggle="tab" @click="players=allPlayers['2B']">2B</a>
            </li>
            @endif
            @if($type == "TURBO")
            <li role="presentation">
              <a href="#" aria-controls="messages" role="tab" data-toggle="tab" @click="showPlayers(['1B', '3B'])">CI</a>
            </li>
            @endif
            @if($type == "REGULAR")
            <li role="presentation">
              <a href="#3B2" aria-controls="3B" id="3BM" role="tab" data-toggle="tab" @click="players=allPlayers['3B']">3B</a>
            </li>
            @endif
            @if($type == "REGULAR")
            <li role="presentation">
              <a href="#SS2" aria-controls="SS" id="SSM" role="tab" data-toggle="tab" @click="players=allPlayers['SS']">SS</a>
            </li>
            @endif
            <li role="presentation">
              <a href="#OF2" aria-controls="OF" id="OFM" role="tab" data-toggle="tab" @click="players=allPlayers['OF']">OF</a>
            </li>
            <li role="presentation">
              <a href="#" aria-controls="settings" id="BATS2" role="tab" data-toggle="tab" @click="showPlayers('BATS')">BAT</a>
            </li>
          </ul>


          <table class="table table-striped2 table-hover2 tablelineup theadhead">
            <thead>
            <tr>
              <th id="pos">POS</th>
              <th id="jug">JUGADOR</th>
              <th id="opo">OPO</th>
              <th id="salario">SALARIO</th>
              <th id="masmas"></th>
            </tr>
            </thead>
          </table>
          <div class="tab-content tab-contentnull scrollcreate">
            <div role="tabpanel" class="tab-pane active fade in" id="PAPM">
              <list-players :players="players"></list-players>
            </div>

            <div role="tabpanel" class="tab-pane active fade" id="CATCHER">
              <list-players :players="players"></list-players>
            </div>

            <div role="tabpanel" class="tab-pane active fade" id="1B2">
              <list-players :players="players"></list-players>
            </div>

            <div role="tabpanel" class="tab-pane active fade" id="2B2">
              <list-players :players="players"></list-players>
            </div>

            <div role="tabpanel" class="tab-pane active fade" id="3B2">
              <list-players :players="players"></list-players>
            </div>

            <div role="tabpanel" class="tab-pane active fade" id="SS2">
              <list-players :players="players"></list-players>
            </div>

            <div role="tabpanel" class="tab-pane active fade" id="OF2">
              <list-players :players="players"></list-players>
            </div>

            <div role="tabpanel" class="tab-pane active fade" id="BATS2">
              <list-players :players="players"></list-players>
            </div>
          </div>
        </div>
        <!--    Equipo Seleccionado en Movil    -->
        <div role="tabpanel" class="tab-pane fade bordyel noscroll" id="equipcrear">
          <div class="lineup">
            <table class="table table-striped2 table-hover2 tablelineup theadhead">
              <thead>
              <tr>
                <th id="pos">POS</th>
                <th id="jug">JUGADOR</th>
                <th id="opo">OPO</th>
                <th id="salario">SALARIO</th>
                <th id="masmas"></th>
              </tr>
              </thead>
            </table>
            <div class="tableequipoheightmax">
              <table class="table table-striped2 table-hover2 tablelineup tableequipoheight">
                <tbody>
                <tr is="my-players"
                    v-for="(myPlayer, index) in myPlayers"
                    :my-player="myPlayer"
                    :count-position="countPosition"
                    :index="index"
                    v-on:remove="myPlayers.splice(index, 1)">
                </tr>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
      <!-- restab cierre -->
    </div>
  </div>
</div>

  <!-- Templates for Components -->

  <!-- Template of players -->
  <template id="list-players">
    <table class="table table-striped2 table-hover2 tablelineup">
      <tbody>
      <tr v-for="player in players">
        <td id='pos'>@{{ player.position }}</td>
        <td id='jug'>@{{ player.name }} @{{ player.last_name }}</td>
        <td id='opo'>@{{ player.name_opponent }} vs <span id='teamcol'>@{{ player.name_team }}</span></td>
        <td id='salario'>@{{ player.salary }}</td>
        <td id="masmas">
          <a @click=addPlayer(player)>
          <img class='mashov' src='/images/ico/mas.png' alt='mas'>
          </a>
        </td>
      </tr>
      </tbody>
    </table>
  </template>
  <!-- End Template of players -->


  <!-- Template of my players -->
  <template id="my-players">
    <tr>
      <td id='pos'>@{{ myPlayer.position }}</td>
      <td id='jug'>@{{ myPlayer.name }} @{{ myPlayer.last_name }}<span id='teamcol'></span></td>
      <td id='opo'>@{{ myPlayer.name_opponent }} vs <span id='teamcol'>@{{ myPlayer.name_team }}</span></td>
      <td id='salario'>@{{ myPlayer.salary }}</td>
      <td id="masmas">
        <a @click="$emit('remove'), decSalary(myPlayer)">
        <img src='/images/ico/menos.png' alt='menos' class='mashov'>
        </a>
      </td>
    </tr>
  </template>
  <!-- End Template of my players -->

  <!-- End Templates for Components -->

  </form>

  {!! Html::script('js/vuejs/teams/create_team.js') !!}

@stop
