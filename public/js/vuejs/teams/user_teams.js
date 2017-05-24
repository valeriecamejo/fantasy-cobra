
//--------Variables---------//
// var filter_sport       = '';
// var filter_type = '';
// var teams  = [];
// var teamsUser = '';
//var counter = 1;
//-------------------------//

  vm = new Vue ({
              el: "#app",
              data: {
                saludo: "Valerie",
                teamsUser: '',
                filter_sport_val: 'all',
                filter_type_val: 'all',
                teams: [],
                counter: 1
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
                  //event.preventDefault();
                  //console.log(this.teamsUser, sport)
                  //if (sport == 'all') return this.teamsUser;

                  this.filter_sport(sport)

                },
                filter_sport: function (sport) {
                  if (sport == 'all') return this.teams = this.teamsUser;

                  this.teams = this.teamsUser.filter(function(team) {
                    return team.name_sport == sport;
                  });
                },
                filter_type: function(type){

                  this.teams = this.teams.filter(function(team) {

                  })
                }
              }
         });
