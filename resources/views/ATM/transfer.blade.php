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

      @if($errors->has('name') ||  $errors->has('surname') || $errors->has('identification') || $errors->has('phone') || $errors->has('amount') || $errors->has('number_account') || $errors->has('type_account') || $errors->has('bank') || $errors->has('reference_number') || $errors->has('email'))
          <div id="danger" class="alert alert-danger">
              <strong>Error:</strong> Debe completar todos los datos!
          </div>
      @endif


    <div class="container">
      <div class="row blocktrans">
        <div class="boxret">
          <div class="blocktransinner2">
            <h3 class="Titperf2">Cajero de Depositos</h3>

            <form class="form-horizontal" method="POST" action="{{ URL::action('PaymentController@transfer') }}">
              {{ csrf_field() }}

            <div class="modal-bodyregis Top3">
              <div class="boxregis">
                  <p>Nombre</p>
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
                  <p>Apellido</p>
              </div>
              <div class="input-group InicioSes">
                <input type="text" class="form-control" placeholder="Escriba su apellido" aria-describedby="sizing-addon2" name="last_name" value="{{ old('last_name') }}">
                @if($errors->has('last_name'))
                  <span class="incompleto4">×</span>
                  @foreach($errors->get('last_name') as $error)
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
                  <p>Teléfono</p>
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
              <input type="text" class="form-control" placeholder="Bs. a Depositar" aria-describedby="sizing-addon2" name="amount" id="amount" value="{{ old('amount') }}">
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
                  <p>Nro. de cuenta</p>
              </div>
              <div class="input-group InicioSes">
              <input type="text" class="form-control" placeholder="Nro. Cuenta" aria-describedby="sizing-addon2" name="number_account" id="number_account" value="{{ old('number_account') }}">
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
                  <p>Tipo de cuenta</p>
              </div>
              <div class="input-group InicioSes">
                <select class="form-control" name="type_account">
                    <option value="0" selected="selected">Ahorro</option>
                    <option value="1">Corriente</option>
                </select>
                @if($errors->has('type_account'))
                  <span class="incompleto4">×</span>
                  @foreach($errors->get('type_account') as $error)
                      <span class="messageerror2">{{ $error }}</span>
                  @endforeach
                @endif
              </div>
            </div>

            <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Banco</p>
              </div>
              <div class="input-group InicioSes">
                <select class="form-control" name="bank">
                  <option value="" selected="selected">Banco Emisor</option>
                  <option value="Banco de Venezuela">Banco de Venezuela</option>
                  <option value="Banesco">Banesco</option>
                  <option value="BBVA Banco Provincial">BBVA Banco Provincial</option>
                  <option value="Banco Mercantil">Banco Mercantil</option>
                  <option value="Banco Occidental de Descuento BOD">Banco Occidental de Descuento BOD</option>
                  <option value="Bicentenario Banco Universal">Bicentenario Banco Universal</option>
                  <option value="Banco del Tesoro">Banco del Tesoro</option>
                  <option value="Bancaribe">Bancaribe</option>
                  <option value="Banco Exterior">Banco Exterior</option>
                  <option value="Banco Nacional de Crédito">Banco Nacional de Crédito</option>
                  <option value="Banco Industrial de Venezuela">Banco Industrial de Venezuela</option>
                  <option value="Banco Sofitasa">Banco Sofitasa</option>
                  <option value="Banplus">Banplus</option>
                  <option value="Banco Plaza">Banco Plaza</option>
                  <option value="Banco Activo">Banco Activo</option>
                  <option value="Bancrecer">Bancrecer</option>
                  <option value="Banco Agrícola de Venezuela">Banco Agrícola de Venezuela</option>
                  <option value="Banco Del Sur">Banco Del Sur</option>
                  <option value="100% Banco">100% Banco</option>
                  <option value="Banco de la Fuerza Armada Nacional Bolivariana">Banco de la Fuerza Armada Nacional Bolivariana</option>
                  <option value="Citibank">Citibank</option>
                  <option value="Bancamiga">Bancamiga</option>
                  <option value="Instituto Municipal de Crédito Popular">Instituto Municipal de Crédito Popular</option>
                  <option value="Bangente">Bangente</option>
                  <option value="Mi Banco">Mi Banco</option>
                  <option value="BANCOEX">BANCOEX</option>
                  <option value="Novo Banco">Novo Banco</option>
                  <option value="Banco de Exportación y Comercio">Banco de Exportación y Comercio</option>
                  <option value="Banco Internacional de Desarrollo">Banco Internacional de Desarrollo</option>
                </select>
                @if($errors->has('bank'))
                    <span class="incompleto4">×</span>
                    @foreach($errors->get('bank') as $error)
                        <span class="messageerror2">{{ $error }}</span>
                    @endforeach
                @endif
              </div>
            </div>

            <div class="modal-bodyregis">
              <div class="boxregis">
                  <p>Nro. de Referencia</p>
              </div>
              <div class="input-group InicioSes">
              <input type="text" class="form-control" placeholder="Nro. de Referencia" aria-describedby="sizing-addon2" name="reference_number" id="reference_number" value="{{ old('reference_number') }}" required>
                @if($errors->has('reference_number'))
                    <span class="incompleto4">×</span>
                    @foreach($errors->get('reference_number') as $error)
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
