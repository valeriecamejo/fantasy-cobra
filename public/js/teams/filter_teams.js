/*****************************************
* filter_teams.
* @param sport, filter_type
* @return tmpl
*****************************************/
window.sport       = 'all';
window.filter_type = 'all';

function filter_teams(sport, filter_type, teamsUser) {

  window.sport       = sport;
  window.filter_type = filter_type;
  var tpl            = '';
  var list_teams     = [];
  var date           = '';
  var today          = moment().format('YYYY-MM-DD');

  if ((sport == 'all') && (filter_type == 'all')) {
    $.each(teamsUser, function(index, element) {
      list_teams.push(element);
    });

  } else {
    $.each(teamsUser, function(index, element) {
      date = moment(element.date).format('YYYY-MM-DD');
      if ((sport == 'all') && (filter_type == 'today_teams') && (element.date == today)) {
        list_teams.push(element);
      } else {
        if ( (sport == 'all') && (filter_type == 'previous_teams') && (element.date < today)) {
          list_teams.push(element);
        } else {
          if ((sport == 'all') && (filter_type == 'future_teams') && (element.date > today)) {
            list_teams.push(element);
          }
        }
      }
    });
  }

  $.each(teamsUser, function(index, element) {
    if ((element.name_sport == sport) && (filter_type == 'all')) {
      list_teams.push(element);
    } else {
      if ((element.name_sport == sport) && (filter_type == 'today_teams') && (element.date == today)) {
        list_teams.push(element);
      } else {
        if ((element.name_sport == sport) && (filter_type == 'previous_teams') && (element.date < today)) {
          list_teams.push(element);
        } else {
          if ((element.name_sport == sport) && (filter_type == 'future_teams') && (element.date > today)) {
            list_teams.push(element);
          }
        }
      }
    }
  });

}


