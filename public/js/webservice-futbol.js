// Arreglos para Validaciones 
var existentes 			= [];	// Guarda los peloteros para verificar no esten repetidos
var player_selected 	= [];  	// Guarda los peloteros seleccionados por el usuario
var portero 			= '';
var delantero 			= '';
var delantero_1 		= '';
var mediocampista 		= '';
var mediocampista_1 	= '';
var mediocampista_2 	= '';
var defensor 			= '';
var defensor_1 			= '';
var defensor_2 			= '';

var salario_players = $('#salario_players').val(); // Obtiene el salario maximo de la BD


$(document).ready(function(){
	// Click en Tab de version Desktop
 	$('.nav-tabs a').on('click',function(){
		var select_tab = $(this).attr('id'); // Pestania seleccionada
		//alert(select_tab);
	   	if(select_tab=='POR'){ 				// Todos los Porteros

	      	existentes.length = 0;
	      	webservice(1,select_tab,'D');
	      	//return false;

	   	}else if(select_tab=='DEL'){			// Todos los Delanteros

	      	webservice(5,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='MED'){ 		// Todos los Mediocampistas

	      	webservice(6,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='DEF'){		// Todos los Defensa

	      	webservice(7,select_tab,'D'); 
	      	//return false;

	    }else if(select_tab=='ALL'){		// Todas las Posiciones

	      	webservice(8,select_tab,'D'); 
	      	//return false;

	    }
	});

	// Click en Tab de version Movil
 	$('.restab .tab-linecreate a').on('click',function(){
		var select_tab = $(this).attr('id'); // Pestania seleccionada
	   	//alert('movil: '+select_tab);
	   	if(select_tab=='PORM'){ 				// Todos los Porteros

	      	existentes.length = 0;
	      	webservice(1,select_tab,'M');
	      	//return false;

	   	}else if(select_tab=='DELM'){			// Todos los Delanteros

	      	webservice(5,select_tab,'M');
	      	//return false;

	    }else if(select_tab=='MEDM'){ 		// Todos los Mediocampistas

	      	webservice(6,select_tab,'M');
	      	//return false;

	    }else if(select_tab=='DEFM'){		// Todos los Defensa

	      	webservice(7,select_tab,'M');
	      	//return false;
	    }else if(select_tab=='ALLM'){		// Todas las Posiciones

	      	webservice(8,select_tab,'M');
	      	//return false;
	    }
	});

  	// Identifica resoluciones moviles.
  	if($(window).width() <= 450){
  		webservice(1,'PORM','M');    // Carga Porteros Movil
  	}else{
  		webservice(1,'POR','D'); 	// Carga Porteros Desktop
  	}


		
});


/***************************************************
*	Descripcion: Funcion para indicar el lugar donde 
*				 se van a pintar los peloteros.
*	Parametros:
*			tab.- Pestania que selecciono el usurio
****************************************************/
function blockplayer(tab){
	var listplayers; 

	switch (tab) {
		// Casos Desktop
	    case 'DEL':
	        listplayers = 'DELD'; 
	        break;
	    case 'MED':
	        listplayers = 'MEDD'; 
	        break;
	    case 'DEF':
	        listplayers = 'DEFD'; 
	        break;
	 
	    case 'ALL':
	        listplayers = 'ALLD'; 
	        break;
	    // Casos Movil

	    case 'PORM':
	        listplayers = 'PORPM'; 
	        break;

	    case 'DELM':
	        listplayers = 'DEL2'; 
	        break;

	    case 'MEDM':
	        listplayers = 'MED2'; 
	        break;

	    case 'DEFM':
	        listplayers = 'DEF2'; 
	        break;

	   	case 'ALLM':
	        listplayers = 'ALL2'; 
	        break;

	}

	return listplayers;
}

/******************************************************************
*	Descripcion: Funcion para hacer llamada
*				 dinamica a ws de peloteros
*	Parametros:
*			posicion.- indica el ws a cargar
*           tab : posicion
* 			device: dispositivo desde donde se hace la llamada.
*******************************************************************/
function webservice(posicion,tab,device){

	//alert(posicion);
 	var ruta 		=	""; // Identifica el ws que se va a consultar
 	var date 		= 	$('#fechaCompeticion').val(); // Fecha de la competicion
 	var league		=	$('#league').val(); // Liga
 	var tournament	=   0; 			// Torneo
 	var listplayers = 	blockplayer(tab); // Identifica la tabla que debe llenar (por ej: C/1B,2B, etc)
 	var loader 		= 	'<span id="loader" class="loader"><span class="loader-inner"></span></span>';
 	var get_position_loader; // Identifica la posicion en la que se cargara el loader

 	//alert(listplayers);
 	//alert(tab);

 	if(league==27){
 		tournament = 7;
 	}else if(league==28){
 		tournament = 8;
 	}

	$('#'+listplayers).html(''); // Limpio el div con los resultados anteriores

 	//alert(posicion);
 	//alert(tab);
 	if(posicion == 5 || posicion == 6 || posicion == 7 || posicion == 8){ 
 		// 5 -> Delantero; 6 -> Mediocampista; 7-> Defensor
 		var i_position; 
 		//var i_position = 2; 
 		ruta=2;


 		get_position_loader = position_loader(posicion,device);
		//alert('get_position_loader: '+get_position_loader);
		$('#'+get_position_loader).append(loader); // Carga el loading

		$.ajax({
		  	//url:"http://localhost/cobraverepotenciado/fantasy-cobra-venezuela-repotenciado/public/usuario/futbol-game-position",
		  	//url:"http://localhost/cobrave/fantasy-cobra-venezuela-repotenciado/public/usuario/futbol-game-position",
		  	url: "https://www.fantasycobra.com.ve/usuario/futbol-game-position",
		  	type: 'POST',
		  	async: true,
		  	dataType: "json",
		 	data: 'positionId='+posicion+"&date="+date+"&accion="+ruta+"&tournament="+tournament,
		  	success: function(data)
	      	{
	      		$('#loader').remove(); // Elimina el loading
				//var players = jQuery.parseJSON(data);	
				//var get_players = JSON.stringify(data);	
				//var players = JSON.parse(data);	
				//alert(players);
				//showPitcher(players,tab,device);
				var b = JSON.stringify(data);
            	var players = JSON.parse(b);
           
            		//getProducts(c);

            	showPositions(players,tab,device);
		  	}
	});

	 	
 	}else if (posicion == 1){ // Arqueros
  		// Lanzadores 
  		// Id de cada uno de los equipos
 		ruta=1;

 		//alert('tournament: '+tournament);
 		//alert('date: '+date);
 		//alert('ruta: '+ruta);
 		//deletePlayersLineup();
 		//$('#PAD').append(loader);
 		if(device=='D'){
			$('#PORD').append(loader); // Carga el loading
		}else if(device=='M'){
			$('#PORPM').append(loader); // Carga el loading
		}

 		$.ajax({
		  	//url: 'futbol-game-position',
		  	//url:"http://localhost/cobrave/fantasy-cobra-venezuela-repotenciado/public/usuario/futbol-game-position",
		  	//url:"http://localhost/cobraverepotenciado/fantasy-cobra-venezuela-repotenciado/public/usuario/futbol-game-position",
		  	url: "https://www.fantasycobra.com.ve/usuario/futbol-game-position",
		  	type: 'POST',
		  	async: true,
		  	dataType: "json",
		 	data: 'positionId='+"1"+"&date="+date+"&accion="+ruta+"&tournament="+tournament,
		  	success: function(data)
	      	{
	      		$('#loader').remove(); // Elimina el loading
				//var players = jQuery.parseJSON(data);	
				//var get_players = JSON.stringify(data);	
				//var players = JSON.parse(data);	
				//alert(players);
				//showPitcher(players,tab,device);
				 var b = JSON.stringify(data);
            		var players = JSON.parse(b);
           
            		//getProducts(c);

            	showArcher(players,tab,device);
		  	}

		});
 	}
 	//alert(ruta);
}


function position_loader(posicion,device){

	var loader_position;

	if(device=='D'){
		switch (posicion) {
		
	    case 5:
	        loader_position = 'DELD'; 
	        break;
	    case 6:
	        loader_position = 'MEDD'; 
	        break;
	    case 7:
	        loader_position = 'DEFD'; 
	        break;
	    
	    case 8:
	        loader_position = 'ALLD'; 
	        break;

		}

	}else if(device=='M'){
		switch (posicion) {
		
	    case 5:
	        loader_position = 'DEL2'; 
	        break;
	    case 6:
	        loader_position = 'MED2'; 
	        break;
	    case 7:
	        loader_position = 'DEF2'; 
	        break;
	    case 8:
	        loader_position = 'ALL2'; 
	        break;
	    
		}
	}
	
	//alert('loader_position: '+loader_position);
	return loader_position;
}

/**********************************************************************
*   Función:     showPositions
*   Descripción: Funcion que arma la informaciòn del
*				 listado de jugadores.
*
*   Parametros de entrada: 
*				players = listado de todos los jugadores.
*				tab 	= posicion para identificar si la 
*						  llamada es Desktop o Movil.
*				device  = Identifica dispositivo (Desktop/Movil).
************************************************************************/
function showPositions(players,tab,device){
	var player 	 =	""; // Listado de jugadores
	//var i 		 =	0; // Verifica si fila es par o impar
	var selected =	""; // Clase que se va a mostrar en la fila
	var fila     =  ""; // Fila que va a borrar
	var posicion =  ""; // Para diferenciar cuando sea LF,CF Y RF
	var hora_input = parseInt($("#first_game").val()); // Hora de inicio del juego
	

	var NameTeam1;
	var NameTeam2;
	var StartDate;
	var TeamId1;
	var TeamId2;
	var PlayerId1;
	var NameP1;
	var PlayerId2;
	var NameP2;
	var NickName1;
	var NickName2;
	var BullpenTeam1;
	var BullpenTeam2;
	var header; // Inicio de la tabla de jugadores
	var footer; // Cierre de la tabla de jugadores
	var fecha_juego; // Fecha del juego
	var inicio; // Hora del juego
	var adapt_hour; // Adapta la hora al formato 12
	var tamano;
	var PlayerPrice1;
	var listplayers = ''; // Listado de Juagdores

	
	//alert(players2);
	//var i;

	$(players).each(function(indice, elemento){

		PlayerId 			= 	"0";
		PlayerName 			= 	"NA";
		PlayerTeam 			= 	"NA";
		PlayerShortNameTeam =  	"NA";
		PlayerNickNameTeam 	= 	"NA";
		FullPosition 		= "NA";
		G 					= 	"0";
		GameId 				= 	"0";
		StartDate 			= 	"0/00/0000 0:00:00 XX";
		OppTeamName 		= 	"NA";
		OppTeamShortName 	= 	"NA";
		OppTeamNickName 	= 	"NA";
		Price 				= 	"0";

		for(i=0;i<elemento.length;i++){ 

			//alert('PlayerIdTeam1: '+elemento[i].PlayerIdTeam1);


			if(elemento[i].PlayerNameTeam1!=undefined){ // Jugadores del equipo 1
				//alert('en el primero');
				//alert('indice: '+indice);
				//alert(elemento[i].PlayerNameTeam1);
				//alert(elemento[i].PlayerNameTeam2);
				// Verifico cada una de las variables

				if(elemento[i].PlayerIdTeam1!=undefined){
					PlayerId = elemento[i].PlayerIdTeam1;
				}

				if(elemento[i].PlayerNameTeam1!=undefined){
					PlayerName = elemento[i].PlayerNameTeam1+' '+elemento[i].PlayerLastNameTeam1;
				}

				if(elemento[i].TeamIdHome!=undefined){
					PlayerTeam = elemento[i].TeamIdHome;
				}

				if(elemento[i].Team1!=undefined){
					PlayerShortNameTeam = elemento[i].Team1;
				}

				if(elemento[i].NickNameTeam1!=undefined){
					PlayerNickNameTeam = elemento[i].NickNameTeam1;
				}

				if(elemento[i].PositionTeam1!=undefined){
					FullPosition = elemento[i].PositionTeam1;
				}

				

				if(elemento[i].GameId!=undefined){
					GameId = elemento[i].GameId;
				}

				if(elemento[i].StartDate!=undefined){
					StartDate = elemento[i].StartDate;
				}

				if(elemento[i].Team2!=undefined){
					OppTeamShortName = elemento[i].Team2;
				}

				if(elemento[i].NickNameTeam2!=undefined){
					OppTeamNickName = elemento[i].NickNameTeam2;
				}

				if(elemento[i].PositionTeam1!=undefined){
					//posicion = elemento[i].PositionTeam1;
					//position = substr(elemento[i].PositionTeam1,0,2);
					position = ((elemento[i].PositionTeam1).substr(0, 3)).toUpperCase();
					if(position=='ARQ'){
						position = 'POR';
					}
					//substr("Hello world",0,10)
					//alert('position: '+position);
				}

				if(elemento[i].price!=undefined){
					if(elemento[i].price==0){
						Price = "10000";
					}else{
						Price = elemento[i].price;
					}
					
				}else{
					price = "10000";
				}

				//posicion = elemento.Position;

				agregar = true;
		
				if (agregar){

					/*var fecha_juego = StartDate.split(" ");
					var inicio = fecha_juego[1].split(":");

					if(fecha_juego[2] =='PM' || fecha_juego[2]=='pm'){
						var inicio_2 = parseInt(inicio[0])+12;
					}

					if(inicio_2 == 24){
						inicio_2 = inicio_2-12;
					}*/
					
					//if(inicio_2 >= hora_input){

						if(device=='D'){ // Pinta peloteros en Desktop

							player +='<tr>'+
		                          '<td id="pos">'+position+'</td>'+
		                          '<td id="jug">'+decodeURIComponent(PlayerName)+'</td>'+
		                          '<td id="opo">'+PlayerNickNameTeam+' vs <span id="teamcol">'+OppTeamNickName+'</span></td>'+
		                          '<td id="salario">'+Math.ceil(Price)+'</td>'+
		                          '<td>'+
		                          '<a  onclick=selectPlayer('+'"'+PlayerId+'","'+position+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+Math.ceil(Price)+'","'+encodeURIComponent(OppTeamNickName.trim())+'","'+encodeURIComponent(PlayerNickNameTeam.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(Price)+'"); >'+
		                          '<img src="../images/ico/mas.png" class="mashov" alt="mas">'+
		                          '</a></td>'+
		                      '</tr>';

						}else if(device=='M'){ // Pinta peloteros en Movil

							player +='<a  onclick=selectPlayer('+'"'+PlayerId+'","'+position+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+Math.ceil(Price)+'","'+encodeURIComponent(OppTeamNickName.trim())+'","'+encodeURIComponent(PlayerNickNameTeam.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(Price)+'"); >'+
		                              '<div class="litableup">'+
		                                  '<div class="divpos">'+position+'</div>'+
		                                  '<div class="litabblock">'+
		                                      '<p class="divjug">'+decodeURIComponent(PlayerName)+'</p>'+
		                                      '<p class="divopo">'+ PlayerNickNameTeam+' vs <span id="teamcol">'+ OppTeamNickName+'</span></p>'+
		                                  '</div>'+
		                                  '<div class="divsala">'+Math.ceil(Price)+'</div>'+
		                                  '<div class="divmashov">'+
		                                  	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
		                                  '</div>'+
		                              '</div>'+
		                          '</a>';

						}
						

					//}
				}

			}

			if(elemento[i].PlayerNameTeam2!=undefined){ // Jugadores del equipo 2
				//alert('en el primero');
				//alert('indice: '+indice);
				//alert(elemento[i].PlayerNameTeam1);
				//alert(elemento[i].PlayerNameTeam2);
				// Verifico cada una de las variables

				if(elemento[i].PlayerIdTeam2!=undefined){
					PlayerId = elemento[i].PlayerIdTeam2;
				}

				if(elemento[i].PlayerNameTeam2!=undefined){
					PlayerName = elemento[i].PlayerNameTeam2+' '+elemento[i].PlayerLastNameTeam2;
				}

				if(elemento[i].TeamIdAway!=undefined){
					PlayerTeam = elemento[i].TeamIdAway;
				}

				if(elemento[i].Team2!=undefined){
					PlayerShortNameTeam = elemento[i].Team2;
				}

				if(elemento[i].NickNameTeam2!=undefined){
					PlayerNickNameTeam = elemento[i].NickNameTeam2;
				}

				if(elemento[i].PositionTeam2!=undefined){
					FullPosition = elemento[i].PositionTeam2;
				}

				

				if(elemento[i].GameId!=undefined){
					GameId = elemento[i].GameId;
				}

				if(elemento[i].StartDate!=undefined){
					StartDate = elemento[i].StartDate;
				}

				if(elemento[i].Team1!=undefined){
					OppTeamShortName = elemento[i].Team1;
				}

				if(elemento[i].NickNameTeam1!=undefined){
					OppTeamNickName = elemento[i].NickNameTeam1;
				}

				if(elemento[i].PositionTeam2!=undefined){
					//posicion = elemento[i].PositionTeam2;
					//position = substr(elemento[i].PositionTeam2,0,2);
					position = ((elemento[i].PositionTeam2).substr(0, 3)).toUpperCase();
					//substr("Hello world",0,10)
					//alert('position: '+position);
					if(position=='ARQ'){
						position = 'POR';
					}
				}

				if(elemento[i].price!=undefined){
					if(elemento[i].price==0){
						Price = "10000";
					}else{
						Price = elemento[i].price;
					}
					
				}else{
					price = "10000";
				}

				//posicion = elemento.Position;

				agregar = true;
		
				if (agregar){

					/*var fecha_juego = StartDate.split(" ");
					var inicio = fecha_juego[1].split(":");

					if(fecha_juego[2] =='PM' || fecha_juego[2]=='pm'){
						var inicio_2 = parseInt(inicio[0])+12;
					}

					if(inicio_2 == 24){
						inicio_2 = inicio_2-12;
					}*/
					
					//if(inicio_2 >= hora_input){

						if(device=='D'){ // Pinta peloteros en Desktop

							player +='<tr>'+
		                          '<td id="pos">'+position+'</td>'+
		                          '<td id="jug">'+decodeURIComponent(PlayerName)+'</td>'+
		                          '<td id="opo">'+PlayerNickNameTeam+' vs <span id="teamcol">'+OppTeamNickName+'</span></td>'+
		                          '<td id="salario">'+Math.ceil(Price)+'</td>'+
		                          '<td>'+
		                          '<a  onclick=selectPlayer('+'"'+PlayerId+'","'+position+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+Math.ceil(Price)+'","'+encodeURIComponent(OppTeamNickName.trim())+'","'+encodeURIComponent(PlayerNickNameTeam.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(Price)+'"); >'+
		                          '<img src="../images/ico/mas.png" class="mashov" alt="mas">'+
		                          '</a></td>'+
		                      '</tr>';

						}else if(device=='M'){ // Pinta peloteros en Movil

							player +='<a  onclick=selectPlayer('+'"'+PlayerId+'","'+position+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+Math.ceil(Price)+'","'+encodeURIComponent(OppTeamNickName.trim())+'","'+encodeURIComponent(PlayerNickNameTeam.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(Price)+'"); >'+
		                              '<div class="litableup">'+
		                                  '<div class="divpos">'+position+'</div>'+
		                                  '<div class="litabblock">'+
		                                      '<p class="divjug">'+decodeURIComponent(PlayerName)+'</p>'+
		                                      '<p class="divopo">'+ PlayerNickNameTeam+' vs <span id="teamcol">'+ OppTeamNickName+'</span></p>'+
		                                  '</div>'+
		                                  '<div class="divsala">'+Math.ceil(Price)+'</div>'+
		                                  '<div class="divmashov">'+
		                                  	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
		                                  '</div>'+
		                              '</div>'+
		                          '</a>';

						}
						

					//}
				}

			}
		}

	});

	listplayers = blockplayer(tab);
	//alert('aqui va : '+listplayers);
	if(device=='D'){
		header = '<table class="table table-striped2 table-hover2 tablelineup"><tbody>';
		footer ='</tbody></table>';
		player = header+player+footer;
	}//else if(device=='M'){

	//}
	
	$('#'+listplayers).append(player);

}

/*function showPlayers(players,tab,device){

	var player 	 =	""; // Listado de jugadores
	var i 		 =	0; // Verifica si fila es par o impar
	//var selected =	""; // Clase que se va a mostrar en la fila
	var fila     =  ""; // Fila que va a borrar
	var posicion =  ""; // Para diferenciar cuando sea LF,CF Y RF
	var hora_input = parseInt($("#first_game").val());
	var listplayers; // Identifica la tabla que debe llenar (por ej: C/1B,2B, etc)
	var PlayerId;
	var PlayerName;
	var PlayerTeam;
	var PlayerShortNameTeam;
	var PlayerNickNameTeam;
	var Position;
	var FullPosition;
	var G;
	var GameId;
	var StartDate;
	var OppTeamName;
	var OppTeamShortName;
	var OppTeamNickName;
	var Price;
	var header; // Inicio de la tabla de jugadores
	var footer; // Cierre de la tabla de jugadores

	$(players).each(function(indice, elemento){

		PlayerId 			= 	"0";
		PlayerName 			= 	"NA";
		PlayerTeam 			= 	"NA";
		PlayerShortNameTeam =  	"NA";
		PlayerNickNameTeam 	= 	"NA";
		FullPosition 		= "NA";
		G 					= 	"0";
		GameId 				= 	"0";
		StartDate 			= 	"0/00/0000 0:00:00 XX";
		OppTeamName 		= 	"NA";
		OppTeamShortName 	= 	"NA";
		OppTeamNickName 	= 	"NA";
		Price 				= 	"0";

		if(elemento.PlayerId!=""){
			PlayerId = elemento.PlayerId;
		}

		if(elemento.PlayerName!=""){
			PlayerName = elemento.PlayerName;
		}

		if(elemento.PlayerTeam!=""){
			PlayerTeam = elemento.PlayerTeam;
		}

		if(elemento.PlayerShortNameTeam!=""){
			PlayerShortNameTeam = elemento.PlayerShortNameTeam;
		}

		if(elemento.PlayerNickNameTeam!=""){
			PlayerNickNameTeam = elemento.PlayerNickNameTeam;
		}

		if(elemento.FullPosition!=""){
			FullPosition = elemento.FullPosition;
		}

		if(elemento.G!=""){
			G = elemento.G;
		}

		if(elemento.GameId!=""){
			GameId = elemento.GameId;
		}

		if(elemento.StartDate!=""){
			StartDate = elemento.StartDate;
		}

		if(elemento.OppTeamShortName!=""){
			OppTeamShortName = elemento.OppTeamShortName;
		}

		if(elemento.OppTeamNickName!=""){
			OppTeamNickName = elemento.OppTeamNickName;
		}

		if(elemento.Price!=""){
			if(elemento.Price==0){
				Price = "5000";
			}else{
				Price = elemento.Price;
			}
			
		}else{
			Price = "5000";
		}


		if(elemento.Position=='LF' || elemento.Position=='RF' || elemento.Position=='CF'){
			posicion='OF';
			//alert(elemento.Position);
		}else{
			posicion = elemento.Position;
		}

		agregar = true;
		
		if (agregar){

			var fecha_juego = StartDate.split(" ");
			var inicio = fecha_juego[1].split(":");

			if(fecha_juego[2] =='PM' || fecha_juego[2]=='pm'){
				var inicio_2 = parseInt(inicio[0])+12;
			}

			if(inicio_2 == 24){
				inicio_2 = inicio_2-12;
			}
			
			if(inicio_2 >= hora_input){

				if(device=='D'){ // Pinta peloteros en Desktop

					player +='<tr>'+
                          '<td id="pos">'+posicion+'</td>'+
                          '<td id="jug">'+decodeURIComponent(PlayerName)+'</td>'+
                          '<td id="opo">'+PlayerNickNameTeam+' vs <span id="teamcol">'+OppTeamNickName+'</span></td>'+
                          '<td id="salario">'+Price+'</td>'+
                          '<td>'+
                          '<a  onclick=selectPlayer('+'"'+PlayerId+'","'+posicion+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+Math.ceil(Price)+'","'+encodeURIComponent(OppTeamNickName.trim())+'","'+encodeURIComponent(PlayerNickNameTeam.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(Price)+'"); >'+
                          '<img src="../images/ico/mas.png" class="mashov" alt="mas">'+
                          '</a></td>'+
                      '</tr>';

				}else if(device=='M'){ // Pinta peloteros en Movil

					player +='<a  onclick=selectPlayer('+'"'+PlayerId+'","'+posicion+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+encodeURIComponent(PlayerName.trim())+'","'+Math.ceil(Price)+'","'+encodeURIComponent(OppTeamNickName.trim())+'","'+encodeURIComponent(PlayerNickNameTeam.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(Price)+'"); >'+
                              '<div class="litableup">'+
                                  '<div class="divpos">'+posicion+'</div>'+
                                  '<div class="litabblock">'+
                                      '<p class="divjug">'+decodeURIComponent(PlayerName)+'</p>'+
                                      '<p class="divopo">'+ PlayerNickNameTeam+' vs <span id="teamcol">'+ OppTeamNickName+'</span></p>'+
                                  '</div>'+
                                  '<div class="divsala">'+Math.ceil(Price)+'</div>'+
                                  '<div class="divmashov">'+
                                  	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
                                  '</div>'+
                              '</div>'+
                          '</a>';

				}
				

			}
		}
	}); 
	
	//alert(tab);

	// Identifica si es Desktop o Movil

	listplayers = blockplayer(tab);
	
	if(device=='D'){
		header = '<table class="table table-striped2 table-hover2 tablelineup"><tbody>';
		footer ='</tbody></table>';
		player = header+player+footer;
	}else if(device=='M'){

	}
	
	$('#'+listplayers).append(player);
}*/


/*******************************************************
*   Función:     showArcher
*   Descripción: Funcion que arma la informaciòn del
*				 listado de porteros
*
*   Parametros de entrada: 
*				players = listado de todos los arqueros.
*				tab 	= posicion para identificar si la 
*						  llamada es Desktop o Movil.
********************************************************/

function showArcher(players,tab,device){

	var player 	 =	""; // Listado de jugadores
	//var i 		 =	0; // Verifica si fila es par o impar
	var selected =	""; // Clase que se va a mostrar en la fila
	var fila     =  ""; // Fila que va a borrar
	var posicion =  ""; // Para diferenciar cuando sea LF,CF Y RF
	var hora_input = parseInt($("#first_game").val()); // Hora de inicio del juego
	

	var NameTeam1;
	var NameTeam2;
	var StartDate;
	var TeamId1;
	var TeamId2;
	var PlayerId1;
	var NameP1;
	var PlayerId2;
	var NameP2;
	var NickName1;
	var NickName2;
	var BullpenTeam1;
	var BullpenTeam2;
	var header; // Inicio de la tabla de jugadores
	var footer; // Cierre de la tabla de jugadores
	var fecha_juego; // Fecha del juego
	var inicio; // Hora del juego
	var adapt_hour; // Adapta la hora al formato 12
	var tamano;
	var PlayerPrice1;

	
	//alert(players2);
	var i;
	$(players).each(function(indice, elemento){

		NameTeam1	=	"NA";
		NameTeam2	=	"NA";
		StartDate	=	"0/00/0000 0:00:00 XX";
		TeamId1		=	"0";
		TeamId2		=	"0";
		PlayerId1	=	"0";
		NameP1		=	"NA";
		PlayerId2	=	"0";
		NameP2		=	"NA";
		NickName1	=	"NA";
		NickName2	=	"NA";
		PlayerPrice1	=	"0";
		PlayerPrice2	=	"0";


		//alert(indice);
		//alert(elemento.length);
		for(i=0;i<elemento.length;i++){ 

			//alert('PlayerIdTeam1: '+elemento[i].PlayerIdTeam1);
			if(elemento[i].PlayerNameTeam1!=undefined){ // Jugadores del equipo 1
				//alert('en el primero');
				//alert('indice: '+indice);
				//alert(elemento[i].PlayerNameTeam1);
				//alert(elemento[i].PlayerNameTeam2);
				// Verifico cada una de las variables
				if(elemento[i].Team1!=undefined){
					NameTeam1 = elemento[i].Team1;
				}

				
				if(elemento[i].StartDate!=undefined){
					StartDate = elemento[i].StartDate;
				}

				if(elemento[i].TeamIdTeam1!=undefined){
					TeamId1 = elemento[i].TeamIdTeam1;
				}

				if(elemento[i].PlayerIdTeam1!=undefined){
					PlayerId1 = elemento[i].PlayerIdTeam1;
				}

				if(elemento[i].PlayerNameTeam1!=undefined){
					NameP1 = elemento[i].PlayerNameTeam1+' '+elemento[i].PlayerLastNameTeam1;
				}

				if(elemento[i].NickNameTeam1!=undefined){
					NickName1 = elemento[i].NickNameTeam1;
				}

				if(elemento.NickNameTeam2!=''){
					NickName2 = elemento[i].NickNameTeam2;
				}

				// Verifica si el arquero del equipo 1 trae salario
				if(elemento[i].price!=""){
					if(elemento[i].price==0){ // Si salario es igual a cero se le asignan 10.000
						PlayerPrice1 = "10000";
					}else{
						PlayerPrice1 = elemento[i].price;
					}
					
				}else{
					PlayerPrice1 = "10000"; // Si salario es igual a cero se le asignan 10.000
				}


				agregar=true;
				tamano = existentes.length;
				//alert(tamano);
				// Verificamos que el futbolista no este repetido
				for (j=0;j<=tamano;j++){ 
					
				   	if (existentes[j] == elemento[i].PlayerIdTeam1){
				   		//alert('id existentes: '+existentes[j]);
				   		//alert('id arquero: '+elemento[i].PlayerIdTeam1);
				   		agregar = false;
				   		   	
					}
				}

				//alert(agregar);
				if (agregar){
			   		existentes.push(elemento[i].PlayerIdTeam1);
				}	

				if(agregar){

					posicion = "POR";
					
					/*fecha_juego = StartDate.split(" ");
					inicio = fecha_juego[1].split(":");

					if(fecha_juego[2] =='PM' || fecha_juego[2]=='pm'){
						adapt_hour = parseInt(inicio[0])+12;
					}

					if(adapt_hour == 24){
						adapt_hour = adapt_hour-12;
					}*/

					//if(adapt_hour >= hora_input){

						if(device=='D'){ // Pinta pitcher para Desktop
							//alert(NameP1);
				            player += '<tr>'+
					                      '<td id="pos">'+posicion+'</td>'+
					                      '<td id="jug">'+decodeURIComponent(NameP1)+'</td>'+
					                      '<td id="opo">'+ NickName1+' vs <span id="teamcol">'+NickName2+'</span></td>'+
					                      '<td id="salario">'+Math.ceil(PlayerPrice1)+'</td>'+
					                      '<td>'+
					                      	'<a  onclick=selectPlayer('+'"'+PlayerId1+'","'+posicion+'","'+encodeURIComponent(NameTeam1.trim())+'","'+encodeURIComponent(NameP1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+Math.ceil(PlayerPrice1)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(PlayerPrice1)+'"); >'+
					                      		'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
					                      	'</a>'+
					                      '</td>'+
					                  '</tr>';

					        /*player += '<tr>'+
					                      '<td id="pos">'+posicion+'</td>'+
					                      '<td id="jug"><span id="teamcol">'+decodeURIComponent(NameTeam2)+'/</span>'+decodeURIComponent(NameP2)+'</td>'+
					                      '<td id="opo">'+ NickName2+' vs <span id="teamcol">'+NickName1+'</span></td>'+
					                      '<td id="salario">'+Math.ceil(PlayerPrice2)+'</td>'+
					                      '<td>'+
					                      	'<a  onclick=selectPlayer('+'"'+TeamId2+'","'+posicion+'","'+encodeURIComponent(NameTeam2.trim())+'","'+encodeURIComponent(NameP2.trim())+'","'+encodeURIComponent(NickName1.trim())+'","'+Math.ceil(PlayerPrice2)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(PlayerPrice2)+'"); >'+
					                      		'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
					                      	'</a>'+
					                      '</td>'+
					                  '</tr>';*/
								//i++;

						}else if(device=='M'){ // Pinta pitcher para Movil

							player +='<a  onclick=selectPlayer('+'"'+PlayerId1+'","'+posicion+'","'+encodeURIComponent(NameTeam1.trim())+'","'+encodeURIComponent(NameP1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+Math.ceil(PlayerPrice1)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(PlayerPrice1)+'"); >'+
		                              '<div class="litableup">'+
		                                  '<div class="divpos">'+posicion+'</div>'+
		                                  '<div class="litabblock">'+
		                                      '<p class="divjug">'+decodeURIComponent(NameP1)+'</p>'+
		                                      '<p class="divopo">'+ NickName1+' vs <span id="teamcol">'+ NickName2+'</span></p>'+
		                                  '</div>'+
		                                  '<div class="divsala">'+Math.ceil(PlayerPrice1)+'</div>'+
		                                  '<div class="divmashov">'+
		                                  	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
		                                  '</div>'+
		                              '</div>'+
		                          '</a>';

		                    /* player +='<a  onclick=selectPlayer('+'"'+TeamId2+'","'+posicion+'","'+encodeURIComponent(NameTeam2.trim())+'","'+encodeURIComponent(NameP2.trim())+'","'+encodeURIComponent(NickName1.trim())+'","'+Math.ceil(PlayerPrice2)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(PlayerPrice2)+'"); >'+
		                              '<div class="litableup">'+
		                                  '<div class="divpos">'+posicion+'</div>'+
		                                  '<div class="litabblock">'+
		                                      '<p class="divjug"><span id="teamcol">'+NameTeam2.trim()+'/</span> '+NameP2.trim()+'</p>'+
		                                      '<p class="divopo">'+ NickName2+' vs <span id="teamcol">'+ NickName1+'</span></p>'+
		                                  '</div>'+
		                                  '<div class="divsala">'+Math.ceil(PlayerPrice2)+'</div>'+
		                                  '<div class="divmashov">'+

		                                  '<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
		                                  '</div>'+
		                              '</div>'+
		                          '</a>';*/

						}

						//j++;
					//}
				}

				// alert('NameTeam1: '+NameTeam1);
				// alert('StartDate: '+StartDate);
				// alert('TeamId1: '+TeamId1);
				// alert('PlayerId1: '+PlayerId1);
				// alert('NameP1: '+NameP1);
				// alert('NickName1: '+NickName1);

				
			}else if(elemento[i].PlayerNameTeam2!=undefined){ // Jugadores del equipo 2
				//alert('en el primero');
				//alert('indice: '+indice);
				//alert(elemento[i].PlayerNameTeam1);
				//alert(elemento[i].PlayerNameTeam2);
				// Verifico cada una de las variables
				if(elemento[i].Team2!=undefined){
					NameTeam2 = elemento[i].Team2;
				}

				
				if(elemento[i].StartDate!=undefined){
					StartDate = elemento[i].StartDate;
				}

				if(elemento[i].TeamIdTeam2!=undefined){
					TeamId2 = elemento[i].TeamIdTeam2;
				}

				if(elemento[i].PlayerIdTeam2!=undefined){
					PlayerId2 = elemento[i].PlayerIdTeam2;
				}

				if(elemento[i].PlayerNameTeam2!=undefined){
					NameP2 = elemento[i].PlayerNameTeam2+' '+elemento[i].PlayerLastNameTeam2;
				}

				if(elemento[i].NickNameTeam1!=''){
					NickName1 = elemento[i].NickNameTeam1;
				}

				if(elemento.NickNameTeam2!=''){
					NickName2 = elemento[i].NickNameTeam2;
				}

				// Verifica si el arquero del equipo 2 trae salario
				if(elemento[i].price!=""){
					if(elemento[i].price==0){ // Si salario es igual a cero se le asignan 10.000
						PlayerPrice2 = "10000";
					}else{
						PlayerPrice2 = elemento[i].price;
					}
					
				}else{
					PlayerPrice2 = "10000"; // Si salario es igual a cero se le asignan 10.000
				}


				agregar=true;
				tamano = existentes.length;
				//alert(tamano);
				// Verificamos que el futbolista no este repetido
				for (j=0;j<=tamano;j++){ 
					
				   	if (existentes[j] == elemento[i].PlayerIdTeam2){
				   		//alert('id existentes: '+existentes[j]);
				   		//alert('id arquero: '+elemento[i].PlayerIdTeam1);
				   		agregar = false;
				   		   	
					}
				}

				//alert(agregar);
				if (agregar){
			   		existentes.push(elemento[i].PlayerIdTeam2);
				}	

				if(agregar){

					posicion = "POR";
				
					/*fecha_juego = StartDate.split(" ");
					inicio = fecha_juego[1].split(":");

					if(fecha_juego[2] =='PM' || fecha_juego[2]=='pm'){
						adapt_hour = parseInt(inicio[0])+12;
					}

					if(adapt_hour == 24){
						adapt_hour = adapt_hour-12;
					}*/

					//if(adapt_hour >= hora_input){

						if(device=='D'){ // Pinta pitcher para Desktop

				            player += '<tr>'+
					                      '<td id="pos">'+posicion+'</td>'+
					                      '<td id="jug">'+decodeURIComponent(NameP2)+'</td>'+
					                      '<td id="opo">'+ NickName2+' vs <span id="teamcol">'+NickName1+'</span></td>'+
					                      '<td id="salario">'+Math.ceil(PlayerPrice2)+'</td>'+
					                      '<td>'+
					                      	'<a  onclick=selectPlayer('+'"'+PlayerId2+'","'+posicion+'","'+encodeURIComponent(NameTeam2.trim())+'","'+encodeURIComponent(NameP2.trim())+'","'+encodeURIComponent(NickName1.trim())+'","'+Math.ceil(PlayerPrice2)+'","'+encodeURIComponent(NickName2.trim())+'","'+encodeURIComponent(NickName1.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(PlayerPrice2)+'"); >'+
					                      		'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
					                      	'</a>'+
					                      '</td>'+
					                  '</tr>';

					        /*player += '<tr>'+
					                      '<td id="pos">'+posicion+'</td>'+
					                      '<td id="jug"><span id="teamcol">'+decodeURIComponent(NameTeam2)+'/</span>'+decodeURIComponent(NameP2)+'</td>'+
					                      '<td id="opo">'+ NickName2+' vs <span id="teamcol">'+NickName2+'</span></td>'+
					                      '<td id="salario">'+Math.ceil(PlayerPrice2)+'</td>'+
					                      '<td>'+
					                      	'<a  onclick=selectPlayer('+'"'+TeamId2+'","'+posicion+'","'+encodeURIComponent(NameTeam2.trim())+'","'+encodeURIComponent(NameP2.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+Math.ceil(PlayerPrice2)+'","'+encodeURIComponent(NickName2.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(PlayerPrice2)+'"); >'+
					                      		'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
					                      	'</a>'+
					                      '</td>'+
					                  '</tr>';*/
								//i++;

						}else if(device=='M'){ // Pinta pitcher para Movil
							player +='<a  onclick=selectPlayer('+'"'+PlayerId1+'","'+posicion+'","'+encodeURIComponent(NameTeam2.trim())+'","'+encodeURIComponent(NameP2.trim())+'","'+encodeURIComponent(NickName1.trim())+'","'+Math.ceil(PlayerPrice2)+'","'+encodeURIComponent(NickName2.trim())+'","'+encodeURIComponent(NickName1.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(PlayerPrice2)+'"); >'+
		                              '<div class="litableup">'+
		                                  '<div class="divpos">'+posicion+'</div>'+
		                                  '<div class="litabblock">'+
		                                      '<p class="divjug">'+decodeURIComponent(NameP2)+'</p>'+
		                                      '<p class="divopo">'+ NickName2+' vs <span id="teamcol">'+ NickName1+'</span></p>'+
		                                  '</div>'+
		                                  '<div class="divsala">'+Math.ceil(PlayerPrice2)+'</div>'+
		                                  '<div class="divmashov">'+
		                                  	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
		                                  '</div>'+
		                              '</div>'+
		                          '</a>';

		                    /* player +='<a  onclick=selectPlayer('+'"'+TeamId2+'","'+posicion+'","'+encodeURIComponent(NameTeam2.trim())+'","'+encodeURIComponent(NameP2.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+Math.ceil(PlayerPrice2)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(PlayerPrice2)+'"); >'+
		                              '<div class="litableup">'+
		                                  '<div class="divpos">'+posicion+'</div>'+
		                                  '<div class="litabblock">'+
		                                      '<p class="divjug"><span id="teamcol">'+NameTeam2.trim()+'/</span> '+NameP2.trim()+'</p>'+
		                                      '<p class="divopo">'+ NickName2+' vs <span id="teamcol">'+ NickName1+'</span></p>'+
		                                  '</div>'+
		                                  '<div class="divsala">'+Math.ceil(PlayerPrice2)+'</div>'+
		                                  '<div class="divmashov">'+

		                                  '<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
		                                  '</div>'+
		                              '</div>'+
		                          '</a>';*/

						}

						//j++;
					//}
				}

				// alert('NameTeam1: '+NameTeam1);
				// alert('StartDate: '+StartDate);
				// alert('TeamId1: '+TeamId1);
				// alert('PlayerId1: '+PlayerId1);
				// alert('NameP1: '+NameP1);
				// alert('NickName1: '+NickName1);
			}

			
			
		}

		//alert(elemento[0].PlayerNameTeam2);
		//alert(elemento[1].PlayerNameTeam2);
		//alert(elemento[2].PlayerNameTeam2);
		//alert(elemento[0].PlayerNameTeam1);
		//alert(elemento[1].PlayerNameTeam1);
		//alert(elemento[2].PlayerNameTeam1);
		//alert(elemento[indice].PlayerNameTeam2);
	});

	/*$(players).each(function(indice, elemento){
		//alert(elemento.TournamentId);
		// Incializo los valores
		NameTeam1	=	"NA";
		NameTeam2	=	"NA";
		StartDate	=	"0/00/0000 0:00:00 XX"; //2016-09-03 02:20:00.000
		TeamId1		=	"0";
		TeamId2		=	"0";
		PlayerId1	=	"0";
		NameP1		=	"NA";
		PlayerId2	=	"0";
		NameP2		=	"NA";
		NickName1	=	"NA";
		NickName2	=	"NA";
		PlayerPrice1	=	"0";
		PlayerPrice2	=	"0";
		

		// Verifico cada una de las variables
		if(elemento.NameTeam1!=""){
			NameTeam1 = elemento.NameTeam1;
		}

		if(elemento.NameTeam2!=""){
			NameTeam2 = elemento.NameTeam2;
		}

		if(elemento.StartDate!=""){
			StartDate = elemento.StartDate;
		}

		if(elemento.TeamId1!=""){
			TeamId1 = elemento.TeamId1;
		}

		if(elemento.TeamId2!=""){
			TeamId2 = elemento.TeamId2;
		}

		if(elemento.PlayerId1!=""){
			PlayerId1 = elemento.PlayerId1;
		}

		if(elemento.NameP1!=""){
			NameP1 = elemento.NameP1;
		}

		if(elemento.PlayerId2!=""){
			PlayerId2 = elemento.PlayerId2;
		}

		if(elemento.NameP2!=""){
			NameP2 = elemento.NameP2;
		}

		if(elemento.NickName1!=""){
			NickName1 = elemento.NickName1;
		}

		if(elemento.NickName2!=""){
			NickName2 = elemento.NickName2;
		}

		// Verifica si el pitcher del equipo 1 trae salario
		if(elemento.PlayerPrice1!=""){
			if(elemento.PlayerPrice1==0){ // Si salario es igual a cero se le asignan 25.000
				PlayerPrice1 = "25000";
			}else{
				PlayerPrice1 = elemento.PlayerPrice1;
			}
			
		}else{
			PlayerPrice1 = "25000"; // Si salario es igual a cero se le asignan 25.000
		}

		// Verifica si el pitcher del equipo 2 trae salario
		if(elemento.PlayerPrice2!=""){
			PlayerPrice2 = elemento.PlayerPrice2;
			if(elemento.PlayerPrice2==0){ // Si salario es igual a cero se le asignan 25.000
				PlayerPrice2 = "25000";
			}else{
				PlayerPrice2 = elemento.PlayerPrice2;
			}
		}else{
			PlayerPrice2 = "25000"; // Si salario es igual a cero se le asignan 25.000
		}

		agregar=true;
		tamano = existentes.length;
		//alert(tamano);
		
		for (i=0;i<=tamano;i++){ 
		   	if (existentes[i] == elemento.TeamId1){
		   		agregar = false;
		   		   	
			}
		}

		if (agregar){
	   		existentes.push(elemento.TeamId1);
		}	

		 
		if(agregar){

			posicion = "PA";
		
			fecha_juego = StartDate.split(" ");
			inicio = fecha_juego[1].split(":");

			if(fecha_juego[2] =='PM' || fecha_juego[2]=='pm'){
				adapt_hour = parseInt(inicio[0])+12;
			}

			if(adapt_hour == 24){
				adapt_hour = adapt_hour-12;
			}

			if(adapt_hour >= hora_input){

				if(device=='D'){ // Pinta pitcher para Desktop

		            player += '<tr>'+
			                      '<td id="pos">'+posicion+'</td>'+
			                      '<td id="jug"><span id="teamcol">'+decodeURIComponent(NameTeam1)+'/</span>'+decodeURIComponent(NameP1)+'</td>'+
			                      '<td id="opo">'+ NickName1+' vs <span id="teamcol">'+NickName2+'</span></td>'+
			                      '<td id="salario">'+Math.ceil(PlayerPrice1)+'</td>'+
			                      '<td>'+
			                      	'<a  onclick=selectPlayer('+'"'+TeamId1+'","'+posicion+'","'+encodeURIComponent(NameTeam1.trim())+'","'+encodeURIComponent(NameP1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+Math.ceil(PlayerPrice1)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(PlayerPrice1)+'"); >'+
			                      		'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
			                      	'</a>'+
			                      '</td>'+
			                  '</tr>';

			        player += '<tr>'+
			                      '<td id="pos">'+posicion+'</td>'+
			                      '<td id="jug"><span id="teamcol">'+decodeURIComponent(NameTeam2)+'/</span>'+decodeURIComponent(NameP2)+'</td>'+
			                      '<td id="opo">'+ NickName2+' vs <span id="teamcol">'+NickName1+'</span></td>'+
			                      '<td id="salario">'+Math.ceil(PlayerPrice2)+'</td>'+
			                      '<td>'+
			                      	'<a  onclick=selectPlayer('+'"'+TeamId2+'","'+posicion+'","'+encodeURIComponent(NameTeam2.trim())+'","'+encodeURIComponent(NameP2.trim())+'","'+encodeURIComponent(NickName1.trim())+'","'+Math.ceil(PlayerPrice2)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(PlayerPrice2)+'"); >'+
			                      		'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
			                      	'</a>'+
			                      '</td>'+
			                  '</tr>';
						//i++;

				}else if(device=='M'){ // Pinta pitcher para Movil

					player +='<a  onclick=selectPlayer('+'"'+TeamId1+'","'+posicion+'","'+encodeURIComponent(NameTeam1.trim())+'","'+encodeURIComponent(NameP1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+Math.ceil(PlayerPrice1)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(PlayerPrice1)+'"); >'+
                              '<div class="litableup">'+
                                  '<div class="divpos">'+posicion+'</div>'+
                                  '<div class="litabblock">'+
                                      '<p class="divjug"><span id="teamcol">'+decodeURIComponent(NameTeam1)+'/</span> '+decodeURIComponent(NameP1)+'</p>'+
                                      '<p class="divopo">'+ NickName1+' vs <span id="teamcol">'+ NickName2+'</span></p>'+
                                  '</div>'+
                                  '<div class="divsala">'+Math.ceil(PlayerPrice1)+'</div>'+
                                  '<div class="divmashov">'+
                                  	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
                                  '</div>'+
                              '</div>'+
                          '</a>';

                     player +='<a  onclick=selectPlayer('+'"'+TeamId2+'","'+posicion+'","'+encodeURIComponent(NameTeam2.trim())+'","'+encodeURIComponent(NameP2.trim())+'","'+encodeURIComponent(NickName1.trim())+'","'+Math.ceil(PlayerPrice2)+'","'+encodeURIComponent(NickName1.trim())+'","'+encodeURIComponent(NickName2.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(PlayerPrice2)+'"); >'+
                              '<div class="litableup">'+
                                  '<div class="divpos">'+posicion+'</div>'+
                                  '<div class="litabblock">'+
                                      '<p class="divjug"><span id="teamcol">'+NameTeam2.trim()+'/</span> '+NameP2.trim()+'</p>'+
                                      '<p class="divopo">'+ NickName2+' vs <span id="teamcol">'+ NickName1+'</span></p>'+
                                  '</div>'+
                                  '<div class="divsala">'+Math.ceil(PlayerPrice2)+'</div>'+
                                  '<div class="divmashov">'+

                                  '<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
                                  '</div>'+
                              '</div>'+
                          '</a>';

				}

				i++;
			}
		}
	});*/
	
	//alert(tab);
	
	// Identifico si es version Desktop o Movil
	if(tab=='POR'){ // Version Desktop
		//alert('player');
		header = '<table class="table table-striped2 table-hover2 tablelineup"><tbody>';
		footer ='</tbody></table>';
		player = header+player+footer;
		//alert(player);
		$('#PORD').html('');
		$('#PORD').append(player);
	}else if(tab=='PORM'){ // Version Movil
		//alert(player);
		$('#PORPM').html('');
		$('#PORPM').append(player);
	}
	
}

//
// Funcion que identifica si el espacio del jugador
// esta lleno.
//
function search_position(position,device){

	var select_position;
	var result = 0;
	//select_position_D = position+'ADD';
	select_position_D = 'player'+position+' #salario';
	select_position_M = 'player'+position+'M .divsala';
	//alert('en seach: '+position);
	//alert($('#playerPAM .litableup .litabblock').html());
	
	if(device=='D'){ // Version Desktop
		//alert('desktop');
		if(position == 'POR'){ // Selecciona Portero
			if(!$('#'+select_position_D).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el Portero antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'DEL'){ // Selecciona Delantero
			//alert('aqui');
			if(!$('#playerDEL #salario').is(':empty')  && (!$('#playerDEL2 #salario').is(':empty'))){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun Delantero antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'MED'){ // Selecciona los mediocampistas
			if(!$('#playerMED #salario').is(':empty') && !$('#playerMED2 #salario').is(':empty') && !$('#playerMED3 #salario').is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun Mediocampista antes de seleccionar otro !!');
				return result;
			}
		}

		/*if(position == 'DEF'){ // Selecciona Segunda Base
			if(!$('#'+select_position_D).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun Defensor antes de seleccionar otro !!');
				return result;
			}
		}*/

		if(position == 'DEF'){ // Selecciona Defensa
			if(!$('#playerDEF #salario').is(':empty') && !$('#playerDEF2 #salario').is(':empty') && !$('#playerDEF3 #salario').is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun Defensor antes de seleccionar otro !!');
				return result;
			}
		}

	
	}else if(device=='M'){ // Version Movil

		if(position == 'POR'){ // Selecciona Portero
			if(!$('#'+select_position_M).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el Arquero antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'DEL'){ // Selecciona Catcher
			
			if(!$('#playerDELM .divsala').is(':empty') && !$('#playerDEL2M .divsala').is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun Delantero antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'MED'){ // Selecciona Primera Base
			if(!$('#playerMEDM .divsala').is(':empty') && !$('#playerMED2M .divsala').is(':empty') && !$('#playerMED3M .divsala').is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun Mediocampista antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'DEF'){ // Selecciona Defensa
			if(!$('#playerDEFM .divsala').is(':empty') && !$('#playerDEF2M .divsala').is(':empty') && !$('#playerDEF3M .divsala').is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun Defensor antes de seleccionar otro !!');
				return result;
			}
		}

		
	}
	
	

	return result;
}

/*******************************************************
*   Función:     selectPlayer
*   Descripción: Funcion que permite armar el Lineup de
*				 un usuario.
*   Parametros de entrada: 
*				+idplayer: id del pelotero que viene del ws
				+position: posicion que tendra en el equipo
				+playerteam: nombre del equipo
				+playername: nombre del pelotero
				+op: equipo oponente
				+salary: costo del pelotero
				+vs1: nickname del equipo 1
				+vs2: nickname del equipo 2
				+ppj: puntos del pelotero
********************************************************/
function selectPlayer(idplayer,position,playerteam,playername,op,salary,vs1,vs2,ppj,device){
	// Variables locales
	var offield			=	"";
	var rest_salary 	=	"";
	var player 			= 	""; // Estructura del pelotero seleccionado
	//var compound_name 	= 	playerteam+'/'+playername; // Guarda el nombre con el equipo del pitcher
	var compound_name 	= 	playername; // Guarda el nombre con el equipo del pitcher
	var positionplayer; // Identifica la posicion donde se colocara la seleccion del usuario
	var position_value; // Guarda la posicion OF1/OF2/OF3 para gusrdarlo en la BD
	var result_update; // Devuelve 0 si la actualizacion del salario no se excede, 1 en caso contrario.
	var result_search; // Devuelve 0 si el pelotero no fue seleccionado, 1 en caso contrario
	//var sum_salary_rest = sum_salary(device);
	// Busco que no haya sido seleccionada la posicion
	//alert('select: '+position);
	result_search = search_position(position,device);
	var seleccionado = verificaPelotero(idplayer,position,device,salary); // Verifica si el pelotero fue seleccionado

	playername	=	decodeURIComponent(playername);
	op 			=	decodeURIComponent(op);
	salary 		=	decodeURIComponent(salary);
	vs1 		=	decodeURIComponent(vs1);
	vs2 		=	decodeURIComponent(vs2);
	
	//alert('entra');
	// Primero verificamos si el pelotero fue seleccionado
	if(seleccionado==true){
		alert("El Jugador ya fue seleccionado");
		$('#aprove').val('1');
		//return false;
	}
	// Busco que no haya sido seleccionada la posicion
	//result_search = search_position(position,device);
	//result_search = 0;
	//alert(position);
	if(result_search == 0 && seleccionado==false){

		// Llamo a la funcion que controla el salario minimo
		result_update = updateSalary(salary,position,device);
		//alert(result_update);
		if(result_update == 0){

			
			switch (position) {
			    case 'POR':
			    	if(device=='D'){
			    		positionplayer = 'playerPOR'; 
			    	}else if(device=='M'){
			    		positionplayer = 'playerPORM';
			    	}
			        
			        break;
			    case 'DEL':
			    	/*if(device=='D'){
			    		positionplayer = 'playerDEL';
			    	}else if(device=='M'){
			    		positionplayer = 'playerDELM';
			    	}*/

			    	if(device=='D'){ // Esta en Desktop
			    		if($('#playerDEL #jug').is(':empty')){
			    			
			    			positionplayer = 'playerDEL';
				    		position_value = 'DEL';

				    	}else if($('#playerDEL2 #jug').is(':empty')){
				    		
				    		positionplayer = 'playerDEL2';
				    		position_value = 'DEL2';

				    	}
			    	}else if(device=='M'){ // Esta en Movil

			    		if($('#playerDELM .litabblock').is(':empty')){
			    			//alert('off1');
			    			positionplayer = 'playerDELM';
				    		position_value = 'DEL';

				    	}else if($('#playerDEL2M .litabblock').is(':empty')){
				    		//alert('off2');
				    		positionplayer = 'playerDEL2M';
				    		position_value = 'DEL2';

				    	}
			    	}
			         
			        break;
			    case 'MED':
			        
			        /*if(device=='D'){
			    		positionplayer = 'playerMED';
			    	}else if(device=='M'){
			    		positionplayer = 'playerMEDM';
			    	}*/

			    	if(device=='D'){ // Esta en Desktop
			    		if($('#playerMED #jug').is(':empty')){
			    			
			    			positionplayer = 'playerMED';
				    		position_value = 'MED';

				    	}else if($('#playerMED2 #jug').is(':empty')){
				    		
				    		positionplayer = 'playerMED2';
				    		position_value = 'MED2';

				    	}else if($('#playerMED3 #jug').is(':empty')){
				    		
				    		positionplayer = 'playerMED3';
				    		position_value = 'MED3';

				    	}
			    	}else if(device=='M'){ // Esta en Movil

			    		if($('#playerMEDM .litabblock').is(':empty')){
			    			//alert('off1');
			    			positionplayer = 'playerMEDM';
				    		position_value = 'MED';

				    	}else if($('#playerMED2M .litabblock').is(':empty')){
				    		//alert('off2');
				    		positionplayer = 'playerMED2M';
				    		position_value = 'MED2';

				    	}else if($('#playerMED3M .litabblock').is(':empty')){
				    		//alert('off3');
				    		positionplayer = 'playerMED3M';
				    		position_value = 'MED3';

				    	}
			    	}
			        break;
			    case 'DEF':
			        
			        /*if(device=='D'){
			    		positionplayer = 'playerDEF';
			    	}else if(device=='M'){
			    		positionplayer = 'playerDEFM';
			    	}*/

			    	if(device=='D'){ // Esta en Desktop
			    		if($('#playerDEF #jug').is(':empty')){
			    			
			    			positionplayer = 'playerDEF';
				    		position_value = 'DEF';

				    	}else if($('#playerDEF2 #jug').is(':empty')){
				    		
				    		positionplayer = 'playerDEF2';
				    		position_value = 'DEF2';

				    	}else if($('#playerDEF3 #jug').is(':empty')){
				    		
				    		positionplayer = 'playerDEF3';
				    		position_value = 'DEF3';

				    	}
			    	}else if(device=='M'){ // Esta en Movil

			    		if($('#playerDEFM .litabblock').is(':empty')){
			    			//alert('off1');
			    			positionplayer = 'playerDEFM';
				    		position_value = 'DEF';

				    	}else if($('#playerDEF2M .litabblock').is(':empty')){
				    		//alert('off2');
				    		positionplayer = 'playerDEF2M';
				    		position_value = 'DEF2';

				    	}else if($('#playerDEF3M .litabblock').is(':empty')){
				    		//alert('off3');
				    		positionplayer = 'playerDEF3M';
				    		position_value = 'DEF3';

				    	}
			    	}

			        break;
			    
			}
			
			//alert('dispositivo: '+device);
			//alert('posicion: '+positionplayer);
		
			// Falta identificar si viene de Desktop o Movil
			$('#'+positionplayer).html(''); // Elimino el que esta pintado
			
			if(device=='D'){
				if(position=='POR'){
					player = '<td id="pos">'+position+'</td>'+
							//'<td id="jug"><span id="teamcol">'+decodeURIComponent(playerteam.trim())+'/</span>'+decodeURIComponent(playername.trim())+'</td>'+
							'<td id="jug">'+decodeURIComponent(playername.trim())+'</td>'+
			                '<td id="opo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2.trim())+'</span></td>'+
			                '<td id="salario">'+salary+'</td>'+
			                '<td>'+  //idplayer,position,playerteam,playername,op,salary,vs1,vs2,ppj
			                '<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"D"+'");returnPlayer(this,"'+position+'","'+"D"+'"); >'+
			                '<img src="../images/ico/menos.png" alt="menos" class="mashov">'+
			                '</a>'+
			                '</td>'+
			                '<input type="hidden" id="'+position+'ADD" name="'+position+'" value="'+position+'-'+idplayer+'-'+vs1+'-'+salary+'-'+ppj+'-'+decodeURIComponent(compound_name.trim())+'-'+vs2+'" style="color: #000">';
				}else{

					                                           
			      if(position=='DEL' || position=='MED' || position=='DEF'){
						player = '<td id="pos">'+position+'</td>'+
							'<td id="jug">'+decodeURIComponent(playername.trim())+'</td>'+
				            '<td id="opo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2)+'</span></td>'+
				            '<td id="salario">'+salary+'</td>'+
				            '<td>'+
				            '<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"D"+'");returnPlayer(this,"'+position_value+'","'+"D"+'"); >'+
				            '<img src="../images/ico/menos.png" alt="menos" class="mashov">'+
				            '</a>'+
				            '</td>'+
				            '<input type="hidden" id="'+position_value+'ADD" name="'+position_value+'" value="'+position_value+'-'+idplayer+'-'+vs1+'-'+salary+'-'+ppj+'-'+decodeURIComponent(playername)+'-'+vs2+'"  style="color: #000">';
			        }else{

			        	player = '<td id="pos">'+position+'</td>'+
							'<td id="jug">'+decodeURIComponent(playername.trim())+'</td>'+
				            '<td id="opo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2)+'</span></td>'+
				            '<td id="salario">'+salary+'</td>'+
				            '<td>'+
				            '<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"D"+'");returnPlayer(this,"'+position+'","'+"D"+'"); >'+
				            '<img src="../images/ico/menos.png" alt="menos" class="mashov">'+
				            '</a>'+
				            '</td>'+
				            '<input type="hidden" id="'+position+'ADD" name="'+position+'" value="'+position+'-'+idplayer+'-'+vs1+'-'+salary+'-'+ppj+'-'+decodeURIComponent(playername)+'-'+vs2+'"  style="color: #000">';
			            //1B-249-MIN-5500-0-David Ortiz                                             
			        }
					
				}

			}else if(device=='M'){
				//alert('en mobile position: ');
				//animate_tab();
				//setTimeout(cambiarClase1, 1000); 
				animate_tab_on();
				//alert(positionplayer);

				if(position=='POR'){
					
			        player = '<div class="litableup">'+
			        			'<div class="divpos">'+position+'</div>'+
                              '<div class="litabblock">'+
                                  //'<p class="divjug"><span id="teamcol">'+decodeURIComponent(playerteam.trim())+'/</span> '+decodeURIComponent(playername)+'</p>'+
                                  '<p class="divjug">'+decodeURIComponent(playername)+'</p>'+
                                  '<p class="divopo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2.trim())+'</span></p>'+
                              '</div>'+
                              '<div class="divsala">'+salary+'</div>'+
                              '<div class="divmashov">'+
                              	'<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"M"+'");returnPlayer(this,"'+position+'","'+"M"+'"); >'+
			                		'<img src="../images/ico/menos.png" alt="menos" class="mashov">'+
			                	'</a>'+
			                	'<input type="hidden" id="'+position+'ADD" name="'+position+'" value="'+position+'-'+idplayer+'-'+vs1+'-'+salary+'-'+ppj+'-'+decodeURIComponent(compound_name)+'-'+vs2+'" style="color: #000">';
                             	'</div>'        
                             '</div>';  
				}else{

					                                          
			        if(position=='DEL' || position=='MED' || position=='DEF'){

			        	player = '<div class="litableup">'+
			        			'<div class="divpos">'+position+'</div>'+
                              '<div class="litabblock">'+
                                  '<p class="divjug">'+decodeURIComponent(playername.trim())+'</p>'+
                                  '<p class="divopo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2.trim())+'</span></p>'+
                              '</div>'+
                              '<div class="divsala">'+salary+'</div>'+
                              '<div class="divmashov">'+
                              	'<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1)+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"M"+'");returnPlayer(this,"'+position_value+'","'+"M"+'"); >'+
			                		'<img src="../images/ico/menos.png" alt="menos" class="mashov">'+
			                	'</a>'+
			                	'<input type="hidden" id="'+position_value+'ADD" name="'+position_value+'" value="'+position_value+'-'+idplayer+'-'+vs1+'-'+salary+'-'+ppj+'-'+decodeURIComponent(playername)+'-'+vs2+'" style="color: #000">';
                             	'</div>'        
                             '</div>';   

			        }else{

			        	player = '<div class="litableup">'+
			        			'<div class="divpos">'+position+'</div>'+
                              '<div class="litabblock">'+
                                  '<p class="divjug">'+decodeURIComponent(playername.trim())+'</p>'+
                                  '<p class="divopo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2.trim())+'</span></p>'+
                              '</div>'+
                              '<div class="divsala">'+salary+'</div>'+
                              '<div class="divmashov">'+
                              	'<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1)+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"M"+'");returnPlayer(this,"'+position+'","'+"M"+'"); >'+
			                		'<img src="../images/ico/menos.png" alt="menos" class="mashov">'+
			                	'</a>'+
			                	'<input type="hidden" id="'+position+'ADD" name="'+position+'" value="'+position+'-'+idplayer+'-'+vs1+'-'+salary+'-'+ppj+'-'+decodeURIComponent(playername)+'-'+vs2+'" style="color: #000">';
                             	'</div>'        
                             '</div>';                                         
			        }
					
				}

			}

			$('#aprove').val('0');
			$('#'+positionplayer).append(player); // Agrego el nuevo seleccionado
		}
	}
}

// borra un pelotero de la columna de peloteros seleccionados y lo regresa
// al grupo de seleccionables 
function deletePlayer(idplayer,position,playerteam,playername,op,salary,vs1,vs2,ppj,device){
	
	var rest_salary; // Obtiene el salario actual
	var player=''; // jugador que va a devolver al grupo por seleccionar
	var header; // inicio de tabla de peloteros
	var footer; // Fin de tabla de peloteros

	//rest_salary = $('#salaryrest').val();
	//alert(device);
	//alert(position);

	if(device=='D'){ 		// Version Desktop

		rest_salary = 	$('#salaryrest').val();

	}else if(device=='M'){  // Version Movil

		rest_salary = 	$('#salaryrestM').val();

	}

	rest_salary = parseInt(rest_salary) + parseInt(salary); // Sumo al salario restante el valor del pelotero que estoy eliminando.

	header = '<table class="table table-striped2 table-hover2 tablelineup"><tbody>';
	footer ='</tbody></table>';
	
	if(device=='D'){
		if(position=='POR'){
			player += '<tr>'+
			              '<td id="pos">'+position+'</td>'+
			              '<td id="jug">'+decodeURIComponent(playername.trim())+'</td>'+
			              '<td id="opo">'+ vs1+' vs <span id="teamcol">'+vs2+'</span></td>'+
			              '<td id="salario">'+Math.ceil(salary)+'</td>'+
			              '<td>'+
			              	'<a  onclick=selectPlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(op.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(salary)+'"); >'+
			              		'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
			              	'</a>'+
			              '</td>'+
			          '</tr>';
			
			player = header+player+footer;
			
			$('#PORD').prepend(player); // Incorporo al pitcher al grupo de lanzadores

		}else{

			player +='<tr>'+
	          '<td id="pos">'+position+'</td>'+
	          '<td id="jug">'+decodeURIComponent(playername.trim())+'</td>'+
	          '<td id="opo">'+vs1+' vs <span id="teamcol">'+vs2+'</span></td>'+
	          '<td id="salario">'+Math.ceil(salary)+'</td>'+
	          '<td>'+
	          '<a  onclick=selectPlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(op.trim())+'","'+Math.ceil(salary.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(salary)+'"); >'+
	          '<img src="../images/ico/mas.png" class="mashov" alt="mas">'+
	          '</a></td>'+
	      '</tr>';


	      	listplayers = blockplayer(position);
			player = header+player+footer;
			$('#'+listplayers).prepend(player);

		}
	}else if(device=='M'){ // Version Movil

		if(position=='POR'){
			
			player +='<a  onclick=selectPlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(op.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(salary)+'"); >'+
                          '<div class="litableup">'+
                              '<div class="divpos">'+position+'</div>'+
                              '<div class="litabblock">'+
                                  '<p class="divjug"><span id="teamcol">'+decodeURIComponent(playername.trim())+'</p>'+
                                  '<p class="divopo">'+ vs1+' vs <span id="teamcol">'+ vs2+'</span></p>'+
                              '</div>'+
                              '<div class="divsala">'+Math.ceil(salary)+'</div>'+
                              '<div class="divmashov">'+
                              	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
                              '</div>'+
                          '</div>'+
                      '</a>';
			//player = header+player+footer;
			
			$('#PORPM').prepend(player); // Incorporo al pitcher al grupo de lanzadores

		}else{

			//alert('entra en position');
	      player +='<a  onclick=selectPlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(op.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(salary)+'"); >'+
                      '<div class="litableup">'+
                          '<div class="divpos">'+position+'</div>'+
                          '<div class="litabblock">'+
                              '<p class="divjug">'+decodeURIComponent(playername.trim())+'</p>'+
                              '<p class="divopo">'+ vs1+' vs <span id="teamcol">'+ vs2+'</span></p>'+
                          '</div>'+
                          '<div class="divsala">'+Math.ceil(salary)+'</div>'+
                          '<div class="divmashov">'+
                          	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
                          '</div>'+
                      '</div>'+
                  '</a>';

	      	listplayers = blockplayer(position+'M');
	      	//alert(listplayers);
			//player = header+player+footer;
			$('#'+listplayers).prepend(player);

		}
	}

	//$('#salaryrest').val(rest_salary); // Muestro el salario restante actualizado

	if(device=='D'){

		$('#salaryrest').val(rest_salary);		 // Muestro el salario restante actualizado

	}else if(device=='M'){

		$('#salaryrestM').val(rest_salary);		 // Muestro el salario restante actualizado
		$('#salaryrestlabel').text(rest_salary); // Muestro el salario restante actualizado

	}

	// Borramos del arreglo al pelotero
	popPlayer(idplayer,position);
}

// Actaliza el salario restante
function updateSalary(salary,position,device){
	
	var rest_salary; // Obtiene el salario actual con la suma de todos los peloteros seleccionados.
	var player_salary = 0; // Obtiene el salario del pelotero seleccionado.
	var data; // Obtiene los datos completos del pelotero seleccionado.
	var total_salary;
	var result_update = 0;
	//var salario_players; // Obtiene el salario maximo de la BD

	//salario_players = $('#salario_players').val();

	//alert(salario_players);

	if(device=='D'){
		rest_salary = 	$('#salaryrest').val();
	}else if(device=='M'){
		rest_salary = 	$('#salaryrestM').val();
	}
	
	// Sumo el salario de cada uno de los peloteros para verificar que no exceda el total permitido
	//if($('#PAADD').val()!=undefined){ // La posicion de PA ya tenia la posicion seleccionada
	if(device=='D'){
		//alert($('#playerPOR #jug').is(':empty'));
		if(!$('#playerPOR #jug').is(':empty')){
			data = $('#PORADD').val();
			//alert('entra playerPOR');
			//alert($('#PAADD').val())
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#CADD').val()!=undefined){ // La posicion de C ya tenia la posicion seleccionada
		if(!$('#playerDEL #jug').is(':empty')){
			//alert('entra playerC');
			data = $('#DELADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
				
		}

		//if($('#1BADD').val()!=undefined){ // La posicion de 1B ya tenia la posicion seleccionada
		if(!$('#playerMED #jug').is(':empty')){
			//alert('entra player1B');
			data = $('#MEDADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#2BADD').val()!=undefined){ // La posicion de 2B ya tenia la posicion seleccionada
		if(!$('#playerDEF #jug').is(':empty')){
			//alert('entra player2B');
			data = $('#DEFADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

	}

	if(device=='M'){
		//alert($('#playerPAM #divjug').is(':empty'));
		//alert($('#playerPAM .divsala').val());
		//alert(!$('#playerPAM .divsala').is(':empty'));
		if(!$('#playerPORM .divsala').is(':empty') || $('#playerPORM .divsala').val()!=''){
			//alert('entra playerPORM');
			data = $('#PORADD').val();
			//alert('entra aqui');
			//alert($('#PAADD').val())
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#CADD').val()!=undefined){ // La posicion de C ya tenia la posicion seleccionada
		//if($('#playerCM .litabblock').val()!=undefined){
		if(!$('#playerDELM .divsala').is(':empty') || $('#playerDELM .divsala').val()!=''){
			//alert('entra playerCM');
			data = $('#DELADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
				
		}

		//if($('#1BADD').val()!=undefined){ // La posicion de 1B ya tenia la posicion seleccionada
		//if($('#player1BM .litabblock').val()!=undefined){
		if(!$('#playerMEDM .divsala').is(':empty') || $('#playerMEDM .divsala').val()!=''){
			//alert('entra player1BM');
			data = $('#MEDADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#2BADD').val()!=undefined){ // La posicion de 2B ya tenia la posicion seleccionada
		//if($('#player2BM .litabblock').val()!=undefined){
		if(!$('#playerDEFM .divsala').is(':empty') || $('#playerDEFM .divsala').val()!=''){
			//alert('entra player2BM');
			data = $('#DEFADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		
	}

	//alert('player_salary: '+player_salary);
	//alert('salary: '+salary);
	total_salary = parseInt(player_salary) + parseInt(salary);
	//alert('player_salary: '+player_salary);
	//alert('salary: '+salary);
	//alert('total_salary: '+total_salary);
	if(parseInt(total_salary) > parseInt(salario_players)){
		//alert('primero');

		result_update = 1;
		alert("Usted ha superado el total del Salario");

	}else if(parseInt(player_salary) > parseInt(salario_players)){
		//alert('segundo');
		result_update = 1;
		alert("Usted ha superado el total del Salario");

	}else{

		rest_salary = parseInt(rest_salary) - parseInt(salary); // Resto del Salario anterior.
		
		if(device=='D'){
			$('#salaryrest').val(rest_salary);
		}else if(device=='M'){
			$('#salaryrestM').val(rest_salary);
			$('#salaryrestlabel').text(rest_salary);
		}
		
	}

	return result_update;
}

//  Devuelve el salario del pelotero.
function getSalary(data){
	//alert('getSalary: '+data);
	var result_salary 	= 0; // Guarda el salario resultante
	
	data  				= data.split("-"); // Separo la informacion del pelotero que viene en este formato: PA-33-CHC-27400-0-Cachorros/J. Arrieta
	result_salary 		= data[3];

	return result_salary;

}

// Suma el salario de los peloteros seleccionados para verificar si lo 
// elimina o no de la columna.
function sum_salary(device,salary){
	
	var rest_salary; // Obtiene el salario actual con la suma de todos los peloteros seleccionados.
	var player_salary = 0; // Obtiene el salario del pelotero seleccionado.
	var data; // Obtiene los datos completos del pelotero seleccionado.
	var total_salary;
	var result_salary = 0;
	var salario_players; // Obtiene el salario maximo de la BD

	salario_players = $('#salario_players').val(); 

	//alert(salario_players);

	if(device=='D'){
		rest_salary = 	$('#salaryrest').val();
	}else if(device=='M'){
		rest_salary = 	$('#salaryrestM').val();
	}
	
	//alert(rest_salary);
	// Sumo el salario de cada uno de los peloteros para verificar que no exceda el total permitido
	if($('#PORADD').val()!=undefined){ // La posicion de PA ya tenia la posicion seleccionada
		//alert('sum salary entra PORADD');
		data = $('#PORADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#DELADD').val()!=undefined){ // La posicion de C ya tenia la posicion seleccionada
		//alert('entra CADD');
		data = $('#DELADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
	}

	if($('#MEDADD').val()!=undefined){ // La posicion de 1B ya tenia la posicion seleccionada
		//alert('entra 1BADD');
		data = $('#MEDADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#DEFADD').val()!=undefined){ // La posicion de 2B ya tenia la posicion seleccionada
		//alert('entra 2BADD');
		data = $('#DEFADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}


	//alert('player salary: '+player_salary);
	//alert('salary: '+salary);
	total_salary = parseInt(player_salary) + parseInt(salary);
	//alert('total salary: '+total_salary);
	if(parseInt(total_salary) > parseInt(salario_players)){
		
		result_salary = 1;
		//alert("Usted ha superado el total del Salario");

	}else if(parseInt(total_salary) < 0){

		result_salary = 1;

	}else if(parseInt(player_salary) > parseInt(salario_players)){
		
		result_salary = 1;
		//alert("Usted ha superado el total del Salario");

	}

	//alert('salario_players: '+salario_players);
	//alert('total salary: '+total_salary);
	//alert(result_salary);

	return result_salary;
}

// borrar de la columna de la izquierda al que seleccione
//
function deletefile(valor,device,salary){
	//alert('entra despues');
	//alert($('#aprove').val());

	//alert('salaryrest: '+$('#salaryrest').val());
	//alert('salary: '+salary);
	//alert('aprove: '+$('#aprove').val());
	var approve_delete; // Valor para indicar si se borra un pelotero de la columna izquierda
	
	var delete_row; // Primer Valor que indica si se borra o no de la columna de la izquierda.

	delete_row = sum_salary(device,salary);

	//alert(delete_row);
	if(delete_row==0){
		if(device=='D'){
			approve_delete = $('#aprove').val();

			if(approve_delete==0){
				$(valor).closest('tr').remove();
			}
		}else if(device=='M'){
			approve_delete = $('#aprove').val();

			if(approve_delete==0){
				$(valor).closest('a').remove();
			}
		}
	
	}
}

// Borra todos los datos de la columna de la derecha un pelotero
function returnPlayer(valor,position,device){
	
	var player;
	var restore_position;

	//alert(position);
	if(device=='D'){ // Version Desktop

		restore_position = 'player'+position;

		$('#'+restore_position).closest('td').remove();

		/*if(position=='OF1' || position=='OF2'|| position=='OF3'){
			position = 'OF';
		}*/

		if(position=='DEL' || position=='DEL2'){
			position = 'DEL';
		}else if(position=='MED' || position=='MED2' || position=='MED3'){
			position = 'MED';
		}else if(position=='DEF' || position=='DEF2' || position=='DEF3'){
			position = 'DEF';
		}

		player='<td id="pos">'+position+'</td>'+
	              '<td id="jug"></td>'+
	              '<td id="opo"></td>'+
	              '<td id="salario"></td>'+
	              '<td><a href=""></a>';

	}else if(device=='M'){
		//alert(position);

		restore_position = 'player'+position+'M';
		//alert(restore_position);
		//alert(restore_position);
		$('#'+restore_position).closest('.litableup div').remove();

		/*if(position=='OF1' || position=='OF2'|| position=='OF3'){
			position = 'OF';
		}*/

		if(position=='DEL' || position=='DEL2'){
			position = 'DEL';
		}else if(position=='MED' || position=='MED2' || position=='MED3'){
			position = 'MED';
		}else if(position=='DEF' || position=='DEF2' || position=='DEF3'){
			position = 'DEF';
		}

		/*player='<td id="pos">'+position+'</td>'+
	              '<td id="jug"></td>'+
	              '<td id="opo"></td>'+
	              '<td id="salario"></td>'+
	              '<td><a href=""></a>';*/

	    player = '<div class="divpos">'+position+'</div>'+
                  '<div class="litabblock"></div>'+
                  '<div class="divsala"></div>'+
                  '<div class="divmashov"></div>';
	}
	
	

	$('#'+restore_position).html('');
	$('#'+restore_position).append(player); // Agrego el nuevo seleccionado

}

/*
*	Funcion para eliminar un pelotero seleccionado previamente.
*/
function popPlayer(idplayer,position){
	
	//var pos = existentes.indexOf(idplayer);
	//existentes.splice( pos, 1 );

	/*
			var catcher 	= '';
var primera 	= '';
var segunda 	= '';
var tercera 	= '';
var shortstop 	= '';
var offfield 	= '';

	*/

	//alert('idplayer: '+idplayer);
	//alert('picher: '+pitcher);
	//alert('position: '+position);
	//var aprove = $('#aprove').val();
	if(position=='POR'){
		if(portero==idplayer){
			portero='';
		}
	}

	if(position=='DEL'){
		if(delantero==idplayer){
			delantero='';
		}
	}

	if(position=='MED'){
		if(mediocampista==idplayer){
			mediocampista='';
		}
	}

	if(position=='DEF'){
		if(defensor==idplayer){
			defensor='';
		}
	}

	

}

/*
*	Funcion para verificar si un pelotero ha sido seleccionado.
*   Parametros:
*   			idplayer: id del jugador
*				position: posicion en la que juega
*				device:   dispositivo
*				salary:   salario del jugador
*/
function verificaPelotero(idplayer,position,device,salary){
	var respuesta = false;
	var sum_salary_rest = sum_salary(device,salary);
	

	var approve = $('#aprove').val();

	// Defensa
	var DEFADD; // Obtengo los valores DEF para el caso de editar
	var DEF2ADD; // Obtengo los valores DEF2 para el caso de editar
	var DEF3ADD; // Obtengo los valores DEF3 para el caso de editar
	// Mediocampistas
	var MEDADD; // Obtengo los valores DEF para el caso de editar
	var MED2ADD; // Obtengo los valores MED2 para el caso de editar
	var MED3ADD; // Obtengo los valores MED3 para el caso de editar
	// Delanteros
	var DELADD; // Obtengo los valores DEL para el caso de editar
	var DEL2ADD; // Obtengo los valores DEL2 para el caso de editar
	
	if(sum_salary_rest==0 && approve==0){

		if(position=='POR'){
			if(portero==idplayer){
				respuesta = true;
			}else{
				portero = idplayer;
			}
			
		}
		
		if(position=='DEL'){
			/*if(delantero==idplayer){
				respuesta = true;
			}else{
				delantero = idplayer;
			}*/

			if(delantero=='' && delantero_1==''){
				delantero = idplayer;
			}else if(delantero!='' && delantero_1==''){
				if(delantero==idplayer){
					respuesta = true;
				}else{
					delantero_1 = idplayer;
				}
				
			}else if(delantero=='' && delantero_1!=''){
				if(delantero_1==idplayer){
					respuesta = true;
				}else{
					delantero = idplayer;
				}
				
			}

			// Para los casos de editar
			if($('#DELADD').val()!=undefined){
				//alert('no es vacio');
				DELADD = $('#DELADD').val();
				//alert('DELADD: '+DELADD);
				DELADD = DELADD.split("-");
				//alert('DELADD: '+DELADD[1]);
				//alert('idplayer: '+idplayer);
				if(DELADD[1]==idplayer){
					respuesta = true;
				}else{
					if(delantero==''){
						delantero = idplayer;
					}else if(delantero_1==''){
						delantero_1 = idplayer;
					}
					
				}
			}

			if($('#DEL2ADD').val()!=undefined){
				//alert('no es vacio');
				DEL2ADD = $('#DEL2ADD').val();
				//alert('DEL2ADD: '+DEL2ADD);
				DEL2ADD = DEL2ADD.split("-");
				//alert('DEL2ADD: '+DEL2ADD[1]);
				//alert('idplayer: '+idplayer);

				if(DEL2ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(delantero==''){
						delantero = idplayer;
					}else if(delantero_1==''){
						delantero_1 = idplayer;
					}
					
				}
			}
			
		}

		if(position=='MED'){
			/*if(mediocampista==idplayer){
				respuesta = true;
			}else{
				mediocampista = idplayer;
			}*/

			if(mediocampista=='' && mediocampista_1=='' && mediocampista_2==''){
				mediocampista = idplayer;
			}else if(mediocampista!='' && mediocampista_1=='' && mediocampista_2==''){
				if(mediocampista==idplayer){
					respuesta = true;
				}else{
					mediocampista_1 = idplayer;
				}
				
			}else if(mediocampista!='' && mediocampista_1!='' && mediocampista_2==''){
				if(mediocampista==idplayer || mediocampista_1==idplayer){
					respuesta = true;
				}else{
					mediocampista_2 = idplayer;
				}
				
			}else if(mediocampista!='' && mediocampista_1=='' && mediocampista_2!=''){
				if(mediocampista==idplayer || mediocampista_2==idplayer){
					respuesta = true;
				}else{
					mediocampista_1 = idplayer;
				}
				
			}else if(mediocampista=='' && mediocampista_1!='' && mediocampista_2!=''){
				if(mediocampista_1==idplayer || mediocampista_2==idplayer){
					respuesta = true;
				}else{
					mediocampista = idplayer;
				}
				
			}

			// Casos en los que se trabaja con el editar 

			// ----  Mediocampista  --- //
			if($('#MEDADD').val()!=undefined){
				//alert('no es vacio');
				MEDADD = $('#MEDADD').val();
				//alert('MEDADD: '+MEDADD);
				MEDADD = MEDADD.split("-");
				//alert('MEDADD: '+MEDADD[1]);
				//alert('idplayer: '+idplayer);
				if(MEDADD[1]==idplayer){
					respuesta = true;
				}else{
					if(mediocampista_1==''){
						mediocampista_1 = idplayer;
					}else if(mediocampista_2==''){
						mediocampista_2 = idplayer;
					}
					
				}
			}

			if($('#MED2ADD').val()!=undefined){
				//alert('no es vacio');
				MED2ADD = $('#MED2ADD').val();
				//alert('MED2ADD: '+MED2ADD);
				MED2ADD = MED2ADD.split("-");
				//alert('MED2ADD: '+MED2ADD[1]);
				//alert('idplayer: '+idplayer);

				if(MED2ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(mediocampista==''){
						mediocampista = idplayer;
					}else if(mediocampista_2==''){
						mediocampista_2 = idplayer;
					}
					
				}
			}

			if($('#MED3ADD').val()!=undefined){
				//alert('no es vacio');
				MED3ADD = $('#MED3ADD').val();
				//alert('MED3ADD: '+MED3ADD);
				MED3ADD = MED3ADD.split("-");
				//alert(MED3ADD[1]);
				//alert('MED3ADD: '+MED3ADD[1]);
				//alert('idplayer: '+idplayer);
				if(MED3ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(mediocampista==''){
						mediocampista = idplayer;
					}else if(mediocampista_1==''){
						mediocampista_1 = idplayer;
					}
					
				}
			}
			
		}

		if(position=='DEF'){
			/*if(defensor==idplayer){
				respuesta = true;
			}else{
				defensor = idplayer;
			}*/
			//alert(idplayer);
			
			if(defensor=='' && defensor_1=='' && defensor_2==''){
				//alert('todos vacios');
				defensor = idplayer;
			}else if(defensor!='' && defensor_1=='' && defensor_2==''){
				//alert('dos y tres vacios');
				if(defensor==idplayer){
					respuesta = true;
				}else{
					defensor_1 = idplayer;
				}
				
			}else if(defensor!='' && defensor_1!='' && defensor_2==''){
				//alert('tres vacios');
				if(defensor==idplayer || defensor_1==idplayer){
					respuesta = true;
				}else{
					defensor_2 = idplayer;
				}
				
			}else if(defensor!='' && defensor_1=='' && defensor_2!=''){
				//alert('dos vacios');
				if(defensor==idplayer || defensor_2==idplayer){
					respuesta = true;
				}else{
					defensor_1 = idplayer;
				}
				
			}else if(defensor=='' && defensor_1!='' && defensor_2!=''){
				//alert('uno vacios');
				if(defensor_1==idplayer || defensor_2==idplayer){
					respuesta = true;
				}else{
					defensor = idplayer;
				}
				
			}

			// Casos en los que se trabaja con el editar 

			// ----  Defensa  --- //
			if($('#DEFADD').val()!=undefined){
				//alert('no es vacio');
				DEFADD = $('#DEFADD').val();
				//alert('DEFADD: '+DEFADD);
				DEFADD = DEFADD.split("-");
				//alert('DEFADD: '+DEFADD[1]);
				//alert('idplayer: '+idplayer);
				if(DEFADD[1]==idplayer){
					respuesta = true;
				}else{
					if(defensor_1==''){
						defensor_1 = idplayer;
					}else if(defensor_2==''){
						defensor_2 = idplayer;
					}
					
				}
			}

			if($('#DEF2ADD').val()!=undefined){
				//alert('no es vacio');
				DEF2ADD = $('#DEF2ADD').val();
				//alert('DEF2ADD: '+DEF2ADD);
				DEF2ADD = DEF2ADD.split("-");
				//alert('DEF2ADD: '+DEF2ADD[1]);
				//alert('idplayer: '+idplayer);

				if(DEF2ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(defensor==''){
						defensor = idplayer;
					}else if(defensor_2==''){
						defensor_2 = idplayer;
					}
					
				}
			}

			if($('#DEF3ADD').val()!=undefined){
				//alert('no es vacio');
				DEF3ADD = $('#DEF3ADD').val();
				//alert('DEF3ADD: '+DEF3ADD);
				DEF3ADD = DEF3ADD.split("-");
				//alert(DEF3ADD[1]);
				//alert('DEF3ADD: '+DEF3ADD[1]);
				//alert('idplayer: '+idplayer);
				if(DEF3ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(defensor==''){
						defensor = idplayer;
					}else if(defensor_1==''){
						defensor_1 = idplayer;
					}
					
				}
			}
		}
	}else{
		// Casos en los que se trabaja con el editar 

		// ----  Defensa  --- //
		if($('#DEFADD').val()!=undefined){
			//alert('no es vacio');
			DEFADD = $('#DEFADD').val();
			//alert('DEFADD: '+DEFADD);
			DEFADD = DEFADD.split("-");
			//alert('DEFADD: '+DEFADD[1]);
			//alert('idplayer: '+idplayer);
			if(DEFADD[1]==idplayer){
				respuesta = true;
			}else{
				if(defensor_1==''){
					defensor_1 = idplayer;
				}else if(defensor_2==''){
					defensor_2 = idplayer;
				}
				
			}
		}

		if($('#DEF2ADD').val()!=undefined){
			//alert('no es vacio');
			DEF2ADD = $('#DEF2ADD').val();
			//alert('DEF2ADD: '+DEF2ADD);
			DEF2ADD = DEF2ADD.split("-");
			//alert('DEF2ADD: '+DEF2ADD[1]);
			//alert('idplayer: '+idplayer);

			if(DEF2ADD[1]==idplayer){
				respuesta = true;
			}else{
				if(defensor==''){
					defensor = idplayer;
				}else if(defensor_2==''){
					defensor_2 = idplayer;
				}
				
			}
		}

		if($('#DEF3ADD').val()!=undefined){
			//alert('no es vacio');
			DEF3ADD = $('#DEF3ADD').val();
			//alert('DEF3ADD: '+DEF3ADD);
			DEF3ADD = DEF3ADD.split("-");
			//alert(DEF3ADD[1]);
			//alert('DEF3ADD: '+DEF3ADD[1]);
			//alert('idplayer: '+idplayer);
			if(DEF3ADD[1]==idplayer){
				respuesta = true;
			}else{
				if(defensor==''){
					defensor = idplayer;
				}else if(defensor_1==''){
					defensor_1 = idplayer;
				}
				
			}
		}

		// ----  Mediocampista  --- //
		if($('#MEDADD').val()!=undefined){
			//alert('no es vacio');
			MEDADD = $('#MEDADD').val();
			//alert('MEDADD: '+MEDADD);
			MEDADD = MEDADD.split("-");
			//alert('MEDADD: '+MEDADD[1]);
			//alert('idplayer: '+idplayer);
			if(MEDADD[1]==idplayer){
				respuesta = true;
			}else{
				if(mediocampista_1==''){
					mediocampista_1 = idplayer;
				}else if(mediocampista_2==''){
					mediocampista_2 = idplayer;
				}
				
			}
		}

		if($('#MED2ADD').val()!=undefined){
			//alert('no es vacio');
			MED2ADD = $('#MED2ADD').val();
			//alert('MED2ADD: '+MED2ADD);
			MED2ADD = MED2ADD.split("-");
			//alert('MED2ADD: '+MED2ADD[1]);
			//alert('idplayer: '+idplayer);

			if(MED2ADD[1]==idplayer){
				respuesta = true;
			}else{
				if(mediocampista==''){
					mediocampista = idplayer;
				}else if(mediocampista_2==''){
					mediocampista_2 = idplayer;
				}
				
			}
		}

		if($('#MED3ADD').val()!=undefined){
			//alert('no es vacio');
			MED3ADD = $('#MED3ADD').val();
			//alert('MED3ADD: '+MED3ADD);
			MED3ADD = MED3ADD.split("-");
			//alert(MED3ADD[1]);
			//alert('MED3ADD: '+MED3ADD[1]);
			//alert('idplayer: '+idplayer);
			if(MED3ADD[1]==idplayer){
				respuesta = true;
			}else{
				if(mediocampista==''){
					mediocampista = idplayer;
				}else if(mediocampista_1==''){
					mediocampista_1 = idplayer;
				}
				
			}
		}

		// ----  Delantero  --- //
		if($('#DELADD').val()!=undefined){
			//alert('no es vacio');
			DELADD = $('#DELADD').val();
			//alert('DELADD: '+DELADD);
			DELADD = DELADD.split("-");
			//alert('DELADD: '+DELADD[1]);
			//alert('idplayer: '+idplayer);
			if(DELADD[1]==idplayer){
				respuesta = true;
			}else{
				if(delantero==''){
					delantero = idplayer;
				}else if(delantero_1==''){
					delantero_1 = idplayer;
				}
				
			}
		}

		if($('#DEL2ADD').val()!=undefined){
			//alert('no es vacio');
			DEL2ADD = $('#DEL2ADD').val();
			//alert('DEL2ADD: '+DEL2ADD);
			DEL2ADD = DEL2ADD.split("-");
			//alert('DEL2ADD: '+DEL2ADD[1]);
			//alert('idplayer: '+idplayer);

			if(DEL2ADD[1]==idplayer){
				respuesta = true;
			}else{
				if(delantero==''){
					delantero = idplayer;
				}else if(delantero_1==''){
					delantero_1 = idplayer;
				}
				
			}
		}
	}
		
	
	//alert('respuesta: '+respuesta);
	return respuesta;
}

/*
*	Funcion para cambiar background de tab en movil cuando se selecciona un pelotero
*/
function animate_tab_on(){

	$("#elemento").animate({
	   
	   'background-color': '#FCD343',
	   'color':'#000'
	});


	setTimeout(animate_tab_off, 1000);
}

/*
*	Funcion que devuelve cambios del background de tab en movil cuando se selecciona un pelotero
*/
function animate_tab_off(){

	$("#elemento").animate({
	   
	   'background-color': '#000000',
	   'color':'#a5a5a5'
	});

}
