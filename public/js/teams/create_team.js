var sport             = $("#sport").val();
var championship      = $("#championship").val();
var type_play         = $("#type_play").val();

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

add_players(championship,type_play);

$("#type_play").change(function() {
  var  type_play      = $(this).val();
  add_players(championship,type_play);
});

function add_players(championship,type_play) {
  var protocol        = location.protocol;
  var URLdomain       = window.location.host;
  var url_ajax        = protocol + "//" + URLdomain;
  var championship    = championship;
  var type_play       = type_play;
  jQuery.ajax({
    url: url_ajax + "/usuario/obtener-jugadores",
    type: "GET",
    async: true,
    data: {"championship": championship,"type_play": type_play},
    success: function (data) {
      var players     = jQuery.parseJSON(data);
      tpl_players(championship,type_play,players)
    }
  });
}


function  tpl_players(championship,type_play,players) {

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

  $(players).each(function(index, element) {
    $(element.pa).each(function (i, pa) {
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

    $(element.c).each(function (i, c) {
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

    $(element.fb).each(function (i, fb) {
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

    $(element.sb).each(function (i, sb) {
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

    $(element.tb).each(function (j, tb) {
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

    $(element.ss).each(function (i, ss) {
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

    $(element.of).each(function (i, of) {
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

    $(element.ci).each(function (k, ci) {
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

    $(element.mi).each(function (k, mi) {
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
      "<li role='presentation'><a href='#CID' id='1B' aria-controls='messages' role='tab' data-toggle='tab'>CI</a></li> " +
      "<li role='presentation'><a href='#MID' id='2B' aria-controls='settings' role='tab' data-toggle='tab'>MI</a></li> " +
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

function addPlayer(id, position, name, last_name, name_opponent, name_team, salary) {

  var verify_res              = verify_repeat(id,position);

  var template_pos            = "<td id='pos'>" + position + "</td>" +
    "<td id='jug'><span id='teamcol'>" + name +" "+ last_name + "</td>" +
    "<td id='opo'>" + name_opponent + " vs <span id='teamcol'>" + name_team + "</span></td>" +
    "<td id='salario'>" + salary + "</td>" +
    "<td>" +
    "<a href='#' onclick='deletePlayer();'>" +
    "<img src='../images/ico/menos.png' alt='menos' class='mashov'>" +
    "</a>" +
    "</td>";

  var template_pa             = "<td id='pos'>" + position + "</td>" +
    "<td id='jug'><span id='teamcol'>" + name + " / </span>" + last_name + " </td>" +
    "<td id='opo'>" + name_opponent + " vs <span id='teamcol'>" + name_team + "</span></td>" +
    "<td id='salario'>" + salary + "</td>" +
    "<td>" +
    "<a onclick='deletePlayer();'>" +
    "<img src='../images/ico/menos.png' alt='menos' class='mashov'>" +
    "</a>" +
    "</td>";

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
        pitchers_select  = template_pa;

      } else if (position == 'C') {
        catchers_select     = template_pos;
      } else if (position == '1B') {
        first_base_select   = template_pos;
      } else if (position == '2B') {
        second_base_select  = template_pos;
      } else if (position == '3B') {
        third_base_select   = template_pos;
      } else if (position == 'SS') {
        shortstop_select    = template_pos;
      } else if (position == 'OF') {
        if (fielder1_select == '')
          fielder1_select   = template_pos;
      } else if (fielder2_select == '') {
        fielder2_select     = template_pos;
      } else if (fielder3_select == '') {
        fielder3_select     = template_pos;
      }

      $("#playerPA").append(pitchers_select);
      $("#playerC").append(catchers_select);
      $("#player1B").append(first_base_select);
      $("#player2B").append(second_base_select);
      $("#player3B").append(third_base_select);
      $("#playerSS").append(shortstop_select);
      $("#playerOF1").append(fielder1_select);
      $("#playerOF2").append(fielder2_select);
      $("#playerOF3").append(fielder3_select);

    } else if (type_play == 'TURBO') {

      var pitchers_select            ='';
      var catchers_select            ='';
      var fielder1_select            ='';
      var center_fielder_select      ='';
      var m_fielder_select           ='';

      if (position == 'PA') {
        pitchers_select  = template_pa;

      } else if (position == 'C') {
        catchers_select     = template_pos;
      } else if (position == '1B' || position == '3B') {
        center_fielder_select   = template_pos;
      } else if (position == '2B' || position == 'SS') {
        m_fielder_select  = template_pos;
      } else if (position == 'OF') {
        fielder1_select   = template_pos;
      }
      $("#playerPA").append(pitchers_select);
      $("#playerC").append(catchers_select);
      $("#playerOF1").append(fielder1_select);
      $("#playerCI").append(center_fielder_select);
      $("#playerMI").append(m_fielder_select);
    }
  }
}

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
