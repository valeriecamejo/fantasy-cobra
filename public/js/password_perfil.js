function action_password_perfil(action){
    $("#password_perfil_action").html("");

    if($("#password_perfil").val().length > 0){
        if(action == 1){
            $("#password_perfil").attr("type", "text");
            var action = "<a onclick='action_password_perfil(0)' id='hidden'>Ocultar</a>";
            $("#view").remove();
        }
        else{
            $("#password_perfil").attr("type", "password");
            var action = "<a onclick='action_password_perfil(1)' id='view'>Mostrar</a>";
            $("#hidden").remove();
        }
    }

    $("#password_perfil_action").append(action);
}
