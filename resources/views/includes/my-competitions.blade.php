
{!! Html::script('js/competitions/competitions.js') !!}
<div class="btab3 hidden-xs">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabsnull" role="tablist">
    <li role="presentation" class="active BtnLineup10">
      <a href="#all-no-mobile" onclick="lobby(0,0)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Todos</a>
    </li>
    <li role="presentation">
      <a onclick="filter_competitions('baseball', {{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Béisbol</a>
    </li>
    <li role="presentation">
      <a onclick="filter_competitions('football', {{$list_competitions}})" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Fútbol</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content tab-contentnull tab-contenthome">
    <div role="tabpanel" class="tab-pane fade in active bordyel" id="all-no-mobile">
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
            <td class="tdentrar2">
              <div class="BtnEntrar2">ENTRAR</div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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
      <tbody id="list_competitions">

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


