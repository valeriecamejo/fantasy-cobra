moment.locale('es');
/**********************************
* competitions_filter.
* @param list_competitions
* @return void
***********************************/

function filter_competitions(sport, competitions) {
  console.log("==========", sport, competitions, "==========");

  console.log("sport/all", sport == 'all');
  console.log("sport/baseball", sport == competitions[0].name_sport);
  console.log("sport/futbol", sport == competitions[0].name_sport);


  jQuery.noConflict();

  var tpl = '';
  var list_competitions = [];

  if (sport == 'all') {

    $.each(competitions, function(index, element) {

      list_competitions.push(element); // = list_competitions + ;

    });

    console.log("compewt", list_competitions);

    tpl = competitions_template(list_competitions);

  } else {

    $.each(competitions, function(index, element) {

      if (element.name_sport == sport) {
        console.log(sport, element.name_sport);

        list_competitions.push(element); //= list_competitions + element;

      }

    });

    tpl = competitions_template(list_competitions);
  }

  $("#table-all-no-mobile").append(tpl);
}


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

        console.info(date_competition);
        console.info(minutes_left);

        minutes_left = date_competition.startOf('day').seconds(minutes_left).format("HH:mm:ss");

        console.info(minutes_left);

        //var minutes_left = (moment(moment.duration(today_competition.diff(date_competition))).format("HH:mm"));

      tpl = tpl + element.cost_guaranteed
                + " Bs."
                + "</td>"
                + "<td class='tdfecha2 notdpad'>"
                var date = moment(element.date).format("DD-MM");
                + "</td>"
                + "<td class='tdhora2 notdpad'>";
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
                + "<div class='BtnEntrar2'>ENTRAR</div>"
                + "</td>"
              + "</tr>"

  });

  return tpl;

}
