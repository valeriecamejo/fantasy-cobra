@extends ('layouts.template')

@section ('content')
  <script src="https://unpkg.com/vue"></script>
  {!! Html::script('js/vuejs/competition/competition_details.js') !!}
  {!! Html::script('js/competitions/competition_details.js') !!}
  {!! Html::script('js/teams/team_modal.js') !!}
  <div id="wrapper"> <!-- Abre Wrapper -->
    <!-- Sidebar -->
    <!-- Menú movil -->
    <!-- /#sidebar-wrapper -->
    <div class="container-fluid" id="page-content-wrapper">
      <h3 class="Titulo1">MIS EQUIPOS</h3>
      <input type="hidden" id="first_game"  value="">
      <input type="hidden" id="hour" value="">

      <div class="container desktop-visible">
        <div class="row Bcontainer">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-tabsnull" role="tablist">
            <li role="presentation" class="active"><a href="#lineups" aria-controls="home" role="tab" data-toggle="tab">Equipos de hoy</a>
            </li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Equipos anteriores</a>
            </li>
            <li role="presentation" <?php if(isset($_SESSION['date_team']) && $_SESSION['date_team'] > today){ ?> class="active" <?php } ?>><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Equipos futuros</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <!-------------------------Today Teams ------------------------>
          <div class="tab-content tab-contentnull backblack tab-contentmislineups">
            <div role="tabpanel" class="tab-pane fade in active } ?> bordyel" id="lineups">
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
                @if(isset($today_teams) and count($today_teams)==0)
                  <tbody>
                  <tr>
                    <td style="text-align: center;" colspan="9">
                      <h5>No tienes equipos creados para Hoy</h5>
                      <h4>Te invitamos a que disfrutes de la plataforma.</h4>
                    </td>
                  </tr>
                  </tbody>
                @else
                  <tbody>
                  @php
                    $cont_teams = 1;
                  @endphp
                  @foreach($today_teams as $today_team)
                    <tr>
                      <td class="tdimg1">

                        {!! Html::image($today_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                      </td>
                      <td id="tdcomp">
                        <!--#TODO anadir funcionalidad del modal con javascript-->
                        <a onclick="team_modal({{$today_team->id}},{{$cont_teams}}, '{{Auth::user()->username}}')">
                          @php
                            $contador=0;
                            $pts='0.00';
                            $lienupid='';
                          @endphp
                          @if(isset($today_competitions) and count($today_competitions)>0)
                            @foreach($today_competitions as $today_competition)
                              @if($today_team->id = $today_competition->id)
                                <span style="color:transparent;">#</span>
                                @php
                                  $contador++;
                                  $pts  = $today_competition->points;
                                  $lienupid=$today_competition->id;
                                @endphp
                              @endif
                            @endforeach
                            {{Auth::user()->username}}
                            <span style="color:transparent;">#</span>
                            {{$cont_teams}}
                          @endif
                        </a>
                      </td>
                      <td></td>
                      <td>
                        @php
                          $date = strtotime($today_team->date)
                        @endphp

                        {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                        {{ date("d-m", $date) }}
                      </td>
                      <td></td>
                      <td class="RepColor">
                        {{$today_team->remaining_salary}} Bs.
                      </td>
                      <td></td>
                      @if($today_team->id == $today_competition->id)
                        @php
                          $hour             = time();
                          $competition_hour = time($today_competition);
                        echo $hour;
                        echo $competition_hour;
                        @endphp
                        <td class="bdgedit">
                          <div class="contbtnbdg">
                            <a onclick="team_modal({{$today_team->id}}, {{$cont_teams}}, '{{Auth::user()->username}}')">
                              @if($hour <= $competition_hour)
                                <div class="BtnEntrar31 noedit">VER</div>
                              @else
                                <div class="BtnEntrar31">EDITAR</div>
                              @endif
                            </a>
                            @if((strtotime($hour)) > ($competition_hour))
                              {!! Form::open(array('url' => 'usuario/inscribir-equipo', 'method' => 'post')) !!}
                              <input type="hidden" class="form-compe2" name="lineup_id" value="{{$today_team->id}}">
                              {!! Form::close() !!}
                              <button type='submit' class="BtnEntrar3" style="border-style:none;">INSCRIBIR</button>

                            @endif
                            <span class="badge">
                        {{ UtilityDate::team_registered_competition($today_teams, $today_team->team_user_id) }}
                      </span>
                          </div>
                        </td>
                      @endif
                      <td>{{$today_competition->points}}</td>
                    </tr>
                    @php
                      $cont_teams++
                    @endphp
                  @endforeach
                  </tbody>
                @endif
              </table>
            </div>

            <!-------------------------Previous Teams ------------------------>
            <div role="tabpanel" class="tab-pane fade bordyel" id="profile">
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
                @if(isset($previous_teams) and count($previous_teams)==0)
                  <tbody>
                  <tr>
                    <td style="text-align: center;" colspan="9">
                      <h4>Te invitamos a que disfrutes de la plataforma.</h4>
                    </td>
                  </tr>
                  </tbody>
                @else
                  <tbody>
                  @php
                    $cont_teams = 1;
                  @endphp
                  @foreach($previous_teams as $previous_team)
                    <tr>
                      <td class="tdimg1">
                        {!! Html::image($previous_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                      </td>
                      <td id="tdcomp">
                        <a onclick="team_modal({{$previous_team->id}},{{$cont_teams}}, '{{Auth::user()->username}}')">
                          @php
                            $contador=0;
                            $pts='0.00';
                            $lienupid='';
                          @endphp
                          {{Auth::user()->username}}
                          <span style="color:transparent;">#</span>
                          {{$cont_teams}}
                          @php
                            $contador++;
                          @endphp
                        </a>
                      </td>
                      <td></td>
                      <td>
                        @php
                          $date = strtotime($previous_team->date)
                        @endphp

                        {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                        {{ date("d-m", $date) }}
                      </td>
                      <td></td>
                      <td class="RepColor">
                        {{$previous_team->remaining_salary}} Bs.
                      </td>
                      <td></td>
                      <td class="bdgedit">
                        <div class="contbtnbdg">
                          <a onclick="team_modal({{$previous_team->id}},{{$cont_teams}}, '{{Auth::user()->username}}')">
                            <div class="BtnEntrar31 noedit">VER</div>
                          </a>
                        </div>
                      </td>
                      <td>{{$previous_team->points}}</td>
                    </tr>
                    @php
                      $cont_teams++
                    @endphp
                  @endforeach
                  </tbody>
                @endif
              </table>
            </div>

            <!-------------------------Future Teams ------------------------>
            <div role="tabpanel" class="tab-pane fade bordyel" id="messages">
              <!--<h2 class="msgnogame">No se encuentran lineups creados.</h2>-->
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
                @if(isset($future_teams) and count($future_teams)==0)
                  <tbody>
                  <tr>
                    <td style="text-align: center;" colspan="9">
                      <h5>No tienes equipos Futuros creados</h5>
                      <h4>Te invitamos a que disfrutes de la plataforma.</h4>
                    </td>
                  </tr>
                  </tbody>
                @else
                  <tbody>
                  @php
                    $cont_teams=1;
                  @endphp

                  @foreach($future_teams as $future_team)
                    <tr>
                      <td>
                        {!! Html::image($future_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                      </td>
                      <td id="tdcomp">
                        <a onclick="team_modal({{$future_team->id}}, {{$cont_teams}}, '{{Auth::user()->username}}')">
                          {{Auth::user()->username}}
                          <span style="color:transparent;">#</span>
                          {{$cont_teams}}
                        </a>
                      </td>
                      <td></td>
                      <td>
                        @php
                          $date = strtotime($future_team->date)
                        @endphp

                        {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                        {{ date("d-m", $date) }}
                      </td>
                      <td></td>
                      <td class="RepColor">
                        {{$future_team->remaining_salary}} Bs.
                      </td>
                      <td></td>
                      <td class="bdgedit">
                        <div class="contbtnbdg">
                          <a onclick="team_modal({{$future_team->id}}, {{$cont_teams}}, '{{Auth::user()->username}}')">
                            <div class="BtnEntrar31">EDITAR</div>
                          </a>
                          {{ Form::open(array('url' => 'usuario/inscribir-equipo', 'method' => 'post')) }}
                          <input type="hidden" class="form-compe2" name="lineup_id" value="{{$future_team->id}}">
                          <button type='submit' class="BtnEntrar3" style="border-style:none;">INSCRIBIR</button>
                          {{ Form::close() }}
                          <span class="badge">

                      {{ UtilityDate::team_registered_competition($future_teams, $future_team->team_user_id) }}

                      </span>
                        </div>
                      </td>
                      <td>{{$future_team->points}}</td>
                    </tr>
                    @php
                      $cont_teams++
                    @endphp
                  @endforeach
                  </tbody>
                @endif
              </table>
            </div>
            <!---------------------------------------------------------------------------------------------------->
          </div>
        </div>
      </div> <!-- desktop tab -->

      <!-- mobile tab -->
      <div class="restab visible-xs">
        <div class="linemovbut">
          <a onclick="action(1,0)" style="color:#eec133">
            <button type="button" class="btn btn-default btn-primary4">
              CREAR EQUIPO
            </button>
          </a>
        </div>

        <ul class="nav nav-tabs nav-tabsnull" role="tablist">
          <li role="presentation" <?php if(isset($_SESSION['date_team']) && $_SESSION['date_team'] == today){ ?> class="active BtnLineup10 respli" <?php }else{ ?> class="BtnLineup10 respli" <?php } ?>><a href="#competiciones" aria-controls="home" role="tab" data-toggle="tab">Hoy</a>
          </li>
          <li role="presentation" class="respli"><a href="#ganadas" aria-controls="ganadas" role="tab" data-toggle="tab">Anteriores</a>
          </li>
          <li role="presentation" <?php if(isset($_SESSION['date_team']) && $_SESSION['date_team'] > today){ ?> class="active respli" <?php }else{ ?> class="respli" <?php } ?>><a href="#deporeti" aria-controls="deporeti" role="tab" data-toggle="tab">Futuros</a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tab-contentnull tab-contenthome">
          <!-------------------------Equipos de hoy ------------------------>
          <div role="tabpanel" class="tab-pane fade <?php if(isset($_SESSION['date_team']) and $_SESSION['date_team'] == today){ ?> in active <?php } ?> bordyel noscroll" id="competiciones">
            <div class="tablemovil">
              <ul>
                @php
                  $cont_teams=1;
                @endphp
                @foreach($today_teams as $today_team)
                  @if(isset($today_teams))
                    <a>
                      @else
                        <a onclick="team_modal({{$today_team->id}}, {{$cont_teams}}, '{{Auth::user()->username}}')">
                          @endif
                          <li class="tmovlineup">
                            <div class="linemovilimg">

                              {!! Html::image($today_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                            </div>
                            <div class="namelineup">
                              <p class="NombEquip">
                                @php
                                  $contador = 0;
                                @endphp
                                @if(isset($today_competitions) and count($today_competitions)!=0)
                                  @foreach($today_competitions as $today_competition)
                                    @if($today_team->id = $today_competition->id)
                                      {{Auth::user()->username}}
                                      <span style="color:transparent;">#</span>
                                      {{$cont_teams}}
                                      @php
                                        $contador++;
                                      @endphp
                                    @endif
                                  @endforeach
                                  @if($contador == 0)
                                    {{Auth::user()->username}}
                                    <span style="color:transparent;">#</span>
                                    {{$cont_teams}}
                                  @endif
                                @endif
                              </p>
                            </div>
                            <div class="fechalineup">
                              <p>
                                @php
                                  $date = strtotime($today_team->date)
                                @endphp

                                {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                                {{ date("d-m", $date) }}
                              </p>
                            </div>

                            @if(isset($today_competition->competition_id))
                              <div class="btnreslineup">
                                @else
                                  <div class="btnreslineup">
                                    @endif
                                    @if(isset($today_competition->competition_id))
                                      <div class="BtnEntrarlineres2">
                                        @else
                                          @if(($today_team->date) > ($today=dateTime()))
                                            <div class="BtnEntrarlineres3">
                                              @else
                                                <div class="BtnEntrarlineres2">
                                                  @endif
                                                  @endif
                                                  {!! Html::image('images/ico/edit.png') !!}
                                                </div>
                                            </div>
                                            @if(isset($today_competition->competition_id))
                                              <div class="btnreslineup">
                                                {{ Form::open(array('url' => 'usuario/inscribir-equipo', 'method' => 'post')) }}
                                                {{ csrf_field() }}
                                                <div class="BtnEntrarlineres">
                                                  <input type="hidden" class="form-compe2" name="lineup_id" value="{{$today_team->id}}">
                                                  <button type='submit' class="BtnEntrarlineres" style="border-style:none;">
                                                    {!! Html::image('images/ico/formiconmenu.png') !!}
                                                  </button>
                                                </div>
                                                {{ Form::close() }}
                                              </div>
                                            @endif

                                            <div class="spancomp">
                            <span class="badge">
                              {{ UtilityDate::team_registered_competition($today_teams, $today_team->team_user_id) }}
                            </span>
                                            </div>
                          </li>
                        </a>
                    @php
                      $cont_teams++;
                    @endphp
                    @endforeach
              </ul>
            </div>
          </div>

          <!-------------------------Equipos de ayer ------------------------>
          <div role="tabpanel" class="tab-pane fade bordyel noscroll" id="ganadas">
            <div class="tablemovil">
              <ul>
                @php
                  $cont_teams=1;
                @endphp
                @foreach($previous_teams as $previous_team)
                  @if(isset($previous_competitions) and count($previous_competitions)!=0)
                    <a>
                      @else
                        <a onclick="team_modal({{$previous_team->id}},{{$cont_teams}}, '{{Auth::user()->username}}')">
                          @endif
                          <li class="tmovlineup">
                            <div class="linemovilimg">
                              {!! Html::image($previous_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                            </div>
                            <div class="namelineup">
                              <p class="NombEquip">
                                @php
                                  $contador = 0;
                                @endphp
                                @if(isset($previous_competitions) and count($previous_competitions)!=0)
                                  @foreach($previous_competitions as $previous_competition)
                                    @if($previous_team->id = $previous_competition->id)
                                      {{Auth::user()->username}}
                                      <span style="color:transparent;">#</span>
                                      {{$cont_teams}}
                                      @php
                                        $contador++;
                                      @endphp
                                    @endif
                                  @endforeach
                                @endif
                                @if($contador == 0)
                                  {{Auth::user()->username}}
                                  <span style="color:transparent;">#</span>
                                  {{$cont_teams}}
                                @endif
                              </p>
                            </div>
                            <div class="fechalineup">
                              <p>
                                @php
                                  $date = strtotime($previous_team->date)
                                @endphp

                                {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                                {{ date("d-m", $date) }}
                              </p>
                            </div>

                            <div class="btnreslineup">
                              <div class="BtnEntrarlineres3">
                                {!! Html::image('images/ico/edit.png') !!}
                              </div>
                            </div>

                            <div class="spancomp">
                              <span class="badge">
                                {{ UtilityDate::team_registered_competition($previous_teams, $previous_team->team_user_id) }}
                              </span>
                            </div>
                          </li>
                        </a>
                    @php
                      $cont_teams++;
                    @endphp
                    @endforeach
              </ul>
            </div>
          </div>

          <!-------------------------Equipos futuros------------------------>
          <div role="tabpanel" class="tab-pane fade <?php if(isset($_SESSION['date_team']) && $_SESSION['date_team'] > today){ ?> in active <?php } ?> bordyel noscroll" id="deporeti">
            <div class="tablemovil">
              <ul>
                @php
                  $cont_teams=1;
                @endphp
                @foreach($future_teams as $future_team)
                  @if(isset($future_teams) and count($future_teams)!=0)
                    <a>
                      @else
                        <a onclick="team_modal({{$future_teams->id}},{{$cont_teams}}, '{{Auth::user()->username}}')">
                          @endif
                          <li class="tmovlineup">
                            <div class="linemovilimg">
                              {!! Html::image($future_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                            </div>
                            <div class="namelineup">
                              <p class="NombEquip">
                                @php
                                  $contador = 0;
                                @endphp
                                @if(isset($future_competitions) and count($future_competitions)!=0)
                                  @foreach($future_competitions as $future_competition)
                                    @if($future_team->id = $future_competition->id)
                                      {{Auth::user()->username}}
                                      <span style="color:transparent;">#</span>
                                      {{$cont_teams}}
                                      @php
                                        $contador++;
                                      @endphp
                                    @endif
                                  @endforeach
                                  @if($contador == 0)
                                    {{Auth::user()->username}}
                                    <span style="color:transparent;">#</span>
                                    {{$cont_teams}}
                                  @endif
                                @endif
                              </p>
                            </div>
                            <div class="fechalineup">
                              <p>
                                @php
                                  $date = strtotime($future_team->date)
                                @endphp

                                {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                                {{ date("d-m", $date) }}
                              </p>
                            </div>

                            @if(isset($future_team->id))
                              <div class="btnreslineup">
                                @endif

                                @if(isset($future_team->id))
                                  <div class="BtnEntrarlineres2">
                                    @endif
                                    {!! Html::image('images/ico/edit.png') !!}
                                  </div>

                                  @if(isset($future_competition->competition_id))
                                    <div class="btnreslineup">
                                      {{ Form::open(array('url' => 'usuario/inscribir-equipo', 'method' => 'post')) }}
                                      {{ csrf_field() }}
                                      <div class="BtnEntrarlineres">
                                        <input type="hidden" class="form-compe2" name="lineup_id" value="{{$future_team->id}}">
                                        <button type='submit' class="BtnEntrarlineres" style="border-style:none;">
                                          {!! Html::image('images/ico/formiconmenu.png') !!}
                                        </button>
                                      </div>
                                      {{ Form::close() }}
                                    </div>
                                  @endif
                                  <div class="spancomp">
                            <span class="badge">
                              {{ UtilityDate::team_registered_competition($future_teams, $future_team->team_user_id) }}
                            </span>
                                  </div>
                          </li>
                        </a>
                    @php
                      $cont_teams++;
                    @endphp
                    @endforeach
              </ul>
            </div>
          </div>
        </div>
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
