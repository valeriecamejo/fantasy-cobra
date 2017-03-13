<div class="btab3 hidden-xs">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabsnull" role="tablist">
      <li role="presentation" class="active BtnLineup10">
        @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
          <a href="#all-no-mobile" onclick="lobby(0,0)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Todos</a>
        @else
          <a href="#all-no-mobile" onclick="lobby(0,1)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Todos</a>
        @endif
      </li>
      <li role="presentation">
        @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
          <a href="#baseball-no-mobile" onclick="lobby(1,0)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Béisbol</a>
        @else
          <a href="#baseball-no-mobile" onclick="lobby(1,1)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Béisbol</a>
        @endif
      </li>
      <li role="presentation">
        @if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id==3 && Auth::user()::STATUS_ACTIVE)
          <a href="#football-no-mobile" onclick="lobby(2,0)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Fútbol</a>
        @else
          <a href="#football-no-mobile" onclick="lobby(2,1)" aria-controls="home" role="tab" data-toggle="tab" style="cursor: pointer;">Fútbol</a>
        @endif
      </li>
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