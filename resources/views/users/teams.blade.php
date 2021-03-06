@extends ('layouts.template')

@section ('content')


{!! Html::script('js/moment/locale/es.js') !!}

<div id="app">
<div class="btab3">
  <div class="container-fluid" id="page-content-wrapper">
    <h3 class="Titulo1">MIS EQUIPOS</h3>

  <div class="row Filtros">
    <div class="BlockFil col-xs-12 col-sm-6">
      <ul class="ContFil btn-group">
        <li role="presentation" class="btn btn-default active btn-sm">
          <a href="#sport" @click="filter_teams('all', filter_type_val, $event)" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
        </li>
        <li role="presentation" class="btn btn-default btn-sm">
          <a href="#sport" @click="filter_teams('baseball', filter_type_val, $event)" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
        </li>
        <li role="presentation" class="btn btn-default btn-sm">
          <a href="#sport" @click="filter_teams('football', filter_type_val, $event)" aria-controls="home" role="tab" data-toggle="tab">Fútbol</a>
        </li>
      </ul>
    </div>
    <div class="BlockFil2 col-xs-12 col-sm-6">
      <ul class="ContFil btn-group">
        <li role="presentation" class="btn btn-default active btn-sm">
          <a href="#sport" @click="filter_teams(filter_sport_val,'all', $event)" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
        </li>
        <li role="presentation" class="btn btn-default btn-sm">
          <a href="#sport" @click="filter_teams(filter_sport_val,'today_teams', $event)" aria-controls="home" role="tab" data-toggle="tab">Hoy</a>
        </li>
        <li role="presentation" class="btn btn-default btn-sm">
          <a href="#sport" @click="filter_teams(filter_sport_val,'previous_teams', $event)" aria-controls="home" role="tab" data-toggle="tab">Anteriores</a>
        </li>
        <li role="presentation" class="btn btn-default btn-sm">
          <a href="#sport" @click="filter_teams(filter_sport_val,'future_teams', $event)" aria-controls="home" role="tab" data-toggle="tab">Futuros</a>
        </li>
      </ul>
    </div>
  </div>
        <!-- Tab panes -->
        <!-------------------------Teams ------------------------>

        <div class="tab-content tab-contentnull backblack tab-contentmislineups">
          <div role="tabpanel" class="tab-pane fade in active } ?> bordyel" id="sport">
            <table class="table table-hover table-responsive tabledep2">
              <thead>
                <tr>
                <th></th>
                  <th>Equipos</th>
                  <th style="text-align: center;">Fecha</th>
                  <th style="text-align: center;">Salario Restante</th>
                  <th style="text-align: center;">Pts.</th>
                  <th style="text-align: center;">Competiciones</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="teams == 0">
                  <td style="text-align: center;" colspan="9">
                    <h5>No tienes equipos creados</h5>
                    <h4>Te invitamos a que disfrutes de la plataforma.</h4>
                  </td>
                </tr>
                <tr v-else v-for="team in teams">
                  <td> <img :src="'/' + team.avatar"> </td>
                  <td id="tdcomp">
                    {{ Auth::user()->username }}
                    <span style="color:transparent;">#</span>
                    <script type="text/template" id="cont_team_template">
                  </script>
                  </td>

                  <td> @{{ moment(team.date).format('ddd DD-MM') }} </td>
                  <td> @{{ team.remaining_salary }} </td>
                  <td> @{{ team.points }} </td>
                  <td class="bdgedit">
                    <span v-if="moment().format('YYYY-MM-DD hh:mm') < moment(team.date).format('YYYY-MM-DD hh:mm')">
                      <div class="contbtnbdg">
                        <a @click="team_modal( team.id , team.name, teams )">
                          <div class="BtnEntrar31 edit">Ver</div>
                        </a>
                        {{--<button type='submit' class="BtnEntrar3" style="border-style:none;">INSCRIBIR</button>--}}
                      </div>
                      <input type="hidden" class="form-compe2" name="lineup_id" :value="team.id">
                      </span>
                      <span v-else>
                      <div class="contbtnbdg">
                        <a @click="team_modal( team.id , team.name, teams )">
                          <div class="BtnEntrar31 noedit">Ver</div>
                        </a>
                        <input type="hidden" class="form-compe2" name="lineup_id" :value="team.id">
                        {{--<button type='submit' class="BtnEntrar3 noedit" style="border-style:none;">INSCRIBIR</button>--}}
                      </div>
                    </span>

                    {{--<span class="badge">--}}
                        {{--@{{ team_count( team.id, teams, cant_inscription ) }} </a>--}}
                    {{--</span>--}}
                  </td>
                  <td></td>

                </tr>
              </tbody>
            </table>
          </div> <!-- desktop tab -->


          <!-- restab cierre -->

        </div>
      </div>
        <br>
        <br>
        <br>
      <!-- {{--@include('includes/footer-mobile')--}} -->
  </div>
</div>
{!! Html::script('js/vuejs/teams/user_teams.js') !!}
{!! Html::script('js/teams/team_modal.js') !!}
@stop
