<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-compe-title" id="lineup_name">

                </h3>
            </div>
            <div class="modal-body">
                <div class="Tablestatcomp">
                    <table class="Tablacompetencia2" id="lineup_salary">

                    </table>
                    <table class="Tablacompetencia2" id="lineup_date">

                    </table>
                    <table class="Tablacompetencia2" id="lineup_points">

                    </table>
                </div>

                <div class="blockscomp2">
                    <div class="subblockcomp">
                        <div class="headsubblock">Competiciones</div>
                        <div class="comptables" id="style-6">
                            <div id="competition_modal">

                            </div>
                        </div>
                        <div class="footsubblock">
                            Puedes inscribirte hasta un máximo de 4 veces en cada competición.
                        </div>
                    </div>
                    <div class="subblockcomp">
                        <div class="headsubblock">Equipo</div>
                        <div class="comptables" id="style-6">
                            <table class="table table-striped2 table-hover2 tablelineup" id="players_lineup">

                            </table>
                        </div>

                        <!--<div>-->
                            {!! Form::open(array('url' => 'usuario/editar-equipo', 'method' => 'post')) !!}

                            <div class="footsubblock" id="activateedit">

                            </div>
                         {!! Form::close() !!}
                        <!--</div>-->

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>