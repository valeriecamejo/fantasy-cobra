{!! Html::script('js/competitions/competitions.js') !!}
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
