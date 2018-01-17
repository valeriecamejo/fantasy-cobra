function validateForm(id){

	if($("#pass-"+id).val().length < 1) {
		if(!(document.getElementById('txt-'+id))){
			$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-sm-12' style='color:red; font-size:30px;'>Por Favor Ingrese La Clave</div>" );
		}
		else{
			$("#txt-"+id).remove();
			$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-sm-12' style='color:red; font-size:30px;'>Por Favor Ingrese La Clave</div>" );
		}
		return false;
	}
	else{
		var password = $("#val-"+id).val();
		var input = $("#pass-"+id).val();

		if(password != input){
			if(!(document.getElementById('txt-'+id))){
				$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-sm-12' style='color:red; font-size:30px;'>La Clave Es Incorrecta</div>" );
			}
			else{
				$("#txt-"+id).remove();
				$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-sm-12' style='color:red; font-size:30px;'>La Clave Es Incorrecta</div>" );
			}
			return false;
		}		
	}
}

function movil_validateForm(id){

	if($("#pass-"+id).val().length < 1) {
		if(!(document.getElementById('txt-'+id))){
			$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-xs-12' style='color:red; font-size:15px;'>Por Favor Ingrese La Clave</div>" );
		}
		else{
			$("#txt-"+id).remove();
			$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-xs-12' style='color:red; font-size:15px;'>Por Favor Ingrese La Clave</div>" );
		}
		return false;
	}
	else{
		var password = $("#val-"+id).val();
		var input = $("#pass-"+id).val();

		if(password != input){
			if(!(document.getElementById('txt-'+id))){
				$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-xs-12' style='color:red; font-size:15px;'>La Clave Es Incorrecta</div>" );
			}
			else{
				$("#txt-"+id).remove();
				$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-xs-12' style='color:red; font-size:15px;'>La Clave Es Incorrecta</div>" );
			}
			return false;
		}		
	}
}

function validateTicket(id){

	if($("#myemail-"+id).val().length < 1){
		if(!(document.getElementById('txt-'+id))){
			$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-sm-12' style='color:red; font-size:30px;'>Por Favor Ingrese Su Correo</div>" );
		}
		else{
			$("#txt-"+id).remove();
			$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-sm-12' style='color:red; font-size:30px;'>Por Favor Ingrese Su Correo</div>" );
		}
		return false;
	}
	else{
		var respuesta = 0;
		$(".email-"+id).each(function(){
      		var email_hidden = $(this).val();
      		var email_input = $("#myemail-"+id).val();
      		if(email_hidden == email_input){
      			respuesta = 1;
      		}            
    	});

    	if(respuesta == 0){
    		if(!(document.getElementById('txt-'+id))){
				$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-sm-12' style='color:red; font-size:30px;'>Usted No Figura Para Inscribirse En Esta Competición</div>" );
			}
			else{
				$("#txt-"+id).remove();
				$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-sm-12' style='color:red; font-size:30px;'>Usted No Figura Para Inscribirse En Esta Competición</div>" );
			}
			return false;
    	}
	}
}

function movil_validateTicket(id){

	if($("#myemail-"+id).val().length < 1){
		if(!(document.getElementById('txt-'+id))){
			$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-xs-12' style='color:red; font-size:15px;'>Por Favor Ingrese Su Correo</div>" );
		}
		else{
			$("#txt-"+id).remove();
			$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-xs-12' style='color:red; font-size:15px;'>Por Favor Ingrese Su Correo</div>" );
		}
		return false;
	}
	else{
		var respuesta = 0;
		$(".email-"+id).each(function(){
      		var email_hidden = $(this).val();
      		var email_input = $("#myemail-"+id).val();
      		if(email_hidden == email_input){
      			respuesta = 1;
      		}            
    	});

    	if(respuesta == 0){
    		if(!(document.getElementById('txt-'+id))){
				$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-xs-12' style='color:red; font-size:15px;'>Usted No Figura Para Inscribirse En Esta Competición</div>" );
			}
			else{
				$("#txt-"+id).remove();
				$( "#alert-"+id).append("<div id='txt-"+id+"' class='col-xs-12' style='color:red; font-size:15px;'>Usted No Figura Para Inscribirse En Esta Competición</div>" );
			}
			return false;
    	}
	}
}