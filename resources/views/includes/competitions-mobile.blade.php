<div class="restab visible-xs">
    <input type="hidden" name="dropsport" id="dropsport" value="0" style="width: 45%;float: left">
    <input type="hidden" name="dropfilter" id="dropfilter" value="0" style="width: 45%;float: left">
    <!--<div class="panel-group visible-xs paneltop" id="accordion" role="tablist" aria-multiselectable="true" style="width: 48%;float:left">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h4 class="panel-title panel-titlecol1">
                            Deportes {{ HTML::image('images/arrowd.png','flecha', array('class'=>'icon-arrow-down')) }}
                    </h4>
                </a>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="datctaban3">
                    <div class="datctabandiv">
                        <p style="text-align:center;width: 100%;border-bottom: 2px dashed #FCD343">
                            @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                                <a href="#all-mobile" onclick="lobby_mobile(0,0)" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
                            @else
                                <a href="#all-mobile" onclick="lobby_mobile(0,1)" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
                            @endif
                        </p>
                        <p style="text-align:center;width: 100%;border-bottom: 2px dashed #FCD343">
                            @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                                <a href="#baseball-mobile" onclick="lobby_mobile(1,0)" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
                            @else
                                <a href="#baseball-mobile" onclick="lobby_mobile(1,1)" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
                            @endif
                        </p>
                        <p style="text-align:center;width: 100%;border-bottom: 2px dashed #FCD343">
                            @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                                <a href="#football-mobile" onclick="lobby_mobile(2,0)" aria-controls="home" role="tab" data-toggle="tab">Fútbol</a>
                            @else
                                <a href="#football-mobile" onclick="lobby_mobile(2,1)" aria-controls="home" role="tab" data-toggle="tab">Fútbol</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-group visible-xs paneltop" id="accordion" role="tablist" aria-multiselectable="true" style="width: 48%;float:right">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <h4 class="panel-title panel-titlecol1">
                            Filtros {{ HTML::image('images/arrowd.png','flecha', array('class'=>'icon-arrow-down')) }}
                    </h4>
                </a>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="datctaban3">
                    <div class="datctabandiv" >
                       
                        <p style="text-align:center;width: 100%;border-bottom: 2px dashed #FCD343">
                            <a href="#">Gratis</a> 
                        </p>
                        <p style="text-align:center;width: 100%;border-bottom: 2px dashed #FCD343">
                            <a href="#">Head to Head</a> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <ul class="nav nav-tabs nav-tabsnull" role="tablist">
        <li role="presentation" class="active BtnLineup10 respli">
            @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                <a href="#all-mobile" onclick="lobby_mobile(0,0)" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
            @else
                <a href="#all-mobile" onclick="lobby_mobile(0,1)" aria-controls="home" role="tab" data-toggle="tab">Todos</a>
            @endif
        </li>
        <li role="presentation" class="respli">
            @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                <a href="#baseball-mobile" onclick="lobby_mobile(1,0)" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
            @else
                <a href="#baseball-mobile" onclick="lobby_mobile(1,1)" aria-controls="home" role="tab" data-toggle="tab">Béisbol</a>
            @endif
        </li>
        <li role="presentation" class="respli">
            @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
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
                    @foreach($featured_competitions as $competition)
                        @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                            @if($competition->season_format == 11)
                                <a onclick="modal_competition(1,11,{{$competition->id}}, 0)">
                            @elseif($competition->season_format == 12)
                                <a onclick="modal_competition(1,12,{{$competition->id}}, 0)">
                            @elseif($competition->season_format == 27)
                                <a onclick="modal_competition(1,27,{{$competition->id}}, 0)">
                            @elseif($competition->season_format == 28)
                                <a onclick="modal_competition(1,28,{{$competition->id}}, 0)">
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
                                    <li class="tmovli">
                                        <div class="divico">
                                            {{ HTML::image('images/ico/star.png','',array('class' => 'Star')); }}
                                        </div>
                                        <h4 class="h4tmovil">
                                           {{ $competition->name }}
                                        </h4>
                                        <div class="tmovilimg">
                                            @if($competition->season_format == 11)
                                                {{ HTML::image('images/BolaMLB.png'); }}
                                            @elseif($competition->season_format == 12)
                                                {{ HTML::image('images/BolaLVBP.png'); }}
                                            @elseif($competition->season_format == 27)
                                                {{ HTML::image('images/BolaLIGA.png'); }}
                                            @elseif($competition->season_format == 28)
                                                {{ HTML::image('images/BolaUCL.png'); }}
                                            @endif
                                        </div>
                                        <div class="tmovdatos">
                                            <div class="div1">
                                                <p>
                                                    {{-- */ $day_week = array("Dom", "Lun", "Mar", "Mie","Jue","Vie","Sab"); /* --}}
                                                    {{ $day_week[date('w', strtotime( $competition->date ))].' '; }}

                                                    {{-- */ $date = explode("-",$competition->date); /* --}}
                                                    {{ $day = $date[2] }}-{{ $month = $date[1] }}


                                                    {{ $competition->hour}}:
                                                    {{-- */ $minut="" /* --}}
                                                    @if($competition->minut == 0)
                                                      {{-- */ $minut="00" /* --}}
                                                      {{$minut}}
                                                    @else
                                                      {{ $competition->minut}}
                                                    @endif
                                                    {{ $competition->hour_format}}
                                                </p>
                                                <div class="tmovtabico">
                                                    @if($competition->type_competition == 0)
                                                      {{ HTML::image('images/ico/white-space.png','',array('class' => 'Garanico')); }}
                                                    @elseif($competition->type_competition == 1)
                                                      {{ HTML::image('images/ico/lock.png','',array('class' => 'Garanico')); }}
                                                    @elseif($competition->type_competition == 2)
                                                      {{ HTML::image('images/ico/ticket.png','',array('class' => 'Garanico')); }}
                                                    @endif
                                                </div>
                                                <p>
                                                    <span>Entrada</span>
                                                    {{-- */ $cost_entry = explode(",",number_format($competition->cost_entry,2,",",".")); /* --}}
                                                    @if($cost_entry[1] == 00)
                                                      {{ number_format($competition->cost_entry,0,"",".") }}
                                                    @else
                                                      {{ number_format($competition->cost_entry,2,",",".") }}
                                                    @endif
                                                    Bs.
                                                </p>
                                            </div>
                                            <div class="div1">
                                                <p><span>Inscritos</span>{{ $competition->enrolled }}/{{ $competition->max_user }}</p>
                                                <div class="tmovtabico">
                                                    @if($competition->pote == 0)
                                                      {{ HTML::image('images/ico/aumento.png','',array('class' => 'Aumenico')); }}
                                                    @elseif($competition->pote == 1)
                                                      {{ HTML::image('images/ico/garantizado.png','',array('class' => 'Garanico')); }}
                                                    @endif
                                                </div>
                                                <p>
                                                    <span>Premio</span>
                                                    {{-- */ $cost_garanteed = explode(",",number_format($competition->cost_garanteed,2,",",".")); /* --}}
                                                    @if($cost_garanteed[1] == 00)
                                                      {{ number_format($competition->cost_garanteed,0,"",".") }}
                                                    @else
                                                      {{ number_format($competition->cost_garanteed,2,",",".") }}
                                                    @endif
                                                    Bs.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="next">
                                            {{ HTML::image('images/ico/next.png','',array('class' => 'Aumenico')); }}
                                        </div>
                                        <div class="next2">
                                            {{ HTML::image('images/ico/next2.png','',array('class' => 'next21')); }}
                                        </div>
                                    </li>
                                </a>
                    @endforeach


                    <!-- -------------------------------- NO DESTACADAS -------------------------------- -->
                    @foreach($no_featured_competitions as $competition)
                        @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)
                            @if($competition->season_format == 11)
                                <a onclick="modal_competition(1,11,{{$competition->id}}, 0)">
                            @elseif($competition->season_format == 12)
                                <a onclick="modal_competition(1,12,{{$competition->id}}, 0)">
                            @elseif($competition->season_format == 27)
                                <a onclick="modal_competition(1,27,{{$competition->id}}, 0)">
                            @elseif($competition->season_format == 28)
                                <a onclick="modal_competition(1,28,{{$competition->id}}, 0)">
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
                                    <li class="tmovli">
                                        <div class="divico">
                                            {{ HTML::image('images/ico/white-star.png','',array('class' => 'Star')); }}
                                        </div>
                                        <h4 class="h4tmovil">
                                            {{ $competition->name }}
                                        </h4>
                                        <div class="tmovilimg">
                                            @if($competition->season_format == 11)
                                                {{ HTML::image('images/BolaMLB.png'); }}
                                            @elseif($competition->season_format == 12)
                                                {{ HTML::image('images/BolaLVBP.png'); }}
                                            @elseif($competition->season_format == 27)
                                                {{ HTML::image('images/BolaLIGA.png'); }}
                                            @elseif($competition->season_format == 28)
                                                {{ HTML::image('images/BolaUCL.png'); }}
                                            @endif
                                        </div>
                                        <div class="tmovdatos">
                                            <div class="div1">
                                                <p>
                                                    {{-- */ $day_week = array("Dom", "Lun", "Mar", "Mie","Jue","Vie","Sab"); /* --}}
                                                    {{ $day_week[date('w', strtotime( $competition->date ))].' '; }}

                                                    {{-- */ $date = explode("-",$competition->date); /* --}}
                                                    {{ $day = $date[2] }}-{{ $month = $date[1] }}

                                                    {{ $competition->hour}}:
                                                    {{-- */ $minut="" /* --}}
                                                    @if($competition->minut == 0)
                                                      {{-- */ $minut="00" /* --}}
                                                      {{$minut}}
                                                    @else
                                                      {{ $competition->minut}}
                                                    @endif
                                                    {{ $competition->hour_format}}
                                                </p>
                                                <div class="tmovtabico">
                                                    @if($competition->type_competition == 0)
                                                      {{ HTML::image('images/ico/white-space.png','',array('class' => 'Garanico')); }}
                                                    @elseif($competition->type_competition == 1)
                                                      {{ HTML::image('images/ico/lock.png','',array('class' => 'Garanico')); }}
                                                    @elseif($competition->type_competition == 2)
                                                      {{ HTML::image('images/ico/ticket.png','',array('class' => 'Garanico')); }}
                                                    @endif
                                                </div>
                                                <p>
                                                    <span>Entrada</span>
                                                    {{-- */ $cost_entry = explode(",",number_format($competition->cost_entry,2,",",".")); /* --}}
                                                    @if($cost_entry[1] == 00)
                                                      {{ number_format($competition->cost_entry,0,"",".") }}
                                                    @else
                                                      {{ number_format($competition->cost_entry,2,",",".") }}
                                                    @endif
                                                    Bs.
                                                </p>
                                            </div>
                                            <div class="div1">
                                                <p><span>Inscritos</span>{{ $competition->enrolled }}/{{ $competition->max_user }}</p>
                                                <div class="tmovtabico">
                                                    @if($competition->pote == 0)
                                                      {{ HTML::image('images/ico/aumento.png','',array('class' => 'Aumenico')); }}
                                                    @elseif($competition->pote == 1)
                                                      {{ HTML::image('images/ico/garantizado.png','',array('class' => 'Garanico')); }}
                                                    @endif
                                                </div>
                                                <p>
                                                    <span>Premio</span>
                                                    {{-- */ $cost_garanteed = explode(",",number_format($competition->cost_garanteed,2,",",".")); /* --}}
                                                    @if($cost_garanteed[1] == 00)
                                                      {{ number_format($competition->cost_garanteed,0,"",".") }}
                                                    @else
                                                      {{ number_format($competition->cost_garanteed,2,",",".") }}
                                                    @endif
                                                    Bs.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="next">
                                            {{ HTML::image('images/ico/next.png','',array('class' => 'Aumenico')); }}
                                        </div>
                                        <div class="next2">
                                            {{ HTML::image('images/ico/next2.png','',array('class' => 'next21')); }}
                                        </div>
                                    </li>
                                </a>
                    @endforeach
                </ul>
                <div class="divtabfoot2">
                    <div class="divtabfooty2">
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/star.png','',array('class' => 'Star')); }}
                            <p class="Legend">Competición Destacada</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/aumento.png','',array('class' => 'Aumenico')); }}
                            <p class="Legend">Aumento de Premio</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/garantizado.png','',array('class' => 'Garanico')); }}
                            <p class="Legend">Premio Garantizado</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/lock.png','',array('class' => 'Garanico')); }}
                            <p class="Legend">Competición Privada</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------------------------- COMPETICIONES BEISBOL -------------------------------- -->
        <div role="tabpanel" class="tab-pane fade bordyel noscroll" id="baseball-mobile">
            <div class="tablemovil">
                <ul id="ul-baseball-mobile">

                </ul>
                <div class="divtabfoot2">
                    <div class="divtabfooty2">
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/star.png','',array('class' => 'Star')); }}
                            <p class="Legend">Competición Destacada</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/aumento.png','',array('class' => 'Aumenico')); }}
                            <p class="Legend">Aumento de Premio</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/garantizado.png','',array('class' => 'Garanico')); }}
                            <p class="Legend">Premio Garantizado</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/lock.png','',array('class' => 'Garanico')); }}
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
                            {{ HTML::image('images/ico/star.png','',array('class' => 'Star')); }}
                            <p class="Legend">Competición Destacada</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/aumento.png','',array('class' => 'Aumenico')); }}
                            <p class="Legend">Aumento de Premio</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/garantizado.png','',array('class' => 'Garanico')); }}
                            <p class="Legend">Premio Garantizado</p>
                        </div>
                        <div class="indivfooty">
                            {{ HTML::image('images/ico/lock.png','',array('class' => 'Garanico')); }}
                            <p class="Legend">Competición Privada</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>