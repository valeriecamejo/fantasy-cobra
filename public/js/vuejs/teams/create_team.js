window.type;

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
            vm.remaining_salary = vm.remaining_salary + player.salary;
        }
    }
});


Vue.component('list-players', {
    template: '#list-players',
    props: [ 'players'],

    methods: {
        addPlayer: function (player) {
            this.existPosition(player.position, player.player_id);
            if (vm.countPosition.length != 0) {
                alert("La posición ya fue seleccionada");
            } else {
                if ( ((vm.team_data.type_play == 'TURBO') && (vm.myPlayers.length) < 5) ||
                    ((vm.team_data.type_play == 'REGULAR') && (vm.myPlayers.length) < 9) )  {
                    if (vm.remaining_salary >= player.salary ) {
                        vm.remaining_salary = vm.remaining_salary - player.salary
                        if (vm.team_data.type_play == 'TURBO') {
                            if (player['position'] == '2B' || player['position'] == 'SS') {
                                player['position'] = 'MI'
                                vm.myPlayers.push(player)
                            } else {
                                if (player['position'] == '1B' || player['position'] =='3B') {
                                    player['position'] = 'CI'
                                    vm.myPlayers.push(player)
                                } else {
                                    vm.myPlayers.push(player)
                                }
                            }
                        }
                        if (vm.team_data.type_play == 'REGULAR') {
                            vm.myPlayers.push(player)
                        }
                    }
                } else {
                    alert("Se han seleccionado todos los jugadores");
                }
            }
        },
        existPosition: function (position, player_id) {

            if (vm.myPlayers.length == 0) {
                return 0
            } else {
                if (vm.team_data.type_play == 'REGULAR') {
                    if (position == 'OF') {
                        vm.countOF = vm.myPlayers.filter(function(element) {
                            return element.position == position
                        });
                        if (vm.countOF.length < 3) {
                            vm.countPosition = vm.myPlayers.filter(function(element) {
                                return element.player_id == player_id
                            });
                        } else {
                            vm.countPosition = vm.countOF
                        }
                    } else {
                        vm.countPosition = vm.myPlayers.filter(function(element) {
                            return element.position == position
                        });
                    }
                } else {
                    if (vm.team_data.type_play == 'TURBO') {
                        if ( (position == '2B') || (position == 'SS') ) {
                            vm.countPosition = vm.myPlayers.filter(function(element) {
                                return element.position == 'MI'
                            });
                        } else {
                            if ( (position == '1B') || (position == '3B') ) {
                                vm.countPosition = vm.myPlayers.filter(function(element) {
                                    return element.position == 'CI'
                                });
                            } else {
                                vm.countPosition = vm.myPlayers.filter(function(element) {
                                    return element.position == position
                                });
                            }
                        }
                    }
                }
            }
        }
    }
})

var vm = new Vue ({
    el: "#create",
    data: {
        countPosition: '',
        index:         '',
        show:          [],
        allPlayers:    '',
        players:       '',
        countOF:        0,
        myPlayers:     [],
        currentMyPlayers: '',
        remaining_salary: 50000,
        team_data: JSON.parse(sessionStorage.getItem("team"))
    },
    mounted() {
        axios.get('/player/journey/' + this.team_data.championship_id + '/' + this.team_data.team_date,
            {}).then((response) => {
            this.allPlayers = response.data;
            vm.players = this.allPlayers.PA;
    });
    },
    methods: {
        showPlayers: function (positions) {

            vm.show = []

            $.each(vm.allPlayers, function( index, value ) {

                if (positions === 'BATS' ) {
                    if (index   !== 'PA') {
                        $.each(value, function( index, valor ) {
                            vm.show.push(valor)
                        });
                    }
                } else {
                    if (index === positions[0] || index === positions[1]) {
                        $.each(value, function( index, valor ) {
                            vm.show.push(valor)
                        });
                    }
                }
                return vm.players = vm.show
            });
        }
    }
});

