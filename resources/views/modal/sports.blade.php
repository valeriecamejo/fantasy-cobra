<div class="modal fade sports" id="sports" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align: -webkit-center;text-align: -moz-center;">
    <div class="modal-dialog2 DialogWidth55" role="document" style="margin-top:10%;">
        <div class="modal-content2" style="text-align: -webkit-center;text-align: -moz-center;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-compe-title" id="inicioLabel" style="font-size:18pt;">SELECCIONA EL DEPORTE</h4>
            </div>
            <div class="modal-body" style="margin:0;padding: 0px 0px 20px 0px;">
                <div id="message_sport">

                </div>
                <div class="cajaseleccion">
                    <a onclick="select_sport(1)">
                        <div class="seleccion1">
                            <div class="conticodep">
                                {!! Html::image('images/ico/beisbolico.png','',array('alt' => 'Béisbol')) !!}
                            </div>
                            <div class="conttextdep">
                                <p>Béisbol</p>
                            </div>
                        </div>
                    </a>
                    <a onclick="select_sport(2)">
                        <div class="seleccion2">
                            <div class="conticodep">
                                {!! Html::image('images/ico/futbollico.png','',array('alt' => 'Fútbol')) !!}
                            </div>
                            <div class="conttextdep">
                                <p>Fútbol</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="cajaligas1" id="select_league" style="display: none;">
                <div class="tituligas">
                    <h5>~ Selecciona la liga ~</h5>
                </div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:25px;">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active" id="baseball-leagues">

                        </div>
                        <div class="item active" id="football-leagues">

                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
