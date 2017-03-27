@extends ('layouts.template')

@section ('content')
<div class="container-fluid Ingresoprin" id="page-content-wrapper">
  <div class="container-fluid Ingresoprinref" id="page-content-wrapper">
    <div class="container">
      <h3 class="Titulo1">REFERIR AMIGOS</h3>
      <div class="row col10 hidden-xs">

        <div class="blockreferir BordAma">
          <div class="Ingresodatosreferir">
            <form action="{{ url('bettor/invite_friend') }}" method="POST" class='form-signin' files='true'>
              {{ csrf_field() }}
              <h3>Invitar por email</h3>
              <h4 id="Subtitulo1">Correo Electrónico</h4>

              <div class="input-group InicioSes">
                <input type="text" name="email" class="form-control" placeholder="Ejemplo@gmail.com" aria-describedby="sizing-addon2">
              </div>
              <div class="" style="margin-top: 15px;">
                <button type="submit" class="btn btn-primary3 btn-lg">Enviar</button>
              </div>
            </form>
          </div>

          <div class="Ingresodatosreferir">
            <h3 style="color: #37c71b;">Compartir link</h3>
            <div class="linkredes">
              <li>
                <a href="javascript:window.open('http%3A%2F%2Fwww.facebook.com%2Fshare.php%3Fu%3Dhttps%3A%2F%2Fwww.fantasycobra.com.ve%2Freferido%2F<?php echo Auth::user()->username ?>', '_blank', 'width=400,height=500');void(0);">
                  {!! Html::image('images/fb2.png') !!}
                </a>
              </li>
              <li>
                <a href="javascript:window.open('http%3A%2F%2Ftwitter.com%2Fhome%3Fstatus=Fantasy%20Cobra%20La%20Nueva%20forma%20de%20apostar%20https%3A%2F%2Fwww.fantasycobra.com.ve%2Freferido%2F<?php echo Auth::user()->username?>', '_blank', 'width=400,height=500');void(0);">
                  {!! Html::image('images/tw2.png') !!}
                </a>
              </li>
            </div>
            <h4 id="Subtitulo1">Link personal</h4>

            <div class="input-group InicioSes">
              <input type="text" class="form-control" value="{{Auth::user()->bettor->url_own}}" aria-describedby="sizing-addon2" readonly style="cursor: text;">                                </div>
              <p><i>Copia tu link en Facebook, twitter o en cualquier otra red que prefieras. Cada vez que alguien entra a nuestra página con tu link, y deposita, obtienes un bono sobre su depósito total.</i></p>
            </div>
          </div>
        </div>

        <!------------------------------------------- Mobile -------------------------------------------->
        <div class="row col11 visible-xs" style="margin-left:0px;">

          <div class="blockreferir3 BordAma">
            <div class="Ingresodatosreferir3">
              <form action="{{ url('bettor/invite_friend') }}" method="POST" class='form-signin'>
                {{ csrf_field() }}
                <h3>Invitar por email</h3>
                <h4 id="Subtitulo1">Correo Electrónico</h4>
                <div class="input-group InicioSes">
                  <input type="text" class="form-control" name="email" placeholder="Ejemplo@gmail.com" aria-describedby="sizing-addon2">
                </div>
                <div class="" style="margin-top: 15px;">
                  <button type="submit" class="btn btn-primary3 btn-lg">Enviar</button>
                </div>
              </form>
            </div>
            <div class="Ingresodatosreferir3">
              <h3 style="color: #37c71b;">Compartir link</h3>
              <div class="linkredes">
                <li>
                  <a href="javascript:window.open('http%3A%2F%2Fwww.facebook.com%2Fshare.php%3Fu%3Dhttps%3A%2F%2Fwww.fantasycobra.com.ve%2Freferido%2F<?php echo Auth::user()->username?>', '_blank', 'width=400,height=500');void(0);">
                    {!! Html::image('images/fb2.png') !!}
                  </a>
                </li>
                <li>
                  <a href="javascript:window.open('http%3A%2F%2Ftwitter.com%2Fhome%3Fstatus=Fantasy%20Cobra%20La%20Nueva%20forma%20de%20apostar%20https%3A%2F%2Fwww.fantasycobra.com.ve%2Freferido%2F<?php echo Auth::user()->username?>', '_blank', 'width=400,height=500');void(0);">
                    {!! Html::image('images/tw2.png') !!}
                  </a>
                </li>
              </div>
              <h4 id="Subtitulo1">Link personal</h4>
              <div class="input-group InicioSes">
                <input type="text" class="form-control" value="{{Auth::user()->bettor->url_own}}" aria-describedby="sizing-addon2" readonly style="cursor: text;">
              </div>
              <p><i>Copia tu link en Facebook, twitter o en cualquier otra red que prefieras. Cada vez que alguien entra a nuestra página con tu link, y deposita, obtienes un bono sobre su depósito total.</i></p>
            </div>
          </div>
        </div>

        <div class="row col7 BRmar hidden-xs">

          <div class="blockreferir2 BordBlan" style="margin-top:30px;">
            <div class="Ingresodatosreferir2">
              <h3 style="color: #e9e9e9;">Balance por Referido</h3>
              <div class="fondotabref">
                <table class="Tablaref">
                  <tr>
                    <td><h5>Ganado este Mes</h5></td>
                    <td><h5>Amigos que Depositaron</h5></td>
                    <td><h5>Bono por Referidos</h5></td>

                  </tr>
                  <tr>
                    <td><p> {{Auth::user()->bettor->referred_friends}} Bs.</p></td>
                    <td><p>{{Auth::user()->bettor->referred_friends_pay}}</p></td>
                    <td class="Bonoref"><p>500 Bs.</p></td>
                  </tr>

                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid tablafiliado hidden-xs">
          <div>
            <table class="table table-hover table-responsive tabledep2">
              <thead>
                <tr>
                  <th style="width:39%">Referido</th>
                  <th style="width:17%">Estatus</th>
                  <th style="width:17%">Fecha</th>
                  <th style="width:30%">Bono</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="tabtabfiliado">
            <table class="table table-hover table-responsive tabledep2" style="margin-top:-40px;">
              <thead>
                <tr>
                  <th style="width:39%">Referido</th>
                  <th style="width:17%">Estatus</th>
                  <th style="width:17%">Fecha</th>
                  <th style="width:30%">Bono</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      @stop
