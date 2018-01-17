/*******************************************************
*   Descripción: Funcion que activa/desactiva seccion
*                del menu seleccionada por el usuario.
*   Parametros de entrada: NA
********************************************************/

$(function()
{ 
    var url = (window.location.href).split("/").pop();
    var activar = url.split(".",1);

    //alert(activar);
    // Menu de Bettor 
   if(activar=="usuario"){
      
      $('#lobby').addClass('active');
      $('#lobbyM').addClass('active');
      $('#teams').removeClass('active');
      $('#teamsM').removeClass('active');
      $('#competitions').removeClass('active');
      $('#competitionsM').removeClass('active');
      $('#promotions').removeClass('active');
      $('#promotionsM').removeClass('active');
      $('#menuside').removeClass('active');
      
    }else if(activar=="ver-equipos"){
      
      $('#lobby').removeClass('active');
      $('#lobbyM').removeClass('active');
      $('#teams').addClass('active');
      $('#teamsM').addClass('active');
      $('#competitions').removeClass('active');
      $('#competitionsM').removeClass('active');
      $('#promotions').removeClass('active');
      $('#promotionsM').removeClass('active');
      $('#menuside').removeClass('active');
     
    }else if(activar=="ver-mis-competiciones"){
      
      $('#lobby').removeClass('active');
      $('#lobbyM').removeClass('active');
      $('#teams').removeClass('active');
      $('#teamsM').removeClass('active');
      $('#competitions').addClass('active');
      $('#competitionsM').addClass('active');
      $('#promotions').removeClass('active');
      $('#promotionsM').removeClass('active');
      $('#menuside').removeClass('active');
     
    }else if(activar=="ver-promociones"){
      
      $('#lobby').removeClass('active');
      $('#lobbyM').removeClass('active');
      $('#teams').removeClass('active');
      $('#teamsM').removeClass('active');
      $('#competitions').removeClass('active');
      $('#competitionsM').removeClass('active');
      $('#promotions').addClass('active');
      $('#promotionsM').addClass('active');
      $('#menuside').removeClass('active');
      
    }else if(activar=="contacto-movil"){
      
      $('#lobbyM').removeClass('active');
      $('#teamsM').removeClass('active');
      $('#competitionsM').removeClass('active');
      $('#promotionsM').removeClass('active');
      $('#contactoM').addClass('active');
      $('#referirM').removeClass('active');
      $('#historialM').removeClass('active');
      $('#menuside').removeClass('active');
      
    }else if(activar=="referir-amigo"){
      
      $('#lobbyM').removeClass('active');
      $('#teamsM').removeClass('active');
      $('#competitionsM').removeClass('active');
      $('#promotionsM').removeClass('active');
      $('#contactoM').removeClass('active');
      $('#referirM').addClass('active');
      $('#historialM').removeClass('active');
      $('#menuside').removeClass('active');
      
    }else if(activar=="historial"){
      
      $('#lobbyM').removeClass('active');
      $('#teamsM').removeClass('active');
      $('#competitionsM').removeClass('active');
      $('#promotionsM').removeClass('active');
      $('#contactoM').removeClass('active');
      $('#referirM').removeClass('active');
      $('#historialM').addClass('active');
      $('#menuside').removeClass('active');
      
    }else if(activar=="transferencia" || activar=="cajero" || activar=="retirar-dinero"){
      
      $('#lobbyM').removeClass('active');
      $('#teamsM').removeClass('active');
      $('#competitionsM').removeClass('active');
      $('#promotionsM').removeClass('active');
      $('#contactoM').removeClass('active');
      $('#referirM').removeClass('active');
      $('#historialM').removeClass('active');
      $('#menuside').addClass('active');
      
    }
});



$(document).ready(function()
{ 
 
  /*  Oculta el modal view de Login para mostrar el de
      olvido de contraseña o reestablecer password.
  */
  $('.passwordlink').on('click',function(){
       $('#myModal').removeClass('in');
       $('.modal-backdrop').removeClass('in');
       
  });

  // Maneja el chat
  /*$('#habla_oplink_a').text('');
  $('#habla_oplink_a').append('<img src="../images/logo-footer.png" style="width:40px">');*/
  //habla_oplink_a

}); 