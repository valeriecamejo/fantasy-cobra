/************************************************************************
 *   Function:      privacy_competition
 *   Description:   Load input password
 *   Params:        int is_privacy
 ************************************************************************/
function privacy_competition(is_privacy){

  if(is_privacy == 0){

    $("#private_competition").css("display","none");
    $("#information").css("border-top","none");

  }else{

    $("#private_competition").css("display","flex");
    $("#information").css("border-top","1px dashed #eec133");
    // var action = "<a onclick='action_password(0)' class='ShowPass' id='view'>Mostrar Contraseña</a>";
    $("#view").remove();
    $("#hidden").remove();
    // $("#action_password").append(action);

  }
}