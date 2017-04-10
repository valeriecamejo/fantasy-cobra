/************************************************************************
 * Action taken when loading the view without change min_user default
 ************************************************************************/
var options = $("#awards").length;
if(options <= 1){
  add_prize(2)
}
/************************************************************************
 * Action taken when change min_user default
 ************************************************************************/
$("#min_user").change(function() {
  var min_user = $(this).val();
  add_prize(min_user)

  if (min_user <= 15) {
    add_max_user(min_user,1)
  } else {
    add_max_user(min_user,5)
  }
});
/************************************************************************
 *   Function:      add_prize
 *   Description:   Load prizes less to min_user
 *   Params:        int min_user
 ************************************************************************/
function add_prize(min_user){
  var url_ajax = "http://localhost:8000/";
  var min_user = min_user;
  jQuery.ajax({
    url: url_ajax + "usuario/obtener-premios",
    type: "GET",
    async: true,
    data: {"min_user": min_user},
    success: function (data) {
      $("#awards").children().remove();
      var info = jQuery.parseJSON(data);
      $(info).each(function(index, element){
        var option = "<option value="+element.id+">"+element.description+"</option>";
        $(option).appendTo("#awards");
      });
    }
  });
}
/************************************************************************
 *   Function:      add_max_user
 *   Description:   Load max_user with relation to min_user and increase
 *   Params:        int min_user, increase
 ************************************************************************/
function add_max_user(min_user,increase) {
  $("#max_user").children().remove();
  var max_user = parseInt(min_user);
  var i;
  for (i = 0; i <= 10; i++) {
    if (increase == 1){
      var max_user = parseInt(min_user) + parseInt(i);
    } else {
      var max_user = parseInt(max_user) + parseInt(increase);
    }
    var options = "<option value=" + max_user + ">" + max_user + "</option>";
    $(options).appendTo("#max_user");
  }
}


























/*$.ajax({
 url: url_ajax + "usuario/obtener-premios",
 type: "POST",
 async: true,
 data: {"min_user": min_user},
 success: function(data){
 console.warn("=======>>"+data);
 /!*  var options = $("#awards").length;
 if(options > 0){
 $("#awards").children().remove();
 }

 var info = jQuery.parseJSON(data);
 $(info).each(function(index, element){
 var option = "<option value="+element.id_award+">"+element.description+"</option>";
 $(option).appendTo("#awards");
 });*!/
 }
 });*/

/* $("#min_user").change(function(){
 var min_user = $(this).val();
 $.ajax({
 url: url,
 type: "POST",
 async: true,
 data: {"min_user": min_user},
 success: function(data){
 //console.log("=======>>"+data);
 var options = $("#awards").length;
 if(options > 0){
 $("#awards").children().remove();
 }

 var info = jQuery.parseJSON(data);
 $(info).each(function(index, element){
 var option = "<option value="+element.id_award+">"+element.description+"</option>";
 $(option).appendTo("#awards");
 });
 }
 });
 */
/*var min_user    = parseInt($(this).val());
 var options     = $("#max_user").length;

 if(options > 0){
 $("#max_user").children().remove();
 }

 while (min_user <= 20){
 var option  = "<option value="+min_user+">"+min_user+"</option>";
 $(option).appendTo("#max_user");
 min_user    = min_user + 1;
 }

 min_user = 25;

 while (min_user <= 50){
 var option  = "<option value="+min_user+">"+min_user+"</option>";
 $(option).appendTo("#max_user");
 min_user    = min_user + 5;
 }
 });
 */
