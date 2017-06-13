

  vm = new Vue ({
              el: "#app",
              data: {
                teamsUser:           '',
                filter_sport_val: 'all',
                filter_type_val:  'all',
                teams:               [],
                date_today:          '',
                team_id:              0,
                cant_inscription:     0,
                accountant:           0,
                moment:          moment,
              },
              mounted() {
                axios.get('/user-teams').then((response) => {
                  this.teamsUser = response.data;
                  this.teams = this.teamsUser;
                });
              },
              methods: {
                filter_teams: function (sport, filter_type, event) {
                  event.preventDefault();
                  this.filter_sport_val = sport;
                  this.filter_type_val = filter_type;
                  date_today = this.today();
                  this.filter_sport(this.teams, sport);
                  this.filter_type(this.teams, filter_type, date_today);
                },
                filter_sport: function (teams_user, sport) {
                  console.log(teams_user)
                  if (sport == 'all') return this.teams = this.teamsUser;

                  this.teams = this.teamsUser.filter(function(team) {
                    return team.name_sport == sport;
                  });
                },
                filter_type: function(teams_user , type, date_today){
                  if (type == 'all') return this.teams;

                  this.teams = teams_user.filter(function(team) {
                  console.info('tipo de juego:', teams_user);
                    if (type == 'today_teams') {
                      return moment(team.date).format('YYYY-MM-DD') == date_today;
                    } else if (type == 'previous_teams') {
                        return moment(team.date).format('YYYY-MM-DD') < date_today;
                      } else if (type == 'future_teams') {
                          return moment(team.date).format('YYYY-MM-DD') > date_today;
                        }
                  });
                },
                today: function() {
                  return moment().format('YYYY-MM-DD');
                },
                team_modal: function (team_id, username, teams) {
                  this.accountant = 0;
                  this.accountant =this.team_count(team_id, teams, this.cant_inscription);

                  return show_team_modal(team_id, this.accountant, username);
                },
                team_count: function (team_id, teams, cant_inscription) {
                  console.log(cant_inscription);
                  $(teams).each(function(index, element) {

                    if (element.team_user_id == team_id) {

                      cant_inscription ++;
                    }
                    });

                  return cant_inscription;
                }
              }
         });

