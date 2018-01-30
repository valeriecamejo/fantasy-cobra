$(document).ready(function(){
	$(function()
	{ 
	    $('#si').click(function()
	    {
	    	var id=$(this).val(); 
			$.ajax({
			  	url: 'create_league',
				type: 'POST',
				async: true,
				data: 'ids='+id,
				success: function(data){
		        	seleccion ="<input type='text' name='cost_garanteed' class='form-control'  placeholder='Garantizado Bs.'/> ";
		 			$("#costo_garantizado").children().remove();
					seleccion+="<div class='input-group-addon'>Bs.</div>";
		 			$(seleccion).appendTo("#costo_garantizado");
			    }
	 
			});
	 
	    });
	    $('#no').click(function()
	    {	
	    	var id=$(this).val(); 
			$.ajax({
			  	url:'create_league',
				type:'POST',
				async: true,
				data: 'ids='+id,
				success: function(data){
		 			$( "#costo_garantizado" ).children().remove();
			    }
	 
			});
	 
	    });
	});
});