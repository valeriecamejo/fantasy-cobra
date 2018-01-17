/*******************************************************
*   Descripción: Funcion que identifica si un número es
                 un entero.
*   Parametros de entrada: 
*                * value : parámetro que se quiere
*                          comparar si es entero.
********************************************************/
function isInt(value) {
  var x;
  if (isNaN(value)) {
    return false;
  }
  x = parseFloat(value);
  return (x | 0) === x;
}

/*******************************************************
*   Descripción: Funcion que activa/desactiva seccion
*                del menu seleccionada por el usuario.
*   Parametros de entrada: NA
********************************************************/

$(function(){ 
    var urlOririgal = (window.location.href).split("/");
    var url = (window.location.href).split("/").pop();
    var activar = url.split(".",1);

    if(isInt(activar)){
      activar   =   urlOririgal[urlOririgal.length - 2];
    }else if(activar=='ASC' || activar=='name-ASC' || activar=='name-DESC' || activar=='cost_entry-DESC' || activar=='cost_entry-ASC' || activar=='type-DESC' || activar=='type-ASC'){
      activar   =   urlOririgal[urlOririgal.length - 2];
    }

    //alert(activar);

    // Menu de Bettor 
    if(activar=="admin"){
       $('#inicio').addClass('active');
       $('#leagues').removeClass('active');
       $('#promotions').removeClass('active');
       $('#awards').removeClass('active');
       $('#retreats').removeClass('active');
       $('#users').removeClass('active');
     }else if(activar=="create_league" || activar=="list_league" || activar=="edit_league"){
        $('#leagues').addClass('active');
        $('#inicio').removeClass('active');
        $('#promotions').removeClass('active');
        $('#awards').removeClass('active');
        $('#retreats').removeClass('active');
        $('#users').removeClass('active');
     }else if(activar=="new_promotion" || activar=="list_promotion" || activar=="edit_promotion"){
        $('#promotions').addClass('active');
        $('#leagues').removeClass('active');
        $('#inicio').removeClass('active');
        $('#awards').removeClass('active');
        $('#retreats').removeClass('active');
        $('#users').removeClass('active');
     }else if(activar=="create_award" || activar=="list_award" || activar=="edit_award"){
        $('#awards').addClass('active');
        $('#promotions').removeClass('active');
        $('#leagues').removeClass('active');
        $('#inicio').removeClass('active');
        $('#retreats').removeClass('active');
        $('#users').removeClass('active');
     }else if(activar=="list_deposit" || activar=="list_retreats"){
        $('#retreats').addClass('active');
        $('#awards').removeClass('active');
        $('#promotions').removeClass('active');
        $('#leagues').removeClass('active');
        $('#inicio').removeClass('active');
        $('#users').removeClass('active');
     }else if(activar=="create_admin" || activar=="create_affiliate" || activar=="list_bettor" || activar=="list_admin" || activar=="edit_admin" || activar=="list_affiliate" || activar=="edit_affiliate"){
        $('#users').addClass('active');
        $('#retreats').removeClass('active');
        $('#awards').removeClass('active');
        $('#promotions').removeClass('active');
        $('#leagues').removeClass('active');
        $('#inicio').removeClass('active');
     }
   
});