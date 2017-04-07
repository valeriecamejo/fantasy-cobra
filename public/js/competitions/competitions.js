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

      tpl = tpl + element.entry_cost + "Bs</td>"
                + "<td class='RepColor tdpremio2 notdpad'>"
                + "<span>"

        if (element.pot == 1) {
          tpl = tpl + "<img src='" + url + "/images/ico/aumento.png' class='tdAumenico'></span>";
        } else {
          tpl = tpl + "<img src='" + url + "/images/ico/garantizado.png' class='tdGaranico'></span>";
        }

      tpl = tpl + element.cost_guaranteed
                + "Bs."
                + "</td>"
                + "<td class='tdfecha2 notdpad'>"
                + element.date
                + "</td>"
                + "<td class='tdhora2 notdpad'>"
                + element.date
                + "</td>"
                + "<td class='notdpad'>"


                + "<span id='' style='font-weight: bold;''>00:00:00</span>"

                + "<span id='' style='font-weight: bold;'>"

                + "</span>"
                + "</td>"
                + "<td class='tdentrar2'>"
                + "<div class='BtnEntrar2'>ENTRAR</div>"
                + "</td>"
              + "</tr>"

  });

  return tpl;

}
