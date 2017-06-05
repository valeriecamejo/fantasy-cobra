@extends ('layouts.template')

@section ('content')
  <div class="container-fluid Ingresoprin" id="page-content-wrapper">
    <div class="container">
      <h3 class="Titulo1">REGLAS DEL JUEGO</h3>
      <div class="row blockpolitics pol2">

        <div class="Ingresodatos">

          <h4>Reglas de las competencias:</h4>
          <p>En cada competición de béisbol, los usuarios tendrán asignados un límite presupuestario de 100.000 <span class="fa fa-money fa-lg"></span>, con los cuales deberán completar su róster. El sistema no permitirá que la suma del salario de todos los miembros del equipo supere el límite presupuestario (50.000).</p>

          <h5>Equipos</h5>
          <p>Cada equipo debe estar compuesto por un cátcher (C), primera base (1B), segunda base (2B), campocorto (SS), tercera base (3B), 3 jardineros (OF) y el cuerpo de pitcheo de un equipo (P). Es obligatorio rellenar cada posición con un jugador (o cuerpo de pitcheo) para poder inscribirse en una competición.</p>

          <h5>Jugadores disponibles</h5>
          <p>Todos los jugadores que estén inscritos de manera oficial en el róster del equipo, por lo menos 24 horas antes del inicio de la competencia, estarán disponibles para ser seleccionados para los lineups de Fantasy Cobra.</p>

          <p>El jugador calificará para la posición o posiciones (C, 1B, 2B, 3B, SS, OF) que con mayor frecuencia defienda durante la temporada. Quedará a criterio de los administradores de Fantasy Cobra escoger en qué posición o posiciones ubicarlo para su primer partido como jugador disponible.</p>

          <h5>Salario</h5>
          <p>Cada jugador disponible para ser seleccionado para un lineup de Fantasy Cobra tiene un salario. Su salario inicial (utilizado para el primer día en que esté disponible) es colocado arbitrariamente por el staff de Fantasy Cobra. De allí en adelante, el salario aumenta o disminuye según el rendimiento de los jugadores en la vida real. Mientras más puntos generen, el salario aumentará. Al contrario, si generan menos puntos que el promedio de la liga, sus salarios disminuirán.</p>

          <h5>Suma de puntos</h5>
          <p>El total de puntos de cada equipo será la suma de los puntos obtenidos en el día por cada uno de los jugadores que compongan el lineup. En cada competencia se premiará a los equipos con mayor cantidad de puntos totales (dependiendo del formato de premiación).</p>

          <h5>Doble Juego</h5>
          <p>Doble Juego: En caso de que se dé un doble juego, los puntos que se tomarán en cuenta serán los que se hagan en el último de esos dos partidos.</p>

          <h5>Juego Suspendido</h5>
          <p>En caso de que un juego sea suspendido sin comenzar el partido, los jugadores de ese equipo que estén en el lineup, no generarán puntos.</p>

          <p>Si el juego se suspende de forma legal, se suman los puntos que hayan acumulado los jugadores antes de la suspensián.</p>

          <h5>Criterios de Selección del Juego</h5>
          <p>Solo se tomarán en cuenta los juegos antes de las 7:00 p.m, si hay un mínimo de tres (3) partidos que comiencen antes de esa hora. En caso de no ser así, solo aparecerán en el roster activo para crear lineup los peloteros que estén participando en los juegos que cumplan ese criterio.</p>

          <!--<h5>Puntuación</h5>
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
          </ul>-->

        </div>
      </div>
    </div>
  @include('includes/footer-mobile')
  </div>
@stop
