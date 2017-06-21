
Vue.component('players', {
  template: '#players',
  props: ['myPlayer', 'player', 'position'],

  data: function() {
    return {
      activeTab: '',
      tabs: []
    }
  },
  methods: {
            addPlayer: function (player) {

              if ( ((vm.team_data.type_play == 'TURBO') && (vm.myPlayers.length) < 5) ||
                 ((vm.team_data.type_play == 'REGULAR') && (vm.myPlayers.length) < 9) )  {
                vm.myPlayers.push(player);
                console.info('My Players: ', vm.myPlayers.length);
              }
            },
            activate: function (tab) {
              console.log(tab);
              this.activeTab = tab;
              this.$emit('activateTab', tab);
    }
  }
});

Vue.component('my-players', {
  template: '#my-players',
  props: ['myPlayer'],
});


var vm = new Vue ({
  el: "#edit",
  data: {
    index: '',
    position: 'PA',
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
