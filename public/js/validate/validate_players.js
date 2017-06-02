

  window.validate_position;
  window.validate_player_id;
  window.budgetTeam =
  $('#salaryrest').val();

function add_player_team(id, position, salary) {

     validate_position = playersTeamJson.filter(function (item) {
        return item.position == position;
    });

    validate_player_id = playersTeamJson.filter(function (item) {
      return item.id == id;
    });

    var validate_salary = playersTeamJson.filter(function (item) {
      return item.salary > budgetTeam
    })

    validate = false;

    if (validate_position.length == 0 && validate_player_id.length == 0 && validate_salary.length == 0) {
      validate = true;
    } else {
      validate = false;
    }

    return validate;
  }
