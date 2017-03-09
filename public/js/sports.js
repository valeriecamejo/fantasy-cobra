/*************************************************************************
 *   Funcion: select_sport                                               *
 *   Descripcion: Permite habilitar en el modal las ligas que estan      *
 *                disponibles, segun el deporte seleccionado.            *
 *   Parametros de entrada:                                              *
 *                           +action: Crear equipo o competicion.        *
 *                           +auth: Conexion del usuario.                *
 ************************************************************************/
function action(action, auth){
    /******************************************************
    *  Action: Crear equipo => 1, Crear competicion => 2. *
    *          Ver equipos => 3.                          *
    *  Auth: Logueado => 0, Deslogueado => 1.             *
    ******************************************************/
    var url = (window.location.href).split("/").pop();
    var activar = url.split(".",1);

    $("#baseball-leagues").html("");
    $("#football-leagues").html("");

    var options_b = "<a onclick='login_sports("+action+",1,11,"+auth+")'>";
                        if(activar == "ver-equipos" || activar == "ver-mis-competiciones" || activar == "ver-promociones"
                           || activar == "crear-equipo" || activar == "editar-equipo" || activar == "historial"
                           || activar == "referir-amigo" || activar == "perfil-usuario" || activar == "terminos-y-servicios"
                           || activar == "pliticas-de-privacidad" || activar == "terminos-y-servicios" || activar == "como-jugar"
                           || activar == "reglas"){
                            options_b = options_b + "<img src='../images/ico/selecmlb.png' alt='MLB'>";
                        }
                        else{
                            options_b = options_b + "<img src='images/ico/selecmlb.png' alt='MLB'>";
                        }
                    options_b = options_b + "</a>"+
                    //"<a onclick='disponibility(1,12)'>";
                    "<a onclick='login_sports("+action+",1,12,"+auth+")'>";
                        if(activar == "ver-equipos" || activar == "ver-mis-competiciones" || activar == "ver-promociones"
                            || activar == "crear-equipo" || activar == "editar-equipo" || activar == "historial"
                            || activar == "referir-amigo" || activar == "perfil-usuario" || activar == "terminos-y-servicios"
                            || activar == "pliticas-de-privacidad" || activar == "terminos-y-servicios" || activar == "como-jugar"
                            || activar == "reglas"){
                            options_b = options_b + "<img src='../images/ico/seleclvbp.png' alt='LVBP'>";
                        }
                        else{
                            options_b = options_b + "<img src='images/ico/seleclvbp.png' alt='LVBP'>";
                        }
                    options_b = options_b + "</a>";

    var options_f = //"<a onclick='disponibility(2,27)'>";
                         "<a onclick='login_sports("+action+",2,27,"+auth+")'>";
                        if(activar == "ver-equipos" || activar == "ver-mis-competiciones" || "ver-promociones"){
                            options_f = options_f + "<img src='../images/ico/seleclaliga.png' alt='LaLiga'>";
                        }
                        else{
                            options_f = options_f + "<img src='images/ico/seleclaliga.png' alt='LaLiga'>";
                        }
                    options_f = options_f + "</a>"+
                    //"<a onclick='disponibility(2,28)'>";
                     "<a onclick='login_sports("+action+",2,28,"+auth+")'>";
                        if(activar == "ver-equipos" || activar == "ver-mis-competiciones" || "ver-promociones"){
                            options_f = options_f + "<img src='../images/ico/selecucl.png' alt='UCL'>";
                        }
                        else{
                            options_f = options_f + "<img src='images/ico/selecucl.png' alt='UCL'>";
                        }
                    options_f = options_f + "</a>";

    $("#baseball-leagues").append(options_b);
    $("#football-leagues").append(options_f);
    $("#select_league").css("display","none");
    $("#baseball-leagues").css("display","none");
    $("#football-leagues").css("display","none");

    $('#sports').modal('show');
}

/************************************************************************
*   Funcion: select_sport                                               *
*   Descripcion: Permite habilitar en el modal las ligas que estan      *
*                disponibles, segun el deporte seleccionado.            *
*   Parametros de entrada:                                              *
*                           +sport: Deporte (1 => Beisbol, 2 => Futbol) *
************************************************************************/
function select_sport(sport){
    if(sport == 1){
        $("#select_league").css("display","block");
        $("#baseball-leagues").css("display","block");
        $("#football-leagues").css("display","none");
    }
    else{
        $("#select_league").css("display","block");
        $("#baseball-leagues").css("display","none");
        $("#football-leagues").css("display","block");
    }
}

/************************************************************************
*   Funcion: select_sport                                               *
*   Descripcion: Permite habilitar en el modal las ligas que estan      *
*                disponibles, segun el deporte seleccionado.            *
*   Parametros de entrada:                                              *
*                           +sport: Deporte (1 => Beisbol, 2=> Futbol)  *
*                           +league: Liga (11 => MLB, 12 => LVBP,       *
*                                        13 => LIDOM, 27 => LaLiga,     *
*                                        28 => UCL)                     *
************************************************************************/
function disponibility(sport, league){
    if(sport == 1 && league == 12){
        $("#message_sport").html("");
        var response = "<div id='danger' class='alert alert-danger'>" +
                            "LVBP estará disponible próximamente." +
                       "</div>";
        $(response).appendTo("#message_sport");

        setTimeout(function () {
            $("#danger").fadeOut(1500);
        }, 10000);
    }

    if(sport == 2 && league == 27){
        $("#message_sport").html("");
        var response = "<div id='danger' class='alert alert-danger'>" +
                            "LaLiga estará disponible próximamente." +
                       "</div>";
        $(response).appendTo("#message_sport");

        setTimeout(function () {
            $("#danger").fadeOut(1500);
        }, 10000);
    }
    if(sport == 2 && league == 28){
        $("#message_sport").html("");
        var response = "<div id='danger' class='alert alert-danger'>" +
                            "UCL estará disponible próximamente." +
                       "</div>";
        $(response).appendTo("#message_sport");

        setTimeout(function () {
            $("#danger").fadeOut(1500);
        }, 10000);
    }
} 

/************************************************************************
*   Funcion: select_type                                               *
*   Descripcion: Permite habilitar en el modal las ligas que estan      *
*                disponibles, segun el deporte seleccionado.            *
*   Parametros de entrada:                                              *
*                           +sport: Deporte (1 => Beisbol, 2 => Futbol) *
************************************************************************/
function select_type(sport){
    if(sport == 1){
        $("#select_type").css("display","block");
        $("#pay-type").css("display","block");
        $("#getmoney-type").css("display","none");
    }
    else{
        $("#select_type").css("display","block");
        $("#pay-type").css("display","none");
        $("#getmoney-type").css("display","block");
    }
}