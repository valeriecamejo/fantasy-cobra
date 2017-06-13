//Url global
/**********************************
* modal_team.
* @param competitions
* @return tpl
***********************************/
function show_team_modal(team_id, cont_teams, username) {

var protocol  = location.protocol;
var URLdomain = window.location.host;
var url_ajax  = protocol + "//" + URLdomain;

  jQuery.noConflict();

$.ajax({
        url: url_ajax + "/usuario/ver-equipos",
        type: "GET",
        async: true,
        data: {"team_id": team_id},
        success: function (data) {
            var datos = jQuery.parseJSON(data);
            add_team_information(datos, team_id, cont_teams, username);
        }
    });
}
/**********************************
* add_info_team: Add information
                 to team modal.
* @param competitions
* @return tpl
***********************************/
function add_team_information(datos, team_id, cont_teams, username){
  $("#team_information_salary").empty();
  $("#team_information_date").empty();
  $("#team_information_points").empty();
  $("#competition_modal").empty();
  $("#competition_name").empty();
  $("#competition_in").empty();
  $("#competition_entry_cost").empty();
  $("#competition_position").empty();
  $("#team_players").empty();
  $("#players_team").empty();
  $("#team_name").empty();
  $('#activateedit').empty();
    var pos        = '';
    var hour       =   $('#hour').val();       // Hora del sistema
    var boton_edit =   ''; // Construye el boton de editar
    var actual_date=   moment().format("YYYY-MM-DD HH:mm");  // Obtiene la fecha de hoy
    var team_date  =   0; // Obtengo le fecha del Lineup
    var teams_id;  // Contiene el campo oculto con el id del Lineup a Editar
    var team_name;
    var team_information_salary = "<tr>" +
        "<td>" + "<b>Salario: </b></td>" +
        "</tr>";
    var team_information_date ="<tr>" +
        "<td>" + "<b>Fecha: </b>- - - - </td>" +
        "</tr>";
    var team_information_points = "<tr>" +
        "<td>" + "<b>Total Pts: </b>- - -</td>" +
        "</tr>";
    var competition_modal = '';
    var competition_name;
    var competition_in;
    var competition_cost_entry;
    var competition_position;
    var players_team = "<thead>"+
                          "<tr>"+
                            "<th>POS</th>"+
                            "<th>JUGADOR</th>"+
                            "<th>PUNTOS</th>"+
                          "</tr>"+
                        "</thead>";
    $(datos).each(function(index, element) {
      //----------------------Team_information-------------------
      $(element.team_information).each(function (k, team_information) {
        type_journal = team_information.type_journal;
        type_play = team_information.type_play;
        remaining_salary = team_information.remaining_salary;

        team_date = moment(team_information.date).format("YYYY-MM-DD HH:mm");
          team_information_salary = "<tr>" +
              "<td>" + "<b>Salario: </b>" + team_information.remaining_salary + "</td>" +
              "</tr>";
          team_information_date ="<tr>" +
              "<td>" + "<b>Fecha: </b>"+ moment(team_information.date).format("YYYY-MM-DD"); + "</td>" +
              "</tr>";
          team_information_points ="<tr>" +
              "<td>" + "<b>Pts: </b>"+ team_information.points; + "</td>" +
              "</tr>";
      });
      //----------------------Players-------------------
      $(element.players).each(function (j, players) {
          if(players.position == 'OF' || players.position == 'OF1' || players.position == 'OF2'){
              pos = players.position;
          }else{
              pos = players.position.substr(0,3);
          }
          players_team = players_team +
              "<tr>"+
              "<td>"+pos+"</td>"+
                  "<td>"+players.name+"</td>"+
                  "<td>"+players.points+"</td>"+
              "</tr>";
      });
      //-------------------Equipo------------------------
      $(element.competitions).each(function (i, competitions) {
        championship_id = competitions.championship_id;
        sport_id = competitions.sport_id;
        competition_modal = competition_modal +
          "<div class='panel-group lincompsinscr' id='accordion' role='tablist' aria-multiselectable='true'>"+
            "<div class='panel panel-default backblack'>"+
              "<a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseOne"+competitions.competition_id+"' aria-expanded='true' aria-controls='collapseOne'>"+
                "<div class='panel-heading backhead' role='tab' id='headingOne'>"+
                  "<h4 class='panel-title'>"+
                  competitions.name+
                  "<img src='../images/arrowd.png' class='icon-arrow-down' alt='flecha'>"+
                  "</h4>"+
                "</div>"+
              "</a>"+
              "<div id='collapseOne"+competitions.competition_id+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne'>"+
                "<div class='panel-body'>"+
                  "<table class='Tablacomplineups'>"+
                    "<tbody>"+
                      "<tr><td><b>Inscritos: </b>"+competitions.enrolled+"/"+competitions.user_max+"</td></tr>"+
                      "<tr><td><b>Entrada: </b>"+competitions.entry_cost+" $.</td></tr>"+
                      "<tr><td><b>Posición: </b>"+competitions.position+"</td></tr>"+
                    "</tbody>"+
                  "</table>"+
                "</div>"+
              "</div>"+
            "</div>"+
          "</div>";
      });
    });
    teams_id = '<div id="buttonedit"><input type="hidden" name="team_id" id="team_id" value="'+ team_id +'">'+
                  '<input type="hidden" name="championship_id" id="championship_id" value="'+ championship_id +'">'+
                  '<input type="hidden" name="team_date" id="team_date" value="'+ team_date +'">'+
                  '<input type="hidden" name="type_journal" id="type_journal" value="'+ type_journal +'">'+
                  '<input type="hidden" name="type_play" id="type_play" value="'+ type_play +'">'+
                  '<input type="hidden" name="remaining_salary" id="remaining_salary" value="'+ remaining_salary +'">'+
                  '<input type="hidden" name="sport_id" id="sport_id" value="'+ sport_id +'"></div>';


    // if (team_date > (actual_date)) {
    //   $('#activateedit').empty();
    //   boton_edit = teams_id+'<button type="submit" class="btn btn-default btn-primary4"  style="margin: 5px 0px;">EDITAR EQUIPO</button>';
    //   $('#activateedit').append(boton_edit);
    // } else if (team_date <= actual_date) {
    //     boton_edit = '<span style="color:#D8BD33;font-size: 15px">Las competiciones comenzaron</span>';
    //     $('#activateedit').append(boton_edit);
    //   }
    $("#team_information_salary").append(team_information_salary);
    $("#team_information_date").append(team_information_date);
    $("#team_information_points").append(team_information_points);
    $("#competition_modal").append(competition_modal);
    $("#players_team").append(players_team);
    $("#team_name").text(username+" "+cont_teams);
    $("#myModal").modal("show");
}
