
Vue.component('my-component', {
  template: '#my-component',
  props: ['player', 'saludo', 'all_player'],
});

var vm = new Vue ({
  el: "#edit",
  data: {
    saludo: 'Al fin se muestra',
    all_players:  '',
    players_1b: '',
    players: JSON.parse(sessionStorage.getItem("element.players")),
    team_data: JSON.parse(sessionStorage.getItem("team"))
  },
  mounted() {
    axios.get('/player/journey/' + this.team_data.championship_id + '/' + this.team_data.team_date,
              {}).then((response) => {
                this.all_players = response.data;
                this.players_1b =  this.all_players['1B']
                console.info('Team Players: ', this.team_players);
                console.info('Players: ', this.all_players);
              });
            }
          });
