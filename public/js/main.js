jQuery(function(){
  $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });

  // $('#menuside li>ul').parent().addClass('selected');

  $("#menuside").click(function(e) {
  	if ($('#menuside ul').hasClass('selected') == false){
  		//e.preventDefault();
          // $("#menuside ul").addClass("selected");
          $("#menuside ul").slideToggle("slow");
  	}
  	else{
  		e.preventDefault();
          $("#menuside ul").removeClass("selected");
          $("#menuside ul").slideUp("slow");
  	}

      });

  $("#menusideret").click(function(e) {
      if ($('#menusideret ul').hasClass('selected') == false){
          //e.preventDefault();
          // $("#menusideret ul").addClass("selected");
          $("#menusideret ul").slideToggle("slow");
      }
      else{
          e.preventDefault();
          $("#menusideret ul").removeClass("selected");
          $("#menusideret ul").slideUp("slow");
      }

      });
  $("#menuside2").click(function(e) {
  	if ($('#menuside2 ul').hasClass('selected') == false){
  		//e.preventDefault();
          // $("#menuside ul").addClass("selected");
          $("#menuside2 ul").slideToggle("slow");
  	}
  	else{
  		e.preventDefault();
          $("#menuside2 ul").removeClass("selected");
          $("#menuside2 ul").slideUp("slow");
  	}

      });

  $(document).ready(function($) {
      $(".clickable-row").click(function() {
          window.document.location = $(this).data("href");
      });
  });

  var awidth = $('.tdimg1').width();
  var bwidth = $('.tdimg2').width();
  var cwidth = $('.tdcomp2').width();
  var dwidth = $('.tdinscr2').width();
  var ewidth = $('.tdentr2').width();
  var fwidth = $('.tdpremio2').width();
  var gwidth = $('.tdfecha2').width();
  var hehuiwidth = $('.tdhora2').width();
  var iwidth = $('.notdpad').width(100);
  var jwidth = $('.tdentrar2').width();


  $('.tabimgspace').width(awidth);
  $('.tabimgspace2').width(bwidth);
  $('.tabcompet').width(cwidth);
  $('.tabinscr').width(dwidth);
  $('.tabentr').width(ewidth);
  $('.tabprem').width(fwidth);
  $('.tabfech').width(gwidth);
  $('.tabhora').width(hehuiwidth);
  $('.tdrest').width(iwidth);
  $('.tabentrar').width(jwidth);



});

var configs = JSON.parse(document.getElementById('configs').innerHTML)

setTimeout(function() {
    window.location = '/logout';
}, configs.session_lifetime * 60 * 1000)
