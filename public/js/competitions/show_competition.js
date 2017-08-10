function showCompetition(id_competition) {

  var protocol        = location.protocol;
  var URLdomain       = window.location.host;
  var url             = protocol + "//" + URLdomain;
  jQuery.noConflict();
  jQuery.ajax({
    url: url + "/usuario/competicion",
    type: "GET",
    async: true,
    data: {"id_competition": id_competition},
    success: function (data) {
      var competition_data     = jQuery.parseJSON(data);
      addData(competition_data)

    }
  });
}

function addData(competition_data) {
  $("#competition_name").empty();
  $("#mobile_competition_enrolled").empty();
  $("#mobile_competition_entry_cost").empty();
  $("#mobile_competition_cost_guaranteed").empty();
  $("#mobile_competition_user_min").empty();
  $("#competition_info").empty();
  $("#competition_participants").empty();
  $("#competition_prizes").empty();
  $("#button_create").empty();
  $("#button_enroll").empty();
  var competition_name;
  var competition_date;
  var competition_info;
  var competition_enrolled;
  var competition_description;
  var competition_type_competition;
  var competition_participants    =   "<thead>"+
    "<tr>"+
    "<th>Usuario</th>"+
    "<th>Puntos</th>"+
    "<th>Posición</th>"+
    "</tr>"+
    "</thead>";

  var competition_prizes          =   "<thead>"+
    "<tr>"+
    "<th>Lugar</th>"+
    "<th>Cantidad</th>"+
    "</tr>"+
    "</thead>";
  var button_create               = "";
  var button_enroll               = "";
  var count                       = 0;
  var cost_guaranteed_g           = 0;

  $(competition_data).each(function(index, element) {
    //---------------------------- Competition
    $(element.competition).each(function (i, competition) {
      competition_name            = competition.name;
      cost_guaranteed_g           = competition.cost_guaranteed;

      competition.date_now = moment().format('YYYY-MM-DD HH');
      competition.date_competition = moment(competition.date).format('YYYY-MM-DD HH');
      competitions_app.competition_details = competition;
      console.info(competitions_app);

      competition_enrolled        =   "<tr>"+
        "<td><b>Inscritos: </b>"+competition.enrolled+"/"+competition.user_max+"</td>"+
        "</tr>";

      competition_entry_cost      =   "<tr>"+
        "<td><b>Entrada: </b>"+competition.entry_cost.toLocaleString('de-DE')+" Bs.</td>"+
        "</tr>";

      competition_cost_guaranteed  =   "<tr>"+
        "<td><b>Premios: </b>"+competition.cost_guaranteed.toLocaleString('de-DE')+" Bs.</td>"+
        "</tr>";

      competition_user_min        =   "<tr>"+
        "<td><b>Mín. Usuarios: </b>"+competition.user_min+"</td>"+
        "</tr>";

      competition_info            =  "<tr>"+
        "<td><b>Inscritos: </b>"+competition.enrolled+"/"+competition.user_max+"</td>"+
        "<td><b>Entrada: </b>"+competition.entry_cost.toLocaleString('de-DE')+" Bs.</td>"+
        "<td><b>Premios: </b>"+competition.cost_guaranteed.toLocaleString('de-DE')+" Bs.</td>"+
        "<td><b>Mín. Usuarios: </b>"+competition.user_min+"</td>"+
        "</tr>";

      cost_guaranteed              = competition.cost_guaranteed;
      competition_description      = competition.description;

      if(competition.type_competition == 1){
        competition_type_competition    = "<input type='text' placeholder='Introduzca contraseña' class='form-control2' id='password'>";
        }

    });

    //------------------------------ Participants
    $(element.participants).each(function(j, participants) {
      count                         = count + parseInt(1);
      competition_participants      = competition_participants +
        "<tr>" +
        "<td>" +
        "<a href=''>"+participants.username+"</a>" +
        "</td>" +
        "<td>" +
        "<a href=''>"+participants.points+"</a>" +
        "</td>" +
        "<td>" +
        "<a href=''>"+count+"</a>" +
        "</td>" +
        "</tr>";
    });

    //------------------------------ Prize
    $(element.prize).each(function(k, prize) {
      var prize_val                 = (cost_guaranteed_g*(prize.rate_range/100));
      competition_prizes            = competition_prizes + "<tr>"+
        "<td>"+prize.rate_win+"°</td>"+
        "<td>"+prize_val.toLocaleString('de-DE')+" Bs.</td>"+
        "</tr>";

    });

  });

  $("#competition_name").append(competition_name);
  $("#mobile_competition_enrolled").append(competition_enrolled);
  $("#mobile_competition_entry_cost").append(competition_entry_cost);
  $("#mobile_competition_cost_guaranteed").append(competition_cost_guaranteed);
  $("#mobile_competition_user_min").append(competition_user_min);
  $("#competition_info").append(competition_info);
  $("#competition_participants").append(competition_participants);
  $("#competition_prizes").append(competition_prizes);
  $("#button_create").append(button_create);



  $("#info_competition").modal("show");

}
