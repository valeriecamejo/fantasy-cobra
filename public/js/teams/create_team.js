var sport             = $("#sport").val();
var championship      = $("#championship").val();
var type_play         = $("#type_play").val();

add_players(type_play)

$("#type_play").change(function() {
  var  type_play      = $(this).val();
  add_players(type_play)
});

function add_players(type_play) {
  alert(type_play);
}
