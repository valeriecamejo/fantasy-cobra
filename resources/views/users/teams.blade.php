@extends ('layouts.template')

@section ('content')
    <div id="wrapper"> <!-- Abre Wrapper -->
        <!-- Sidebar -->
        <!-- Menú movil -->
        <!-- /#sidebar-wrapper -->
        <div class="container-fluid" id="page-content-wrapper">
            <h3 class="Titulo1">MIS EQUIPOS</h3>
                <input type="hidden" id="first_game"  value="">
                <input type="hidden" id="hour" value="">
                <!-- Mensajes de Error -->
                @if(Session::get('message_success'))
                    <div id="success" class="alert alert-success">
                        {{ Session::get('message_success') }} <strong>¡Éxito!</strong>
                    </div>
                @endif
                @if(Session::get('danger'))
                    <div id="danger" class="alert alert-danger">
                        <strong>¡Error!</strong> {{ Session::get('danger') }}
                    </div>
                @endif
                @if (Session::has('enviarmail'))
                    <div id="enviarmail" class="alert alert-success">
                        {{ Session::get('enviarmail') }}
                    </div>
                @endif
        <!-- ./Fin mensajes Error -->
        <div class="container-fluid BlokBoton">
            <!-- Botones -->
            <div class="Boton1 oculto-movil">
                <a onclick="action(1,0)" style="color:white;">
                    <div class="BotonRe">
                        CREAR EQUIPO
                    </div>
                </a>
            </div>
        </div>

        <div class="container desktop-visible">
            <div class="row Bcontainer">
            <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabsnull" role="tablist">
                    <li role="presentation" <?php if(isset($_SESSION['date_team']) && $_SESSION['date_team'] == today){ ?> class="active" <?php } ?>><a href="#lineups" aria-controls="home" role="tab" data-toggle="tab">Equipos de hoy</a>
                    </li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Equipos anteriores</a>
                    </li>
                    <li role="presentation" <?php if(isset($_SESSION['date_team']) && $_SESSION['date_team'] > today){ ?> class="active" <?php } ?>><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Equipos futuros</a>
                    </li>
                </ul>

            <!-- Tab panes -->
                               <!-------------------------Today Teams ------------------------>
            <div class="tab-content tab-contentnull backblack tab-contentmislineups">
                <div role="tabpanel" class="tab-pane fade <?php if(isset($_SESSION['date_team']) && $_SESSION['date_team'] == today){ ?> in active <?php } ?> bordyel" id="lineups">
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
                                    $contador   = 1;
                                @endphp
                                @foreach($today_teams as $today_team)
                                    <tr>
                                        <td class="tdimg1">
                                            {!! Html::image($today_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                                        </td>
                                        <td id="tdcomp">
<!--#TODO anadir funcionalidad del modal con javascript-->
                                            <a onclick="team_modal({{$today_team->id}},{{$cont_teams}}, {{Auth::user()->username}})">
                                                @php
                                                    $contador=0;
                                                    $pts='0.00';
                                                    $cant=0;
                                                    $lienupid='';
                                                @endphp
                                                @if(isset($today_competitions) and count($today_competitions)>0)
                                                    {{Auth::user()->username}}
                                                    @foreach($today_competitions as $today_competition)
                                                        @if($today_team->id = $today_competition->id)
                                                            <span style="color:transparent;">#</span>
                                                            {{$cont_teams}}
                                                            @php
                                                                $contador++;
                                                                $pts  = $today_competition->points;
                                                                $lienupid=$today_competition->id;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($contador == 0)
                                                        {{Auth::user()->username}}
                                                        <span style="color:transparent;">#</span>
                                                        {{$cont_teams}}
                                                    @endif
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
                                            <a class="tdPremio" onclick="team_modal({{$today_team->id}}, {{$cont_teams}}, Auth::user()->username">{{$today_team->remaining_salary}} Bs.
                                            </a>
                                        </td>
                                        <td></td>
                                        @if($today_team->id == $today_competition->id)
                                            @php
                                                $hour             = time();
                                                $competition_hour = date('H:i:s',strtotime($today_competition->date));
                                            @endphp
                                            <td class="bdgedit">
                                                <div class="contbtnbdg">
                                                    <a onclick="team_modal({{$today_team->id}}, {{$cont_teams}}, Auth::user()->username)">
                                                        @if($hour >= $competition_hour)
                                                            <div class="BtnEntrar31 noedit">VER</div>
                                                            @else
                                                                <div class="BtnEntrar31">EDITAR</div>
                                                        @endif
                                                    </a>
                                                    @if((strtotime($hour)) < ($competition_hour))
                                                        {!! Form::open(array('url' => 'usuario/inscribir-equipo', 'method' => 'post')) !!}
                                                          <input type="hidden" class="form-compe2" name="lineup_id" value="{{$today_team->id}}">
                                                          <button type='submit' class="BtnEntrar3" style="border-style:none;">INSCRIBIR</button>
                                                        {!! Form::close() !!}
                                                    @endif
                                                    <span class="badge">{{count($today_competitions)}}</span>
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
                                    $contador   = 1;
                                @endphp
                                @foreach($previous_teams as $previous_team)
                                    <tr>
                                        <td class="tdimg1">
                                            {!! Html::image($previous_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                                        </td>
                                            <td id="tdcomp">
    <!--#TODO anadir funcionalidad del modal con javascript-->
                                                <a onclick="team_modal({{$previous_team->id}},{{$cont_teams}}, {{Auth::user()->username}})">
                                                    @php
                                                        $contador=0;
                                                        $pts='0.00';
                                                        $cant=0;
                                                        $lienupid='';
                                                    @endphp
                                                    @if(isset($previous_competitions) and count($previous_competitions)>0)
                                                        @foreach($previous_competitions as $previous_competition)
                                                            @if($previous_team->id == $previous_competition->id)
                                                                {{Auth::user()->username}}
                                                                <span style="color:transparent;">#</span>
                                                                {{$cont_teams}}
                                                                @php
                                                                    $contador++;
                                                                    $pts  = $previous_competition->points;
                                                                    $lienupid=$previous_competition->id;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @if($contador == 0)
                                                            {{Auth::user()->username}}
                                                            <span style="color:transparent;">#</span>
                                                            {{$cont_teams}}
                                                        @endif
                                                    @endif
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
                                                <a class="tdPremio" onclick="team_modal({{$previous_team->id}}, {{$cont_teams}}, Auth::user()->username">{{$previous_team->remaining_salary}} Bs.
                                                </a>
                                            </td>
                                            <td></td>
                                            <td class="bdgedit">
                                                <div class="contbtnbdg">
                                                    <a onclick="team_modal({{$previous_team->id}},{{$cont_teams}}, {{Auth::user()->username}})">
                                                        <div class="BtnEntrar31 noedit">VER</div>
                                                      </a>
                                                </div>
                                            </td>
                                                <td>{{$previous_competition->points}}</td>
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
                <div role="tabpanel" class="tab-pane fade in active  bordyel" id="messages">
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
                                    $cont_teams=1
                                @endphp
                                @foreach($future_teams as $future_team)
                                    <tr>
                                        <td>
                                            {!! Html::image($future_team->avatar,'',array('class' => 'tabimgtablet')) !!}
                                        </td>
                                        <td id="tdcomp">
                                            <a onclick="team_modal({{$future_team->id}}, {{$cont_teams}}, {{Auth::user()->username}}')">
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
                                            <a class="tdPremio" onclick="team_modal({{$future_team->id}},{{$cont_teams}},'{{Auth::user()->username}})">
                                                {{$future_team->remaining_salary}} Bs.
                                            </a>
                                        </td>
                                        <td></td>
                                            <td class="bdgedit">
                                              <div class="contbtnbdg">
                                                <a onclick="team_modal({{$future_team->id}}, {{$cont_teams}}, {{Auth::user()->username}})">
                                                  <div class="BtnEntrar31">EDITAR</div>
                                                </a>
                                                  {{ Form::open(array('url' => 'usuario/inscribir-equipo', 'method' => 'post')) }}
                                                    <input type="hidden" class="form-compe2" name="lineup_id" value="{{$future_team->id}}">
                                                    <button type='submit' class="BtnEntrar3" style="border-style:none;">INSCRIBIR</button>
                                                  {{ Form::close() }}
                                                <span class="badge">{{count($future_team->competition_id)}}</span>
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

          @include('includes/footer-mobile')
        </div>
    </div>
@stop
