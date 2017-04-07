var url_ajax = "http://localhost:8000/";
var min_user = 2;
jQuery.ajax({
  url: url_ajax + "usuario/obtener-premios",
  type: "GET",
  async: true,
  data: {"min_user": min_user},
  success: function (data) {
    $("#ids").html("");
    console.warn("=======>>" + data);

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
