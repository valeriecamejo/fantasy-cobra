$(document).ready(function(){
	$(function()
	{
		$('.sort').click(function()
		{
			id = $(this).data('hola');
		  	alert(id);

		  	$.ajax({
		  		url: 'competition',
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
						alert(elemento.inscritos);
						seleccion += " <tr class = 'text-center' >"+
		"	               			         <td class='text-center'>";

		                      	if (elemento.type_game_id == 1){
								seleccion += "	 "+
								    "   <a href='#' class='LeagueName'>  <img src='../images/baseball.png'> "+ elemento.name +" ( "+ elemento.cost_garanteed +"  Garantizados! ) </a>";
				              	}
		        				if (( elemento.type_game_id ) == 2){
				                  seleccion += "	 "+
								    "   <a href='#' class='LeagueName'>  <img src='../images/soccerball.png'> "+ elemento.name +" ( "+ elemento.cost_garanteed +"  Garantizados! ) </a>";
				              	}
				                
			                	if ((elemento.type ) == 1){
				                 seleccion+= "<P ALIGN=right> <img src='../images/private-league.png'><p>";
								}
						seleccion+=	"</td>"+
		"						<td class='col-md-1 text-center'>"+
		"							<a href='#' data-toggle='modal' data-target='#invitarcompetencia'>"+
		"								<img src='../images/btn-invite.png'>"+
		"							</a>"+
		"						</td>"+
		"						<td class='col-md-1 text-center'>"+elemento.inscritos+"/"+elemento.max_user+"</td>"+
		"                 		<td class='col-md-1 text-center'>"+
		"                  			<a href='#' class='LeagueName'>"+
		"                   				 "+ elemento.cost_entry+"  Bs"+
		"	                        	</a>"+
		"	                       	</td>"+
		"		                    <td class='col-md-1 text-center'>"+
		"		                      	"+ elemento.date+""+
		"		                    </td>"+
		                "   "+
		                "    </tr>";
					});

					$( "#tabla" ).children().remove();
					$(seleccion).appendTo("#tabla");
						
			    }
			});
			
			
		});//click
		

	});//funcion principal
});//documento