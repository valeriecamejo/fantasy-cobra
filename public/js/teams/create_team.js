var sport             = $("#sport").val();
var championship      = $("#championship").val();
var type_play         = $("#type_play").val();

add_players(championship,type_play)

$("#type_play").change(function() {
  var  type_play      = $(this).val();
  add_players(championship,type_play)
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
                                  "<a onclick='deletePlayer("+pa.id+");'>" +
                                  "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
                                  "<a href='#' onclick='deletePlayer("+c.id+");'>" +
                                  "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
        "<a href='#' onclick='deletePlayer("+fb.id+");'>" +
        "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
        "<a href='#' onclick='deletePlayer("+sb.id+");'>" +
        "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
        "<a href='#' onclick='deletePlayer("+tb.id+");'>" +
        "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
        "<a href='#' onclick='deletePlayer("+ss.id+");'>" +
        "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
        "<a href='#' onclick='deletePlayer("+of.id+");'>" +
        "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
        "<a href='#' onclick='deletePlayer("+ci.id+");'>" +
        "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
        "<a href='#' onclick='deletePlayer("+mi.id+");'>" +
        "<img src='../images/ico/mas.png' alt='mas' class='mashov'>" +
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
