// Arreglos para Validaciones 
var existentes 		= [];	// Guarda los peloteros para verificar no esten repetidos
var player_selected = [];  	// Guarda los peloteros seleccionados por el usuario
var pitcher 	= '';
var catcher 	= '';
var primera 	= '';
var segunda 	= '';
var tercera 	= ''; 
var shortstop 	= ''; 
var offfield_1 	= '';
var offfield_2 	= '';
var offfield_3 	= '';
var salario_players = $('#salario_players').val(); // Obtiene el salario maximo de la BD


$(document).ready(function(){
	// Click en Tab de version Desktop
 	$('.nav-tabs a').on('click',function(){
		var select_tab = $(this).attr('id'); // Pestania seleccionada

	   	if(select_tab=='PA'){ 				// Todos los Pitchers

	      	existentes.length = 0;
	      	webservice(1,select_tab,'D');
	      	//return false;

	   	}else if(select_tab=='C'){			// Todos los Catchers

	      	webservice(2,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='1B'){ 		// Todos los Primera Base

	      	webservice(3,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='2B'){		// Todos los Segunda Base

	      	webservice(4,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='3B'){		// Todos los Tercera Base

	      	webservice(5,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='OF'){		// Todos los Off Fielder

	      	webservice(7,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='SS'){		// Todos los Short Stop

	      	webservice(6,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='BATS'){ 		// Todos los Bateadores

	      	webservice(11,select_tab,'D');
	      	//return false;

	    }else if(select_tab=='tabALL'){ 	// Todos los peloteros

	      	webservice(12,select_tab,'D');
	      	//return false;

      	}
	});

	// Click en Tab de version Movil
 	$('.restab .tab-linecreate a').on('click',function(){
		var select_tab = $(this).attr('id'); // Pestania seleccionada
	   	//alert('movil: '+select_tab);
	   	if(select_tab=='PAM'){ 				// Todos los Pitchers

	      	existentes.length = 0;
	      	webservice(1,select_tab,'M');
	      	//return false;

	   	}else if(select_tab=='CM'){			// Todos los Catchers

	      	webservice(2,select_tab,'M');
	      	//return false;

	    }else if(select_tab=='1BM'){ 		// Todos los Primera Base

	      	webservice(3,select_tab,'M');
	      	//return false;

	    }else if(select_tab=='2BM'){		// Todos los Segunda Base

	      	webservice(4,select_tab,'M');
	      	//return false;

	    }else if(select_tab=='3BM'){		// Todos los Tercera Base

	      	webservice(5,select_tab,'M');
	      	//return false;

	    }else if(select_tab=='OFM'){		// Todos los Off Fielder

	      	webservice(7,select_tab,'M');
	      	//return false;

	    }else if(select_tab=='SSM'){		// Todos los Short Stop

	      	webservice(6,select_tab,'M');
	      	//return false;

	    }else if(select_tab=='BATSM'){ 		// Todos los Bateadores

	      	webservice(11,select_tab,'M');
	      	//return false;

	    }
	});

  	// Identifica resoluciones moviles.
  	if($(window).width() <= 450){
  		webservice(1,'PAM','M');    // Carga Pitchers Movil
  	}else{
  		webservice(1,'PA','D'); 	// Carga Pitchers Desktop
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
	    case 'C':
	        listplayers = 'CD'; 
	        break;
	    case '1B':
	        listplayers = '1BD'; 
	        break;
	    case '2B':
	        listplayers = '2BD'; 
	        break;
	    case '3B':
	        listplayers = '3BD'; 
	        break;
	    case 'OF':
	        listplayers = 'OFD'; 
	        break;
	    case 'SS':
	        listplayers = 'SSD'; 
	        break;
	    case 'BATS':
	        listplayers = 'BATSD'; 
	        break;

	    // Casos Movil

	    case 'PAM':
	        listplayers = 'PAPM'; 
	        break;

	    case 'CM':
	        listplayers = 'CATCHER'; 
	        break;

	    case '1BM':
	        listplayers = '1B2'; 
	        break;

	    case '2BM':
	        listplayers = '2B2'; 
	        break;

	    case '3BM':
	        listplayers = '3B2'; 
	        break;

	    case 'SSM':
	        listplayers = 'SS2'; 
	        break;

	    case 'OFM':
	        listplayers = 'OF2'; 
	        break;

	    case 'BATSM':
	        listplayers = 'BATS2'; 
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


 	var ruta 		=	""; 							// Identifica el ws que se va a consultar
 	var date 		= 	$('#fechaCompeticion').val(); 	// Fecha de la competicion
 	var listplayers = 	blockplayer(tab); 				// Identifica la tabla que debe llenar (por ej: C/1B,2B, etc)
 	var loader 		= 	'<span id="loader" class="loader"><span class="loader-inner"></span></span>';
 	var get_position_loader; 							// Identifica la posicion en la que se cargara el loader
 	var season 		= 	$('#league').val(); 			// Obtiene la liga para identificar el ws a consultar

 	//alert(season);

	$('#'+listplayers).html(''); // Limpio el div con los resultados anteriores

 	//alert(posicion);
 	//alert(tab);
 	if(posicion == 2 || posicion == 3 || posicion == 4 || posicion == 5 || posicion == 6 || posicion == 7 || posicion==11 || posicion==12){ 
 		// Catcher, 1B, 2B, 3B, SS
 		var i_position; // 7 -> LF; 8 -> CF; 9 -> RF
 		//var i_position = 2; 
 		ruta=2;

 		//alert(posicion);

 		if(posicion==7){ // Posiciones LF/CF/RF
 			//$('#OFD').append(loader); // Carga el loading
 			if(device=='D'){
 				$('#OFD').append(loader); // Carga el loading
 			}else if(device=='M'){
 				$('#OF2').append(loader); // Carga el loading
 			}
 			
 			for(i_position=7;i_position<=9;i_position++){

 				$.ajax({
				  	url: 'webservice',
				  	type: 'POST',
				  	async: true,
				  	dataType: "json",
				 	//data: 'positionId='+posicion+"&accion="+ruta,
				 	data: 'positionId='+i_position+"&date="+date+"&accion="+ruta+"&season="+season,
				  	success: function(data)
			      	{
			      		
						var players = jQuery.parseJSON(data);	
						showPlayers(players,tab,device);
						$('#loader').remove(); // Elimina el loading			
				  	}

				});


 			}

 		}else if(posicion==11 || posicion==12){

 			//$('#BATSD').append(loader); // Carga el loading
 			if(device=='D'){
 				$('#BATSD').append(loader); // Carga el loading
 			}else if(device=='M'){
 				$('#BATS2').append(loader); // Carga el loading
 			}

 			for(i_position=2;i_position<=9;i_position++){
 				//alert(i_position);
 				$.ajax({
				  	url: 'webservice',
				  	type: 'POST',
				  	async: true,
				  	dataType: "json",
				 	//data: 'positionId='+posicion+"&accion="+ruta,
				 	data: 'positionId='+i_position+"&date="+date+"&accion="+ruta+"&season="+season,
				  	success: function(data)
			      	{
			      		
						var players = jQuery.parseJSON(data);	
						showPlayers(players,tab,device);
						$('#loader').remove(); // Elimina el loading			
				  	}

				});
 			}
 		}else{

 			get_position_loader = position_loader(posicion,device);
 			//alert(get_position_loader);
 			$('#'+get_position_loader).append(loader); // Carga el loading

 			$.ajax({
			  	url: 'webservice', 
			  	type: 'POST',
			  	async: true,
			  	dataType: "json",
			 	//data: 'positionId='+posicion+"&accion="+ruta,
			 	data: 'positionId='+posicion+"&date="+date+"&accion="+ruta+"&season="+season,
			  	success: function(data)
		      	{
		      		$('#loader').remove(); // Elimina el loading
					var players = jQuery.parseJSON(data);	
					showPlayers(players,tab,device);			
			  	}

			});
 		}

	 	
 	}else if (posicion == 1){
  		// Lanzadores
  		// Id de cada uno de los equipos
 		ruta=3;

 		//deletePlayersLineup();
 		//$('#PAD').append(loader);
 		if(device=='D'){
			$('#PAD').append(loader); // Carga el loading
		}else if(device=='M'){
			$('#PAPM').append(loader); // Carga el loading
		}

 		$.ajax({
		  	url: 'webservice',
		  	type: 'POST',
		  	async: true,
		  	dataType: "json",
		 	data: 'positionId='+"0"+"&date="+date+"&accion="+ruta+"&season="+season,
		  	success: function(data)
	      	{
	      		$('#loader').remove(); // Elimina el loading
				var players = jQuery.parseJSON(data);	
				showPitcher(players,tab,device);			
		  	}

		});
 	}
 	//alert(ruta);
}


function position_loader(posicion,device){

	var loader_position;

	if(device=='D'){
		switch (posicion) {
		
	    case 2:
	        loader_position = 'CD'; 
	        break;
	    case 3:
	        loader_position = '1BD'; 
	        break;
	    case 4:
	        loader_position = '2BD'; 
	        break;
	    case 5:
	        loader_position = '3BD'; 
	        break;
	    case 6:
	        loader_position = 'SSD'; 
	        break;
	    
		}
	}else if(device=='M'){
		switch (posicion) {
		
	    case 2:
	        loader_position = 'CATCHER'; 
	        break;
	    case 3:
	        loader_position = '1B2'; 
	        break;
	    case 4:
	        loader_position = '2B2'; 
	        break;
	    case 5:
	        loader_position = '3B2'; 
	        break;
	    case 6:
	        loader_position = 'SS2'; 
	        break;
	    
		}
	}
	

	return loader_position;
}

/**********************************************************************
*   Función:     showPlayers
*   Descripción: Funcion que arma la informaciòn del
*				 listado de peloteros.
*
*   Parametros de entrada: 
*				players = listado de todos los peloteros.
*				tab 	= posicion para identificar si la 
*						  llamada es Desktop o Movil.
*				device  = Identifica dispositivo (Desktop/Movil).
************************************************************************/
function showPlayers(players,tab,device){

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

		//alert(PlayerName);

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

			if(fecha_juego[2] =='PM' || fecha_juego[2]=='pm' || fecha_juego[2]=='p.m.' || fecha_juego[2]=='p.m'){
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
}


/*******************************************************
*   Función:     showPitcher
*   Descripción: Funcion que arma la informaciòn del
*				 listado de lanzadores.
*
*   Parametros de entrada: 
*				players = listado de todos los peloteros
*				tab 	= posicion para identificar si la 
*						  llamada es Desktop o Movil.
********************************************************/

function showPitcher(players,tab,device){

	var player 	 =	""; // Listado de jugadores
	var i 		 =	0; // Verifica si fila es par o impar
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

	
	
	
	$(players).each(function(indice, elemento){

		// Incializo los valores
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

		// alert(NameTeam1);
		// alert(NameP1);

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

			if(fecha_juego[2] =='PM' || fecha_juego[2]=='pm' || fecha_juego[2]=='p.m.' || fecha_juego[2]=='p.m'){
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
	});
	
	//alert(tab);
	//$('#PAD').html('');
	// Identifico si es version Desktop o Movil
	if(tab=='PA'){ // Version Desktop
		header = '<table class="table table-striped2 table-hover2 tablelineup"><tbody>';
		footer ='</tbody></table>';
		player = header+player+footer;
		//alert(player);
		$('#PAD').append(player);
	}else if(tab=='PAM'){ // Version Movil
		//alert(player);

		$('#PAPM').append(player);
	}
	
}


// Devuelve si un pelotero ya fue seleccionado
function search_position(position,device){

	var select_position;
	var result = 0;
	//select_position_D = position+'ADD';
	select_position_D = 'player'+position+' #salario';
	select_position_M = 'player'+position+'M .divsala';
	
	//alert($('#playerPAM .litableup .litabblock').html());
	
	if(device=='D'){ // Version Desktop
		//alert('desktop');
		if(position == 'PA'){ // Selecciona Pitcher
			if(!$('#'+select_position_D).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el pitcher antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'C'){ // Selecciona Catcher
			if(!$('#'+select_position_D).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el Catcher antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == '1B'){ // Selecciona Primera Base
			if(!$('#'+select_position_D).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el 1B antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == '2B'){ // Selecciona Segunda Base
			if(!$('#'+select_position_D).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el 2B antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == '3B'){ // Selecciona Tercera Base
			
			if(!$('#'+select_position_D).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el 3B antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'SS'){ // Selecciona shortstop
			if(!$('#'+select_position_D).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el 3B antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'OF'){ // Selecciona shortstop
		
			if((!$('#playerOF1 #salario').is(':empty')) && (!$('#playerOF2 #salario').is(':empty')) && (!$('#playerOF3 #salario').is(':empty'))){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun OF antes de seleccionar otro !!');
				return result;
			}
		}
	}else if(device=='M'){ // Version Movil

		if(position == 'PA'){ // Selecciona Pitcher
			if(!$('#'+select_position_M).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el pitcher antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'C'){ // Selecciona Catcher
			
			if(!$('#'+select_position_M).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el Catcher antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == '1B'){ // Selecciona Primera Base
			if(!$('#'+select_position_M).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el 1B antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == '2B'){ // Selecciona Segunda Base
			if(!$('#'+select_position_M).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el 2B antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == '3B'){ // Selecciona Tercera Base
			if(!$('#'+select_position_M).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el 3B antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'SS'){ // Selecciona shortstop
			if(!$('#'+select_position_M).is(':empty')){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar el 3B antes de seleccionar otro !!');
				return result;
			}
		}

		if(position == 'OF'){ // Selecciona shortstop
			//alert($('#playerOF1M #salario').is(':empty'));
			if((!$('#playerOF1M .divsala').is(':empty')) && (!$('#playerOF2M .divsala').is(':empty')) && (!$('#playerOF3M .divsala').is(':empty'))){
				result = 1;
				$('#aprove').val('1');
				alert('Debe eliminar algun OF antes de seleccionar otro !!');
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
	var compound_name 	= 	playerteam+'/'+playername; // Guarda el nombre con el equipo del pitcher
	var positionplayer; // Identifica la posicion donde se colocara la seleccion del usuario
	var position_value; // Guarda la posicion OF1/OF2/OF3 para gusrdarlo en la BD
	var result_update; // Devuelve 0 si la actualizacion del salario no se excede, 1 en caso contrario.
	var result_search; // Devuelve 0 si el pelotero no fue seleccionado, 1 en caso contrario
	//var sum_salary_rest = sum_salary(device);
	// Busco que no haya sido seleccionada la posicion
	result_search = search_position(position,device);
	var seleccionado = verificaPelotero(idplayer,position,device,salary); // Verifica si el pelotero fue seleccionado

	playername	=	decodeURIComponent(playername);
	op 			=	decodeURIComponent(op);
	salary 		=	decodeURIComponent(salary);
	vs1 		=	decodeURIComponent(vs1);
	vs2 		=	decodeURIComponent(vs2);
	
	// Primero verificamos si el pelotero fue seleccionado
	if(seleccionado==true){
		alert("El Pelotero ya fue seleccionado");
		$('#aprove').val('1');
		//return false;
	}
	// Busco que no haya sido seleccionada la posicion
	//result_search = search_position(position,device);
	//result_search = 0;
	
	if(result_search == 0 && seleccionado==false){

		// Llamo a la funcion que controla el salario minimo
		result_update = updateSalary(salary,position,device);
		//alert(result_update);
		if(result_update == 0){

			
			switch (position) {
			    case 'PA':
			    	if(device=='D'){
			    		positionplayer = 'playerPA'; 
			    	}else if(device=='M'){
			    		positionplayer = 'playerPAM';
			    	}
			        
			        break;
			    case 'C':
			    	if(device=='D'){
			    		positionplayer = 'playerC';
			    	}else if(device=='M'){
			    		positionplayer = 'playerCM';
			    	}
			         
			        break;
			    case '1B':
			        
			        if(device=='D'){
			    		positionplayer = 'player1B';
			    	}else if(device=='M'){
			    		positionplayer = 'player1BM';
			    	}

			        break;
			    case '2B':
			        
			        if(device=='D'){
			    		positionplayer = 'player2B';
			    	}else if(device=='M'){
			    		positionplayer = 'player2BM';
			    	}

			        break;
			    case '3B':
			         
			        if(device=='D'){
			    		positionplayer = 'player3B';
			    	}else if(device=='M'){
			    		positionplayer = 'player3BM';
			    	}

			        break;
			    case 'OF': // En este caso busca si alguno de los of esta vacio
			        
			    	if(device=='D'){ // Esta en Desktop
			    		if($('#playerOF1 #jug').is(':empty')){
			    			
			    			positionplayer = 'playerOF1';
				    		position_value = 'OF1';

				    	}else if($('#playerOF2 #jug').is(':empty')){
				    		
				    		positionplayer = 'playerOF2';
				    		position_value = 'OF2';

				    	}else if($('#playerOF3 #jug').is(':empty')){
				    		
				    		positionplayer = 'playerOF3';
				    		position_value = 'OF3';

				    	}
			    	}else if(device=='M'){ // Esta en Movil

			    		if($('#playerOF1M .litabblock').is(':empty')){
			    			//alert('off1');
			    			positionplayer = 'playerOF1M';
				    		position_value = 'OF1';

				    	}else if($('#playerOF2M .litabblock').is(':empty')){
				    		//alert('off2');
				    		positionplayer = 'playerOF2M';
				    		position_value = 'OF2';

				    	}else if($('#playerOF3M .litabblock').is(':empty')){
				    		//alert('off3');
				    		positionplayer = 'playerOF3M';
				    		position_value = 'OF3';

				    	}
			    	}

			        break;
			    case 'SS':
			        
			        if(device=='D'){
			    		positionplayer = 'playerSS';
			    	}else if(device=='M'){
			    		positionplayer = 'playerSSM';
			    	}

			        break;
			    
			}
			
			//alert('dispositivo: '+device);
			//alert('posicion: '+positionplayer);
		
			// Falta identificar si viene de Desktop o Movil
			$('#'+positionplayer).html(''); // Elimino el que esta pintado
			
			if(device=='D'){
				if(position=='PA'){
					player = '<td id="pos">'+position+'</td>'+
							'<td id="jug"><span id="teamcol">'+decodeURIComponent(playerteam.trim())+'/</span>'+decodeURIComponent(playername.trim())+'</td>'+
			                '<td id="opo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2.trim())+'</span></td>'+
			                '<td id="salario">'+salary+'</td>'+
			                '<td>'+  //idplayer,position,playerteam,playername,op,salary,vs1,vs2,ppj
			                '<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"D"+'");returnPlayer(this,"'+position+'","'+"D"+'"); >'+
			                '<img src="../images/ico/menos.png" alt="menos" class="mashov">'+
			                '</a>'+
			                '</td>'+
			                '<input type="hidden" id="'+position+'ADD" name="'+position+'" value="'+position+'-'+idplayer+'-'+vs1+'-'+salary+'-'+ppj+'-'+decodeURIComponent(compound_name.trim())+'-'+vs2+'" style="color: #000">';
				}else{

					if(position=='OF'){
						player = '<td id="pos">'+position+'</td>'+
							'<td id="jug">'+decodeURIComponent(playername.trim())+'</td>'+
			                '<td id="opo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2.trim())+'</span></td>'+
			                '<td id="salario">'+salary+'</td>'+
			                '<td>'+
			                '<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"D"+'");returnPlayer(this,"'+position_value+'","'+"D"+'"); >'+
			                '<img src="../images/ico/menos.png" alt="menos" class="mashov">'+
			                '</a>'+
			                '</td>'+
			                '<input type="hidden" id="'+position_value+'ADD" name="'+position_value+'" value="'+position_value+'-'+idplayer+'-'+vs1+'-'+salary+'-'+ppj+'-'+decodeURIComponent(playername)+'-'+vs2+'" style="color: #000">';
			                //1B-249-MIN-5500-0-David Ortiz                                             
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

				if(position=='PA'){
					
			        player = '<div class="litableup">'+
			        			'<div class="divpos">'+position+'</div>'+
                              '<div class="litabblock">'+
                                  '<p class="divjug"><span id="teamcol">'+decodeURIComponent(playerteam.trim())+'/</span> '+decodeURIComponent(playername)+'</p>'+
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

					if(position=='OF'){
						
			                player = '<div class="litableup">'+
			        			'<div class="divpos">'+position+'</div>'+
                              '<div class="litabblock">'+
                                  '<p class="divjug">'+decodeURIComponent(playername.trim())+'</p>'+
                                  '<p class="divopo">'+decodeURIComponent(vs1.trim())+' vs <span id="teamcol">'+decodeURIComponent(vs2.trim())+'</span></p>'+
                              '</div>'+
                              '<div class="divsala">'+salary+'</div>'+
                              '<div class="divmashov">'+
                              	'<a  onclick=deletePlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(vs1.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+"M"+'");returnPlayer(this,"'+position+'","'+"M"+'"); >'+
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
		if(position=='PA'){
			player += '<tr>'+
			              '<td id="pos">'+position+'</td>'+
			              '<td id="jug"><span id="teamcol">'+decodeURIComponent(playerteam.trim())+'/</span>'+decodeURIComponent(playername.trim())+'</td>'+
			              '<td id="opo">'+ vs1+' vs <span id="teamcol">'+vs2+'</span></td>'+
			              '<td id="salario">'+Math.ceil(salary)+'</td>'+
			              '<td>'+
			              	'<a  onclick=selectPlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(op.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+'D'+'");deletefile(this,"'+'D'+'","'+Math.ceil(salary)+'"); >'+
			              		'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
			              	'</a>'+
			              '</td>'+
			          '</tr>';
			
			player = header+player+footer;
			
			$('#PAD').prepend(player); // Incorporo al pitcher al grupo de lanzadores

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

		if(position=='PA'){
			
			player +='<a  onclick=selectPlayer('+'"'+idplayer+'","'+position+'","'+encodeURIComponent(playerteam.trim())+'","'+encodeURIComponent(playername.trim())+'","'+encodeURIComponent(op.trim())+'","'+Math.ceil(salary)+'","'+encodeURIComponent(vs1.trim())+'","'+encodeURIComponent(vs2.trim())+'","'+"0"+'","'+'M'+'");deletefile(this,"'+'M'+'","'+Math.ceil(salary)+'"); >'+
                          '<div class="litableup">'+
                              '<div class="divpos">'+position+'</div>'+
                              '<div class="litabblock">'+
                                  '<p class="divjug"><span id="teamcol">'+decodeURIComponent(playerteam.trim())+'/</span> '+decodeURIComponent(playername.trim())+'</p>'+
                                  '<p class="divopo">'+ vs1+' vs <span id="teamcol">'+ vs2+'</span></p>'+
                              '</div>'+
                              '<div class="divsala">'+Math.ceil(salary)+'</div>'+
                              '<div class="divmashov">'+
                              	'<img src="../images/ico/mas.png" alt="mas" class="mashov">'+
                              '</div>'+
                          '</div>'+
                      '</a>';
			//player = header+player+footer;
			
			$('#PAPM').prepend(player); // Incorporo al pitcher al grupo de lanzadores

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
		if(!$('#playerPA #jug').is(':empty')){
			data = $('#PAADD').val();
			//alert('entra aqui');
			//alert($('#PAADD').val())
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#CADD').val()!=undefined){ // La posicion de C ya tenia la posicion seleccionada
		if(!$('#playerC #jug').is(':empty')){
			data = $('#CADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
				
		}

		//if($('#1BADD').val()!=undefined){ // La posicion de 1B ya tenia la posicion seleccionada
		if(!$('#player1B #jug').is(':empty')){
			data = $('#1BADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#2BADD').val()!=undefined){ // La posicion de 2B ya tenia la posicion seleccionada
		if(!$('#player2B #jug').is(':empty')){
			data = $('#2BADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#3BADD').val()!=undefined){ // La posicion de 3B ya tenia la posicion seleccionada
		if(!$('#player3B #jug').is(':empty')){
			data = $('#3BADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#SSADD').val()!=undefined){ // La posicion de SS ya tenia la posicion seleccionada
		if(!$('#playerSS #jug').is(':empty')){
			data = $('#SSADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#OF1ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		if(!$('#playerOF1 #jug').is(':empty')){
			data = $('#OF1ADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#OF2ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		if(!$('#playerOF2 #jug').is(':empty')){
			data = $('#OF2ADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#OF3ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		if(!$('#playerOF3 #jug').is(':empty')){
			data = $('#OF3ADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}	
	}

	if(device=='M'){
		//alert($('#playerPAM #divjug').is(':empty'));
		//alert($('#playerPAM .divsala').val());
		//alert(!$('#playerPAM .divsala').is(':empty'));
		if(!$('#playerPAM .divsala').is(':empty') || $('#playerPAM .divsala').val()!=''){
			//alert('entra aqui');
			data = $('#PAADD').val();
			//alert('entra aqui');
			//alert($('#PAADD').val())
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#CADD').val()!=undefined){ // La posicion de C ya tenia la posicion seleccionada
		//if($('#playerCM .litabblock').val()!=undefined){
		if(!$('#playerCM .divsala').is(':empty') || $('#playerCM .divsala').val()!=''){
			data = $('#CADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
				
		}

		//if($('#1BADD').val()!=undefined){ // La posicion de 1B ya tenia la posicion seleccionada
		//if($('#player1BM .litabblock').val()!=undefined){
		if(!$('#player1BM .divsala').is(':empty') || $('#player1BM .divsala').val()!=''){
			data = $('#1BADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#2BADD').val()!=undefined){ // La posicion de 2B ya tenia la posicion seleccionada
		//if($('#player2BM .litabblock').val()!=undefined){
		if(!$('#player2BM .divsala').is(':empty') || $('#player2BM .divsala').val()!=''){
			data = $('#2BADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#3BADD').val()!=undefined){ // La posicion de 3B ya tenia la posicion seleccionada
		//if($('#player3BM .litabblock').val()!=undefined){
		if(!$('#player3BM .divsala').is(':empty') || $('#player3BM .divsala').val()!=''){
			data = $('#3BADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#SSADD').val()!=undefined){ // La posicion de SS ya tenia la posicion seleccionada
		//if($('#playerSSM .litabblock').val()!=undefined){
		if(!$('#playerSSM .divsala').is(':empty') || $('#playerSSM .divsala').val()!=''){
			data = $('#SSADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#OF1ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		//if($('#playerOF1M .litabblock').val()!=undefined){
		if(!$('#playerOF1M .divsala').is(':empty') || $('#playerOF1M .divsala').val()!=''){
			data = $('#OF1ADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#OF2ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		//if($('#playerOF2M .litabblock').val()!=undefined){
		if(!$('#playerOF2M .divsala').is(':empty') || $('#playerOF2M .divsala').val()!=''){
			data = $('#OF2ADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}

		//if($('#OF3ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		//if($('#playerOF3M .litabblock').val()!=undefined){
		if(!$('#playerOF3M .divsala').is(':empty') || $('#playerOF3M .divsala').val()!=''){
			data = $('#OF3ADD').val();
			player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
		}	
	}

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
	if($('#PAADD').val()!=undefined){ // La posicion de PA ya tenia la posicion seleccionada
		data = $('#PAADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#CADD').val()!=undefined){ // La posicion de C ya tenia la posicion seleccionada
		data = $('#CADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
			
	}

	if($('#1BADD').val()!=undefined){ // La posicion de 1B ya tenia la posicion seleccionada
		data = $('#1BADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#2BADD').val()!=undefined){ // La posicion de 2B ya tenia la posicion seleccionada
		data = $('#2BADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#3BADD').val()!=undefined){ // La posicion de 3B ya tenia la posicion seleccionada
		data = $('#3BADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#SSADD').val()!=undefined){ // La posicion de SS ya tenia la posicion seleccionada
		data = $('#SSADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#OF1ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		data = $('#OF1ADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#OF2ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		data = $('#OF2ADD').val();
		player_salary = parseInt(player_salary) + parseInt(getSalary(data));
		
	}

	if($('#OF3ADD').val()!=undefined){ // La posicion de OFF ya tenia la posicion seleccionada
		data = $('#OF3ADD').val();
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

	if(device=='D'){ // Version Desktop

		restore_position = 'player'+position;

		$('#'+restore_position).closest('td').remove();

		if(position=='OF1' || position=='OF2'|| position=='OF3'){
			position = 'OF';
		}

		player='<td id="pos">'+position+'</td>'+
	              '<td id="jug"></td>'+
	              '<td id="opo"></td>'+
	              '<td id="salario"></td>'+
	              '<td><a href=""></a>';

	}else if(device=='M'){

		restore_position = 'player'+position+'M';

		$('#'+restore_position).closest('.litableup div').remove();

		if(position=='OF1' || position=='OF2'|| position=='OF3'){
			position = 'OF';
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
	//alert('idplayer: '+idplayer);
	//alert('position: '+position);
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
	if(position=='PA'){
		if(pitcher==idplayer){
			pitcher='';
		}
	}

	if(position=='C'){
		if(catcher==idplayer){
			catcher ='';
		}
		
	}

	if(position=='1B'){
		if(primera==idplayer){
			primera='';
		}
	}

	if(position=='2B'){
		if(segunda==idplayer){
			segunda='';
		}
	}

	if(position=='3B'){
		if(tercera==idplayer){
			tercera='';
		}
	}

	if(position=='SS'){
		if(shortstop==idplayer){
			shortstop='';
		}
	}

	if(position=='OF'){
		if(offfield_1==idplayer){
			offfield_1='';
		}else if(offfield_2==idplayer){
			offfield_2='';
		}else if(offfield_3==idplayer){
			offfield_3='';
		}
	}

}

/*
*	Funcion para verificar si un pelotero ha sido seleccionado
*/
function verificaPelotero(idplayer,position,device,salary){
	var respuesta = false;
	var sum_salary_rest = sum_salary(device,salary);
	//alert('slary verifica: '+salary);
	/*var respuesta = false;
	var i;
	
	// Recorro el arreglo para ver si el id existe
	for(i=0; i<existentes.length;i++){
		if(idplayer==existentes[i]){
			respuesta = true;
			break;
		}
	}

	if(respuesta==false){
		existentes.push(idplayer);	
	}*/

	// alert('idplayer: '+idplayer);
	// alert('position: '+position);

	var approve = $('#aprove').val();
	var OF1ADD; // Obtengo los valores OF1 para el caso de editar
	var OF2ADD; // Obtengo los valores OF2 para el caso de editar
	var OF3ADD; // Obtengo los valores OF3 para el caso de editar

	//alert('approve: '+approve);

	if(sum_salary_rest==0 && approve==0){
		//alert('primer condicional');

		if(position=='PA'){
			if(pitcher==idplayer){
				respuesta = true;
			}else{
				pitcher = idplayer;
			}
			
		}
		
		if(position=='C'){
			if(catcher==idplayer){
				respuesta = true;
			}else{
				catcher = idplayer;
			}
			
		}

		if(position=='1B'){
			if(primera==idplayer || segunda==idplayer || tercera==idplayer || shortstop==idplayer){
				respuesta = true;
			}else{
				primera = idplayer;
			}
			
		}

		if(position=='2B'){
			if(primera==idplayer || segunda==idplayer || tercera==idplayer || shortstop==idplayer){
				respuesta = true;
			}else{
				segunda = idplayer;
			}
			
		}

		if(position=='3B'){
			//alert('entra en tercera');
			if(primera==idplayer || segunda==idplayer || tercera==idplayer || shortstop==idplayer){
				//alert('existe');
				respuesta = true;
			}else{
				//alert('no existe');
				tercera = idplayer;
			}
			
		}

		if(position=='SS'){
			if(shortstop==idplayer || primera==idplayer || segunda==idplayer || tercera==idplayer){
				respuesta = true;
			}else{
				shortstop = idplayer;
			}
			
		}

		if(position=='OF'){
			/*if(offfield==idplayer){
				respuesta = true;
			}else{
				offfield = idplayer;
			}*/
			//alert('offfield_1: '+offfield_1);
			//alert('idplayer: '+idplayer);

			if(offfield_1=='' && offfield_2=='' && offfield_3==''){
				offfield_1 = idplayer;
			}else if(offfield_1!='' && offfield_2=='' && offfield_3==''){
				if(offfield_1==idplayer){
					respuesta = true;
				}else{
					offfield_2 = idplayer;
				}
				
			}else if(offfield_1!='' && offfield_2!='' && offfield_3==''){
				if(offfield_1==idplayer || offfield_2==idplayer){
					respuesta = true;
				}else{
					offfield_3 = idplayer;
				}
				
			}else if(offfield_1!='' && offfield_2=='' && offfield_3!=''){
				if(offfield_1==idplayer || offfield_3==idplayer){
					respuesta = true;
				}else{
					offfield_2 = idplayer;
				}
				
			}else if(offfield_1=='' && offfield_2!='' && offfield_3!=''){
				if(offfield_2==idplayer || offfield_3==idplayer){
					respuesta = true;
				}else{
					offfield_1 = idplayer;
				}
				
			}

			// Casos en los que se trabaja con el editar 
			if($('#OF1ADD').val()!=undefined){
				//alert('no es vacio');
				OF1ADD = $('#OF1ADD').val();
				//alert('OF1ADD: '+OF1ADD);
				OF1ADD = OF1ADD.split("-");
				//alert('OF1ADD: '+OF1ADD[1]);
				//alert('idplayer: '+idplayer);
				if(OF1ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(offfield_2==''){
						offfield_2 = idplayer;
					}else if(offfield_3==''){
						offfield_3 = idplayer;
					}
					
				}
			}

			if($('#OF2ADD').val()!=undefined){
				//alert('no es vacio');
				OF2ADD = $('#OF2ADD').val();
				//alert('OF2ADD: '+OF2ADD);
				OF2ADD = OF2ADD.split("-");
				//alert('OF2ADD: '+OF2ADD[1]);
				//alert('idplayer: '+idplayer);

				if(OF2ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(offfield_1==''){
						offfield_1 = idplayer;
					}else if(offfield_3==''){
						offfield_3 = idplayer;
					}
					
				}
			}

			if($('#OF3ADD').val()!=undefined){
				//alert('no es vacio');
				OF3ADD = $('#OF3ADD').val();
				//alert('OF3ADD: '+OF3ADD);
				OF3ADD = OF3ADD.split("-");
				//alert(OF3ADD[1]);
				//alert('OF3ADD: '+OF3ADD[1]);
				//alert('idplayer: '+idplayer);
				if(OF3ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(offfield_1==''){
						offfield_1 = idplayer;
					}else if(offfield_2==''){
						offfield_2 = idplayer;
					}
					
				}
			}
			
		}
	}else{
		//alert('en el else');

		if(position=='1B'){
			if(primera==idplayer || segunda==idplayer || tercera==idplayer || shortstop==idplayer){
				respuesta = true;
			}else{
				primera = idplayer;
			}
			
		}

		if(position=='2B'){
			if(primera==idplayer || segunda==idplayer || tercera==idplayer || shortstop==idplayer){
				respuesta = true;
			}else{
				segunda = idplayer;
			}
			
		}

		if(position=='3B'){
			//alert('entra en tercera');
			if(primera==idplayer || segunda==idplayer || tercera==idplayer || shortstop==idplayer){
				//alert('existe');
				respuesta = true;
			}else{
				//alert('no existe');
				tercera = idplayer;
			}
			
		}

		if(position=='SS'){
			if(shortstop==idplayer || primera==idplayer || segunda==idplayer || tercera==idplayer){
				respuesta = true;
			}else{
				shortstop = idplayer;
			}
			
		}
		
		// Casos en los que se trabaja con el editar 
			if($('#OF1ADD').val()!=undefined){
				//alert('no es vacio');
				OF1ADD = $('#OF1ADD').val();
				//alert('OF1ADD: '+OF1ADD);
				OF1ADD = OF1ADD.split("-");
				//alert('OF1ADD: '+OF1ADD[1]);
				//alert('idplayer: '+idplayer);
				if(OF1ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(offfield_2==''){
						offfield_2 = idplayer;
					}else if(offfield_3==''){
						offfield_3 = idplayer;
					}
					
				}
			}

			if($('#OF2ADD').val()!=undefined){
				//alert('no es vacio');
				OF2ADD = $('#OF2ADD').val();
				//alert('OF2ADD: '+OF2ADD);
				OF2ADD = OF2ADD.split("-");
				//alert('OF2ADD: '+OF2ADD[1]);
				//alert('idplayer: '+idplayer);

				if(OF2ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(offfield_1==''){
						offfield_1 = idplayer;
					}else if(offfield_3==''){
						offfield_3 = idplayer;
					}
					
				}
			}

			if($('#OF3ADD').val()!=undefined){
				//alert('no es vacio');
				OF3ADD = $('#OF3ADD').val();
				//alert('OF3ADD: '+OF3ADD);
				OF3ADD = OF3ADD.split("-");
				//alert(OF3ADD[1]);
				//alert('OF3ADD: '+OF3ADD[1]);
				//alert('idplayer: '+idplayer);
				if(OF3ADD[1]==idplayer){
					respuesta = true;
				}else{
					if(offfield_1==''){
						offfield_1 = idplayer;
					}else if(offfield_2==''){
						offfield_2 = idplayer;
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
