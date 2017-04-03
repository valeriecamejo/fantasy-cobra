/**********************************
* competitions_filter.
* @param list_competitions
* @return void
***********************************/

function filter_competitions(filter, competitions) {

  var filter = filter;
  console.log(competitions);
  console.log(filter);
  $("#table-all-no-mobile").empty();
  $.each(competitions, function(index, element) {

    if (element.name_sport == filter) {

      var list_competitions = list_competitions + element;
      $("#list_competitions").append(list_competitions);

    }
  });
}
