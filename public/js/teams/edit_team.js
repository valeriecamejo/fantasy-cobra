/************************************************************************
 * Global
 ************************************************************************/
var sport_id         = $("#sport_id").val();
var championship_id  = $("#championship_id").val();
var type_play        = $("#type_play").val();
var team_date        = $("#team_date").val();
var type_journal     = $("#type_journal").val();
var team_id          = $("#team_id").val();

var pitcher          ='';
var catcher          ='';
var first_base       ='';
var second_base      ='';
var third_base       ='';
var shortstop        ='';
var fielder_1        ='';
var fielder_2        ='';
var fielder_3        ='';
var center_fielder   ='';
var m_fielder        ='';
var count_team       = 0;
var remaining_salary = 50000;
document.getElementsByName("salaryrest")[0].value = remaining_salary;
$("#playerOF").empty();
$("#playerOF1").empty();
$("#playerOF2").empty();

/************************************************************************
 * Load players
 ************************************************************************/

add_player(team_id, championship_id, type_play, team_date, type_journal);

/************************************************************************
 * Ajax Load players
 ************************************************************************/
function add_player(team_id, championship_id, type_play, team_date, type_journal) {

  jQuery.noConflict();

var protocol  = location.protocol;
var URLdomain = window.location.host;
var url_ajax  = protocol + "//" + URLdomain;

  jQuery.ajax({
    url: url_ajax + "/usuario/editar-equipo",
    type: "GET",
    async: true,
    data: {"team_id": team_id, "championship_id": championship_id, "type_play": type_play, "team_date": team_date, "type_journal": type_journal},
    success: function (data) {

      var datos = jQuery.parseJSON(data);
      console.warn(datos);
      tpl_user_players(type_play, datos);
      tpl_players(championship_id, type_play, datos);

    }
  });
}

/************************************************************************
 * Template that loads the players and the team of the user.
 ************************************************************************/
function  tpl_user_players(type_play, datos) {

  var pitchers                  = '';
  var catchers                  = '';
  var first_base                = '';
  var second_base               = '';
  var third_base                = '';
  var shortstop                 = '';
  var fielders                  = '';
  var c_filder_position         = '';
  var c_filder_name             = '';
  var c_filder_last_name        = '';
  var c_filder_name_opponent    = '';
  var c_filder_name_team        = '';
  var c_filder_salary           = '';
  var c_filder_id               = '';
  var m_filder_position         = '';
  var m_filder_name             = '';
  var m_filder_last_name        = '';
  var m_filder_name_opponent    = '';
  var m_filder_name_team        = '';
  var m_filder_salary           = '';
  var m_filder_id               = '';
  var template_pa               = '';
  var template_ca               = '';
  var template_mi               = '';
  var template_ci               = '';
  var template_of               = '';
  var first_base_position       = '';
  var first_base_name           = '';
  var first_base_last_name      = '';
  var first_base_name_opponent  = '';
  var first_base_name_team      = '';
  var first_base_salary         = '';
  var first_base_id             = '';
  var second_base_position      = '';
  var second_base_name          = '';
  var second_base_last_name     = '';
  var second_base_name_opponent = '';
  var second_base_name_team     = '';
  var second_base_salary        = '';
  var second_base_id            = '';
  var third_base_position       = '';
  var third_base_name           = '';
  var third_base_last_name      = '';
  var third_base_name_opponent  = '';
  var third_base_name_team      = '';
  var third_base_salary         = '';
  var third_base_id             = '';
  var shortstop_position        = '';
  var shortstop_name            = '';
  var shortstop_last_name       = '';
  var shortstop_name_opponent   = '';
  var shortstop_name_team       = '';
  var shortstop_salary          = '';
  var shortstop_id              = '';
  var filder2_position          = '';
  var filder2_name              = '';
  var filder2_last_name         = '';
  var filder2_name_opponent     = '';
  var filder2_name_team         = '';
  var filder2_salary            = '';
  var filder2_id                = '';
  var filder3_position          = '';
  var filder3_name              = '';
  var filder3_last_name         = '';
  var filder3_name_opponent     = '';
  var filder3_name_team         = '';
  var filder3_salary            = '';
  var filder3_id                = '';

  $("#playerPA").empty();
  $("#playerC").empty();
  $("#player1B").empty();
  $("#playerCI").empty();
  $("#playerMI").empty();
  $("#player2B").empty();
  $("#player3B").empty();
  $("#playerSS").empty();
  $("#playerOF").empty();
  $("#playerOF1").empty();
  $("#playerOF2").empty();

  $(datos).each(function(index, element) {

    var cont = 0;

      $(element.update_team).each(function (i, update_team) {

        if (type_play == 'REGULAR') {

          switch(update_team.position) {
            case "PA":
                pitcher_position      = update_team.position;
                pitcher_name          = update_team.name;
                pitcher_last_name     = update_team.last_name;
                pitcher_name_opponent = update_team.name_opponent;
                pitcher_name_team     = update_team.name_team;
                pitcher_salary        = update_team.salary;
                pitcher_id            = update_team.player_id;
                pitcher               = pitcher_id
                break;
            case "C":
                catcher_position      = update_team.position;
                catcher_name          = update_team.name;
                catcher_last_name     = update_team.last_name;
                catcher_name_opponent = update_team.name_opponent;
                catcher_name_team     = update_team.name_team;
                catcher_salary        = update_team.salary;
                catcher_id            = update_team.player_id;
                catcher               = catcher_id;
                break;
            case "1B":
                first_base_position      = update_team.position;
                first_base_name          = update_team.name;
                first_base_last_name     = update_team.last_name;
                first_base_name_opponent = update_team.name_opponent;
                first_base_name_team     = update_team.name_team;
                first_base_salary        = update_team.salary;
                first_base_id            = update_team.player_id;
                first_base               = first_base_id;
                break;
            case "2B":
                second_base_position      = update_team.position;
                second_base_name          = update_team.name;
                second_base_last_name     = update_team.last_name;
                second_base_name_opponent = update_team.name_opponent;
                second_base_name_team     = update_team.name_team;
                second_base_salary        = update_team.salary;
                second_base_id            = update_team.player_id;
                second_base               = second_base_id;
                break;
            case "3B":
                third_base_position      = update_team.position;
                third_base_name          = update_team.name;
                third_base_last_name     = update_team.last_name;
                third_base_name_opponent = update_team.name_opponent;
                third_base_name_team     = update_team.name_team;
                third_base_salary        = update_team.salary;
                third_base_id            = update_team.player_id;
                third_base               = third_base_id;
                break;
            case "SS":
                shortstop_position      = update_team.position;
                shortstop_name          = update_team.name;
                shortstop_last_name     = update_team.last_name;
                shortstop_name_opponent = update_team.name_opponent;
                shortstop_name_team     = update_team.name_team;
                shortstop_salary        = update_team.salary;
                shortstop_id            = update_team.player_id;
                shortstop               = shortstop_id;
                break;
            case "OF":
              if (cont == 0) {
                filder_position      = update_team.position;
                filder_name          = update_team.name;
                filder_last_name     = update_team.last_name;
                filder_name_opponent = update_team.name_opponent;
                filder_name_team     = update_team.name_team;
                filder_salary        = update_team.salary;
                filder_id            = update_team.player_id;
                fielder_1            = filder_id;
                cont ++;
              } else if (cont == 1) {
                filder2_position      = update_team.position;
                filder2_name          = update_team.name;
                filder2_last_name     = update_team.last_name;
                filder2_name_opponent = update_team.name_opponent;
                filder2_name_team     = update_team.name_team;
                filder2_salary        = update_team.salary;
                filder2_id            = update_team.player_id;
                filder_2              = filder2_id;
                cont ++;
              } else if (cont == 2){
                filder3_position      = update_team.position;
                filder3_name          = update_team.name;
                filder3_last_name     = update_team.last_name;
                filder3_name_opponent = update_team.name_opponent;
                filder3_name_team     = update_team.name_team;
                filder3_salary        = update_team.salary;
                filder3_id            = update_team.player_id;
                filder_3              = filder3_id;
              }
            break;
          }

      } else if (type_play == 'TURBO') {

          switch(update_team.position) {
            case "PA":
                pitcher_position      = update_team.position;
                pitcher_name          = update_team.name;
                pitcher_last_name     = update_team.last_name;
                pitcher_name_opponent = update_team.name_opponent;
                pitcher_name_team     = update_team.name_team;
                pitcher_salary        = update_team.salary;
                pitcher_id            = update_team.player_id;
                pitcher               = pitcher_id
                break;
            case "C":
                catcher_position      = update_team.position;
                catcher_name          = update_team.name;
                catcher_last_name     = update_team.last_name;
                catcher_name_opponent = update_team.name_opponent;
                catcher_name_team     = update_team.name_team;
                catcher_salary        = update_team.salary;
                catcher_id            = update_team.player_id;
                catcher               = catcher_id;
                break;
            case "1B":
                c_filder_position      = update_team.position;
                c_filder_name          = update_team.name;
                c_filder_last_name     = update_team.last_name;
                c_filder_name_opponent = update_team.name_opponent;
                c_filder_name_team     = update_team.name_team;
                c_filder_salary        = update_team.salary;
                c_filder_id            = update_team.player_id;
                center_fielder         = c_filder_id;
                break;
            case "3B":
                c_filder_position      = update_team.position;
                c_filder_name          = update_team.name;
                c_filder_last_name     = update_team.last_name;
                c_filder_name_opponent = update_team.name_opponent;
                c_filder_name_team     = update_team.name_team;
                c_filder_salary        = update_team.salary;
                center_fielder         = c_filder_id;
                break;
            case "2B":
                m_filder_position      = update_team.position;
                m_filder_name          = update_team.name;
                m_filder_last_name     = update_team.last_name;
                m_filder_name_opponent = update_team.name_opponent;
                m_filder_name_team     = update_team.name_team;
                m_filder_salary        = update_team.salary;
                m_filder_id            = update_team.player_id;
                m_fielder              = m_filder_id;
                break;
            case "SS":
                m_filder_position      = update_team.position;
                m_filder_name          = update_team.name;
                m_filder_last_name     = update_team.last_name;
                m_filder_name_opponent = update_team.name_opponent;
                m_filder_name_team     = update_team.name_team;
                m_filder_salary        = update_team.salary;
                m_fielder              = m_filder_id;
                break;
            case "OF":
                filder_position      = update_team.position;
                filder_name          = update_team.name;
                filder_last_name     = update_team.last_name;
                filder_name_opponent = update_team.name_opponent;
                filder_name_team     = update_team.name_team;
                filder_salary        = update_team.salary;
                filder_id            = update_team.player_id;
                fielder_1            = filder_id;
                break;
          }
        }
    });
  });

  var template_pa = "<td id='pos'>" + pitcher_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + pitcher_name + " / </span>" + pitcher_last_name + " </td>" +
                    "<td id='opo'>" + pitcher_name_opponent + " vs <span id='teamcol'>" + pitcher_name_team + "</span></td>" +
                    "<td id='salario'>" + pitcher_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ pitcher_id +'","'+ pitcher_salary +'","player'+ pitcher_position +'"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='" + pitcher_position + "' value='" + pitcher_id + "'>" +
                    "</td>";
  var template_ca = "<td id='pos'>" + catcher_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + catcher_name +" "+ catcher_last_name + "</td>" +
                    "<td id='opo'>" + catcher_name_opponent + " vs <span id='teamcol'>" + catcher_name_team + "</span></td>" +
                    "<td id='salario'>" + catcher_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ catcher_id +'","'+ catcher_salary +'","player'+ catcher_position +'"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='" + catcher_position + "' value='" + catcher_id + "'>" +
                    "</td>";
  var template_b1 = "<td id='pos'>" + first_base_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + first_base_name +" "+ first_base_last_name + "</td>" +
                    "<td id='opo'>" + first_base_name_opponent + " vs <span id='teamcol'>" + first_base_name_team + "</span></td>" +
                    "<td id='salario'>" + first_base_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ first_base_id +'","'+ first_base_salary +'","playerCI"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='CI' value='" + first_base_id + "'>" +
                    "</td>";
  var template_b2 = "<td id='pos'>" + second_base_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + second_base_name +" "+ second_base_last_name + "</td>" +
                    "<td id='opo'>" + second_base_name_opponent + " vs <span id='teamcol'>" + second_base_name_team + "</span></td>" +
                    "<td id='salario'>" + second_base_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ second_base_id +'","'+ second_base_salary +'","playerCI"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='CI' value='" + second_base_id + "'>" +
                    "</td>";
  var template_b3 = "<td id='pos'>" + third_base_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + third_base_name +" "+ third_base_last_name + "</td>" +
                    "<td id='opo'>" + third_base_name_opponent + " vs <span id='teamcol'>" + third_base_name_team + "</span></td>" +
                    "<td id='salario'>" + third_base_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ third_base_id +'","'+ third_base_salary +'","playerCI"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='CI' value='" + third_base_id + "'>" +
                    "</td>";
  var template_ss = "<td id='pos'>" + shortstop_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + shortstop_name +" "+ shortstop_last_name + "</td>" +
                    "<td id='opo'>" + shortstop_name_opponent + " vs <span id='teamcol'>" + shortstop_name_team + "</span></td>" +
                    "<td id='salario'>" + shortstop_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ shortstop_id +'","'+ shortstop_salary +'","playerMI"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='MI' value='" + shortstop_id + "'>" +
                    "</td>";
  var template_mi = "<td id='pos'> MI </td>" +
                    "<td id='jug'><span id='teamcol'>" + m_filder_name +" "+ m_filder_last_name + "</td>" +
                    "<td id='opo'>" + m_filder_name_opponent + " vs <span id='teamcol'>" + m_filder_name_team + "</span></td>" +
                    "<td id='salario'>" + m_filder_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ m_filder_id +'","'+ m_filder_salary +'","playerMI"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='MI' value='" + m_filder_id + "'>" +
                    "</td>";
  var template_ci = "<td id='pos'> CI </td>" +
                    "<td id='jug'><span id='teamcol'>" + c_filder_name +" "+ c_filder_last_name + "</td>" +
                    "<td id='opo'>" + c_filder_name_opponent + " vs <span id='teamcol'>" + c_filder_name_team + "</span></td>" +
                    "<td id='salario'>" + c_filder_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ c_filder_id +'","'+ c_filder_salary +'","playerCI"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='CI' value='" + c_filder_id + "'>" +
                    "</td>";
  var template_of = "<td id='pos'>" + filder_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + filder_name +" "+ filder_last_name + "</td>" +
                    "<td id='opo'>" + filder_name_opponent + " vs <span id='teamcol'>" + filder_name_team + "</span></td>" +
                    "<td id='salario'>" + filder_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ filder_id +'","'+ filder_salary +'","player'+ filder_position +'"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='" + filder_position + "' value='" + filder_id + "'>" +
                    "</td>";
  var template_of1 = "<td id='pos'>" + filder2_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + filder2_name +" "+ filder2_last_name + "</td>" +
                    "<td id='opo'>" + filder2_name_opponent + " vs <span id='teamcol'>" + filder2_name_team + "</span></td>" +
                    "<td id='salario'>" + filder2_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ filder2_id +'","'+ filder2_salary +'","player'+ filder2_position +'"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='" + filder2_position + "' value='" + filder2_id + "'>" +
                    "</td>";
  var template_of2 = "<td id='pos'>" + filder3_position + "</td>" +
                    "<td id='jug'><span id='teamcol'>" + filder3_name +" "+ filder3_last_name + "</td>" +
                    "<td id='opo'>" + filder3_name_opponent + " vs <span id='teamcol'>" + filder3_name_team + "</span></td>" +
                    "<td id='salario'>" + filder3_salary + "</td>" +
                    "<td>" +
                    '<a  onclick=deletePlayer('+'"'+ filder3_id +'","'+ filder3_salary +'","player'+ filder3_position +'"); >' +
                    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
                    "</a>" +
                    "<input type='hidden' name='" + filder3_position + "' value='" + filder3_id + "'>" +
                    "</td>";

  if (type_play == 'REGULAR') {

    $("#playerPA").append(template_pa);
    $("#playerC").append(template_ca);
    $("#player1B").append(template_b1);
    $("#player2B").append(template_b2);
    $("#player3B").append(template_b3);
    $("#playerSS").append(template_ss);
    $("#playerOF").append(template_of);
    $("#playerOF1").append(template_of1);
    $("#playerOF2").append(template_of2)

  } else if (type_play == 'TURBO') {

    $("#playerPA").append(template_pa);
    $("#playerC").append(template_ca);
    $("#playerCI").append(template_ci);
    $("#playerMI").append(template_mi);
    $("#playerOF").append(template_of);
  }
}

/************************************************************************
 * Templates Load players
 ************************************************************************/
function  tpl_players(championship, type_play, datos) {

  var pitchers            ='';
  var catchers            ='';
  var first_base          ='';
  var second_base         ='';
  var third_base          ='';
  var shortstop           ='';
  var fielders            ='';
  var center_fielder      ='';
  var m_fielder           ='';

  $("#tabs").empty();
  $("#PAD").empty();
  $("#CD").empty();
  $("#1BD").empty();
  $("#2BD").empty();
  $("#3BD").empty();
  $("#SSD").empty();
  $("#OFD").empty();
  $("#CID").empty();
  $("#MID").empty();
  $("#BATSD").empty();

$(datos).each(function(index, element) {

  $(element.players).each(function (v, players) {

    $(players.pa).each(function (i, pa) {

      pitchers  = pitchers + "<tr>" +
        "<td id='pos'>" + pa.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + pa.name + " / </span>" + pa.last_name + " </td>" +
        "<td id='opo'>" + pa.name_opponent + " vs <span id='teamcol'>" + pa.name_team + "</span></td>" +
        "<td id='salario'>" + pa.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+pa.id+'","'+pa.position+'","'+pa.name+'","'+pa.last_name+'","'+pa.name_opponent+'","'+pa.name_team+'","'+pa.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

    $(players.c).each(function (i, c) {
      catchers  = catchers + "<tr>" +
        "<td id='pos'>" + c.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + c.name +" "+ c.last_name + "</td>" +
        "<td id='opo'>" + c.name_opponent + " vs <span id='teamcol'> " + c.name_team + "</span></td>" +
        "<td id='salario'>" + c.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+c.id+'","'+c.position+'","'+c.name+'","'+c.last_name+'","'+c.name_opponent+'","'+c.name_team+'","'+c.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

    $(players.fb).each(function (i, fb) {
      first_base  = first_base + "<tr>" +
        "<td id='pos'>" + fb.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + fb.name +" "+ fb.last_name + "</td>" +
        "<td id='opo'>" + fb.name_opponent + " vs <span id='teamcol'> " + fb.name_team + "</span></td>" +
        "<td id='salario'>" + fb.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+fb.id+'","'+fb.position+'","'+fb.name+'","'+fb.last_name+'","'+fb.name_opponent+'","'+fb.name_team+'","'+fb.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

    $(players.sb).each(function (i, sb) {
      second_base  = second_base + "<tr>" +
        "<td id='pos'>" + sb.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + sb.name +" "+ sb.last_name + "</td>" +
        "<td id='opo'>" + sb.name_opponent + " vs <span id='teamcol'> " + sb.name_team + "</span></td>" +
        "<td id='salario'>" + sb.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+sb.id+'","'+sb.position+'","'+sb.name+'","'+sb.last_name+'","'+sb.name_opponent+'","'+sb.name_team+'","'+sb.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

    $(players.tb).each(function (j, tb) {
      third_base  = third_base + "<tr>" +
        "<td id='pos'>" + tb.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + tb.name +" "+ tb.last_name + "</td>" +
        "<td id='opo'>" + tb.name_opponent + " vs <span id='teamcol'> " + tb.name_team + "</span></td>" +
        "<td id='salario'>" + tb.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+tb.id+'","'+tb.position+'","'+tb.name+'","'+tb.last_name+'","'+tb.name_opponent+'","'+tb.name_team+'","'+tb.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

    $(players.ss).each(function (i, ss) {
      shortstop  = shortstop + "<tr>" +
        "<td id='pos'>" + ss.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + ss.name +" "+ ss.last_name + "</td>" +
        "<td id='opo'>" + ss.name_opponent + " vs <span id='teamcol'> " + ss.name_team + "</span></td>" +
        "<td id='salario'>" + ss.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+ss.id+'","'+ss.position+'","'+ss.name+'","'+ss.last_name+'","'+ss.name_opponent+'","'+ss.name_team+'","'+ss.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

    $(players.of).each(function (i, of) {
      fielders  = fielders + "<tr>" +
        "<td id='pos'>" + of.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + of.name +" "+ of.last_name + "</td>" +
        "<td id='opo'>" + of.name_opponent + " vs <span id='teamcol'> " + of.name_team + "</span></td>" +
        "<td id='salario'>" + of.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+of.id+'","'+of.position+'","'+of.name+'","'+of.last_name+'","'+of.name_opponent+'","'+of.name_team+'","'+of.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

    $(players.ci).each(function (k, ci) {
      center_fielder  = center_fielder + "<tr>" +
        "<td id='pos'>" + ci.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + ci.name +" "+ ci.last_name + "</td>" +
        "<td id='opo'>" + ci.name_opponent + " vs <span id='teamcol'> " + ci.name_team + "</span></td>" +
        "<td id='salario'>" + ci.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+ci.id+'","'+ci.position+'","'+ci.name+'","'+ci.last_name+'","'+ci.name_opponent+'","'+ci.name_team+'","'+ci.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

    $(players.mi).each(function (k, mi) {
      m_fielder  = m_fielder + "<tr>" +
        "<td id='pos'>" + mi.position + "</td>" +
        "<td id='jug'><span id='teamcol'>" + mi.name +" "+ mi.last_name + "</td>" +
        "<td id='opo'>" + mi.name_opponent + " vs <span id='teamcol'> " + mi.name_team + "</span></td>" +
        "<td id='salario'>" + mi.salary + "</td>" +
        "<td>" +
        '<a  onclick=addPlayer('+'"'+mi.id+'","'+mi.position+'","'+mi.name+'","'+mi.last_name+'","'+mi.name_opponent+'","'+mi.name_team+'","'+mi.salary+'"); >'+
        "<img src='/images/ico/mas.png' alt='mas' class='mashov'>" +
        "</a>" +
        "</td>" +
        "</tr>";
    });

  });

});

  if (type_play == 'REGULAR') {

    var tabs = "<ul class='nav nav-tabs entirewidth' role='tablist'>" +
      "<li role='presentation' class='active'><a href='#PAD' id='PA' aria-controls='home' role='tab' data-toggle='tab'>PA</a></li> " +
      "<li role='presentation'><a href='#CD' id='C' aria-controls='profile' role='tab' data-toggle='tab'>C</a></li> " +
      "<li role='presentation'><a href='#1BD' id='1B' aria-controls='messages' role='tab' data-toggle='tab'>1B</a></li> " +
      "<li role='presentation'><a href='#2BD' id='2B' aria-controls='settings' role='tab' data-toggle='tab'>2B</a></li> " +
      "<li role='presentation'><a href='#3BD' id='3B' aria-controls='settings' role='tab' data-toggle='tab'>3B</a></li> " +
      "<li role='presentation'><a href='#SSD' id='SS' aria-controls='settings' role='tab' data-toggle='tab'>SS</a></li> " +
      "<li role='presentation'><a href='#OFD' id='OF' aria-controls='settings' role='tab' data-toggle='tab'>OF</a></li> " +
      "<li role='presentation'><a href='#BATSD' id='BATS' aria-controls='settings' role='tab' data-toggle='tab'>BATS</a></li>" +
      "</ul>";
    var   all_bats  = catchers + first_base + second_base + third_base + shortstop + fielders;


  } else if (type_play == 'TURBO') {
    var tabs = "<ul class='nav nav-tabs entirewidth' role='tablist'>" +
      "<li role='presentation' class='active'><a href='#PAD' id='PA' aria-controls='home' role='tab' data-toggle='tab'>PA</a></li> " +
      "<li role='presentation'><a href='#CD' id='C' aria-controls='profile' role='tab' data-toggle='tab'>C</a></li> " +
      "<li role='presentation'><a href='#MID' id='2B' aria-controls='settings' role='tab' data-toggle='tab'>MI</a></li> " +
      "<li role='presentation'><a href='#CID' id='1B' aria-controls='messages' role='tab' data-toggle='tab'>CI</a></li> " +
      "<li role='presentation'><a href='#OFD' id='OF' aria-controls='settings' role='tab' data-toggle='tab'>OF</a></li> " +
      "<li role='presentation'><a href='#BATSD' id='BATS' aria-controls='settings' role='tab' data-toggle='tab'>BATS</a></li>" +
      "</ul>";
    var   all_bats  = catchers + center_fielder + m_fielder + fielders;

  }
  $("#tabs").append(tabs);
  $("#PAD").append(pitchers);
  $("#CD").append(catchers);
  $("#1BD").append(first_base);
  $("#2BD").append(second_base);
  $("#3BD").append(third_base);
  $("#SSD").append(shortstop);
  $("#OFD").append(fielders);
  $("#CID").append(center_fielder);
  $("#MID").append(m_fielder);
  $("#BATSD").append(all_bats);

}

/************************************************************************
 * Add player to selection
 ************************************************************************/
function addPlayer(id, position, name, last_name, name_opponent, name_team, salary) {

  var button_create           = "<button type='submit' class='btn btn-primary2 btn-lg' name='createlineup'>Crear Lineup</button>";

  var template_pos            = "<td id='pos'>" + position + "</td>" +
    "<td id='jug'><span id='teamcol'>" + name +" "+ last_name + "</td>" +
    "<td id='opo'>" + name_opponent + " vs <span id='teamcol'>" + name_team + "</span></td>" +
    "<td id='salario'>" + salary + "</td>" +
    "<td>" +
    '<a  onclick=deletePlayer('+'"'+id+'","'+salary+'","player'+position+'"); >' +
    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
    "</a>" +
    "<input type='hidden' name='" + position + "' value='" + id + "'>" +
    "</td>";

  var template_mi            = "<td id='pos'> MI </td>" +
    "<td id='jug'><span id='teamcol'>" + name +" "+ last_name + "</td>" +
    "<td id='opo'>" + name_opponent + " vs <span id='teamcol'>" + name_team + "</span></td>" +
    "<td id='salario'>" + salary + "</td>" +
    "<td>" +
    '<a  onclick=deletePlayer('+'"'+id+'","'+salary+'","playerMI"); >' +
    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
    "</a>" +
    "<input type='hidden' name='MI' value='" + id + "'>" +
    "</td>";

  var template_ci            = "<td id='pos'> CI </td>" +
    "<td id='jug'><span id='teamcol'>" + name +" "+ last_name + "</td>" +
    "<td id='opo'>" + name_opponent + " vs <span id='teamcol'>" + name_team + "</span></td>" +
    "<td id='salario'>" + salary + "</td>" +
    "<td>" +
    '<a  onclick=deletePlayer('+'"'+id+'","'+salary+'","playerCI"); >' +
    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
    "</a>" +
    "<input type='hidden' name='CI' value='" + id + "'>" +
    "</td>";

  var template_pa             = "<td id='pos'>" + position + "</td>" +
    "<td id='jug'><span id='teamcol'>" + name + " / </span>" + last_name + " </td>" +
    "<td id='opo'>" + name_opponent + " vs <span id='teamcol'>" + name_team + "</span></td>" +
    "<td id='salario'>" + salary + "</td>" +
    "<td>" +
    '<a  onclick=deletePlayer('+'"'+id+'","'+salary+'","player'+position+'"); >' +
    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
    "</a>" +
    "<input type='hidden' name='" + position + "' value='" + id + "'>" +
    "</td>";

  var template_of1            = "<td id='pos'> OF1 </td>" +
    "<td id='jug'><span id='teamcol'>" + name +" "+ last_name + "</td>" +
    "<td id='opo'>" + name_opponent + " vs <span id='teamcol'>" + name_team + "</span></td>" +
    "<td id='salario'>" + salary + "</td>" +
    "<td>" +
    '<a  onclick=deletePlayer('+'"'+id+'","'+salary+'","playerOF1"); >' +
    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
    "</a>" +
    "<input type='hidden' name='OF1' value='" + id + "'>" +
    "</td>";

  var template_of2            = "<td id='pos'> OF2 </td>" +
    "<td id='jug'><span id='teamcol'>" + name +" "+ last_name + "</td>" +
    "<td id='opo'>" + name_opponent + " vs <span id='teamcol'>" + name_team + "</span></td>" +
    "<td id='salario'>" + salary + "</td>" +
    "<td>" +
    '<a  onclick=deletePlayer('+'"'+id+'","'+salary+'","playerOF2"); >' +
    "<img src='/images/ico/menos.png' alt='menos' class='mashov'>" +
    "</a>" +
    "<input type='hidden' name='OF2' value='" + id + "'>" +
    "</td>";

  var verify_res              = verify_repeat(id,position);

  if(verify_res == true) {

    alert("El " + position + " ya fue seleccionado");

  } else {

    if (type_play == 'REGULAR') {
      var pitchers_select            ='';
      var catchers_select            ='';
      var first_base_select          ='';
      var second_base_select         ='';
      var third_base_select          ='';
      var shortstop_select           ='';
      var fielder1_select            ='';
      var fielder2_select            ='';
      var fielder3_select            ='';

      if (position == 'PA') {
        pitchers_select   = template_pa;
        updateSalary(salary, "add")
      } else if (position == 'C') {
        catchers_select     = template_pos;
        updateSalary(salary, "add")
      } else if (position == '1B') {
        first_base_select   = template_pos;
        updateSalary(salary, "add")
      } else if (position == '2B') {
        second_base_select  = template_pos;
        updateSalary(salary, "add")
      } else if (position == '3B') {
        third_base_select   = template_pos;
        updateSalary(salary, "add")
      } else if (position == 'SS') {
        shortstop_select  = template_pos;
        updateSalary(salary, "add")
      } else if (position == 'OF') {
        if ($("#playerOF").is(':empty')) {
          fielder1_select = template_pos;
          updateSalary(salary, "add")
        } else if ($("#playerOF1").is(':empty')) {
          fielder2_select   = template_of1;
          updateSalary(salary, "add")
        } else if ($("#playerOF2").is(':empty')) {
          fielder3_select   = template_of2;
          updateSalary(salary, "add")
        }
      }
      $("#playerPA").append(pitchers_select);
      $("#playerC").append(catchers_select);
      $("#player1B").append(first_base_select);
      $("#player2B").append(second_base_select);
      $("#player3B").append(third_base_select);
      $("#playerSS").append(shortstop_select);
      $("#playerOF").append(fielder1_select);
      $("#playerOF1").append(fielder2_select);
      $("#playerOF2").append(fielder3_select);

      if (count_team == 9) {
        $("#button_create").append(button_create);
      } else if (count_team < 9) {
        $("#button_create").empty();
      }
    } else if (type_play == 'TURBO') {

      var pitchers_select            ='';
      var catchers_select            ='';
      var fielder1_select            ='';
      var center_fielder_select      ='';
      var m_fielder_select           ='';

      if (position == 'PA') {
        pitchers_select  = template_pa;
        updateSalary(salary, "add")
      } else if (position == 'C') {
        catchers_select     = template_pos;
        updateSalary(salary, "add")
      } else if (position == '1B' || position == '3B') {
        center_fielder_select   = template_ci;
        updateSalary(salary, "add")
      } else if (position == '2B' || position == 'SS') {
        m_fielder_select  = template_mi;
        updateSalary(salary, "add")
      } else if (position == 'OF') {
        fielder1_select   = template_pos;
        updateSalary(salary, "add")
      }
      $("#playerPA").append(pitchers_select);
      $("#playerC").append(catchers_select);
      $("#playerOF").append(fielder1_select);
      $("#playerCI").append(center_fielder_select);
      $("#playerMI").append(m_fielder_select);

      if (count_team == 5) {
        $("#button_create").append(button_create);
      }
    }
  }
}

/************************************************************************
 * Validate no repeat player and position
 ************************************************************************/
function verify_repeat(id_player,position_player) {
  var repeat          = '';

  if (type_play == 'REGULAR') {
    if (position_player == 'PA') {
      if (pitcher == id_player) {
        repeat          = true;
      } else if (pitcher != '') {
        repeat          = true;
      } else {
        pitcher         = id_player;
      }

    } else if (position_player == 'C') {
      if (catcher == id_player) {
        repeat          = true;
      } else if (catcher != '') {
        repeat          = true;
      } else {
        catcher         = id_player;
      }
    } else if (position_player == '1B') {
      if (first_base == id_player) {
        repeat          = true;
      } else if (first_base != '') {
        repeat          = true;
      } else {
        first_base      = id_player;
      }
    } else if (position_player == '2B') {
      if (second_base == id_player) {
        repeat          = true;
      } else if (second_base != '') {
        repeat          = true;
      } else {
        second_base     = id_player;
      }
    } else if (position_player == '3B') {
      if (third_base == id_player) {
        repeat          = true;
      } else if (third_base != '') {
        repeat          = true;
      } else {
        third_base      = id_player;
      }
    } else if (position_player == 'SS') {
      if (shortstop == id_player) {
        repeat          = true;
      } else if (shortstop != '') {
        repeat          = true;
      } else {
        shortstop       = id_player;
      }
    } else if (position_player == 'OF') {
      if (fielder_1 == id_player || fielder_2 == id_player || fielder_3 == id_player) {
        repeat          = true;
      } else {
        if (fielder_1 == '') {
          fielder_1       = id_player;
        } else if (fielder_2 == '') {
          fielder_2       = id_player;
        } else if (fielder_3 == '') {
          fielder_3       = id_player;
        } else {
          repeat          = true;
        }
      }
    }
  } else if (type_play == 'TURBO') {
    if (position_player == 'PA') {
      if (pitcher == id_player) {
        repeat          = true;
      } else if (pitcher != '') {
        repeat          = true;
      } else {
        pitcher         = id_player;
      }

    } else if (position_player == 'C') {
      if (catcher == id_player) {
        repeat          = true;
      } else if (catcher != '') {
        repeat          = true;
      } else {
        catcher         = id_player;
      }
    } else if (position_player == '1B' || position_player == '3B') {
      if (center_fielder == id_player) {
        repeat          = true;
      } else if (center_fielder != '') {
        repeat          = true;
      } else {
        center_fielder      = id_player;
      }
    } else if (position_player == '2B' || position_player == 'SS') {
      if (m_fielder == id_player) {
        repeat          = true;
      } else if (m_fielder != '') {
        repeat          = true;
      } else {
        m_fielder      = id_player;
      }
    } else if (position_player == 'OF') {
      if (fielder_1 == id_player) {
        repeat          = true;
      } else if (fielder_1 != '') {
        repeat          = true;
      } else {
        fielder_1      = id_player;
      }
    }
  }
  return repeat;
}

/************************************************************************
 * delete player selection
 ************************************************************************/
function deletePlayer(id , salary, position ) {

  $("#"+position).empty();
  $("#button_create").children().remove();
  updateSalary(salary, "delete")
  if (pitcher == id) {
    pitcher           ='';
  } else if (catcher == id) {
    catcher           ='';
  } else if (first_base == id) {
    first_base        ='';
  } else if (second_base == id) {
    second_base       ='';
  } else if (third_base == id) {
    third_base        ='';
  } else if (shortstop == id) {
    shortstop         ='';
  } else if (fielder_1 == id) {
    fielder_1         ='';
  } else if (fielder_2 == id) {
    fielder_2         ='';
  } else if (fielder_3 == id) {
    fielder_3         ='';
  } else if (center_fielder == id) {
    center_fielder    ='';
  } else if (m_fielder == id) {
    m_fielder         ='';
  }
}

/************************************************************************
 * update remaining salary
 ************************************************************************/
function updateSalary(salary, update) {
  if (update == 'add') {
    if (salary > remaining_salary ) {
      alert("Ha agotado el presupuesto disponible!")
    } else {
      count_team      = count_team + 1;
      remaining_salary  = remaining_salary - parseInt(salary);
      document.getElementsByName("salaryrest")[0].value = remaining_salary;
    }
  } else if (update == 'delete') {
    count_team      = count_team - 1;
    remaining_salary  = remaining_salary + parseInt(salary);
    document.getElementsByName("salaryrest")[0].value = remaining_salary;
  }
}

