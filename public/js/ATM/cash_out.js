/*****************************************
* cash_out: Displays an image depending 
* @param type
* @return void
*****************************************/
function cash_out(type){
    if(type == 'recarga'){
        $("#select_type").css("display","block");
        $("#pay-type").css("display","block");
        $("#getmoney-type").css("display","none");
    }
    else if(type == 'retiro') {
        $("#select_type").css("display","block");
        $("#pay-type").css("display","none");
        $("#getmoney-type").css("display","block");
    }
}
