$(document).ready(function(){
    $(function()
    {	

    	$('.modal_publicleague_movil').click(function(){
    		$('#publicleaguemovil').modal('show');

			id=$(this).data('hola');
			//alert($(this).data('hola'));
			nombreinput = "hora"+id;
			hora = document.getElementById(nombreinput).value;
			//alert(hora);
			response = hora.split("-");

			$.ajax({
		  		url: 'modal_builder_movil',
			  	type: 'POST',
				async: true,
				data: 'ids='+id,
				success: function(data)
			    {
		    		//Armo primero la parte de arriba
		    		

		        	seleccion="<select name='city' class='inputStyle'><option value=0>Selecciona Ciudad</option>";	
		 			contador=5;
		 			contenido ="";
		 			negro = true;
					formatotabla="";

					formatotabla+="	<div class='col-xs-12'>";
					formatotabla+="		<table class='table table-striped leagueModalRegisteredTable'>";
					formatotabla+="			<thead>";
					formatotabla+="				<tr>";
					formatotabla+="					<th colspan='5' class='topTable'>Inscritos</th>";
					formatotabla+="				</tr>";
					formatotabla+="			</thead>";
					formatotabla+="			<tbody>";

					var obj = jQuery.parseJSON(data);	
					$(obj).each(function(indice, elemento){
						
						header = "";
						header+="<div class='row'>";
						header+="	<div class='col-xs-6'>";
						header+="		<div class='leagueModalInfo'>Inscritos "+elemento.inscritos+"/"+elemento.max_user+"</div>";
						header+="	</div>";
						header+="	<div class='col-xs-6'>";
						header+="		<div class='leagueModalInfo'>Entrada "+elemento.cost_entry+"</div>";
						header+="	</div>";
						header+="</div>";
						
						header+="<div class='row'>";
						header+="	<div class='col-xs-12'>";
						header+="		<div class='leagueModalInfo'>Premio "+elemento.cost_garanteed+"</div>";
						header+="	</div>";
						header+="</div>";

						mensaje="";

						mensaje+="	<div class='col-xs-12 text-center'>";
						mensaje+="		<p class='modalInfo'>"+elemento.description+"</p>";
						mensaje+="	</div>";


						if (elemento.description == null){
							mensaje = "";	
						}

						premio ="";
						
						
						premio+="	<div class='col-xs-12'>";
						premio+="		<table class='table table-striped leagueModalAwardTable'>";
						premio+="			<thead>";
						premio+="				<tr>";
						premio+="					<th colspan='2' class='topTable'>Premios</th>";
						premio+="				</tr>";
						premio+="			</thead>";
						premio+="			<tbody>";
						premio+="				<tr>";
						premio+="					<td>1er</td>";
						premio+="					<td align='right'>"+elemento.cost_garanteed+"</td>";
						premio+="				</tr>";
						premio+="			</tbody>";
						premio+="		</table>";
						premio+="	</div>";


						
						if (contador == 5){			
							formatotabla+="	<tr>";
							contador = 0;
						}
							formatotabla+="			<td>"+elemento.surname+"</td>";
						
						if (contador == 5){			
							formatotabla+="	</tr>";
							
						}
										
						
						if(response[2] == "si"){
							if(response[0] >= response[1]){
								botones="	<div class='col-xs-12 text-center'>";
								botones+="		<p class='modalInfo'>Ya la Competicion Comenzo, Inscripciones Cerradas</p>";
								botones+="	</div>";
							}else{
								botones= "<div class='col-xs-6'>";

								botones+= "<button type='submit' class= 'leagueModalBtn2' name='inscribir' value="+elemento.id+">";
								botones+= 	"Inscribir Lineup";
								botones+= "</button>";
								botones+="	</div>";

								botones+=" 	<div class='col-xs-6 text-right'>";
								botones+= "<button type='submit' class= 'leagueModalBtn2' name='crear' value="+elemento.id+">";
								botones+= 	"Crear Lineup";
								botones+= "</button>";

								botones+= "	</div>";
							}
						}else{
							botones= "<div class='col-xs-6'>";

							botones+= "<button type='submit' class= 'leagueModalBtn2' name='inscribir' value="+elemento.id+">";
							botones+= 	"Inscribir Lineup";
							botones+= "</button>";
							botones+="	</div>";

							botones+=" 	<div class='col-xs-6 text-right'>";
							botones+= "<button type='submit' class= 'leagueModalBtn2' name='crear' value="+elemento.id+">";
							botones+= 	"Crear Lineup";
							botones+= "</button>";

							botones+= "	</div>";
						}

						


						if (elemento.surname == null){
							contenido+=	"<div class='table-col'>"
							contenido+=	"	<div class='col-sm-4 nopadding'>";
							contenido+=	"		AUN NO HAY INSCRITOS";
							contenido+=	"	</div>";
							contenido+=	"</div>";
						}
					

						contador = contador +1;
					});

					formatotabla+="			</tbody>";
					formatotabla+="		</table>";
					formatotabla+="	</div>";

					$( "#header" ).children().remove();
					$(header).appendTo("#header");
					$( "#mensaje" ).children().remove();
					$(mensaje).appendTo("#mensaje");
					$( "#tabla" ).children().remove();
					$(formatotabla).appendTo("#tabla");					
					$( "#botones" ).children().remove();
					$(botones).appendTo("#botones");
					$( "#premio" ).children().remove();
					$(premio).appendTo("#premio");	
			    }
			});

    	});
    });

});