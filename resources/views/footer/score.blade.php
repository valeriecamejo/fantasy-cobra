@extends ('layouts.template')

@section ('content')
  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <div class="container">
      <h3 class="Titulo1">PUNTOS DEL JUEGO</h3>
      <div class="row blockpolitics pol2">

        <div class="Ingresodatos">

          <h5>Puntuación En B&eacute;isbol</h5>
          <p>Las siguientes categorías de bateo serán las que generen puntos:</p>
          <ul>
            <li>Hit =3 puntos</li>
            <li>2B = 5.5 puntos</li>
            <li>3B = 8 puntos</li>
            <li>HR = 10 puntos</li>
            <li>CI = 3 puntos</li>
            <li>CA = 2 puntos</li>
            <li>BB = 3 puntos</li>
            <li>BR = 5 puntos</li>
            <li>GP = 3 puntos</li>
            <li>OR = -3 puntos</li>
          </ul>
          <p>Las siguientes categorías de pitcheo serán las que generen puntos.</p>
          <ul>
            <li>IP = 4.5 puntos (1.5 punto por out)</li>
            <li>K = 4 puntos</li>
            <li>G = 10 puntos</li>
            <li>CL = - 3.6 puntos</li>
            <li>H = - 1.2 puntos</li>
            <li>BB = -1.2 puntos</li>
            <li>GP = -1.2 puntos</li>
            <li>L = -5</li>
          </ul>

          <h5>Puntuación En F&uacute;tbol</h5>
          <p>Las siguientes categorías serán las que generen puntos:</p>
          <ul>
            <li>Goal (G) = 12 puntos</li>
            <li>Asistencia (A) = 7 puntos</li>
            <li>Shot (S) = 1,5 puntos</li>
            <li>Falta Recibida (FR) = 0,5 puntos</li>
            <li>Falta Cometida (FC) = 0,5 puntos</li>
            <li>Balones Recuperados, solo defensa (BR) = 1 puntos</li>
            <li>Tarjeta Amarilla (TA) = -2 puntos</li>
            <li>Tarjeta Roja (TR) = -4 puntos</li>
            <li>Clean Sheet, solo arquero (SHOA)= 10 puntos</li>
            <li>Clean Sheet, solo defensa (SHOD)= 3 puntos</li>
            <li>Penalti Fallado (PF)= -5 puntos</li>
            <li>Penalti Defendido, solo arquero (PD)= 5 puntos</li>
            <li>Victoria, arquero (W)= 5 puntos</li>
            <li>Atrapada, arquero (SA)= 2 puntos</li>
            <li>Goles en contra, arquero (GA)= -2.5 puntos</li>
          </ul>
        </div>
      </div>
    </div>
  @include('includes/footer-mobile')
  </div>
@stop
