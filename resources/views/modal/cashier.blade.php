<div class="modal fade cajero" id="cajero" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align: -webkit-center;text-align: -moz-center;">
    <div class="modal-dialog2 DialogWidth55" role="document" style="margin-top:10%;">
        <div class="modal-content2" style="text-align: -webkit-center;text-align: -moz-center;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="inicioLabel">
                    {!! Html::image('images/ico/minimoneda.png') !!}
                    Cajero
                    {!! Html::image('images/ico/minimoneda.png') !!}

                    </h3>
             </div>
            <div class="modal-body" style="margin:0;padding: 0px 0px 20px 0px;">
                <div id="message_sport">

                </div>
                <div class="cajaseleccion">
                    <a onclick="select_type(1)">
                        <div class="seleccion1">
                            <div class="conticodep">

                                {!! Html::image('images/ico/deposit.png','',array('alt' => 'Recarga')) !!}

                            </div>
                            <div class="conttextdep">
                                <p>Recarga</p>
                            </div>
                        </div>
                    </a>
                    <a onclick="select_type(2)">
                        <div class="seleccion2">
                            <div class="conticodep">
                                {!! Html::image('images/ico/money.png','',array('alt' => 'retira')) !!}
                            </div>
                            <div class="conttextdep">
                                <p>Retira</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="cajaligas11" id="select_type" style="display: none;">
                <div class="tituligas">
                    <h5>~ Selecciona tu transacci&oacute;n ~</h5>
                </div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:25px;">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <!-- Depositos -->
                        <div class="item active" id="pay-type">
                            <!-- Boton Paypal -->
                            @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)

                                <!--<a href="usuario/cajero">
                                    {!! Html::image('images/ico/credit.png','',array('alt' => 'credit')) !!}
                                    <span>Tarjeta Cr&eacute;dito</span>

                                </a>-->

                                <a href="usuario/transferencia">
                                    {!! Html::image('images/ico/transfer.png','',array('alt' => 'transfer')) !!}
                                    <span>Transferencia</span>
                                </a>
                            @else

                                <!--<a onclick="">
                                    {!! Html::image('images/ico/credit.png','',array('alt' => 'credit')) !!}
                                    <span>Tarjeta Cr&eacute;dito</span>
                                </a>-->

                                <a onclick="">
                                    {!! Html::image('images/ico/transfer.png','',array('alt' => 'transfer')) !!}
                                    <span>Transferencia</span>
                                </a>
                            @endif

                        </div>

                        <!-- Retiros -->
                        <div class="item active" id="getmoney-type">
                            @if(isset(Auth::user()->id_tipousuario) && Auth::user()->id_tipousuario==3 && Auth::user()->active==1)

                                <a href="usuario/retirar-dinero">
                                    {!! Html::image('images/ico/transfer.png','',array('alt' => 'transfer')) !!}
                                    <span>Transferencia</span>
                                </a>
                            @else


                                <a onclick="">
                                    {!! Html::image('images/ico/transfer.png','',array('alt' => 'transfer')) !!}
                                    <span>Transferencia</span>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
