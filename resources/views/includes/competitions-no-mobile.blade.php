<div class="btab3 hidden-xs">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabsnull" role="tablist">
      <li role="presentation" class="active BtnLineup10">
        @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
          <a href="#all-no-mobile" onclick="lobby(0,0)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Todos</a>
        @else
          <a href="#all-no-mobile" onclick="lobby(0,1)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Todos</a>
        @endif
      </li>
      <li role="presentation">
        @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
          <a href="#baseball-no-mobile" onclick="lobby(1,0)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Béisbol</a>
        @else
          <a href="#baseball-no-mobile" onclick="lobby(1,1)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Béisbol</a>
        @endif
      </li>
      <li role="presentation">
        @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
          <a href="#football-no-mobile" onclick="lobby(2,0)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Fútbol</a>
        @else
          <a href="#football-no-mobile" onclick="lobby(2,1)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Fútbol</a>
        @endif
      </li> 

      <!--<li role="presentation" style="float:right">
        @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
          <a href="#"  aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Head to Head</a>
        @else
          <a href="#"  aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Head to Head</a>
        @endif
      </li> 
      <li role="presentation" style="float:right">
        @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
          <a href="#"  aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Gratis</a>
        @else
          <a href="#"  aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Gratis</a>
        @endif
      </li> -->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content tab-contentnull tab-contenthome">
    <div role="tabpanel" class="tab-pane fade in active bordyel" id="all-no-mobile">
      <table class="table table-hover table-responsive" id="tabledesk">
        <!-- Abre tabla -->
        <thead>
            <tr>
              <th class="tabimgspace"></th>
              <th class="tabimgspace2"></th>
              <th class="tabcompet">Competición</th>
              <th class="tabinscr">Inscritos</th>
              <th class="tabentr">Entrada</th>
              <th class="tabprem">Premio</th>
              <th class="tabfech">Fecha</th>
              <th class="tabhora">Hora</th>
              <th class="tdrest">Restante</th>
              <th class="tabentrar"></th>
            </tr>
        </thead>
        <tbody id="table-all-no-mobile">
          @foreach($featured_competitions as $competition) 
            <tr>
              <td class="tdimg1">
                  @if($competition->season_format == 11)
                      {{ HTML::image('images/BolaMLB.png','',array('class' => 'tabimgtablet')); }}
                  @elseif($competition->season_format == 12)
                      {{ HTML::image('images/BolaLVBP.png','',array('class' => 'tabimgtablet')); }}
                  @elseif($competition->season_format == 27)
                      {{ HTML::image('images/BolaLIGA.png','',array('class' => 'tabimgtablet')); }}
                  @elseif($competition->season_format == 28)
                      {{ HTML::image('images/BolaUCL.png','',array('class' => 'tabimgtablet')); }}
                  @endif
              </td>
              <td class="tdimg2">
                {{ HTML::image('images/ico/star.png','',array('class' => 'Startd')); }}
              </td>
              <td class="tdcomp2 notdpad" id="tdcomp">
                  @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                      @if($competition->season_format == 11)
                          <a onclick="modal_competition(1,11,{{$competition->id}}, 0)">
                      @elseif($competition->season_format == 12)
                          <a onclick="modal_competition(1,12,{{$competition->id}}, 0)">
                      @elseif($competition->season_format == 27)
                          <a onclick="modal_competition(2,27,{{$competition->id}}, 0)">
                      @elseif($competition->season_format == 28)
                          <a onclick="modal_competition(2,28,{{$competition->id}}, 0)">
                      @endif
                  @else
                      @if($competition->season_format == 11)
                          <a onclick="modal_competition(1,11,{{$competition->id}}, 1)">
                      @elseif($competition->season_format == 12)
                          <a onclick="modal_competition(1,12,{{$competition->id}}, 1)">
                      @elseif($competition->season_format == 27)
                          <a onclick="modal_competition(2,27,{{$competition->id}}, 1)">
                      @elseif($competition->season_format == 28)
                          <a onclick="modal_competition(2,28,{{$competition->id}}, 1)">
                      @endif
                  @endif
                              {{ $competition->name }}
                          </a>
              </td>
              <td class="tdinscr2 notdpad">
                <span>
                  @if($competition->type_competition == 0)
                    {{ HTML::image('images/ico/no-space.png','',array('class' => 'candado')); }}
                  @elseif($competition->type_competition == 1)
                    {{ HTML::image('images/ico/lock.png','',array('class' => 'candado')); }}
                  @elseif($competition->type_competition == 2)
                    {{ HTML::image('images/ico/ticket.png','',array('class' => 'candado')); }}
                  @endif
                </span>
                {{ $competition->enrolled }}/{{ $competition->max_user }}
              </td>
              <td class="tdentr2 notdpad">
                @if($competition->free == 0)
                  <span>
                    {{ HTML::image('images/ico/multiple.png','',array('class' => 'multiple')); }}
                  </span>
                @endif
                {{-- */ $cost_entry = explode(",",number_format($competition->cost_entry,2,",",".")); /* --}}
                @if($cost_entry[1] == 00)
                  {{ number_format($competition->cost_entry,0,"",".") }}
                @else
                  {{ number_format($competition->cost_entry,2,",",".") }}
                @endif
                Bs.
              </td>
              <td class="RepColor tdpremio2 notdpad">
                <span>
                  @if($competition->pote == 0)
                    {{ HTML::image('images/ico/aumento.png','',array('class' => 'tdAumenico')); }}
                  @elseif($competition->pote == 1)
                    {{ HTML::image('images/ico/garantizado.png','',array('class' => 'tdGaranico')); }}
                  @endif
                </span>

                @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                    @if($competition->season_format == 11)
                        <a class="tdPremio" onclick="modal_competition(1,11,{{$competition->id}}, 0)">
                    @elseif($competition->season_format == 12)
                        <a class="tdPremio" onclick="modal_competition(1,12,{{$competition->id}}, 0)">
                    @elseif($competition->season_format == 27)
                        <a class="tdPremio" onclick="modal_competition(2,27,{{$competition->id}}, 0)">
                    @elseif($competition->season_format == 28)
                        <a class="tdPremio" onclick="modal_competition(2,28,{{$competition->id}}, 0)">
                    @endif
                @else
                    @if($competition->season_format == 11)
                        <a class="tdPremio" onclick="modal_competition(1,11,{{$competition->id}}, 1)">
                    @elseif($competition->season_format == 12)
                        <a class="tdPremio" onclick="modal_competition(1,12,{{$competition->id}}, 1)">
                    @elseif($competition->season_format == 27)
                        <a class="tdPremio" onclick="modal_competition(2,27,{{$competition->id}}, 1)">
                    @elseif($competition->season_format == 28)
                        <a class="tdPremio" onclick="modal_competition(2,28,{{$competition->id}}, 1)">
                    @endif
                @endif
                            {{-- */ $cost_garanteed = explode(",",number_format($competition->cost_garanteed,2,",",".")); /* --}}
                            @if($cost_garanteed[1] == 00)
                                {{ number_format($competition->cost_garanteed,0,"",".") }}
                            @else
                                {{ number_format($competition->cost_garanteed,2,",",".") }}
                            @endif
                            Bs.
                        </a>
              </td>
              <td class="tdfecha2 notdpad">
                {{-- */ $day_week = array("Dom", "Lun", "Mar", "Mie","Jue","Vie","Sab"); /* --}}
                {{ $day_week[date('w', strtotime( $competition->date ))].' '; }}

                {{-- */ $date = explode("-",$competition->date); /* --}}
                {{ $day = $date[2] }}-{{ $month = $date[1] }}
              </td>
              <td class="tdhora2 notdpad">
                {{ $competition->hour}}:
                {{-- */ $minut="" /* --}}
                @if($competition->minut == 0)
                  {{-- */ $minut="00" /* --}}
                  {{$minut}}
                @else
                  {{ $competition->minut}}
                @endif
                {{ $competition->hour_format}}
              </td>
              <td class="notdpad">
                @if($competition->date == today)
                  <span id="{{$competition->id}}" style="font-weight: bold;">00:00:00</span>
                @else
                  {{-- */ $date_competition = new DateTime($competition->date); /* --}}
                  {{-- */ $today            = new DateTime(today); /* --}}
                  {{-- */ $days_init        = $today->diff($date_competition); /* --}}
                  <span id="{{$competition->id}}" style="font-weight: bold;">{{$days_init->format('%R%a días');}}</span>
                @endif
              </td>
              <td class="tdentrar2">
                  @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                      @if($competition->season_format == 11)
                          <a onclick="modal_competition(1,11,{{$competition->id}}, 0)">
                      @elseif($competition->season_format == 12)
                          <a onclick="modal_competition(1,12,{{$competition->id}}, 0)">
                      @elseif($competition->season_format == 27)
                          <a onclick="modal_competition(2,27,{{$competition->id}}, 0)">
                      @elseif($competition->season_format == 28)
                          <a onclick="modal_competition(2,28,{{$competition->id}}, 0)">
                      @endif
                  @else
                      @if($competition->season_format == 11)
                          <a onclick="modal_competition(1,11,{{$competition->id}}, 1)">
                      @elseif($competition->season_format == 12)
                          <a onclick="modal_competition(1,12,{{$competition->id}}, 1)">
                      @elseif($competition->season_format == 27)
                          <a onclick="modal_competition(2,27,{{$competition->id}}, 1)">
                      @elseif($competition->season_format == 28)
                          <a onclick="modal_competition(2,28,{{$competition->id}}, 1)">
                      @endif
                  @endif
                              <div class="BtnEntrar2">ENTRAR</div>
                          </a>
              </td>
            </tr>
          @endforeach

          <!-- -------------------------------- NO DESTACADAS DE HOY -------------------------------- -->
          @foreach($no_featured_competitions as $competition)
            <tr>
              <td class="tdimg1">
                  @if($competition->season_format == 11)
                      {{ HTML::image('images/BolaMLB.png','',array('class' => 'tabimgtablet')); }}
                  @elseif($competition->season_format == 12)
                      {{ HTML::image('images/BolaLVBP.png','',array('class' => 'tabimgtablet')); }}
                  @elseif($competition->season_format == 27)
                      {{ HTML::image('images/BolaLIGA.png','',array('class' => 'tabimgtablet')); }}
                  @elseif($competition->season_format == 28)
                      {{ HTML::image('images/BolaUCL.png','',array('class' => 'tabimgtablet')); }}
                  @endif
              </td>
              <td class="tdimg2">
                {{ HTML::image('images/ico/no-space.png','',array('class' => 'tabimgtablet')); }}
              </td>
              <td class="tdcomp2 notdpad" id="tdcomp">
                @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                  @if($competition->season_format == 11)
                    <a onclick="modal_competition(1,11,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 12)
                    <a onclick="modal_competition(1,12,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 27)
                    <a onclick="modal_competition(2,27,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 28)
                    <a onclick="modal_competition(2,28,{{$competition->id}}, 0)">
                  @endif
                @else
                  @if($competition->season_format == 11)
                    <a onclick="modal_competition(1,11,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 12)
                    <a onclick="modal_competition(1,12,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 27)
                    <a onclick="modal_competition(2,27,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 28)
                    <a onclick="modal_competition(2,28,{{$competition->id}}, 1)">
                  @endif
                @endif
                    {{ $competition->name }}
                  </a>
              </td>
              <td class="tdinscr2 notdpad">
                <span>
                  @if($competition->type_competition == 0)
                    {{ HTML::image('images/ico/no-space.png','',array('class' => 'candado')); }}
                  @elseif($competition->type_competition == 1)
                    {{ HTML::image('images/ico/lock.png','',array('class' => 'candado')); }}
                  @elseif($competition->type_competition == 2)
                    {{ HTML::image('images/ico/ticket.png','',array('class' => 'candado')); }}
                  @endif
                </span>
                {{ $competition->enrolled }}/{{ $competition->max_user }}
              </td>
              <td class="tdentr2 notdpad">
                @if($competition->free == 0)
                  <span>
                    {{ HTML::image('images/ico/multiple.png','',array('class' => 'multiple')); }}
                  </span>
                @endif
                {{-- */ $cost_entry = explode(",",number_format($competition->cost_entry,2,",",".")); /* --}}
                @if($cost_entry[1] == 00)
                  {{ number_format($competition->cost_entry,0,"",".") }}
                @else
                  {{ number_format($competition->cost_entry,2,",",".") }}
                @endif
                Bs.
              </td>
              <td class="RepColor tdpremio2 notdpad">
                <span>
                  @if($competition->pote == 0)
                    {{ HTML::image('images/ico/aumento.png','',array('class' => 'tdAumenico')); }}
                  @elseif($competition->pote == 1)
                    {{ HTML::image('images/ico/garantizado.png','',array('class' => 'tdGaranico')); }}
                  @endif
                </span>

                @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                  @if($competition->season_format == 11)
                    <a class="tdPremio" onclick="modal_competition(1,11,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 12)
                    <a class="tdPremio" onclick="modal_competition(1,12,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 27)
                    <a class="tdPremio" onclick="modal_competition(2,27,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 28)
                    <a class="tdPremio" onclick="modal_competition(2,28,{{$competition->id}}, 0)">
                  @endif
                @else
                  @if($competition->season_format == 11)
                    <a class="tdPremio" onclick="modal_competition(1,11,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 12)
                    <a class="tdPremio" onclick="modal_competition(1,12,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 27)
                    <a class="tdPremio" onclick="modal_competition(2,27,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 28)
                    <a class="tdPremio" onclick="modal_competition(2,28,{{$competition->id}}, 1)">
                  @endif
                @endif
                      {{-- */ $cost_garanteed = explode(",",number_format($competition->cost_garanteed,2,",",".")); /* --}}
                      @if($cost_garanteed[1] == 00)
                        {{ number_format($competition->cost_garanteed,0,"",".") }}
                      @else
                        {{ number_format($competition->cost_garanteed,2,",",".") }}
                      @endif
                      Bs.
                  </a>
              </td>
              <td class="tdfecha2 notdpad">
                {{-- */ $day_week = array("Dom", "Lun", "Mar", "Mie","Jue","Vie","Sab"); /* --}}
                {{ $day_week[date('w', strtotime( $competition->date ))].' '; }}

                {{-- */ $date = explode("-",$competition->date); /* --}}
                {{ $day = $date[2] }}-{{ $month = $date[1] }}
              </td>
              <td class="tdhora2 notdpad">
                {{ $competition->hour}}:
                {{-- */ $minut="" /* --}}
                @if($competition->minut == 0)
                  {{-- */ $minut="00" /* --}}
                  {{$minut}}
                @else
                  {{ $competition->minut}}
                @endif
                {{ $competition->hour_format}}
              </td>
              <td class="notdpad">
                @if($competition->date == today)
                  <span id="{{$competition->id}}" style=" font-weight: bold;">00:00:00</span>
                @else
                  {{-- */ $date_competition = new DateTime($competition->date); /* --}}
                  {{-- */ $today            = new DateTime(today); /* --}}
                  {{-- */ $days_init        = $today->diff($date_competition); /* --}}
                  <span id="{{$competition->id}}" style=" font-weight: bold;">{{$days_init->format('%R%a días');}}</span>
                @endif
              </td>
              <td class="tdentrar2">
                @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                  @if($competition->season_format == 11)
                    <a onclick="modal_competition(1,11,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 12)
                    <a onclick="modal_competition(1,12,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 27)
                    <a onclick="modal_competition(2,27,{{$competition->id}}, 0)">
                  @elseif($competition->season_format == 28)
                    <a onclick="modal_competition(2,28,{{$competition->id}}, 0)">
                  @endif
                @else
                  @if($competition->season_format == 11)
                    <a onclick="modal_competition(1,11,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 12)
                    <a onclick="modal_competition(1,12,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 27)
                    <a onclick="modal_competition(2,27,{{$competition->id}}, 1)">
                  @elseif($competition->season_format == 28)
                    <a onclick="modal_competition(2,28,{{$competition->id}}, 1)">
                  @endif
                @endif
                      <div class="BtnEntrar2">ENTRAR</div>
                    </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- -------------------------------- COMPETICIONES BEISBOL -------------------------------- -->
    <div role="tabpanel" class="tab-pane fade bordyel" id="baseball-no-mobile">
      <table class="table table-hover table-responsive" id="tabledesk">
        <!-- Abre tabla -->
        <thead>
            <tr>
              <th class="tabimgspace"></th>
              <th class="tabimgspace2"></th>
              <th class="tabcompet">Competición</th>
              <th class="tabinscr">Inscritos</th>
              <th class="tabentr">Entrada</th>
              <th class="tabprem">Premio</th>
              <th class="tabfech">Fecha</th>
              <th class="tabhora">Hora</th>
              <th class="tdrest">Restante</th>
              <th class="tabentrar"></th>
            </tr>
        </thead>
        <tbody id="table-baseball-no-mobile">
          
        </tbody>
      </table>
    </div>

    <!-- -------------------------------- COMPETICIONES FUTBOL -------------------------------- -->
    <div role="tabpanel" class="tab-pane fade bordyel" id="football-no-mobile">
      <table class="table table-hover table-responsive" id="tabledesk">
        <!-- Abre tabla -->
        <thead>
        <tr>
          <th class="tabimgspace"></th>
          <th class="tabimgspace2"></th>
          <th class="tabcompet">Competición</th>
          <th class="tabinscr">Inscritos</th>
          <th class="tabentr">Entrada</th>
          <th class="tabprem">Premio</th>
          <th class="tabfech">Fecha</th>
          <th class="tabhora">Hora</th>
          <th class="tdrest">Restante</th>
          <th class="tabentrar"></th>
        </tr>
        </thead>
        <tbody id="table-football-no-mobile">

        </tbody>
      </table>
    </div>
  </div>

  <!-- -------------------------------- FOOTER -------------------------------- -->
  <div class="divtabfoot">
    <div class="divtabfooty">
      {{ HTML::image('images/ico/star.png','',array('class' => 'Star')); }}
      <p class="Legend">Competición Destacada</p>
      {{ HTML::image('images/ico/aumento.png','',array('class' => 'Aumenico')); }}
      <p class="Legend">Aumento de Premio</p>
      {{ HTML::image('images/ico/garantizado.png','',array('class' => 'Garanico')); }}
      <p class="Legend">Premio Garantizado</p>
      {{ HTML::image('images/ico/multiple.png','',array('class' => 'Multiplico')); }}
      <p class="Legend">Entrada Múltiple</p>
      {{ HTML::image('images/ico/lock.png','',array('class' => 'Garanico')); }}
      <p class="Legend">Competición Privada</p>
    </div>
  </div>
</div> <!-- cierre btab3 -->