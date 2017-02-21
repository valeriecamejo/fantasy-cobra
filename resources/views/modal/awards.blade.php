<div class="modal fade" id="Premios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align: -webkit-center;text-align: -moz-center;">
    <div class="modal-dialog2 DialogWidth" role="document" style="margin-top:10%;">
    
        <div class="modal-content" style="text-align: -webkit-center;text-align: -moz-center;">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-compe-title" id="inicioLabel" style="font-size:22pt;">Premios</h4>
        </div>
        <div class="LineOpo" style="width:90%; margin-bottom:15px;">
            <div class="comptables" id="style-6">
                <table class="TablePrem table-striped3 table-hover2">
                    <thead>
                        <tr>
                            <th>Lugar</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    {{-- */ $cont = 1; /* --}}

                    @if(isset($awards))
                        @foreach($awards as $award)
                            <tr>
                                <td>{{$cont}}°</td>
                                {{-- */ $amount   = $cost_garanteed * ($award->range_pocental/100); /* --}}
                                {{-- */ $amount_2 = explode(",",number_format($amount,2,",",".")); /* --}}
                                
                                @if($amount_2[1] == 00)
                                  <td>{{ number_format($amount,0,"",".") }} Bs.</td>
                                @else
                                  <td>{{ number_format($amount,2,",",".") }} Bs.</td>
                                @endif
                            </tr>
                            {{-- */ $cont++; /* --}}
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
        </div>
    </div>
</div>