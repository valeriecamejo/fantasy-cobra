$(function() {

  var playersJson = null;
  var championship  = jQuery("#championship_id").val();
  var type_play        = jQuery("#type_play").val();
  var date        = jQuery("#team_date").val();
  var journey     = jQuery("#type_journal").val();

    var team_user_id  = jQuery("#team_id").val();

    window.playersTeamJson = null;

    players_by_team (team_user_id, function(jsonData) {
      playersTeamJson = jsonData;

      updatePlayersTeamList(playersTeamJson);
    });

    function updatePlayersTeamList(players) {
      var target = $('#playersTeam');

      target.html(window.listPlayerTmpl(players));
    }


    players_journey(championship, date, journey, function(jsonData) {
      playersJson = jsonData;

      jQuery.get('/js/teams/_list_players.hbs', function (fileTmpl) {
        var template = Handlebars.compile(fileTmpl);

        $.each(playersJson, function(key, item){
          $('#' + key + 'D').html(template(item));
        });
      }, 'html');

    });

    $('#playersTeam').on('click', 'a.remove_player', function() {

        elem = $(this)

        playersTeamJson.splice(
          playersTeamJson.findIndex(
            function(item) {
              return item.id == parseInt(elem.data('player'));
            }
          ),
        1);

        budgetTeam = parseInt(budgetTeam) + parseInt(elem.data('salary'));

        $('#salaryrest').val(budgetTeam);
        $('#playersTeam #player_' + elem.data('player')).remove();

    });

    $('#players-availables').on('click', 'a.add_player', function() {

      var salary   = $(this).data('salary');
      var position = $(this).data('position');
      var id       = $(this).data('player');

        if (add_player_team(id, position, salary)) {

          athis = $(this);

          tr_player = $('#players-availables #player_' + athis.data('player'));

          player = playersJson[athis.data('position')].filter(function(item) {
            return item.id == athis.data('player');
          })[0];

          delete player['opo'];

          playersTeamJson.push(player);

          updatePlayersTeamList(playersTeamJson);

        } else {
          alert('La posicion ('+ position +'), ha sido seleccionada');
        }
    });
});
