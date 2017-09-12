/*****************************************
* filter_competitions.
* @param sport, filter_type, competitions
* @return tpl
*****************************************/
window.sport       = 'all';
window.filter_type = 'all';

function filter_competitions(sport, filter_type, competitions) {
 /*console.log("==========", sport, competitions, "==========");
  console.log("sport/all", sport == 'all');
  console.log("sport/baseball", sport == competitions[0].name_sport);
  console.log("sport/futbol", sport == competitions[0].name_sport);
*/
  jQuery.noConflict();

  window.sport = sport;
  window.filter_type = filter_type;
  var tpl = '';
  var tpl_mobile = '';
  var list_competitions = [];

  if ((sport == 'all') && (filter_type == 'all')) {
    $.each(competitions, function(index, element) {
      list_competitions.push(element);
    });

  } else {
    $.each(competitions, function(index, element) {
      if ((sport == 'all') && (element.type_competition == filter_type )) {
        list_competitions.push(element);
      }else {
        if ( (sport == 'all') && (element.type_play == filter_type ) ) {
          list_competitions.push(element);
        } else {
          if ((sport == 'all') && (filter_type == 'FREE')) {
            if (element.entry_cost == 0) {
              list_competitions.push(element);
            }
          }
        }
      }
    });
  }

  $.each(competitions, function(index, element) {
    if ((element.name_sport == sport) && (filter_type == 'all')) {
            list_competitions.push(element);
          } else {
    if ((element.name_sport == sport) && (element.type_competition == filter_type )) {
      list_competitions.push(element);
    } else {
      if ((element.name_sport == sport) && (element.type_play == filter_type )) {
        list_competitions.push(element);
      } else {
        if ((element.name_sport == sport) && (filter_type == 'FREE')) {
          if (element.entry_cost == 0) {
              list_competitions.push(element);
            }
        }
      }
    }
  }
  });

  tpl = competitions_template(list_competitions);
  tpl_mobile = competitions_template_mobile(list_competitions);

  $("#table-all-no-mobile").append(tpl);
  $("#table-all-mobile").append(tpl_mobile);
}

/**********************************
* competitions_template.
* @param competitions
* @return tpl
***********************************/
function competitions_template(competitions) {
  var date         = '';
  var today        = '';
  var hour         = '';
  var protocol     = location.protocol;
  var URLdomain    = window.location.host;
  var url          = protocol + "//" + URLdomain;
  var tpl          = '';
  $("#table-all-no-mobile").empty();
  $.each(competitions, function(index, element) {
    tpl = tpl + "<tr>"
    + "<td class='tdimg1'>"
    + "<img src='" + url + "/" + element.avatar + "' class='tabimgtablet'>"
    + "</td>"
    + "<td class='tdimg2'>";
    if (element.is_important == 1) {
      tpl = tpl + "<img src='" + url + "/images/ico/star.png' class='Startd'></td>";
    }
    tpl = tpl + "<td class='tdcomp2 notdpad' id='tdcomp'>"
    + element.name
    + "</td>"
    + "<td class='tdinscr2 notdpad'>"
    + "<span></span>"
    + element.enrolled + "/" + element.user_max
    + "</td>"
    + "<td class='tdentr2 notdpad'>";
    if (element.free == 0) {
      tpl = tpl + "<img src='" + url + "/images/ico/multiple.png' class='multiple'></span>";
    }
    tpl = tpl + element.entry_cost + " Bs</td>"
    + "<td class='RepColor tdpremio2 notdpad'>"
    + "<span>"
    if (element.pot == 1) {
      tpl = tpl + "<img src='" + url + "/images/ico/aumento.png' class='tdAumenico'></span>";
    } else {
      tpl = tpl + "<img src='" + url + "/images/ico/garantizado.png' class='tdGaranico'></span>";
    }
    var today             = moment().format('YYYY-MM-DD HH:mm:ss');
    var date_competition  = moment(element.date);
    var today_competition = moment(today);
    var hour = moment(element.date).format('HH:mm');
    var days_left =   date_competition.diff(today_competition, 'days');
    var minutes_left = date_competition.diff(today_competition, 'seconds');
    var date = moment(element.date).format("DD-MM")
    minutes_left = date_competition.startOf('day').seconds(minutes_left).format("HH:mm:ss");
    tpl = tpl + element.cost_guaranteed
    + " Bs."
    + "</td>"
    + "<td class='tdfecha2 notdpad'>";
    tpl = tpl + date
    + "</td>"
    + "<td class='tdhora2 notdpad'>" + hour
    + "</td>"
    + "<td class='notdpad'>"
    if (days_left >= 1) {
      tpl = tpl + "<span id='element.id' style='font-weight: bold;'>"
      + "+"
      + days_left
      + " días";
    } else {
      tpl = tpl + "<span id='element.id' style='font-weight: bold;'>"
      + minutes_left;
    }
    tpl = tpl        + "</span>"
    + "</td>"
    + "<td class='tdentrar2'>"
    if (window.login == true) {
      tpl = tpl + "<div class='BtnEntrar2' onclick='showCompetition(" + element.id + ")'>ENTRAR</div>";
    } else {
      tpl = tpl + "<div class='BtnEntrar2' href='.login' data-toggle='modal'>ENTRAR</div>";
    }
    tpl = tpl + "</td>"
    + "</tr>"
  });
  return tpl;
}



/**********************************
 * competitions_template_mobile.
 * @param competitions
 * @return tpl_mobile
 ***********************************/
function competitions_template_mobile(competitions) {
    var date = '';
    var today = '';
    var hour = '';
    var protocol = location.protocol;
    var URLdomain = window.location.host;
    var url = protocol + "//" + URLdomain;
    var tpl_mobile = '';
    $("#table-all-mobile").empty();

    tpl_mobile = tpl_mobile
    + "<div role='tabpanel' class='tab-pane fade in active bordyel noscroll' id='competiciones'>"
    + "<div class='tablemovil'>"

    if (competitions.length == 0) {
        tpl_mobile = tpl_mobile
            + "<div class='col-xs-12 col-xs-offset-1'>"
            + "<tr>"
            + "<td colspan='9'>"
            + "<h5>No tienes equipos creados</h5>"
            + "<h4>Te invitamos a que disfrutes de la plataforma.</h4>"
            + "</td>"
            + "</tr>"
            + "</div>";
    } else {
        $.each(competitions, function (index, element) {
            tpl_mobile = tpl_mobile
            + "<ul>"
            + "<li class='tmovli'>"
            + "<div class='divico'><img class='Star' src='images/ico/star.png'/></div>"
            + "<h4 class='h4tmovil'><a href=''>"
            + element.name
            + "</a></h4>"
            + "<div class='tmovilimg '>"
            + "<img src='" + url + "/" + element.avatar + "' class='tabimgtablet'>"
            + "</div>"
            + "<div class='tmovdatos'>"
            + "<div class='div1'>";
            var hour = moment(element.date).format('HH:mm');
            var date = moment(element.date).format("DD-MM");
            tpl_mobile = tpl_mobile
            + "<p>"
            + date
            + " "
            + hour
            + "</p>"
            + "<div class='tmovtabico'>"

                if (element.type == 'PRIVATE') {
                    tpl_mobile = tpl_mobile
                    + "<img class='Garanico' src='images/ico/lock.png'/>";
                }

            tpl_mobile = tpl_mobile
            + "</div>"
            + "<p><span>Entrada</span>"
            + element.entry_cost
            + "</p></div>"

            + "<div class='div1'>"
            + "<p><span>Inscritos</span>"
            + element.enrolled
            + "/"
            + element.user_max
            + "</p>"
            + "<div class='tmovtabico'>"

                if (element.pot == 1) {
                    tpl_mobile = tpl_mobile
                    + "<img class='Aumenico' src='images/ico/aumento.png'/>";
                } else {
                    tpl_mobile = tpl_mobile
                    + "<img class='Garanico' src='images/ico/garantizado.png'/>";
                }

            tpl_mobile = tpl_mobile
            + "</div>"
            + "<p><span>Premio</span>"
            + element.cost_guaranteed
            + "Bs.</p>"
            + "</div>"
            + "</div>"
            + "</li>"
            + "</ul>";
        });
    }
            tpl_mobile = tpl_mobile
            + "</div>";
    return tpl_mobile;
}
