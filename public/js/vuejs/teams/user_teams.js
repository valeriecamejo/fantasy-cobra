
  vm = new Vue ({
              el: "#app",
              data: {
                teamsUser:           '',
                filter_sport_val: 'all',
                filter_type_val:  'all',
                teams:               [],
                date_today:          '',
              },
              mounted() {
                axios.get('/user-teams').then((response) => {
                  console.log(response.data);
                  this.teamsUser = response.data;
                  this.teams = this.teamsUser;
                });
              },
              methods: {
                filter_teams: function (sport, filter_type, event) {
                  event.preventDefault();
                  date_today = this.today();
                  this.filter_sport(sport);
                  console.info('Teams:', this.teams);
                  this.filter_type(filter_type, date_today);
                },
                filter_sport: function (sport) {
                  if (sport == 'all') return this.teams = this.teamsUser;

                  this.teams = this.teamsUser.filter(function(team) {
                    return team.name_sport == sport;
                  });
                },
                filter_type: function(type, date_today){
                  if (type == 'all') return this.teams;

                  this.teams = this.teams.filter(function(team) {

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
                }
              }
         });
