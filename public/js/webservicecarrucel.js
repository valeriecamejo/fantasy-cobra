$(document).ready(function(){

	$(function updateCarrucel()
	{ 
	    
   		//var id=$(this).val(); 
      	//alert(id);
 		
		$.ajax({
			//alert("hola");
			url: 'bettor/carrucel',
			type: 'POST',
			async: true,	  	
			dataType: "json",
			data: {},
			success: function(data)
		    {
		    	//alert("hola1");
				seleccion="	";
				var obj = jQuery.parseJSON(data);	
				$(obj).each(function(indice, elemento){
		 			//alert(elemento.NickName1);

		 			
		 			
		 			seleccion+="	<div>";
				    seleccion+="      <table class='gamebox'>";
				    seleccion+="        <tr>";
				    seleccion+="          <td>";
				    seleccion+="            <span class='TeamName'>"+elemento.NickName1+" "+elemento.RunsTeam1+"</span><br>";
				    seleccion+="            vs<br>";
				    seleccion+="            <span class='TeamName'>"+elemento.NickName2+" "+elemento.RunsTeam2+"</span>";
				    seleccion+="          </td>";
				    seleccion+="        </tr>";
				    seleccion+="        <tr>";
				    seleccion+="          <td>";
				    seleccion+="            <span class='StatusGame'>";
				    seleccion+="              "+elemento.Status+"<br>";
				    seleccion+="             "+elemento.CurrentInning+"";
				    seleccion+="            </span>";
				    seleccion+="          </td>";
				    seleccion+="        </tr>";
				    seleccion+="      </table>";
				    seleccion+="    </div>";
					
				});
				//alert("no entro");
				$("#owl-example").children().remove();
				$(seleccion).appendTo("#owl-example");
	      	}
	      	
	
		});
	setInterval(updateCarrucel, 180000000000);
	});
});