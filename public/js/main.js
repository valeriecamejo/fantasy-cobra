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

// $(document).ready(function(){
//     $("#menuside").click(function(){
//         $("#menuside ul").slideToggle("slow");
//     });
// });

$(function () {

// Slideshow 1
$("#slider1").responsiveSlides({
maxwidth: 800,
speed: 800,
timeout: 3000
});

// Slideshow 2
$("#slider2").responsiveSlides({
auto: false,
pager: true,
maxwidth: 800,
speed: 800,
});

// Slideshow 3
$("#slider3").responsiveSlides({
manualControls: '#slider3-pager',
maxwidth: 800,
speed: 800,
});

// Slideshow 4
$("#slider4").responsiveSlides({
auto: false,
pager: false,
nav: true,
maxwidth: 800,
speed: 800,
namespace: "callbacks",
before: function () {
$('.events').append("<li>before event fired.</li>");
},
after: function () {
$('.events').append("<li>after event fired.</li>");
}
});

});
/*

$(function() {
$(".rslides").responsiveSlides();
});
*/

// Controles para modificar el slider home

// $(".rslides").responsiveSlides({
//   auto: true,             // Boolean: Animate automatically, true or false
//   speed: 500,            // Integer: Speed of the transition, in milliseconds
//   timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
//   pager: false,           // Boolean: Show pager, true or false
//   nav: false,             // Boolean: Show navigation, true or false
//   random: false,          // Boolean: Randomize the order of the slides, true or false
//   pause: false,           // Boolean: Pause on hover, true or false
//   pauseControls: true,    // Boolean: Pause when hovering controls, true or false
//   prevText: "Previous",   // String: Text for the "previous" button
//   nextText: "Next",       // String: Text for the "next" button
//   maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
//   navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
//   manualControls: "",     // Selector: Declare custom pager navigation
//   namespace: "rslides",   // String: Change the default namespace used
//   before: function(){},   // Function: Before callback
//   after: function(){}     // Function: After callback
// });

var awidth = $('.tdimg1').width();
var bwidth = $('.tdimg2').width();
var cwidth = $('.tdcomp2').width();
var dwidth = $('.tdinscr2').width();
var ewidth = $('.tdentr2').width();
var fwidth = $('.tdpremio2').width();
var gwidth = $('.tdfecha2').width();
var hehuiwidth = $('.tdhora2').width();
var iwidth = $('.notdpad').width(100);
var jejewidth = $('.tdentrar2').width();


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



