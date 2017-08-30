{!! Html::script('js/competitions/competitions.js') !!}
{!! Html::script('js/competitions/show_competition.js') !!}

<div class="restab visible-xs">
    <div class="btab3">
        <div class="container-fluid Filtros">
            <div class="BlockFil col-xs-12">
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
            <div class="BlockFil2 col-xs-12">
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

            <div role="tabpanel" class="tab-pane fade in active bordyel noscroll" id="competiciones">
                <div class="tablemovil">
                    @if(isset($list_competitions) && count($list_competitions) == 0)
                        <div class="col-xs-12 col-xs-offset-1">
                            <tr>
                                <td style="text-align: center;" colspan="9">
                                    <h5>No tienes equipos creados</h5>
                                    <h4>Te invitamos a que disfrutes de la plataforma.</h4>
                                </td>
                            </tr>
                        </div>
                    @else
                        @foreach ($list_competitions as $competition)
                        <ul>
                            <li class="tmovli">
                                <div class="divico"><img class="Star" src="images/ico/star.png"/></div>
                                <h4 class="h4tmovil"><a href="">{!! $competition->name !!}</a></h4>
                                <div class="tmovilimg">{!! Html::image($competition->avatar,'',array('class' => 'tabimgtablet')) !!}</div>
                                <div class="tmovdatos">

                                    <div class="div1">
                                        @php
                                            $date = strtotime($competition->date)
                                        @endphp
                                        <p>
                                            {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                                            {{ date("d-m", $date) }}
                                            {{ date("h:i a", $date) }}
                                        </p>
                                        <div class="tmovtabico">
                                            @if($competition->type == 'PRIVATE')
                                                    <img class="Garanico" src="images/ico/lock.png"/>
                                            @endif
                                        </div>
                                        <p><span>Entrada</span>
                                            {!! $competition->entry_cost !!}</p>
                                    </div>

                                    <div class="div1">
                                        <p><span>Inscritos</span>{!! $competition->enrolled !!}/{!! $competition->user_max !!}</p>
                                        <div class="tmovtabico">
                                            @if($competition->pot == 1)
                                                <img class="Aumenico" src="images/ico/aumento.png"/>
                                            @else
                                                <img class="Garanico" src="images/ico/garantizado.png"/>
                                            @endif
                                        </div>
                                        <p><span>Premio</span>{!! $competition->cost_guaranteed !!} Bs.</p>
                                    </div>
                                </div>
                                <div class="next">
                                    <a href=""><img class="Aumenico" src="images/ico/next.png"/></a>
                                </div>
                                <div class="next2">
                                    <a href=""><img class="next21" src="images/ico/next2.png"/></a>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
        </div> <!-- restab cierre -->
        <div class="divtabfoot2">
            <div class="divtabfooty2">
                <div class="indivfooty"><img class="Star" src="images/ico/star.png"/>
                    <p class="Legend">Competición Destacada</p>
                </div>
                <div class="indivfooty">
                    <img class="Aumenico" src="images/ico/aumento.png"/>
                    <p class="Legend">Aumento de Premio</p>
                </div>
                <div class="indivfooty">
                    <img class="Garanico" src="images/ico/garantizado.png"/>
                    <p class="Legend">Premio Garantizado</p>
                </div>
                <div class="indivfooty">
                    <img class="Garanico" src="images/ico/lock.png"/>
                    <p class="Legend">Competición Privada</p>
                </div>
            </div>
        </div>
    </div>
</div>
