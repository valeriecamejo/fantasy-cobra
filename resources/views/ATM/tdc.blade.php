@extends ('layouts.template')

@section ('content')

<div id="wrapper"> <!-- Abre Wrapper -->
  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <div class="container-fluid Ingresoprin" id="page-content-wrapper">
      @if (Session::has('enviarmail'))
           <div id="enviarmail" class="alert alert-success">
              {{ Session::get('enviarmail') }}
           </div>
      @endif
      @if (Session::get('msje') )
          <div id="success" class="alert alert-success">
              {{Session::get('msje')}}
          </div>
      @endif
      @if (Session::get('msj') )
      <div id="success" class="alert alert-danger">
            {{Session::get('msj')}}
      </div>
      @endif

      @if($errors->has('name') ||  $errors->has('creditcardtype')  || $errors->has('phone') || $errors->has('amount') || $errors->has('number_account') || $errors->has('type_account') || $errors->has('security_code') || $errors->has('email'))
          <div id="danger" class="alert alert-danger">
              <strong>Error:</strong> Debe completar todos los datos!
          </div>
      @endif


    <div class="container">
      <div class="row blocktrans">
        <div class="boxret">
          <div class="blocktransinner2">
            <h3 class="Titperf2">Depósito por Tarjeta de Crédito</h3>

            <form class="form-horizontal" method="POST" action="{{ URL::action('PaymentController@tdc') }}">
              {{ csrf_field() }}

            <div class="modal-bodyregis Top3">
              <div class="boxregis">
                  <p>Nombre Impreso en la Tarjeta</p>
              </div>
              <div class="input-group InicioSes">
                <input type="text" class="form-control" placeholder="Escriba su nombre" aria-describedby="sizing-addon2" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                  <span class="incompleto4">×</span>
                  @foreach($errors->get('name') as $error)
                    <span class="messageerror2">{{ $error }}</span>
                  @endforeach
                @endif
              </div>
            </div>

            <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Cédula</p>
              </div>
              <div class="input-group InicioSes">
                <input type="text" class="form-control" placeholder="Nro. de Cédula" aria-describedby="sizing-addon2" name="dni" id="dni" value="{{ old('dni') }}">
                @if($errors->has('dni'))
                    <span class="incompleto4">×</span>
                    @foreach($errors->get('dni') as $error)
                        <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                @endif
              </div>
            </div>

            <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Teléfono del Tarjetahabiente</p>
              </div>
              <div class="input-group InicioSes">
              <input type="text" class="form-control" placeholder="Nro. Teléfono" aria-describedby="sizing-addon2" name="phone" id="phone" value="{{ old('phone') }}">
                @if($errors->has('phone'))
                  <span class="incompleto4">×</span>
                  @foreach($errors->get('phone') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                  @endforeach
                @endif
              </div>
            </div>

            <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Cantidad a depositar</p>
              </div>
              <div class="input-group InicioSes">
              <input type="text" class="form-control" placeholder="Bs. Depositar" aria-describedby="sizing-addon2" name="amount" id="amount" value="{{ old('amount') }}">
                @if($errors->has('amount'))
                  <span class="incompleto4">×</span>
                  @foreach($errors->get('amount') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                  @endforeach
                @endif
              </div>
            </div>

            
            <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Tipo de Tarjeta de Crédito</p>
              </div>
              <div class="input-group InicioSes">
                <select class="form-control" name="creditcardtype">
                  <option value="" selected="selected">Tipo de Tarjeta de Crédito</option>
                  <option value="American Express">American Express</option>
                  <option value="Diners Club">Diners Club</option>
                  <option value="Discover">Discover</option>
                  <option value="InstaPayment">InstaPayment</option>
                  <option value="JCB">JCB</option>
                  <option value="Maestro">Maestro</option>
                  <option value="Mastercard">Mastercard</option>
                  <option value="Visa">Visa</option>
                  <option value="Visa Electron">Visa Electron</option>
                  
                </select>
                @if($errors->has('creditcardtype'))
                    <span class="incompleto4">×</span>
                    @foreach($errors->get('creditcardtype') as $error)
                        <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                @endif
              </div>
            </div>

            <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Nro. de Tarjeta de Crédito</p>
              </div>
              <div class="input-group InicioSes">
              <input type="text" class="form-control" placeholder="Nro. de Tarjeta de Crédito" aria-describedby="sizing-addon2" name="number_account" id="number_account" value="{{ old('number_account') }}">
                @if($errors->has('number_account'))
                    <span class="incompleto4">×</span>
                    @foreach($errors->get('number_account') as $error)
                        <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                @endif
              </div>
            </div>

             <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Código de Seguridad</p>
              </div>
              <div class="input-group InicioSes">
              <input type="text" class="form-control" placeholder="Código de Seguridad" aria-describedby="sizing-addon2" name="security_code" id="security_code" value="{{ old('security_code') }}">
                @if($errors->has('security_code'))
                    <span class="incompleto4">×</span>
                    @foreach($errors->get('security_code') as $error)
                        <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                @endif
              </div>
            </div>


            <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Correo Electrónico</p>
              </div>
              <div class="input-group InicioSes">
              <input type="text" class="form-control" placeholder="ejemplo@gmail.com" aria-describedby="sizing-addon2" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                  <span class="incompleto4">×</span>
                  @foreach($errors->get('email') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                  @endforeach
                @endif
              </div>
            </div>

            <div class="divbtncont boxsize80 Top2">
            <button type="submit" class="btn btn-primary7 btn-lg">ENVIAR</button>
            </div>
            </div>
            <div class="blocktransinnerctaban hidden-xs">
              <div class="ctabancaria2">
                <div class="backcolor2">
                    <h3 class="Titclassban2">Balances</h3>
                </div>
                <div class="datctaban3">
                  <div class="datctabandiv">
                    <p><b>Balance Bs.:</b> </p>
                    <div class="datctabandivdiv">
                      {{ Auth::user()->bettor->balance }}
                    </div>
                </div>

                <div class="datctabandiv"><p><b>Máx. Retiro:</b></p>
                  <div class="datctabandivdiv">
                  <span>
                    {{ Auth::user()->bettor->balance - Auth::user()->bettor->balance/2 }}
                  </span>
                    <input type="hidden" name="no_retirement" value="{{ Auth::user()->bettor->balance - Auth::user()->bettor->not_removable }}" readonly="readonly" style="max-width: 95%; border: transparent; text-align: center;">
                  </div>
                </div>

                <div class="datctabandiv"><p><b>Mín. Retiro:</b></p>
                  <div class="datctabandivdiv">
                    {{ \App\Lib\Ddh\SettingVariables::getSettings('min_withdraw') }}
                    <input type="hidden" name="min_withdraw" value="{{ \App\Lib\Ddh\SettingVariables::getSettings('min_withdraw') }}" readonly="readonly" style="max-width: 95%; border: transparent; text-align: center;">
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

@stop
