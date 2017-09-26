
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
            vm.team_data.remaining_salary = vm.team_data.remaining_salary + player_salary;
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
                if ( ((vm.team_data.type_play == 'TURBO') && (vm.countTeam < 5)) ||
                    ((vm.team_data.type_play == 'REGULAR') && (vm.countTeam < 9)) )  {
                    if (vm.team_data.remaining_salary >= player.salary ) {
                        vm.team_data.remaining_salary = vm.team_data.remaining_salary - player.salary
                        if (vm.team_data.type_play == 'TURBO') {
                            if (player['position'] == '2B' || player['position'] == 'SS') {
                                vm.myPlayers[0]['MI'] = player
                            } else {
                                if (player['position'] == '1B' || player['position'] =='3B') {
                                    vm.myPlayers[0]['CI'] = player
                                } else {
                                    vm.myPlayers[0][player.position] = player
                                }
                            }
                        }
                        if (vm.team_data.type_play == 'REGULAR') {
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
                } else {
                    alert("Se han seleccionado todos los jugadores");
                }
            }
        },
        existPosition: function (position, player_id) {

            if (vm.team_data.type_play == 'REGULAR') {
                vm.countPosition = 0
                $.each(vm.myPlayers[0], function (index, myPlayer) {
                    if (myPlayer != null) {
                        if ((position == 'OF' && vm.countPositionOf == 3) || (myPlayer.id == player_id)) {
                            return vm.countPosition = 1
                        }
                    }
                });
            } else if (vm.team_data.type_play == 'TURBO') {
                vm.countPosition = 0
                $.each(vm.myPlayers[0], function (index, myPlayer) {

                    if (myPlayer != null) {
                        if ((position == '2B') || (position == 'SS')) {
                            if (myPlayer.position == 'MI') {
                                return vm.countPosition = 1
                            }
                        } else if ((position == '1B') || (position == '3B')) {
                            if (myPlayer.position == 'CI') {
                                return vm.countPosition = 1
                            }
                        } else if (myPlayer.position == position) {
                            return vm.countPosition = 1
                        }
                    }
                });
            }
            return vm.countPosition
            }
        }
});

var vm = new Vue ({
    el: "#edit",
    data: {
        countPosition: 0,
        index:         '',
        show:          [],
        allPlayers:    '',
        players:       '',
        countOF:        0,
        teams:          [],
        countPlayersTeam: 0,
        team_total_pos:0,
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
        currentMyPlayers : JSON.parse(sessionStorage.getItem("element.players")),
        team_data: JSON.parse(sessionStorage.getItem("team"))
    },
    mounted() {
        axios.get('/player/journey/' + this.team_data.championship_id + '/' + this.team_data.team_date,
            {}).then((response) => {
            this.allPlayers = response.data
        vm.players = this.allPlayers.PA
        this.orderTeam()
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
        },

        orderTeam: function () {

            if (vm.team_data.type_play == "REGULAR") {
                vm.teams[0] = vm.regularTeams
            } else if (vm.team_data.type_play == "TURBO") {
                vm.teams[0] = vm.turboTeams
            }
            $.each(vm.currentMyPlayers, function( index, value ) {
                if (vm.team_data.type_play == "REGULAR") {
                    $.each(vm.regularTeams, function( index_team, team ) {

                        if (value.position == 'OF') {
                            if (vm.teams[0]['OF1'] == null) {
                                vm.teams[0]['OF1'] = value
                            } else if (vm.teams[0]['OF2'] == null) {
                                vm.teams[0]['OF2'] = value
                            } else {
                                vm.teams[0]['OF3'] = value
                            }

                        } else if (index_team == value.position) {
                            vm.teams[0][index_team] = value
                        }
                    });
                }

                if (vm.team_data.type_play == "TURBO") {
                    $.each(vm.turboTeams, function( index_team, team ) {

                        if (index_team == value.position) {
                            vm.teams[0][index_team] = value
                        }

                    });
                }
                vm.myPlayers = vm.teams
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

