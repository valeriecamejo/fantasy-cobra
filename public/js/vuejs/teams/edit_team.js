
Vue.component('players', {
  template: '#players',
  props: ['myPlayer', 'player'],

  data: function() {
    return {
      activeTab: '',
      tabs: []
    }
  },
  methods: {
            addPlayer: function (player) {
              this.existPosition(player.position);
              console.log(vm.countPosition.length);
              if (vm.countPosition.length != 0) {
                alert("La position " + player.position + " ya fue seleccionada");
              } else {
                if ( ((vm.team_data.type_play == 'TURBO') && (vm.myPlayers.length) < 5) ||
                   ((vm.team_data.type_play == 'REGULAR') && (vm.myPlayers.length) < 9) )  {
                    if (vm.team_data.remaining_salary >= player.salary ) {
                      vm.team_data.remaining_salary = vm.team_data.remaining_salary - player.salary;
                      vm.myPlayers.push(player);
                    }
                } else {
                    alert("Se han seleccionado todos los jugadores");
                }
              }
            },
            activate: function (tab) {
              this.activeTab = tab;
              this.$emit('activateTab', tab);
            },
            existPosition: function (position) {

              vm.countPosition = vm.myPlayers.filter(function(element) {
                return element.position == position;
                  });
            }
  }
});

Vue.component('my-players', {
  template: '#my-players',
  props: ['myPlayer'],
  methods: {
            decSalary: function (player) {
              vm.team_data.remaining_salary = vm.team_data.remaining_salary + player.salary;
            }
  }
});


var vm = new Vue ({
  el: "#edit",
  data: {
    countPosition: '',
    index: '',
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
