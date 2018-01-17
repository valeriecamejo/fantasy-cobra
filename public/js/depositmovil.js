$(document).ready(function(){
    $(function()
    {	
   		$('#r1').click(function()
        {
        	//alert("click1");
        	texto1 = " <input type='number' name='mount' value='2000.00'  id = 'montod' class= 'depositInput' required/>";
        	texto2 = " <input type='text' name='bono' value='4000' class= 'depositInput' readonly='readonly' required/>";
			$( "#monto" ).children().remove();
			$(texto1).appendTo("#monto");
 			$( "#bono" ).children().remove();
			$(texto2).appendTo("#bono");
        });
		$('#r2').click(function()
        {
        	//alert("click1");
        	texto1 = " <input type='number' name='mount' value='5000.00' id = 'montod'  class= 'depositInput' required/>";
        	texto2 = " <input type='text' name='bono' value='1000' class= 'depositInput' readonly='readonly' required/>";
			$( "#monto" ).children().remove();
			$(texto1).appendTo("#monto");
 			$( "#bono" ).children().remove();
			$(texto2).appendTo("#bono");
        });
		$('#r3').click(function()
        {
        	//alert("click1");
        	texto1 = " <input type='number' name='mount' value='10000.00' id = 'montod'  class= 'depositInput' required/>";
        	texto2 = " <input type='text' name='bono' value='2000' class= 'depositInput' readonly='readonly' required/>";
			$( "#monto" ).children().remove();
			$(texto1).appendTo("#monto");
 			$( "#bono" ).children().remove();
			$(texto2).appendTo("#bono");
        });
		$('#r4').click(function()
        {
        	//alert("click1");
        	texto1 = " <input type='number' name='mount' value='20000.00' id = 'montod' class= 'depositInput' required/>";
        	texto2 = " <input type='text' name='bono' value='4000' class= 'depositInput' readonly='readonly' required/>";
			$( "#monto" ).children().remove();
			$(texto1).appendTo("#monto");
 			$( "#bono" ).children().remove();
			$(texto2).appendTo("#bono");
        });
		$('#monto').change(function()
    	{
    		texto2 = " <input type='text' name='bono' value='10000.00' id='montod' class= 'depositInput' readonly='readonly' required/>";
			montoingresado = document.getElementById("montod").value;
			//alert(montoingresado);
			nuevomonto = montoingresado * 0.2;
			texto2 = " <input type='text' name='bono' value='"+nuevomonto+"' class= 'depositInput' readonly='readonly' required/>";
			$( "#bono" ).children().remove();
			$(texto2).appendTo("#bono");

		});
	});
});