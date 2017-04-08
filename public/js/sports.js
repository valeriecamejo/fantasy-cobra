/*************************************************************************
 *   Funcion: select_sport                                               *
 *   Descripcion: Permite habilitar en el modal las ligas que estan      *
 *                disponibles, segun el deporte seleccionado.            *
 ************************************************************************/
function modal_sport() {

  jQuery.noConflict();

  $("#baseball-leagues").html("");
  $("#football-leagues").html("");

  var options_baseball =
    "<a href='usuario/crear-competicion/baseball/mlb'>" +
     "<img src='images/ico/selecmlb.png' alt='MLB'>" +
    "</a>";

  options_baseball = options_baseball +
    "<a href='usuario/crear-competicion/baseball/lvbp'>" +
      "<img src='images/ico/seleclvbp.png' alt='LVBP'>" +
    "</a>";

  var options_football =
    "<a href='usuario/crear-competicion/football/laliga'>" +
      "<img src='images/ico/seleclaliga.png' alt='LaLiga'>" +
    "</a>";

  options_football = options_football +
    "<a href='usuario/crear-competicion/football/ucl'>" +
      "<img src='images/ico/selecucl.png' alt='UCL'>" +
    "</a>";

  $("#baseball-leagues").append(options_baseball);
  $("#football-leagues").append(options_football);
  $("#select_league").css("display","none");
  $("#baseball-leagues").css("display","none");
  $("#football-leagues").css("display","none");

  $('#sports').modal('show');
}

/************************************************************************
 *   Funcion: select_sport                                               *
 *   Descripcion: Permite habilitar en el modal las ligas que estan      *
 *                disponibles, segun el deporte seleccionado.            *
 *   Parametros de entrada:                                              *
 *                           +sport: Deporte (1 => Beisbol, 2 => Futbol) *
 ************************************************************************/
function select_sport(sport){
  if(sport == 1){
    $("#select_league").css("display","block");
    $("#baseball-leagues").css("display","block");
    $("#football-leagues").css("display","none");
  }
  else{
    $("#select_league").css("display","block");
    $("#baseball-leagues").css("display","none");
    $("#football-leagues").css("display","block");
  }
}


