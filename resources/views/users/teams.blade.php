@extends ('layouts.template')

@section ('content')

{!! Html::script('js/teams/filter_teams.js') !!}
{!! Html::script('js/teams/team_modal.js') !!}
<div id="wrapper"> <!-- Abre Wrapper -->
  <!-- Sidebar -->
  <!-- Menú movil -->
  <!-- /#sidebar-wrapper -->
  <div class="container-fluid" id="page-content-wrapper">
    <h3 class="Titulo1">MIS EQUIPOS</h3>

  <div class="container-fluid Filtros">
    <div class="BlockFil col-sm-6">
      <ul class="ContFil btn-group">
        <li role="presentation" class="btn btn-default active">
          <a href="#sport" onclick="filter_teams('all',window.filter_type, {{$teamsUser}})" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#sport" onclick="filter_teams('baseball',window.filter_type, {{$teamsUser}})" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#sport" onclick="filter_teams('football',window.filter_type, {{$teamsUser}})" aria-controls="home" role="tab" data-toggle="tab">Fútbol</a>
        </li>
      </ul>
    </div>
    <div class="BlockFil2 col-sm-6">
      <ul class="ContFil btn-group">
        <li role="presentation" class="btn btn-default active">
          <a href="#sport" onclick="filter_teams(window.sport,'all', {{$teamsUser}})" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#today_teams" onclick="filter_teams(window.sport,'today_teams', {{$teamsUser}})" aria-controls="home" role="tab" data-toggle="tab">Equipos de hoy</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#previous_teams" onclick="filter_teams(window.sport,'previous_teams', {{$teamsUser}})" aria-controls="home" role="tab" data-toggle="tab">Equipos anteriores</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#future_teams" onclick="filter_teams(window.sport,'future_teams', {{$teamsUser}})" aria-controls="home" role="tab" data-toggle="tab">Equipos futuros</a>
        </li>
      </ul>
    </div>
  </div>
        <!-- Tab panes -->
        <!-------------------------Today Teams ------------------------>
        <div class="tab-content tab-contentnull backblack tab-contentmislineups">
          <div role="tabpanel" class="tab-pane fade in active } ?> bordyel" id="today_teams">
            <table class="table table-hover table-responsive tabledep2">
              <thead>
                <tr>
                  <th></th>
                  <th>Equipos</th>
                  <th></th>
                  <th style="text-align: center;">Fecha</th>
                  <th></th>
                  <th style="text-align: center;">Salario Restante</th>
                  <th></th>
                  <th style="text-align: center;">Competiciones</th>
                  <th style="text-align: center;">Pts.</th>
                </tr>
              </thead>
              <tbody id="teams-user">

              </tbody>
            </table>
          </div> <!-- desktop tab -->


          <!-- restab cierre -->
          <div class="divtabfoot3">
            <div class="divtabfooty3">
              <div class="smallcircle"></div>
              <p class="Legend">Editar Equipo</p>
              <div class="smallcircle2"></div>
              <p class="Legend">Inscribir Equipo</p>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
      @include('includes/footer-mobile')
    </div>
  </div>
@stop
