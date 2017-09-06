{!! Html::script('js/vuejs/competition/competition_details.js') !!}

<div class="modal fade Competiciones" id="info_competition" tabindex="-1" role="dialog" aria-labelledby="inicioLabel">
  <div class="modal-dialog2" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-compe-title" id="competition_name">
        </h4>
      </div>

      <div class="modal-body">
        <div id="message">
        </div>

        <div class="visible-xs" style="text-align:center;">
          <table class="Tablacompetencia2" id="mobile_competition_enrolled">
          </table>

          <table class="Tablacompetencia2" id="mobile_competition_cost_entry">
          </table>

          <table class="Tablacompetencia2" id="mobile_competition_cost_garanteed">
          </table>

          <table class="Tablacompetencia2" id="mobile_competition_min_user">
          </table>
        </div>

        <div class="Tablestatcomp hidden-xs">
          <table class="Tablacompetencia" id="competition_info">
          </table>
          <div class="subblockmod">
            <h5 id="competition_description">
            </h5>
          </div>
        </div>

        <div class="subblockmod" id="competition_password" style="width: 100% !important;">
        </div>
        <div class="blockscomp2">
          <div class="subblockcomp">
            <div class="headsubblock">Participantes</div>
            <div class="comptables" id="style-6">
              <table class="Tablepart table-striped3 table-hover3" id="competition_participants">
              </table>
            </div>
          </div>
          <div class="subblockcomp">
            <div class="headsubblock">Premios</div>
            <div class="comptables" id="style-6">
              <table class="TablePrem table-striped3 table-hover3" id="competition_prizes">
              </table>
            </div>
          </div>
        </div>
      </div>

      <div id="competition_id_create">
      </div>
      <div class="modal-footer">
        <div id="button_create">

        </div>
      </div>
    </div>
  </div>
</div>
