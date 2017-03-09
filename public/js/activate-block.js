/*
* Variables Globales
*/

var new_porcentage = 0;
var new_numeric = 0;
var count = -1;
var count2 = -1;


/*            SECCION: NUEVA PROMOCION        */



/*********************************************************************
*   Función: changeBlock
*   Descripción: Función que muestra un bloque de información
*        seleccionado por el usuario en la seccion de 
         nueva promoción.
*   Parametros de entrada:
*   opcion: Indica el bloque se mostrará
*   
***********************************************************************/
function changeBlock(opcion){
  // Oculto el bloque que este activo en ese momento
  deactivateBlock();
  if(opcion==1 || opcion==4){
    opcion = 'optdinero';
  }else if(opcion==3){
    opcion = 'optafiliado';
  }else if(opcion==5){
    opcion = 'optcajero';
  }
  // Muestro el bloque selccionado
  $('#'+opcion).css('display','block');
}

function changeNumeric(opcion){
  
  if(opcion==1){
    // Oculto el bloque que este activo en ese momento
    deactivate(1);
    // Muestro el bloque selccionado
    $('#range').css('display','block');
    $('#tablerange').css('display','block');
  }else{
    deactivate(2);
    // Muestro el bloque selccionado
    $('#numeric').css('display','block');
    $('#tablenumeric').css('display','block');
  }
  
}



/*********************************************************************
*   Función: deactivateBlock
*   Descripción: Función que oculta todos los bloques de información
*        en la seccion de nueva promoción.
*   Parametros de entrada: NA
*   
***********************************************************************/
function deactivateBlock(){
  
  $('#optdinero').css('display','none');
  $('#optafiliado').css('display','none');
  $('#optcajero').css('display','none');
}

/*********************************************************************
*   Función: deactivate
*   Descripción: Función que oculta los bloques de informacion según 
         el tipo de premio seleccionado.
*   Parametros de entrada: 
*   opcion: 1.- Muestra el bloque por numero 
*     2.- Muestra el bloque por porcentaje
*   
***********************************************************************/

function deactivate(option){
  if(option==1){
    $('#numeric').css('display','none');
    $('#tablenumeric').css('display','none');
  }else{
    $('#range').css('display','none');
    $('#tablerange').css('display','none');
  }
  
}

/*              SECCION: NUEVO PREMIO         */



/*********************************************************************
*   Función: newField
*   Descripción: Función para crear  nuevos campos de porcentaje para 
*        un nuevo premio.
*   Parametros de entrada: NA
*   
***********************************************************************/
function newField(option){
  var newfield='';

  if(option==1){
    newfield="<div id='range-"+new_porcentage+"' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>"+
                "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>"+
                  "<div class='form-group'>"+
                    "<div class='col-lg-2 col-md-2 col-sm-2'>"+
                      "<input type='text' name='range_a[]' class='form-control' placeholder='A' id='rango_premiados_a_"+new_porcentage+"'>"+
                    "</div>"+
                    "<div class='col-lg-1 col-md-1 col-sm-1'>"+
                      "-"+
                    "</div>"+
                    "<div class='col-lg-2 col-md-2 col-sm-2'>"+
                      "<input type='text' name='range_b[]' class='form-control' placeholder='B' id='rango_premiados_b_"+new_porcentage+"'>"+
                    "</div>"+
                    "<div class='col-lg-6 col-md-6 col-sm-6'>"+
                      "<div class='input-group'>"+
                        "<input type='text' name='porcentage[]' class='form-control' placeholder='Porcentaje' id='porcentaje_"+new_porcentage+"'>"+
                        "<div class='input-group-addon'>%</div>"+
                      "</div>"+
                    "</div>"+
                  "</div>"+
                "</div>"+
                "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>"+
                  "<span class='deleterange pointer' style='margin-right:10px' onclick='deleteField("+'"range-'+new_porcentage+'"'+")'>Eliminar Campo</span><i class='glyphicon glyphicon-remove'></i>"+
                "</div>"+
              "</div>";

    $( "#range").append(newfield);
    new_porcentage++;
  }else{
    newfield="<div id='numeric-"+new_numeric+"' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>"+
                "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>"+
                  "<div class='form-group'>"+
                    "<div class='col-lg-6 col-md-6 col-sm-6'>"+
                      "<input type='text' name='num_winners[]' class='form-control' placeholder='Nro del Premiado' id='premiados_"+new_numeric+"'>"+
                    "</div>"+
                    "<div class='col-lg-6 col-md-6 col-sm-6'>"+
                      "<div class='input-group'>"+
                        "<input type='text' name='porcentage2[]' class='form-control' placeholder='Porcentaje' id='porcentaje_premiados_"+new_numeric+"'>"+
                        "<div class='input-group-addon'>%</div>"+
                      "</div>"+
                    "</div>"+
                  "</div>"+
                "</div>"+
                "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>"+
                  "<span class='deleternumeric pointer' style='margin-right:10px' onclick='deleteField("+'"numeric-'+new_numeric+'"'+")'>Eliminar Campo</span><i class='glyphicon glyphicon-remove'></i>"+
                "</div>"+
              "</div>";

    $( "#numeric").append(newfield);
    new_numeric++;
  }
  
}

/*********************************************************************
*   Función: deleteField
*   Descripción: Función para borrar campos de rango para 
*        un nuevo premio.
*   Parametros de entrada:
*   campo: rango a borrar.
*   
***********************************************************************/
function deleteField(campo){
  $('#'+campo).remove();
  count = count - 1; 
}


/*              SECCION: LISTADO DE APOSTADORES         */

/*********************************************************************
*   Función: checkTodos
*   Descripción: Función para marcar todo los apostadores
*   Parametros de entrada: NA
*   
***********************************************************************/
function checkAll(){

  $(".check").each(function(){
    $(this).prop('checked',true);

    var id = $(this).val();
    if(!(document.getElementById('user-'+id))){
      var input = $("#data-"+id).val();
      $( "#list_invited").append("<input type='text' class='form-control' style='margin-bottom:15px;' id='user-"+id+"' value='"+input+"' readonly='readonly'>");
    }
                    
  });


}

/*********************************************************************
*   Función: descheckTodos
*   Descripción: Función para desmarcar todo los apostadores
*   Parametros de entrada: NA
*   
***********************************************************************/
function uncheckAll(){

  $(".check").each(function(){
      $(this).prop('checked',false);
  });

  $( "#list_invited").remove();
  $( "#list").append("<div id='list_invited'>");
    
}

/*********************************************************************
*   Función: ticket
*   Descripción: Función para agregar o eliminar los apostadores 
*                marcados al ticket
*   Parametros de entrada: id
*   
***********************************************************************/
function addticket(id){

  if (document.getElementById('check-'+id).checked)
  { 
    var input = $("#data-"+id).val();
    $( "#list_invited").append("<input type='text' class='form-control' style='margin-bottom:15px;' id='user-"+id+"' value='"+input+"' readonly='readonly'>");
    
  }else{
    var input = $("#data-"+id).val();
    $( "#user-"+id).remove();
  }
    
}

/*                PRINCIPAL             */



$(document).ready(function()
{ 
  // Selecciona opcion del select
  $('select#type').on('change',function(){
      var valor = $(this).val();
      changeBlock(valor);
  });

  // Hace click en boton cambiar orden del listado de Promociones
  $('#order').on('click',function(){
      $("input").each(function (index) 
        { 
            $(this).removeAttr('disabled');
        });
        $( "#order").remove(); 
        $( "#changeorder").append("<input id='saveorder' name='saveorder' type='submit' value='Guardar Orden' class='btn btn-default btn-lg btn-block'>" );
  });

  // Crear nuevos campos por porcentaje
  $('.newrange').on('click',function(){
      newField(1);
      count = count+1;

  });

  // Crear nuevos campos por numero
  $('.newnumeric').on('click',function(){
      newField(2);
      count = count+1;

  });

  $('#pornumero').on('click',function(){
      changeNumeric(2);
  });

  $('#porporcentaje').on('click',function(){
      changeNumeric(1);
  });


$(function(){

  $("#numero").css("display", "none");
  $("#porcentaje").css("display", "none");

});


}); 

$('#table_PP').click(function(){
      var premio = document.getElementById(('valor_por_porcentaje')).value;
      var extremo_a = document.getElementById(('rango_por_porcentaje_a')).value;
      var extremo_b = document.getElementById(('rango_por_porcentaje_b')).value;
      var porcentaje = document.getElementById(('porcentaje_PP')).value;
      var total = premio*(porcentaje/100);
      var distancia = (extremo_b - extremo_a)+1;
      var total_unit = total/distancia;

      $.ajax({
      url: 'table_PP',
      type: 'POST',
      async: true,
      data: {},
      success: function(data)
      {
            seleccion = "</br>"+
                        "</br>"+
                          "<table class='table text-center'>"+
                            "<tr class='text-center'>"+ 
                              "<th> Premio de Prueba:  "+premio+" Bs</th>"+ 
                            "</tr>"+
                            "<tr>"+
                              "<th>Rango de Premiados</th>"+
                              "<th>Valor Porcentual</th>"+
                              "<th>Total a Ganar</th>"+
                              "<th>Total a Ganar por Persona</th>"+
                            "</tr>"+
                            "<tr>"+
                              "<td>"+extremo_a+"-"+extremo_b+"</td>"+
                              "<td>"+porcentaje+"%</td>"+
                              "<td>"+total+" Bs</td>"+
                              "<td>"+total_unit+" Bs</td>"+
                            "</tr>"; 

            for(i=0; i<=count; i++){
              var extremo_add_a = document.getElementById(('rango_premiados_a_'+i)).value;
              var extremo_add_b = document.getElementById(('rango_premiados_b_'+i)).value;
              var porcentaje_add = document.getElementById(('porcentaje_'+i)).value;
              var total_add = premio*(porcentaje_add/100);
              var distancia_add = (extremo_add_b - extremo_add_a)+1;
              var total_add_unit = total_add/distancia_add;
            
            seleccion +=    "<tr>"+
                              "<td>"+extremo_add_a+"-"+extremo_add_b+"</td>"+
                              "<td>"+porcentaje_add+"%</td>"+
                              "<td>"+total_add+" Bs</td>"+
                              "<td>"+total_add_unit+" Bs</td>"+
                            "</tr>";            
            }
            count = -1;
          
          seleccion +=    "</table>";
          
          $(seleccion).appendTo("#table_PP_view");
      
      }
    });
});


$('#table_PN').click(function(){
      var premio = document.getElementById(('valor_por_numero')).value;
      var nro = document.getElementById(('numero_premiados')).value;
      var porcentaje = document.getElementById(('porcentaje_por_numero')).value;
      var total = premio*(porcentaje/100);

      $.ajax({
      url: 'table_PN',
      type: 'POST',
      async: true,
      data: {},
      success: function(data)
      {
            seleccion = "</br>"+
                        "</br>"+
                          "<table class='table text-center'>"+
                            "<tr class='text-center'>"+ 
                              "<th> Premio de Prueba:  "+premio+" Bs</th>"+ 
                            "</tr>"+
                            "<tr>"+
                              "<th>Nro del Premiado</th>"+
                              "<th>Valor Porcentual</th>"+
                              "<th>Total a Ganar</th>"+
                            "</tr>"+
                            "<tr>"+
                              "<td>"+nro+"</td>"+
                              "<td>"+porcentaje+"%</td>"+
                              "<td>"+total+" Bs</td>"+
                            "</tr>";

            for(j=0; j<=count; j++){
              var nro_add = document.getElementById(('premiados_'+j)).value;
              var porcentaje_add = document.getElementById(('porcentaje_premiados_'+j)).value;
              var total_add = premio*(porcentaje_add/100);

              seleccion +=  "<tr>"+
                              "<td>"+nro_add+"</td>"+
                              "<td>"+porcentaje_add+"%</td>"+
                              "<td>"+total_add+" Bs</td>"+
                            "</tr>";            
            }
            count = -1;
          
          seleccion +=    "</table>";
          
          $(seleccion).appendTo("#table_PN_view");
      
      }
    });
});