{!! Html::script('js/competitions/competitions.js') !!}
{!! Html::script('js/competitions/show_competition.js') !!}
{!! Html::script('js/vuejs/competition/competition_details.js') !!}

  <div class="container-fluid Filtros">
    <div class="BlockFil col-sm-6">
      <h4>Elige tu liga</h4>
      <ul class="ContFil btn-group">
        <li role="presentation" class="btn btn-default active">
          <a href="#competiciones" onclick="filter_competitions('all',window.filter_type,{{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#competiciones" onclick="filter_competitions('baseball',window.filter_type,{{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#competiciones" onclick="filter_competitions('football',window.filter_type,{{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab">Fútbol</a>
        </li>
      </ul>
    </div>
    <div class="BlockFil2 col-sm-6">
      <h4>Elige tu tipo de competencia</h4>
      <ul class="ContFil btn-group">
        <li role="presentation" class="btn btn-default active">
          <a href="#competiciones" onclick="filter_competitions(window.sport,'all',{{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#competiciones" onclick="filter_competitions(window.sport,'H2H', {{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab">H2H</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#competiciones" onclick="filter_competitions(window.sport,'TURBO', {{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab">Turbo</a>
        </li>
        <li role="presentation" class="btn btn-default">
          <a href="#competiciones" onclick="filter_competitions(window.sport,'FREE', {{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab">Gratis</a>
        </li>
      </ul>
    </div>
  </div>

  <!-- Tab panes -->
  <div class="tab-content tab-contentnull tab-contenthome">
    <div role="tabpanel" class="tab-pane fade in active bordyel" id="competiciones">
      <table class="table table-hover table-responsive" id="tabledesk">
        <!-- Abre tabla -->
        <thead>
          <tr>
            <th class="tabimgspace">     </th>
            <th class="tabimgspace2">    </th>
            <th class="tabcompet">Competición</th>
            <th class="tabinscr"> Inscritos  </th>
            <th class="tabentr">  Entrada  </th>
            <th class="tabprem">  Premio   </th>
            <th class="tabfech">  Fecha    </th>
            <th class="tabhora">  Hora     </th>
            <th class="tdrest">   Restante   </th>
            <th class="tabentrar">       </th>
          </tr>
        </thead>
        <tbody id="table-all-no-mobile">
          @foreach ($list_competitions as $competition)
        <tr>
          <td class="tdimg1">
            {!! Html::image($competition->avatar,'',array('class' => 'tabimgtablet')) !!}
          </td>
          <td class="tdimg2">
            @if($competition->is_important == 1)
            {!! Html::image('images/ico/star.png','',array('class' => 'Startd')) !!}
            @endif
          </td>
          <td class="tdcomp2 notdpad" id="tdcomp">
            {!! $competition->name !!}
          </td>
          <td class="tdinscr2 notdpad">
            <span>
            </span>
            {!! $competition->enrolled !!}/{!! $competition->user_max !!}
          </td>
          <td class="tdentr2 notdpad">
            @if($competition->free == 0)
            <span>
              {!! Html::image('images/ico/multiple.png','',array('class' => 'multiple')) !!}
            </span>
            @endif
            {!! $competition->entry_cost; !!}
            Bs.
          </td>
          <td class="RepColor tdpremio2 notdpad">
            <span>
              @if($competition->pot == 1)
              {!! Html::image('images/ico/aumento.png','',array('class' => 'tdAumenico')) !!}
              @else
              {!! Html::image('images/ico/garantizado.png','',array('class' => 'tdGaranico')) !!}
              @endif
            </span>
            {!! $competition->cost_guaranteed !!}
            Bs.
          </td>
          <td class="tdfecha2 notdpad">
            @php
            $date = strtotime($competition->date)
            @endphp

            {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
            {{ date("d-m", $date) }}

          </td>
          <td class="tdhora2 notdpad">
            {{ date("h:i a", $date) }}
          </td>
          <td class="notdpad">
            @php
            $date  = new DateTime($competition->date);
            $today = new DateTime("now");
            @endphp
            @if($competition->date == $today)
            <span id="{{$competition->id}}" style="font-weight: bold;">00:00:00</span>
            @else
            <span id="{{$competition->id}}" style="font-weight: bold;">
              {{ $today->diff($date)->format('%R%a días') }}
            </span>
            @endif
          </td>
          <!-- <td class="tdentrar2">
            <a>
              <div class="BtnEntrar2">ENTRAR</div>
            </a>
          </td -->>
           <td class="tdentrar2">
            @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
              <div class="BtnEntrar2" onclick="showCompetition({{$competition->id}})">ENTRAR</div>
            @else
              <div class="BtnEntrar2" href=".login" data-toggle="modal">ENTRAR</div>
            @endif
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

<!-- -------------------------------- FOOTER -------------------------------- -->
<div class="divtabfoot">
  <div class="divtabfooty">
    {!! Html::image('images/ico/star.png','',array('class' => 'Star')) !!}
    <p class="Legend">Competición Destacada</p>
    {!! Html::image('images/ico/aumento.png','',array('class' => 'Aumenico')) !!}
    <p class="Legend">Aumento de Premio</p>
    {!! Html::image('images/ico/garantizado.png','',array('class' => 'Garanico')) !!}
    <p class="Legend">Premio Garantizado</p>
    {!! Html::image('images/ico/multiple.png','',array('class' => 'Multiplico')) !!}
    <p class="Legend">Entrada Múltiple</p>
    {!! Html::image('images/ico/lock.png','',array('class' => 'Garanico')) !!}
    <p class="Legend">Competición Privada</p>
  </div>
</div>
</div>
