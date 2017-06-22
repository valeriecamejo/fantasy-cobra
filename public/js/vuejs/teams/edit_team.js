
Vue.component('players', {
  template: '#players',
  props: ['myPlayer', 'player'],

  methods: {
    activate: function (tab) {
      this.activeTab = tab;
      this.$emit('activateTab', tab);
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



Vue.component('list-players', {
  template: '#list-players',
  props: [ 'players'],

  methods: {
    addPlayer: function (player) {
      console.info(player);
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
    existPosition: function (position) {
      vm.countPosition = vm.myPlayers.filter(function(element) {
        return element.position == position;
      });
    }
  }
})

var vm = new Vue ({
  el: "#edit",
  data: {
    countPosition: '',
    index:         '',
    allPlayers:    '',
    players:       '',
    myPlayers: JSON.parse(sessionStorage.getItem("element.players")),
    team_data: JSON.parse(sessionStorage.getItem("team"))
  },
  mounted() {
    axios.get('/player/journey/' + this.team_data.championship_id + '/' + this.team_data.team_date,
              {}).then((response) => {
                this.allPlayers = response.data;

                console.info('Team Players: ', this.myPlayers);
                console.info('Players: ', this.allPlayers);
                this.players = this.allPlayers.PA;
                console.info('Players: ', this.players);
              });
            },
  methods: {
    showPlayers: function (positions) { // showPlayers(['2B', 'SS'])

      // return vm.allPlayers.forEach(function (item, index ) {
      //     console.log('ENTRE')
        // if (positions === 'BATS' ) {
        //   if (element.PA === undefined) {
        //     return true
        //   }
        // } else {
        //   //positions.forEach(function(item, index ) {
        //     if(element[item] !== undefined ){
        //       return true
        //     }
        //   })
        // }

        // console.log(element);
        // return false

     // })
    }
  }
});


