
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
    props: ['myPlayer', 'position'],
    methods: {
        decSalary: function (player_salary) {
            vm.remaining_salary = vm.remaining_salary + player_salary;
        }
    }
});


Vue.component('list-players', {
    template: '#list-players',
    props: [ 'players'],

    methods: {
        addPlayer: function (player) {
            this.existPosition(player.position, player.player_id);
            if (vm.countPosition != 0) {
                alert("La posición ya fue seleccionada");
            } else {
                if ( ((window.type_play == 'TURBO') && (vm.countTeam) < 5) ||
                    ((window.type_play == 'REGULAR') && (vm.countTeam) < 9) )  {
                    if (vm.remaining_salary >= player.salary ) {

                        vm.remaining_salary = vm.remaining_salary - player.salary
                        if (window.type_play == 'TURBO') {
                            if (player['position'] == '2B' || player['position'] == 'SS') {
                                player['position'] = 'MI'
                                vm.myPlayers[0]['MI'] = player
                            } else {
                                if (player['position'] == '1B' || player['position'] =='3B') {
                                    player['position'] = 'CI'
                                    vm.myPlayers[0]['CI'] = player
                                } else {
                                    vm.myPlayers[0][player.position] = player
                                }
                            }
                        }
                        if (window.type_play == 'REGULAR') {

                            if (player.position == 'OF') {
                                if (vm.myPlayers[0]['OF1'] == null) {
                                    vm.myPlayers[0]['OF1'] = player
                                } else if (vm.myPlayers[0]['OF2'] == null) {
                                    vm.myPlayers[0]['OF2'] = player
                                } else {
                                    vm.myPlayers[0]['OF3'] = player
                                }
                            } else {
                                vm.myPlayers[0][player.position] = player
                            }
                        }
                    }
                }
            }
        },
        existPosition: function (position, player_id) {

            if (vm.countTeam == 0) {
                return vm.countPosition = 0
            } else {
                if (window.type_play == 'REGULAR') {
                    vm.countPosition = 0
                    $.each(vm.myPlayers[0], function (index, myPlayer) {
                        if (myPlayer != null) {
                            if ((position == 'OF' && vm.countPositionOf == 3) || (myPlayer.player_id == player_id)) {
                                return vm.countPosition = 1
                            } else if ((myPlayer.position == position) && (myPlayer.position !== 'OF')) {
                                return vm.countPosition = 1
                            }
                        }
                    });
                } else if (window.type_play == 'TURBO') {
                    vm.countPosition = 0
                    $.each(vm.myPlayers[0], function (index, myPlayer) {

                        if (myPlayer != null) {
                            if (myPlayer.position == position) {
                                return vm.countPosition = 1
                            }
                            if ((position == '2B') || (position == 'SS')) {
                                if (myPlayer.position == 'MI') {
                                    return vm.countPosition = 1
                                }
                            }
                            if ((position == '1B') || (position == '3B')) {
                                if (myPlayer.position == 'CI') {
                                    return vm.countPosition = 1
                                }
                            }
                        }
                    });
                }
                return vm.countPosition
            }
        }
    }
})

var vm = new Vue ({
    el: "#create",
    data: {
        countPosition: 0,
        index:         '',
        show:          [],
        allPlayers:    '',
        players:       '',
        countOF:        0,
        teams:          [],
        team_total_pos: 0,
        turboTeams:      {
            'PA': null,
            'C':  null,
            'MI': null,
            'CI': null,
            'OF': null,
        },
        regularTeams:  {
            'PA':  null,
            'C':   null,
            '1B':  null,
            '2B':  null,
            '3B':  null,
            'SS':  null,
            'OF1': null,
            'OF2': null,
            'OF3': null
        },
        myPlayers: [],
        countPlayersTeam: 0,
        currentMyPlayers: '',
        remaining_salary: 50000,
        countPlayersTeam: 0
    },
    mounted() {
        axios.get('/player/journey/' + window.championship_id + '/' + window.team_date,
            {}).then((response) => {
            this.allPlayers = response.data;
        vm.players = this.allPlayers.PA;
        if (window.type_play == 'REGULAR'){
            vm.myPlayers[0] = vm.regularTeams
        } else if (window.type_play == 'TURBO') {
            vm.myPlayers[0] = vm.turboTeams
        }
        this.team_total_pos = Object.keys(this.myPlayers[0]).length
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
    },
    computed: {
        countTeam: function () {
            this_ = this
            this_.countPlayersTeam = 0
            $.each(this_.myPlayers[0], function (index, myPlayer) {
                if (myPlayer == null) {
                    this_.countPlayersTeam += 1
                }
            });
            return (this_.team_total_pos - this_.countPlayersTeam)
        },
        countPositionOf: function () {
            this_ = this
            this_.countOF = 0
            $.each(this_.myPlayers[0], function (index, myPlayer) {
                if (myPlayer != null) {
                    if (myPlayer.position == 'OF') {
                        this_.countOF += 1
                    }
                }
            });
            return this_.countOF
        }
    }
});

