var sport             = $("#sport").val();
var championship      = $("#championship").val();
var type_play         = $("#type_play").val();

add_players(championship,type_play)

$("#type_play").change(function() {
  var  type_play      = $(this).val();
  add_players(championship,type_play)
});

function add_players(championship,type_play) {
  var url_ajax        = "http://localhost:8000/";
  var championship    = championship;
  var type_play       = type_play;
  jQuery.ajax({
    url: url_ajax + "usuario/obtener-jugadores",
    type: "GET",
    async: true,
    data: {"championship": championship,"type_play": type_play},
    success: function (data) {
      var info = jQuery.parseJSON(data);
      tpl_players(championship,type_play,info)
    }
  });
  alert(type_play);
}


function  tpl_players(championship,type_play,players) {

  if (type_play == 'REGULAR') {
  var tabs = "<li role='presentation' class='active'><a href='#PAD' id='PA' aria-controls='home' role='tab' data-toggle='tab'>PA</a></li> " +
    "<li role='presentation'><a href='#CD' id='C' aria-controls='profile' role='tab' data-toggle='tab'>C</a></li> " +
    "<li role='presentation'><a href='#1BD' id='1B' aria-controls='messages' role='tab' data-toggle='tab'>1B</a></li> " +
    "<li role='presentation'><a href='#2BD' id='2B' aria-controls='settings' role='tab' data-toggle='tab'>2B</a></li> " +
    "<li role='presentation'><a href='#3BD' id='3B' aria-controls='settings' role='tab' data-toggle='tab'>3B</a></li> " +
    "<li role='presentation'><a href='#SSD' id='SS' aria-controls='settings' role='tab' data-toggle='tab'>SS</a></li> " +
    "<li role='presentation'><a href='#OFD' id='OF' aria-controls='settings' role='tab' data-toggle='tab'>OF</a></li> " +
    "<li role='presentation'><a href='#BATSD' id='BATS' aria-controls='settings' role='tab' data-toggle='tab'>BATS</a></li>";
    $(tabs).appendTo("#tabs");

  } else if (type_play == 'TURBO') {

  }

}
