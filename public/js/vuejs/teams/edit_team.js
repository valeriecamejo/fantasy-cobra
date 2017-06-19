
Vue.component('players', {
  template: '#players',
  props: ['myPlayer', 'player'],
  methods: {
            addPlayer: function (player) {
              console.info('Jugador', player);
              console.info('Mis jugadores', vm.myPlayers);
              vm.myPlayers.push(player);
            }
  }
});

Vue.component('my-players', {
  template: '#my-players',
  props: ['myPlayer'],
  methods: {
            removePlayer: function (myPlayer) {
              console.log('Metodo removePlayer')
            }
  }
});


var vm = new Vue ({
  el: "#edit",
  data: {
    saludo: 'Al fin se muestra',
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
