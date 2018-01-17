$(document).ready(function(){
	$(function()
	{ 
		$('#live_movil').click(function()
		{
			//alert ("HOLA");
		  	var seleccion = '';
		  	var a = '';
			$.ajax({
				url: 'list_competitionTodayMovil',
				type: 'POST',
				async: true,
				data: {},
				success: function(data)
			    {
		          	console.log("-->"+data);  
					var obj = jQuery.parseJSON(data);	
					$(obj).each(function(indice,  elemento){

						seleccion +="<div class='league-item'>"+
										"<div class='league'>"+
										"	<div class='col-xs-1' style='padding: 10px 0;'>";

												if (elemento.type_game_id == 1){
													seleccion += "<img src='../images/icon-baseball.png'>";
												}else{
													seleccion += "<img src='../images/icon-soccer.png'>";
												}
												if(elemento.type == 1){
													seleccion += "<img src='../images/padlock.png'>";
												}
						seleccion+="		</div> "+
											"<div class='col-xs-10'>"+
											"<div class='DvLeagueName'>"+
											"	<a href='javascript:void(0)' class='leagueName' data-toggle='modal' data-target='#modal1'>";
						seleccion+=					elemento.name;								
						seleccion+="			</a> "+
									"		</div>"+
									"		<p class='leagueText'>"+
									"			Inscritos "+elemento.inscritos+" de "+ elemento.max_user+" | ";
						seleccion+=				elemento.date;						
						seleccion+="		<br>"+
								"			Entrada <span class='amountColor'> "+elemento.cost_entry+"Bs</span> | Repartido <span class='amountColor'> "+elemento.cost_garanteed+"Bs</span></p>";
						seleccion+="		</div>"+
									"	<div class='col-xs-1 text-right' style='padding: 18px 0;'>"+
						""+
							"				<a href='#'>";
						seleccion += "<img src='../images/arrow-right.png'>"+					
											"</a>"+
										"</div>"+
									"</div>"+			
								"</div>";
					});	//ciclo		
					$( "#table_movil" ).children().remove();
					$(seleccion).appendTo("#table_movil");
		    	}//funcion
			});//ajax
		});//click
		$('#live').click(function()
		{
		  	var seleccion = '';
		  	var a = '';
			$.ajax({
				url: 'list_competitionToday',
				type: 'POST',
				async: true,
				data: {},
				success: function(data)
			    {
		          	console.log("-->"+data);  
					var obj = jQuery.parseJSON(data);	
					$(obj).each(function(indice,  elemento){
		 		
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


		});
		$('#historial_movil').click(function()
		{
			//alert ("HOLA");
		  	var seleccion = '';
		  	var a = '';
			$.ajax({
				url: 'list_competitionAllMovil',
				type: 'POST',
				async: true,
				data: {},
				success: function(data)
			    {
		          	console.log("-->"+data);  
					var obj = jQuery.parseJSON(data);	
					$(obj).each(function(indice,  elemento){

						seleccion +="<div class='league-item'>"+
										"<div class='league'>"+
										"	<div class='col-xs-1' style='padding: 10px 0;'>";

												if (elemento.type_game_id == 1){
													seleccion += "<img src='../images/icon-baseball.png'>";
												}else{
													seleccion += "<img src='../images/icon-soccer.png'>";
												}
												if(elemento.type == 1){
													seleccion += "<img src='../images/padlock.png'>";
												}
						seleccion+="		</div> "+
											"<div class='col-xs-10'>"+
											"<div class='DvLeagueName'>"+
											"	<a href='javascript:void(0)' class='leagueName' data-toggle='modal' data-target='#modal1'>";
						seleccion+=					elemento.name;								
						seleccion+="			</a> "+
									"		</div>"+
									"		<p class='leagueText'>"+
									"			Inscritos "+elemento.inscritos+" de "+ elemento.max_user+" | ";
						seleccion+=				elemento.date;						
						seleccion+="		<br>"+
								"			Entrada <span class='amountColor'> "+elemento.cost_entry+"Bs</span> | Repartido <span class='amountColor'> "+elemento.cost_garanteed+"Bs</span></p>";
						seleccion+="		</div>"+
									"	<div class='col-xs-1 text-right' style='padding: 18px 0;'>"+
						""+
							"				<a href='#'>";
						seleccion += "<img src='../images/arrow-right.png'>"+					
											"</a>"+
										"</div>"+
									"</div>"+			
								"</div>";
					});	//ciclo		
					$( "#table_movil" ).children().remove();
					$(seleccion).appendTo("#table_movil");
		    	}//funcion
			});//ajax
		});//click

		$('#historial').click(function()
		{
		  	//alert("historial.")
		  	var seleccion = '';
		  	var a = '';
			$.ajax({
				url: 'list_competitionAll',
				type: 'POST',
				async: true,
				data: {},
				success: function(data)
			    {
		          	console.log("-->"+data);  
					var obj = jQuery.parseJSON(data);	
					$(obj).each(function(indice,  elemento){
		 		
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
		"						<td class='col-md-1 text-center'>12/"+elemento.max_user+"</td>"+
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
					});//ciclo

				$( "#tabla" ).children().remove();
				$(seleccion).appendTo("#tabla");

		    	}//funcion
			});//ajax
		});//click

	
	});//funcion principal




});//documento