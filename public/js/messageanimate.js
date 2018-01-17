/*
	Condicional que oculta los mensajes de error
	luego de 6seg.	
*/


$(document).ready(function(){
   	setTimeout(function(){
     	$("#success").fadeOut(1500);
   	},5000);
 });

 $(document).ready(function(){
   	setTimeout(function(){
     	$("#danger").fadeOut(1500);
   	},5000);
 });
$(document).ready(function(){
	setTimeout(function(){
		$("#enviarmail").fadeOut(1500);
	},5000);
});