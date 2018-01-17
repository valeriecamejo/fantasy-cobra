$(document).ready(function(){
    $(function()
    {	

    	$('.modal-publicleague').click(function(){
    		$('#publicleague').modal('show');

			id=$(this).data('hola');
			//alert($(this).data('hola'));
			nombreinput = "hora"+id;
			hora = document.getElementById(nombreinput).value;
			//alert(hora);
			response = hora.split("-");
			//alert(response[0]);
			$.ajax({
		  		url: 'modal_builder',
			  	type: 'POST',
				async: true,
				data: 'ids='+id,
				success: function(data)
			    {
		    		//Armo primero la parte de arriba
		    		

		        	seleccion="<select name='city' class='inputStyle'><option value=0>Selecciona Ciudad</option>";	
		 			contador=1;
		 			contenido ="";
		 			negro = true;
					var obj = jQuery.parseJSON(data);	
					$(obj).each(function(indice, elemento){
						//alert(elemento.id);
						//Armo el header del modal
						header = "<div class='row formLine'>";
						header+= "	<div class='col-md-12'>";
						header+= "		<div class='divConten'>";
						header+= "			<div class='infoModal'>";
						header+= "				Inscritos "+elemento.inscritos+"/"+elemento.max_user+"";
						header+= "			</div>";
						header+= "			<div class='infoModal'>";
						header+= "				Entrada "+elemento.cost_entry+" Bs";
						header+= "			</div>";
						header+= "			<div class='infoModal'>";
						header+= "		 	Premio "+elemento.cost_garanteed+" Bs";
						header+= "			</div>";
						header+= "		</div>";
						header+= "	</div>";
						header+= "</div>";
						//Armor el mensaje del medio.
						mensaje ="<div class='row formLine'>";
						mensaje+="	<div class='col-md-12 text-center'>";
						mensaje+="		<span class='ticket'>"+elemento.description+"</span>";
						mensaje+="	</div>";
						mensaje+="</div>";
						if (elemento.description == null){
							mensaje = "";	
						}
						//Armo los Botones
						if(response[2] == "si"){
							if(response[0] >= response[1]){
								botones ="<div class='row formLine'>";
								botones+="	<div class='col-md-12 text-center'>";
								botones+="		<span class='ticket'>Ya la Competicion Comenzo, Inscripciones Cerradas</span>";
								botones+="	</div>";
								botones+="</div>";
							}else{
								botones = "<button type='submit' class= 'modal-btn2' name='crear' value="+elemento.id+">";
								botones+= 	"CREAR LINEUP";
								botones+= "</button>";
								botones+= "<button type='submit' class= 'modal-btn2' name='inscribir' value="+elemento.id+">";
								botones+= 	"INSCRIBIR";
								botones+= "</button>";
							}
						}else{
							botones = "<button type='submit' class= 'modal-btn2' name='crear' value="+elemento.id+">";
							botones+= 	"CREAR LINEUP";
							botones+= "</button>";
							botones+= "<button type='submit' class= 'modal-btn2' name='inscribir' value="+elemento.id+">";
							botones+= 	"INSCRIBIR";
							botones+= "</button>";
						}
						//Armo el contenido de la tabla
						
						if (elemento.surname == null){
							contenido+=	"<div class='table-col'>"
							contenido+=	"	<div class='col-sm-4 nopadding'>";
							contenido+=	"		AUN NO HAY INSCRITOS";
							contenido+=	"	</div>";
							contenido+=	"</div>";
						}else{
							if (contador == 1){
								if (negro){
									contenido+=	"<div class='table-col'>"
									negro = false;
								}else{
									contenido+=	"<div class='table-col2'>";
									negro = true;
								}


							}
							
								contenido+=	"	<div class='col-sm-4 nopadding'>";
								contenido+=	"		"+elemento.surname+"";
								contenido+=	"	</div>";
								
							if (contador == 3){
								contenido+=	"</div>";
								contador=0;
							}
							contador= contador+1;
						}


					});
					$( "#prueba" ).children().remove();
					$(header).appendTo("#prueba");
					$( "#mensaje" ).children().remove();
					$(mensaje).appendTo("#mensaje");
					$( "#contenido3" ).children().remove();
					$(contenido).appendTo("#contenido3");					
					$( "#botones" ).children().remove();
					$(botones).appendTo("#botones");
						
			    }
			});
    	});
    });

});