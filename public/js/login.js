
// Url global
var url_ajax = "https://www.fantasycobra.com.ve";
//var url_ajax = "http://localhost/fantasy-cobra-dominicana/public";
 //var url_ajax = "http://localhost/cobrave/fantasy-cobra-dominicana/public";

/************************************************************************
 *   Funcion: login_sports                                               *
 *   Descripcion: Permite crear las variables de sesion correspondientes *
 *                a la ruta, el deporte y liga seleccionada en el modal. *
 *   Parametros de entrada:                                              *
 *                           + route => Valor relacionado a la ruta.     *
 *                           + sport => Valor relacionado al deporte.    *
 *                           + league => Valor relacionado a la liga.    *
 *                           + auth => Valor relacionado a la conexion.  *
 ************************************************************************/
function login_sports(route, sport, league, auth) {
    /******************************************************
    *  Auth: Logueado => 0, Deslogueado => 1.             *
    ******************************************************/
    // alert('route: '+route);
    // alert('sport: '+sport);
    // alert('league: '+league);
    // alert('auth: '+auth);

    var url = "";

    if(auth == 1){
        
         url = url_ajax + "/usuario/login-con-deporte";

    }else{
        
        url = url_ajax + "/login-con-deporte";

    }

    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"route": route, "sport": sport, "league": league},
        success: function (data) {
            //console.log("login_sports >>"+data);
            $('#sports').modal('hide');

            if (auth == 1) {
                $("#login").modal("show");
            }
            else {
                if (route == 1) {
                   
                    window.location.href = url_ajax + "/usuario/crear-equipo";


                }
                if (route == 2) {
                    
                    window.location.href = url_ajax + "/usuario/crear-competicion";


                }
                if (route == 3) {
                    
                    window.location.href = url_ajax + "/usuario/ver-equipos";


                }
            }

        }
    });
}

/************************************************************************
 *   Funcion: login                                                      *
 *   Descripcion: Permite crear las variables de sesion correspondientes *
 *                a la ruta a la cual se hara redireccion.               *
 *   Parametros de entrada:                                              *
 *                           + route => Valor relacionado a la ruta.     *
 ************************************************************************/
function login(route) {

    var url = "";
    url     = url_ajax + "/login-sin-deporte";

    
    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"route": route},
        success: function (data) {
            //console.log("login >>"+data);
            $("#cajero").modal("hide");
            $("#login").modal("show");
        }
    });
}

/*****************************************************************************
 *   Funcion: login_modal_competition                                         *
 *   Descripcion: Permite crear las variables de sesion correspondientes a la *
 *                competicion y la ruta a la cual posteriormente se hara      *
 *                redireccion.                                                *
 *   Parametros de entrada:                                                   *
 *                           +route => Valor relacionado a la ruta.           *
 *                           +sport => Deporte.                               *
 *                           +league => Liga.                                 *
 *                           +competition_id => Id de la competicion.         *
 *                           +type_competition => Tipo de competicion.        *
 *                           +auth => Conexion del usuario.                   *
 *****************************************************************************/
function login_modal_competition(route, sport, league, competition_id, type_competition, auth) {
    /******************************************************
     *  Auth: Logueado => 0, Deslogueado => 1.             *
     ******************************************************/
    if (type_competition == 1) {

        if ($("#password").val().length < 1) {
            $("#message").html("");
            var response = "<div id='danger' class='alert alert-danger'>" +
                                "<strong>¡Error! </strong> Por favor introduzca la contraseña." +
                           "</div>";
            $(response).appendTo("#message");

            setTimeout(function () {
                $("#danger").fadeOut(1500);
            }, 10000);

        }else{

            var url = "";

            if(auth == 1){

                url = url_ajax +  "/usuario/buscar-clave-competicion";

                
            }else{

                url = url_ajax + "/buscar-clave-competicion";

            }

            $.ajax({
                url: url,
                type: "POST",
                async: true,
                data: {"competition_id": competition_id},
                success: function (data) {
                    console.log("login_modal_competition >>"+data);
                    var information = jQuery.parseJSON(data);
                    $(information).each(function (index, element) {
                        if (element.password != $("#password").val()) {
                            $("#message").html("");
                            var response = "<div id='danger' class='alert alert-danger'>" +
                                "<strong>¡Error! </strong> Contraseña inválida." +
                                "</div>";
                            $(response).appendTo("#message");

                            setTimeout(function () {
                                $("#danger").fadeOut(1500);
                            }, 10000);
                        }
                        else {
                            ajax_login_modal_competition(route, sport, league, competition_id, auth);
                        }
                    });
                }
            });
        }
    }

    if (type_competition == 0) {
        ajax_login_modal_competition(route, sport, league, competition_id, auth);
    }
}

/*****************************************************************************
 *   Funcion: ajax_login_modal_competition                                    *
 *   Descripcion: Permite crear las variables de sesion correspondientes a la *
 *                competicion y la ruta a la cual posteriormente se hara      *
 *                redireccion.                                                *
 *   Parametros de entrada:                                                   *
 *                           +route => Valor relacionado a la ruta.           *
 *                           +sport => Deporte.                               *
 *                           +league => Liga.                                 *
 *                           +competition_id => Id de la competicion.         *
 *                           +type_competition => Tipo de competicion.        *
 *                           +auth => Conexion del usuario.                   *
 *****************************************************************************/
function ajax_login_modal_competition(route, sport, league, competition_id, auth) {

    var url = "";

    if(auth == 1){

       url = url_ajax + "/usuario/login-modal-competicion";

    }else{
        
        url = url_ajax + "/login-modal-competicion";

    }

    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"route": route, "sport": sport, "league": league, "competition_id": competition_id},
        success: function (data) {
            //console.log("ajax_login_modal_competition >>"+data);
            $("#info_competition").modal("hide");
            if (auth == 1) {
                $("#login").modal("show");
            }
            else {
                if (route == 1) {

                    window.location.href = url_ajax+"/usuario/crear-equipo";
                }

                if (route == 3) {

                    window.location.href = url_ajax+"/usuario/ver-equipos";
                }
            }
        }
    });
}

/************************************************************************
 *   Funcion:                                                            *
 *   Descripcion: Permite detectar la inactividad en la pagina para el   *
 *                cierre de sesion por motivos de seguridad.             *
 *   Parametros de entrada: NA.                                          *
 ************************************************************************/
var time = null;

function inactivity() {
    if (time != null) {
        clearTimeout(time);
    }
    
    time = setTimeout("close_session()", 600000);
    return time;
}

function close_session() {
    
    window.location.href = url_ajax+"/inactividad";

    
}

/************************************************************************
 *   Funcion: forgot_contrasena                                          *
 *   Descripcion: Permite abrin el modal para ingresar el correo cuya    *
 *                contraseña fue olvidada.                               *
 *   Parametros de entrada: NA.                                          *
 ************************************************************************/
function forgot_password() {
    $("#login").modal("hide");
    $("#forgot-password").modal("show");
}

/************************************************************************
 *   Descripcion: Permite cargar el slider.                              *
 *   Parametros de entrada: NA.                                          *
 ************************************************************************/
$(function () {
    $(".rslides").responsiveSlides();
});