<div class="modal fade" id="Alineacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog2" role="document" style="margin-top:10%;">
    
        <div class="modal-content" style="text-align: -webkit-center;text-align: -moz-center;">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-compe-title" id="inicioLabel" style="font-size:22pt;">Alineación</h4>
        </div>
        <div class="LineOpo" style="width:90%; margin-bottom:15px;">
                <div id="th4">
                    <div class="Oposaldiv" style="width:40%;padding-top:8px;"><p id="" class="Opotext">Equipo de:</p></div>
                    <div class="OpoOpodiv" style="padding-top:8px;width:60%;text-indent:0;text-align:center;">

                        @if(isset($username))
                            @foreach($username as $user)
                                <input class="inputsalario2" type="text" readonly placeholder="{{$user->username}}">
                            @endforeach
                        @endif
                    </div>
                </div>

                <table class="table table-striped2 table-hover2 tablelineup theadhead">
                    <thead>
                        <tr>
                            <th id="pos">POS</th>
                            <th id="jug">JUGADOR</th>
                            <th id="salario">SALARIO</th>
                        </tr>
                    </thead>
                </table>

                <div class="tab-content tab-contentnull scrollcreate">
                    <div class="tableequipoheightmax3 tab-pane active fade in">
                        <table class="table table-striped2 table-hover2 tablelineup tableequipoheight">
                            <tbody>
                                @if(isset($players))
                                    @foreach($players as $player)
                                        <tr>
                                            <td class="pos2">
                                                @if($player->pos == "OF1" || $player->pos == "OF2" || $player->pos == "OF3")
                                                    OF
                                                @else
                                                    {{$player->pos}}
                                                @endif
                                            </td>
                                            @if($player->pos == "PA")
                                                {{-- */ $name = explode("/", $player->name); /* --}}
                                                <td id="jug"><span id="teamcol">{{$name[0]}}/</span>{{$name[1]}}</td>
                                            @else
                                                <td id="jug">{{$player->name}}</td>
                                            @endif
                                            <td id="salario2">{{$player->salary}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>