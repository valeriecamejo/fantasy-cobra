/*********************************************************************
* 	Función: clousure
* 	Descripción: Función que muestra el calendario
* 	Parametros de entrada: NA
*
***********************************************************************/
$(function(){
	jQuery.noConflict();
	$.datepicker.setDefaults($.datepicker.regional["es"]);

	$("#datepicker").datepicker({
	   showAnim: "fold",
	   firstDay: 1
	});

	$("#datepicker_1").datepicker({
	   firstDay: 1
	});

	$("#datepicker_2").datepicker({
	   firstDay: 1
	});
});