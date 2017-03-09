/**********************************************
*
*   Chequea los alerts una vez que se
*   envia un correo o hay un mensaje de
*   error o un mensaje exitoso.
*
***********************************************/
$(document).ready(function(){     

   if ($('#successexit').not(':hidden')){
	   $('#successexit').delay(11000).hide(600);
   }
});


/*$(document).ready(function(){
	var url = (window.location.href).split("/").pop();
    var activar = url.split(".",1);
    //alert(activar);

	$(window).resize(function(){
	    if($(window).width()<=600){
	    	// Ver la ruta para redireccionar
	    	window.location.href = "movil";


	    }else if($(window).width()>=601){

	    	//window.location.href = "http://localhost/DDH/draftkings/public/"; //Silma
	    	//window.location.href = "http://localhost/ddhdraftkings/draftkings/public/"; //Jesus
	    	window.location.href = "http://localhost/ddhdraftkings/draftkings/public/" //Luis

	    }
	});
});*/

/*$(function(){

var isMobile = {

    Android: function() {

        return navigator.userAgent.match(/Android/i);

    },

    BlackBerry: function() {

        return navigator.userAgent.match(/BlackBerry/i);

    },

    iOS: function() {

        return navigator.userAgent.match(/iPhone|iPad|iPod/i);

    },

    Opera: function() {

        return navigator.userAgent.match(/Opera Mini/i);

    },

    Windows: function() {

        return navigator.userAgent.match(/IEMobile/i);

    },

 };

 if (isMobile.Android())

 {

 alert("Android");
 //window.location = "http://fantasycobra.azurewebsites.net/movil/";
 //return bool = true;

 }

 else if (isMobile.BlackBerry())

 {

 alert("BlackBerry");
 //window.location = "http://fantasycobra.azurewebsites.net/movil/";
 //return bool = true;

 }

 else if (isMobile.iOS())

 {

 alert("Iphone");
 //window.location = "http://fantasycobra.azurewebsites.net/movil/";
 //return bool = true;

 }

 else if (isMobile.Opera())

 {

 alert("Opera");
 //window.location = "http://fantasycobra.azurewebsites.net/movil/";
//return bool = true;

 }

 else if (isMobile.Windows())

 {
 	//window.location.replace('http://fantasycobra.azurewebsites.net/movil/');
 alert("IEMobile");
 //window.location = "http://fantasycobra.azurewebsites.net/movil/";
 //return bool = true;

 }

 else

 {
 	alert('windows normalito');
 //window.location = "http://fantasycobra.azurewebsites.net/";

 }

});*/
