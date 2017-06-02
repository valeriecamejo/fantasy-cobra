
function players_by_team (team_user_id, callback) {

   res = $.get('/player/team/' + team_user_id, function (data) {

     callback(data);

   }, 'json');
}
