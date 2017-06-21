
Vue.component('players', {
  template: '#players',
  props: ['myPlayer', 'player'],
  methods: {
            addPlayer: function (player) {
              vm.myPlayers.push(player);
            }
  }
});

Vue.component('my-players', {
  template: '#my-players',
  props: ['myPlayer']
});


var vm = new Vue ({
  el: "#edit",
  data: {
    index: '',\
    players:  '',
    myPlayers: JSON.parse(sessionStorage.getItem("element.players")),
    team_data: JSON.parse(sessionStorage.getItem("team"))
  },
  mounted() {
    axios.get('/player/journey/' + this.team_data.championship_id + '/' + this.team_data.team_date,
              {}).then((response) => {
                this.players = response.data;
                console.info('Team Players: ', this.myPlayers);
                console.info('Players: ', this.players);
              });
            }
  });
