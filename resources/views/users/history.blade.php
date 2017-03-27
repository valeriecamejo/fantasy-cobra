@extends ('layouts.template')

@section ('content')
<!-- Sidebar -->
<div class="container-fluid Ingresoprom" id="page-content-wrapper">
  @if (Session::has('enviarmail'))
  <div id="enviarmail" class="alert alert-success">
    {{ Session::get('enviarmail') }}
  </div>
  @endif
  <h3 class="Titulo1">HISTORIAL</h3>
  <div class="container">
    <div class="row Bcontainer">

      <div class="btab hidden-xs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabsnull" role="tablist">
          <li role="presentation" class="active BtnLineup10"><a href="#competiciones" aria-controls="home" role="tab" data-toggle="tab">Competiciones</a></li>
          <li role="presentation"><a href="#ganadas" aria-controls="ganadas" role="tab" data-toggle="tab">Competiciones ganadas</a></li>
          <li role="presentation"><a href="#deporeti" aria-controls="deporeti" role="tab" data-toggle="tab">Depósitos/Retiros</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content tab-contentnull tab-contenthistorial">
          @if(isset($all_competitions) and count($all_competitions)==0)
          <div style="background-color: #000;" role="tabpanel" class="tab-pane fade bordyel" id="competiciones">
            <h2 class="msgnogame">Te invitamos a inscribirte en las competiciones para que disfrutes de la plataforma.</h2>
          </div>
          @else
          <div role="tabpanel" class="tab-pane fade in active bordyel" id="competiciones">
            <table class="table table-hover table-responsive tabledep2">
              <thead>
                <tr>
                  <th></th>
                  <th>Competición</th>
                  <th></th>
                  <th style="text-align: center;">Fecha</th>
                  <th></th>
                  <th style="text-align: center;">Entrada Bs.</th>
                  <th></th>
                  <th style="text-align: center;">Balance Bs.</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($all_competitions as $all_competition)
                <tr>
                  <td>
                    {!! Html::image($all_competition->avatar,'',array('class' => 'tabimgtablet')) !!}
                  </td>
                  <td id="tdcomp">{{ $all_competition->name }}</td>
                  <td></td>
                  <td>{{ date("d-m-Y", strtotime($all_competition->competition_date)) }}</td>
                  <td></td>
                  @if($all_competition->status == 'CANCELLED')
                  <td class="RepColor notdpad" style="color: red !important;">
                    Cancelada
                  </td>
                  @else
                  <td class="RepColor notdpad">
                    {{ number_format($all_competition->entry_cost,2,",",".") }} Bs.
                  </td>
                  @endif
                  <td></td>
                  <td>{{ number_format(($all_competition->balance_before),2,",",".") }} Bs.</td>
                  <td></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
          @if(isset($won_competitions) and count($won_competitions)==0)
          <div style="background-color: #000;" role="tabpanel" class="tab-pane fade bordyel" id="ganadas">
            <h2 class="msgnogame">Te invitamos a inscribirte en las competiciones para que disfrutes de la plataforma.</h2>
          </div>
          @else
          <div role="tabpanel" class="tab-pane fade bordyel" id="ganadas">
            <table class="table table-hover table-responsive tabledep tabledep2">
              <thead>
                <tr>
                  <th></th>
                  <th>Competición</th>
                  <th></th>
                  <th style="text-align: center;">Fecha</th>
                  <th></th>
                  <th style="text-align: center;">Premio Bs.</th>
                  <th></th>
                  <th style="text-align: center;">Balance Bs.</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($won_competitions as $won_competition)
                <tr>
                  <td>
                    {!! Html::image($won_competition->avatar,'',array('class' => 'tabimgtablet')) !!}
                  </td>
                  <td id="tdcomp">{{ $won_competition->name }}</td>
                  <td></td>
                  <td>{{ date("d-m-Y", strtotime($won_competition->competition_date)) }}</td>
                  <td></td>
                  <td class="RepColor notdpad">{{ number_format($won_competition->amount,2,",",".") }} Bs.</td>
                  <td></td>
                  <td>{{ number_format(($won_competition->balance_before + $won_competition->amount),2,",",".") }} Bs.</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
          @if(isset($transactions) and count($transactions)==0)
          <div style="background-color: #000;" role="tabpanel" class="tab-pane fade bordyel" id="deporeti">
            <h2 class="msgnogame">Te invitamos a inscribirte en las competiciones para que disfrutes de la plataforma.</h2>
          </div>
          @else
          <div role="tabpanel" class="tab-pane fade bordyel" id="deporeti">
            <table class="table table-hover table-responsive tabledep tabledep2">
              <thead>
                <tr>
                  <th></th>
                  <th>Operación</th>
                  <th class="tbldp" style="text-align: center;">Banco</th>
                  <th class="tbldp" style="text-align: center;">Fecha</th>
                  <th class="tbldp" style="text-align: center;">Hora</th>
                  <th class="tbldp" style="text-align: center;">Cantidad Bs.</th>
                  <th class="tbldp" style="text-align: center;">Balance Bs.</th>
                  <th class="tbldp" style="text-align: center;"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                  @if($transactions->transaction_type == 1)
                  <td><img src="{{ URL::asset('images/ico/depositoico.png') }}"/></td>
                  <td id="tdcomp2">Depósito</td>
                  @elseif($transactions->transaction_type == 0)
                  <td><img src="{{ URL::asset('images/ico/retiroico.png') }}"/></td>
                  <td id="tdcomp2"><span id="retirored">Retiro</span></td>
                  @endif
                  <td class="tbldp">{{ $transactions->bank }}</td>
                  <td class="tbldp">{{ date("d-m-Y", strtotime($transactions->date)) }}</td>
                  <td class="tbldp">{{date("g a",strtotime("$transactions->date"))}}</td>
                  <td class="tbldp">{{ number_format($transactions->amount,2,",",".") }} Bs.</td>
                  <td class="tbldp">
                    @if($transactions->paid == 0)
                    {{ number_format(($transactions->before_balance - $transactions->amount),2,",",".") }}
                    @elseif($transactions->paid == 1)
                    {{ number_format(($transactions->before_balance + $transactions->amount),2,",",".") }}
                    @endif
                  </td>
                  <td class="tbldp">
                    @if($transactions->point_type == "PAYPAL")
                    <img src="{{ URL::asset('images/ico/paypal_ico.png') }}"/>
                    @elseif($transactions->point_type == "TRANSFER")
                    <img src="{{ URL::asset('images/ico/transfer_ico.png') }}"/>
                    @elseif($transactions->point_type == "CARD")
                    <img src="{{ URL::asset('images/ico/credit_ico.png') }}"/>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
        </div>
      </div>

      <div class="hist"><p>Resumen histórico de las operaciones del usuario en la plataforma. Cualquier duda puede <a href=".contacto" data-toggle="modal">contactarnos.</a></p></div>
    </div>
  </div>

  <!--------------------------------- End Desktop ------------------------------------>

  <!------------------------------------- Mobile -------------------------------------->

  <div class="restab visible-xs">

    <ul class="nav nav-tabs nav-tabsnull" role="tablist">
      <li role="presentation" class="active BtnLineup10 respli"><a href="#competicioness" aria-controls="home" role="tab" data-toggle="tab">Competiciones</a></li>
      <li role="presentation" class="respli"><a href="#ganadass" aria-controls="ganadass" role="tab" data-toggle="tab">Ganadas</a></li>
      <li role="presentation" class="respli"><a href="#deporetis" aria-controls="deporetis" role="tab" data-toggle="tab">Operaciones</a></li>
    </ul>
    <div class="tab-content tab-contentnull tab-contenthome">

      @if(isset($all_competitions) and count($all_competitions)==0)
      <div style="background-color: #000;" role="tabpanel" class="tab-pane fade in active bordyel noscroll" id="competicioness">
        <p class="msgnogame">Te invitamos a inscribirte en las competiciones para que disfrutes de la plataforma.</p>
      </div>
      @else
      <div role="tabpanel" class="tab-pane fade in active bordyel noscroll" id="competicioness">
        <div class="tablemovil">
          <ul>
            @foreach ($all_competitions as $all_competition)
            @if( $all_competition->status == 'CANCELLED')
            <li class="tmovli" style="background-color: #e8e8e8 !important;">
              @else
              <li class="tmovli">
                @endif
                <div class="divico">
                  <img class="Star" src="{{ URL::asset('images/ico/bstar.png') }}"/>
                </div>
                <h4 class="h4tmovil">{{ $all_competition->name }}</h4>
                <div class="tmovilimg">
                  {!! Html::image($all_competition->avatar,'',array('class' => 'tabimgtablet')) !!}
                </div>
                <div class="tmovdatos">

                  <div class="div1">
                    <p><span>Fecha</span>
                      @php
                      $date = strtotime($all_competition->competition_date)
                      @endphp

                      {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                      {{ date("d-m", $date) }}
                    </p>
                    <div class="tmovtabico"></div>
                    <p><span>Hora</span> {{ $all_competition->competition_date }} </p>
                  </div>
                  <div class="div1">
                    <p>
                      <span>Entrada</span>@if( $all_competition->status == 'CANCELLED')<span style="color: red !important;">- -  -
                    </span>@else{{ number_format($all_competition->entry_cost,2,",",".") }}Bs.@endif
                  </p>
                  <div class="tmovtabico"></div>
                  <p><span>Balance</span>{{ number_format(($all_competition->balance_before),2,",",".") }} Bs.</p>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
      @if(isset($won_competitions) and count($won_competitions)==0)
      <div style="background-color: #000;" role="tabpanel" class="tab-pane fade bordyel noscroll" id="ganadass">
       <p class="msgnogame">Te invitamos a inscribirte en las competiciones para que disfrutes de la plataforma.</p>
     </div>
     @else
     <div role="tabpanel" class="tab-pane fade bordyel noscroll" id="ganadass">
      <div class="tablemovil">
        <ul>
          @foreach ($won_competitions as $won_competition)
          <li class="tmovli">
            <div class="divico">
              <img class="Star" src="{{ URL::asset('images/ico/bstar.png') }}"/>
            </div>
            <h4 class="h4tmovil">{{$won_competition->name}}</h4>
            <div class="tmovilimg">
              {!! Html::image($won_competition->avatar,'',array('class' => 'tabimgtablet')) !!}
            </div>
            <div class="tmovdatos">
              <div class="div1">
                <p><span>Fecha</span>
                  @php
                  $date = strtotime($won_competition->competition_date)
                  @endphp

                  {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                  {{ date("d-m", $date) }}
                </p>
                <div class="tmovtabico"></div>
                <p><span>Hora</span>{{ date("g a", strtotime($won_competition->competition_date)) }} </p>
              </div>
              <div class="div1">
                <p><span>Premio</span>{{ number_format($won_competition->amount,2,",",".")}}Bs. </p>
                <div class="tmovtabico"></div>
                <p><span>Balance</span>{{ number_format(($won_competition->balance_before + $won_competition->amount),2,",",".") }} Bs.</p>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    @endif
    @if(isset($transactions) and count($transactions)==0)
    <div style="background-color: #000;" role="tabpanel" class="tab-pane fade bordyel noscroll" id="deporetis">
      <p class="msgnogame">Te invitamos a inscribirte en las competiciones para que disfrutes de la plataforma.</p>
    </div>
    @else
    <div role="tabpanel" class="tab-pane fade bordyel noscroll" id="deporetis">
      <div class="tablemovil">
        <ul>
          @foreach ($transactions as $transaction)
          <li class="tmovli">
            <div class="divico">
              @if($transaction->paid == 1 and $transaction->approved_pay == 1)
              <img class="Star" src="{{ URL::asset('images/ico/depositoico2.png') }}"/>
              @elseif($transaction->paid == 0 and $transaction->approved_pay == 1)
              <img class="Star" src="{{ URL::asset('images/ico/retiroico2.png') }}"/>
              @endif
            </div>
            <h4 class="h4tmovil" style="width: 73% !important;">
              <a href="">
                @if($transaction->paid == 1 AND $transaction->approved_pay == 1)
                Depósito /
                @elseif($transaction->paid == 0 AND $transaction->approved_pay == 1)
                Retiro /
                @endif
                <i>{{ $transaction->bank }}</i>
              </a>
            </h4>
            <div style="width: 10%; float: left;">
              @if($transaction->point_type == "PAYPAL")
              <img style="width: 100%;" src="{{ URL::asset('images/ico/paypal_ico.png') }}"/>
              @elseif($transaction->point_type == "TRANSFER")
              <img src="{{ URL::asset('images/ico/transfer_ico.png') }}"/>
              @elseif($transaction->point_type == "CARD")
              <img src="{{ URL::asset('images/ico/credit_ico.png') }}"/>
              @endif
            </div>
            <div class="tmovilimg"><img src="{{ URL::asset('images/ico/white-space.png') }}"/></div>
            <div class="tmovdatos">
              <div class="div1">
                <p><span>Fecha</span>
                  @php
                  $date = strtotime($transaction->date)
                  @endphp

                  {{ UtilityDate::dateAbbrevSpanish(getdate($date)) }}
                  {{ date("d-m", $date) }}
                </p>
                <div class="tmovtabico">
                  <!--<img class="Garanico" src="images/ico/lock.png"/>-->
                </div>
                <p><span>Hora</span>{{date("g a",strtotime("$date"))}}</p>
              </div>

              <div class="div1">
                <p><span>Cant.</span> {{ number_format($transaction->amount,2,",",".") }}</p>
                <div class="tmovtabico">
                  <!--<img class="Aumenico" src="images/ico/aumento.png"/>-->
                </div>
                <p>
                  <span>Balance</span>
                  @if($transaction->paid == 0 and $transaction->approved_pay == 1)
                  {{ number_format(($transaction->before_balance - $transaction->amount),2,",",".") }}
                  @elseif($transaction->paid == 1 and $transaction->approved_pay == 1)
                  {{ number_format(($transaction->before_balance + $transaction->amount),2,",",".") }}
                  @endif
                </p>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    @endif
  </div> <!-- restab cierre -->
</div><br>
  <!---------------------------------------- End Mobile ------------------------------------------>

@include('includes/footer-mobile')
</div>
</div>

@stop

