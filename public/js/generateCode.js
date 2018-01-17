$( document ).ready(function(){
	
  /*********************************************************************
    * Descripción: Copia el valor del nombre en el campo de Url
    ***********************************************************************/
    setInterval(function(){
     //console.log($("#name").val());    
     var url = $("#name").val();
     url = url.replace(/\s/g,"");
     //alert(url);
     $("#url").val(url);   
    }, 1000);
});



/*********************************************************************
* Descripción: Genera el codigo promocional y lo copia en su campo respectivo en el formulario
***********************************************************************/
$('#generate').click(function(){
    $.ajax({
	    url: "generate_code",
        type: "post",
        success: function(data){
           $("#code").val(data);
           //alert(data);
        }
       });
});






