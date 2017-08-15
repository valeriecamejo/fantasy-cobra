<div class="restab visible-xs">
  <input type="hidden" name="dropsport" id="dropsport" value="0" style="width: 45%;float: left">
  <input type="hidden" name="dropfilter" id="dropfilter" value="0" style="width: 45%;float: left">
  <ul class="nav nav-tabs nav-tabsnull" role="tablist">
    <li role="presentation" class="active BtnLineup10 respli">
      @if(isset(Auth::user()->user_type_id) and Auth::user()->user_type_id==3 and Auth::user()::STATUS_ACTIVE)
      <a href="#all-mobile" onclick="lobby_mobile(0,0)" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
      @else
      <a href="#all-mobile" onclick="lobby_mobile(0,1)" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
      @endif
    </li>
    <li role="presentation" class="respli">
      @if(isset(Auth::user()->user_type_id) and Auth::user()->user_type_id==3 and Auth::user()::STATUS_ACTIVE)
      <a href="#baseball-mobile" onclick="lobby_mobile(1,0)" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
      @else
      <a href="#baseball-mobile" onclick="lobby_mobile(1,1)" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
      @endif
    </li>
    <li role="presentation" class="respli">
      @if(isset(Auth::user()->user_type_id) and Auth::user()->user_type_id==3 and Auth::user()::STATUS_ACTIVE)
      <a href="#football-mobile" onclick="lobby_mobile(2,0)" aria-controls="home" role="tab" data-toggle="tab">Fútbol</a>
      @else
      <a href="#football-mobile" onclick="lobby_mobile(2,1)" aria-controls="home" role="tab" data-toggle="tab">Fútbol</a>
      @endif
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content tab-contentnull tab-contenthome">

    <!-- -------------------------------- TODAS LAS COMPETICIONES -------------------------------- -->
    <div role="tabpanel" class="tab-pane fade in active bordyel noscroll" id="all-mobile">
      <div class="tablemovil">
        <ul id="ul-all-mobile">
          <!-- -------------------------------- DESTACADAS DE HOY -------------------------------- -->
          @foreach($list_competitions as $competition)
          <li class="tmovli">
            <div class="divico">
              @if($competition->is_important == 1)
              {!! Html::image('images/ico/star.png','',array('class' => 'Star')) !!}
              @else
              {!! Html::image('images/ico/white-star.png','',array('class' => 'Star')) !!}
              @endif
            </div>
            <h4 class="h4tmovil">
              {{ $competition->name }}
            </h4>
            <div class="tmovilimg">
              {!! Html::image($competition->avatar,'',array('class' => 'tabimgtablet')) !!}
            </div>
            <div class="tmovdatos">
              <div class="div1">
                <p>
                  @php
                  $date = strtotime($competition->date)
                  @endphp

                  {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                  {{ date("d-m", $date) }}
                </p>
                <div class="tmovtabico">
                  @if($competition->type == 'PUBLIC')
                  {!! Html::image('images/ico/white-space.png','',array('class' => 'Garanico')) !!}
                  @else
                  {!! Html::image('images/ico/lock.png','',array('class' => 'Garanico')) !!}
                  @endif
                </div>
                <p>
                  <span>Entrada</span>
                  @php
                  $entry_cost = explode(",",number_format($competition->entry_cost,2,",","."));
                  @endphp
                  @if($entry_cost[1] == 00)
                  {{ number_format($competition->entry_cost,0,"",".") }}
                  @else
                  {{ number_format($competition->entry_cost,2,",",".") }}
                  @endif
                  Bs.
                </p>
              </div>
              <div class="div1">
                <p><span>Inscritos</span>
                  {{ $competition->enrolled }}/{{ $competition->user_max }}
                </p>
                <div class="tmovtabico">
                  @if($competition->pot == 0)
                  {!! Html::image('images/ico/aumento.png','',array('class' => 'Aumenico')) !!}
                  @elseif($competition->pot == 1)
                  {!! Html::image('images/ico/garantizado.png','',array('class' => 'Garanico')) !!}
                  @endif
                </div>
                <p>
                 <span>Premio</span>
                 @php
                 $cost_guaranteed = explode(",",number_format($competition->cost_guaranteed,2,",","."));
                 @endphp
                 @if($cost_guaranteed[1] == 00)
                 {{ number_format($competition->cost_guaranteed,0,"",".") }}
                 @else
                 {{ number_format($competition->cost_guaranteed,2,",",".") }}
                 @endif
                 Bs.
               </p>
             </div>
           </div>
           <div class="next">
            {!! Html::image('images/ico/next.png','',array('class' => 'Aumenico')) !!}
          </div>
          <div class="next2">
          {!! Html::image('images/ico/next2.png','',array('class' => 'next21')) !!}
          </div>
        </li>
      </a>

      @endforeach

      <!-- -------------------------------- COMPETICIONES BEISBOL -------------------------------- -->
        <div role="tabpanel" class="tab-pane fade bordyel noscroll" id="baseball-mobile">
            <div class="tablemovil">
                <ul id="ul-baseball-mobile">

                </ul>
                <div class="divtabfoot2">
                    <div class="divtabfooty2">
                        <div class="indivfooty">
                            {!! Html::image('images/ico/star.png','',array('class' => 'Star')) !!}
                            <p class="Legend">Competición Destacada</p>
                        </div>
                        <div class="indivfooty">
                            {!! Html::image('images/ico/aumento.png','',array('class' => 'Aumenico')) !!}
                            <p class="Legend">Aumento de Premio</p>
                        </div>
                        <div class="indivfooty">
                            {!! Html::image('images/ico/garantizado.png','',array('class' => 'Garanico')) !!}
                            <p class="Legend">Premio Garantizado</p>
                        </div>
                        <div class="indivfooty">
                            {!! Html::image('images/ico/lock.png','',array('class' => 'Garanico')) !!}
                            <p class="Legend">Competición Privada</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------------------------- COMPETICIONES FUTBOL -------------------------------- -->
        <div role="tabpanel" class="tab-pane fade bordyel noscroll" id="football-mobile">
            <div class="tablemovil">
                <ul id="ul-football-mobile">

                </ul>
                <div class="divtabfoot2">
                    <div class="divtabfooty2">
                        <div class="indivfooty">
                            {!! Html::image('images/ico/star.png','',array('class' => 'Star')) !!}
                        </div>
                        <div class="indivfooty">
                            {!! Html::image('images/ico/aumento.png','',array('class' => 'Aumenico')) !!}
                            <p class="Legend">Aumento de Premio</p>
                        </div>
                        <div class="indivfooty">
                            {!! Html::image('images/ico/garantizado.png','',array('class' => 'Garanico')) !!}
                            <p class="Legend">Premio Garantizado</p>
                        </div>
                        <div class="indivfooty">
                            {!! Html::image('images/ico/lock.png','',array('class' => 'Garanico')) !!}
                            <p class="Legend">Competición Privada</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- -------------------------------- FOOTER -------------------------------- -->
<!--   <div class="divtabfoot2">
    <div class="divtabfooty2">
      <div class="indivfooty">
        <img src="https://www.fantasycobra.com.ve/images/ico/star.png" class="Star" alt="">
        <p class="Legend">Competición Destacada</p>
      </div>
      <div class="indivfooty">
        <img src="https://www.fantasycobra.com.ve/images/ico/aumento.png" class="Aumenico" alt="">
        <p class="Legend">Aumento de Premio</p>
      </div>
      <div class="indivfooty">
        <img src="https://www.fantasycobra.com.ve/images/ico/garantizado.png" class="Garanico" alt="">
        <p class="Legend">Premio Garantizado</p>
      </div>
      <div class="indivfooty">
        <img src="https://www.fantasycobra.com.ve/images/ico/lock.png" class="Garanico" alt="">
        <p class="Legend">Competición Privada</p>
      </div>
    </div>
  </div> -->
