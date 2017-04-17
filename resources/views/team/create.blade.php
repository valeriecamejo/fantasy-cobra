@extends ('layouts.template')

@section ('content')
  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <div class="Enunciado2">
      <h3 class="Titulo1">CREAR NUEVO EQUIPO</h3>
      <h4 style="color:#e9e9e9;font-weight: 300;margin-top: -18px;font-size: 13pt;">Equipo para el día: <span style="color:#eec133;"></span></h4>
    </div>

    {!!  Form::open(array('url' => 'usuario/crear-equipo', 'method' => 'post')) !!}

    <input type='hidden' id="salario_players" value="100000">
    <input type='hidden' id="sport" value="1">
    <input type='hidden' id="championship" value="1">
    <div class="modal-bodycompe">
      <div class="boxcompe">
        <p>Tipo de juego</p>
        <select class="form-compe2" name="type_play" id="type_play">
          <option value="REGULAR" selected>Regular</option>
          <option value="TURBO">Turbo</option>
        </select>
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
            <ul class="nav nav-tabs entirewidth" role="tablist">
              <li role="presentation" class="active"><a href="#PAD" id="PA" aria-controls="home" role="tab" data-toggle="tab">PA</a></li>
              <li role="presentation"><a href="#CD" id="C" aria-controls="profile" role="tab" data-toggle="tab">C</a></li>
              <li role="presentation"><a href="#1BD" id="1B" aria-controls="messages" role="tab" data-toggle="tab">1B</a></li>
              <li role="presentation"><a href="#2BD" id="2B" aria-controls="settings" role="tab" data-toggle="tab">2B</a></li>
              <li role="presentation"><a href="#3BD" id="3B" aria-controls="settings" role="tab" data-toggle="tab">3B</a></li>
              <li role="presentation"><a href="#SSD" id="SS" aria-controls="settings" role="tab" data-toggle="tab">SS</a></li>
              <li role="presentation"><a href="#OFD" id="OF" aria-controls="settings" role="tab" data-toggle="tab">OF</a></li>
              <li role="presentation"><a href="#BATSD" id="BATS" aria-controls="settings" role="tab" data-toggle="tab">BATS</a></li>

              <div id="tabs"></div>

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
            <!-- Tab panes -->
            <div class="tab-content tab-contentnull scrollcreate createcontent">
              <div role="tabpanel" class="tab-pane active fade in" id="PAD">

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
          <div class="Usuariolineup" style="text-align:center;text-indent: 0;">EQUIPO</div>
          <div id="th2">
            <p id="salariorestante">Salario Restante:</p>
            <!--<input id="salaryrest" name="salaryrest" value="" class="inputsalario" type="text" readonly placeholder="50.000">
            --><input id="salaryrest" name="salaryrest" value="" class="inputsalario" type="text" readonly placeholder="50.000">

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
              <tr id="playerPA">
                <td id="pos">PA</td>
                <td id="jug"><span id="teamcol">name /</span>name </td>
                <td id="opo">team vs <span id="teamcol"> oponente</span></td>
                <td id="salario">1000</td>
                <td>
                  <a href="#" onclick="deletePlayer('id');">
                    {!! Html::image('images/ico/menos.png','menos', array('class'=>'mashov')) !!}
                  </a>
                </td>
              </tr>

              <tr id="playerC">
                <td id="pos">C</td>
                <td id="jug"><span id="teamcol">name</td>
                <td id="opo">oponente vs <span id="teamcol"> team</span></td>
                <td id="salario">1000</td>
                <td>
                  <a href="#" onclick="deletePlayer('id');">
                    {!! Html::image('images/ico/menos.png','menos', array('class'=>'mashov')) !!}
                  </a>
                </td>
              </tr>

              <tr id="player1B">

                <td id="pos">1B</td>
                <td id="jug"><span id="teamcol"></td>
                <td id="opo"> vs <span id="teamcol"> </span></td>
                <td id="salario"></td>
                <td>
                  <a href="#" onclick="deletePlayer('id');">
                    {!! Html::image('images/ico/menos.png','menos', array('class'=>'mashov')) !!}
                  </a>
                </td>
              </tr>
              <tr id="player2B">
                <td id="pos">2B</td>
                <td id="jug"></td>
                <td id="opo"></td>
                <td id="salario"></td>
                <td><a href=""></a>
              </tr>
              <tr id="player3B">
                <td id="pos">3B</td>
                <td id="jug"></td>
                <td id="opo"></td>
                <td id="salario"></td>
                <td><a href=""></a>
              </tr>

              <tr id="playerSS">
                <td id="pos">SS</td>
                <td id="jug"></td>
                <td id="opo"></td>
                <td id="salario"></td>
                <td><a href=""></a>
              </tr>
              <tr id="playerOF1">
                <td id="pos">OF</td>
                <td id="jug"></td>
                <td id="opo"></td>
                <td id="salario"></td>
                <td><a href=""></a>
              </tr>
              <tr id="playerOF2">
                <td id="pos">OF</td>
                <td id="jug"></td>
                <td id="opo"></td>
                <td id="salario"></td>
                <td><a href=""></a>
              </tr>
              <tr id="playerOF3">
                <td id="pos">OF3</td>
                <td id="jug"></td>
                <td id="opo"></td>
                <td id="salario"></td>
                <td><a href=""></a>
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
        <button type="submit" class="btn btn-primary2 btn-return btn-lg" name="returnhome" onclick="">Regresar</button>
        <button type="submit" class="btn btn-primarycan btn-lg" name="cancellineup" onclick="">Limpiar</button>
        <button type="submit" class="btn btn-primary2 btn-lg" name="createlineup" onclick="">Crear Lineup</button>
      </div>
    </div>
    {!! Form::close() !!}
  <!-- cierre contcrear -->

    <!--    Crear Lineup  Movil     -->
    {!!  Form::open(array('url' => 'usuario/crear-equipo', 'method' => 'post')) !!}
    <div class="restab visible-xs" style="margin-top:30px; margin-bottom: 60px;">
      <div class="linemovbut">
        <button type="submit" class="btn btn-default btn-primary4" name="createlineup" onclick="">CREAR LINEUP</button>
        <button type="submit" class="btn btn-default btn-primary4" name="returnhome" onclick="">REGRESAR</button>
      </div>
      <ul class="nav nav-tabs nav-tabsnull" role="tablist">
        <li role="presentation" class="active BtnLineup10 respli"><a href="#jugcrear" aria-controls="team" role="tab" data-toggle="tab">Jugadores</a></li>
        <li role="presentation" class="respli"><a href="#equipcrear" aria-controls="equipcrear" role="tab" data-toggle="tab" id="elemento">Equipo</a></li>
        <li role="presentation" class="respli"><a class="Salario" href="#" aria-controls="equipcrear" role="tab" data-toggle="tab"><span class="Sal1">Balance: </span><span id="salaryrestlabel">100000</span></a></li>
        <input id="salaryrestM" name="salaryrest" value="20000" class="inputsalario" type="hidden">
      </ul>
      <!-- Tab panes -->
      <div class="tab-content tab-contentnull tab-contenthome tab-linecreate">
        <div role="tabpanel" class="tab-pane fade in active bordyel noscroll" id="jugcrear">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs entirewidth" role="tablist">
            <li role="presentation" class="active"><a href="#PAPM" id="PAM" aria-controls="team" role="tab" data-toggle="tab">PA</a></li>
            <li role="presentation"><a href="#CATCHER" aria-controls="C" id="CM" role="tab" data-toggle="tab">C</a></li>
            <li role="presentation"><a href="#1B2" aria-controls="1B" id="1BM" role="tab" data-toggle="tab">1B</a></li>
            <li role="presentation"><a href="#2B2" aria-controls="2B" id="2BM" role="tab" data-toggle="tab">2B</a></li>
            <li role="presentation"><a href="#3B2" aria-controls="3B" id="3BM" role="tab" data-toggle="tab">3B</a></li>
            <li role="presentation"><a href="#SS2" aria-controls="SS" id="SSM" role="tab" data-toggle="tab">SS</a></li>
            <li role="presentation"><a href="#OF2" aria-controls="OF" id="OFM" role="tab" data-toggle="tab">OF</a></li>
            <li role="presentation"><a href="#BATS2" aria-controls="BATS" id="BATSM" role="tab" data-toggle="tab">BATS</a></li>
          </ul>
          <table class="table table-striped2 table-hover2 tablelineup theadhead">
            <thead>
            <tr>
              <th id="pos">POS</th>
              <th id="jug">JUGADOR</th>
              <th id="salario">SALARIO</th>
              <th id="masmas"></th>
            </tr>
            </thead>
          </table>
          <div class="tab-content tab-contentnull scrollcreate">
            <div role="tabpanel" class="tab-pane active fade in" id="PAPM">

            </div>

            <div role="tabpanel" class="tab-pane active fade" id="CATCHER">

            </div>

            <div role="tabpanel" class="tab-pane active fade" id="1B2">

            </div>

            <div role="tabpanel" class="tab-pane active fade" id="2B2">

            </div>

            <div role="tabpanel" class="tab-pane active fade" id="3B2">

            </div>

            <div role="tabpanel" class="tab-pane active fade" id="SS2">

            </div>

            <div role="tabpanel" class="tab-pane active fade" id="OF2">

            </div>

            <div role="tabpanel" class="tab-pane active fade" id="BATS2">

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
                <!--<th id="opo">OPO</th>-->
                <th id="salario">SALARIO</th>
                <th id="masmas"></th>
              </tr>
              </thead>
            </table>
            <div class="tableequipoheightmax">
              <div class="table table-striped2 table-hover2 tablelineup tableequipoheight">
                <div id="playerPAM">
                  <div class="litableup">
                    <div class="divpos">PA</div>
                    <div class="litabblock">
                      <p class="divjug"><span id="teamcol">name/</span> name2</p>
                      <p class="divopo">team vs <span id="teamcol">opo</span></p>
                    </div>
                    <div class="divsala">1000</div>
                    <div class="divmashov">
                      <a href="#" onclick="deletePlayer('id');">
                        {!! Html::image('images/ico/menos.png','menos', array('class'=>'mashov')) !!}
                      </a>
                    </div>
                  </div>
                </div>
                <div id="playerCM">
                  <div class="litableup">
                    <div class="divpos">C</div>
                    <div class="litabblock">
                      <p class="divjug">name</p>
                      <p class="divopo">opo vs <span id="teamcol">team</span></p>
                    </div>
                    <div class="divsala">1000</div>
                    <div class="divmashov">
                      <a href="#" onclick="deletePlayer('id');">
                        {!! Html::image('images/ico/menos.png','menos', array('class'=>'mashov')) !!}
                      </a>
                    </div>
                  </div>
                </div>
                <div id="player1BM">
                  <div class="litableup">
                    <div class="divpos">1B</div>
                    <div class="litabblock"></div>
                    <div class="divsala"></div>
                    <div class="divmashov"></div>
                  </div>
                </div>
                <div id="player2BM">
                  <div class="litableup">
                    <div class="divpos">2B</div>
                    <div class="litabblock"></div>
                    <div class="divsala"></div>
                    <div class="divmashov"></div>
                  </div>
                </div>
                <div id="player3BM">
                  <div class="litableup">
                    <div class="divpos">3B</div>
                    <div class="litabblock"></div>
                    <div class="divsala"></div>
                    <div class="divmashov"></div>
                  </div>
                </div>
                <div id="playerSSM">
                  <div class="litableup">
                    <div class="divpos">SS</div>
                    <div class="litabblock"></div>
                    <div class="divsala"></div>
                    <div class="divmashov"></div>
                  </div>
                </div>
                <div id="playerOF1M">
                  <div class="litableup">
                    <div class="divpos">OF</div>
                    <div class="litabblock"></div>
                    <div class="divsala"></div>
                    <div class="divmashov"></div>
                  </div>
                </div>
                <div id="playerOF2M">
                  <div class="litableup">
                    <div class="divpos">OF</div>
                    <div class="litabblock"></div>
                    <div class="divsala"></div>
                    <div class="divmashov"></div>
                  </div>
                </div>
                <div id="playerOF3M">
                  <div class="litableup">
                    <div class="divpos">OF</div>
                    <div class="litabblock"></div>
                    <div class="divsala"></div>
                    <div class="divmashov"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- restab cierre -->
    </div>
  </div>
  {!! Form::close() !!}

  {!! Html::script('js/teams/create_team.js') !!}

@stop