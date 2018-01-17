// Url global
//var url_ajax = "https://www.fantasycobra.com.ve";
//var url_ajax = "http://localhost/fantasy-cobra-dominicana/public";
// var url_ajax = "http://localhost/cobrave/fantasy-cobra-dominicana/public";
var url_ajax = "http://localhost/cobraverepotenciado/fantasy-cobra-venezuela-repotenciado/public";

/************************************************************************
*   Funcion: lobby                                                      *
*   Descripcion: Permite cargar las competiciones en la tabla del lobby.*
*   Parametros de entrada:                                              *
*                           +folder_tabs: Pestaña seleccionada.         *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function lobby(folder_tabs, auth){

    /******************************************************
    * folder_tabs: Todas => 0, Beisbol => 1, Futbol => 2. *
    * Auth: Logueado => 0, Deslogueado => 1.              *
    ******************************************************/
    var today               =   $("#today").val();
    var url                 =   "";
    var loader              =   '<span id="loader" class="loader"><span class="loader-inner"></span></span>';
    var get_position_loader =   '';
    //alert(folder_tabs);

    if(folder_tabs == 0){

        get_position_loader = 'all-no-mobile';

        if(auth == 1){

            url = url_ajax + "/todas-las-competiciones";

        }else{

            url = url_ajax + "/usuario/todas-las-competiciones";

        }

        $("#table-all-no-mobile").html("");
        $("#table-baseball-no-mobile").html("");
        $("#table-football-no-mobile").html("");
    }

    if(folder_tabs == 1){

        get_position_loader = 'baseball-no-mobile';

        if(auth == 1){

            url = url_ajax + "/competiciones-de-beisbol";

        }else{

            url = url_ajax + "/usuario/competiciones-de-beisbol";
        }

        $("#table-all-no-mobile").html("");
        $("#table-baseball-no-mobile").html("");

    }

    if(folder_tabs == 2){

        get_position_loader = 'football-no-mobile';

        if(auth == 1){

            url = url_ajax + "/competiciones-de-futbol";

        }else{

            url = url_ajax + "/usuario/competiciones-de-futbol";
        }

        $("#table-all-no-mobile").html("");
        $("#table-football-no-mobile").html("");
    }

    $('#'+get_position_loader).append(loader); // Carga el loading

    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"date": today, "type_game_id": folder_tabs},
        success: function(data){
            //console.log("=======>>"+data);
            $('#loader').remove(); // Elimina el loading
            var information = jQuery.parseJSON(data);
            add_rows_lobby(folder_tabs, information, auth);
        }
    });
}

/************************************************************************
*   Funcion: lobby_mobile                                               *
*   Descripcion: Permite cargar las competiciones en la tabla del lobby.*
*   Parametros de entrada:                                              *
*                           +folder_tabs: Pestaña seleccionada.         *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function lobby_mobile(folder_tabs, auth){

    /******************************************************
    * folder_tabs: Todas => 0, Beisbol => 1, Futbol => 2. *
    * Auth: Logueado => 0, Deslogueado => 1.              *
    ******************************************************/
    var today               =   $("#today").val();
    var url                 =   "";
    var loader              =   '<span id="loader" class="loader"><span class="loader-inner"></span></span>';
    var get_position_loader =   '';

    if(folder_tabs == 0){

        get_position_loader = 'all-mobile';

        if(auth == 1){

           url = url_ajax + "/todas-las-competiciones";

        }else{

            url = url_ajax + "/usuario/todas-las-competiciones";

        }

        $("#ul-all-mobile").html("");
        $("#ul-baseball-mobile").html("");
        $("#ul-football-mobile").html("");
    }

    if(folder_tabs == 1){

        get_position_loader = 'baseball-mobile';

        if(auth == 1){

             url = url_ajax + "/competiciones-de-beisbol";

        }else{

            url = url_ajax + "/usuario/competiciones-de-beisbol";

        }

        $("#ul-all-mobile").html("");
        $("#ul-baseball-mobile").html("");
    }

    if(folder_tabs == 2){

        get_position_loader = 'football-mobile';

        if(auth == 1){

            url = url_ajax + "/competiciones-de-futbol";

        }else{

            url = url_ajax + "/usuario/competiciones-de-futbol";

        }

        $("#ul-all-mobile").html("");
        $("#ul-football-mobile").html("");
    }

    $('#'+get_position_loader).append(loader); // Carga el loading

    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"date": today, "type_game_id": folder_tabs},
        success: function(data){
            //console.log("=======>>"+data);
            $('#loader').remove(); // Elimina el loading
            var information = jQuery.parseJSON(data);
            add_rows_lobby_mobile(folder_tabs, information, auth);
        }
    });
}

/************************************************************************
*   Funcion: my_lobby                                                   *
*   Descripcion: Permite cargar las competiciones en la tabla de        *
*               competiciones del usuario.
*   Parametros de entrada:                                              *
*                           +folder_tabs: Pestaña seleccionada.         *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function my_lobby(folder_tabs, auth){

    /******************************************************
    * folder_tabs: Todas => 0, Beisbol => 1, Futbol => 2. *
    * Auth: Logueado => 0, Deslogueado => 1.              *
    ******************************************************/
    var url = "";

    //alert('folder_tabs: '+folder_tabs);
    //alert('auth: '+auth);

    if(folder_tabs == 0){

        if(auth == 0){

            url = url_ajax + "/usuario/ver-mis-competiciones/todas-mis-competiciones";

        }

        $("#my-table-all-no-mobile").html("");
        $("#my-table-baseball-no-mobile").html("");
        $("#my-table-football-no-mobile").html("");
    }

    if(folder_tabs == 1){

        if(auth == 0){

            url = url_ajax + "/usuario/ver-mis-competiciones/mis-competiciones-de-beisbol";

        }

        $("#my-table-all-no-mobile").html("");
        $("#my-table-baseball-no-mobile").html("");
    }

    if(folder_tabs == 2){

        if(auth == 0){

            url = url_ajax + "/usuario/ver-mis-competiciones/mis-competiciones-de-futbol";

        }

        $("#my-table-all-no-mobile").html("");
        $("#my-table-football-no-mobile").html("");
    }

    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"type_game_id": folder_tabs},
        success: function(data){
            //console.log("=======>>"+data);
            var information = jQuery.parseJSON(data);
            add_rows_my_lobby(folder_tabs, information, auth);
        }
    });
}

/************************************************************************
*   Funcion: my_lobby_mobile                                            *
*   Descripcion: Permite cargar las competiciones en la tabla del lobby.*
*   Parametros de entrada:                                              *
*                           +folder_tabs: Pestaña seleccionada.         *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function my_lobby_mobile(folder_tabs, auth){

    /******************************************************
     * folder_tabs: Todas => 0, Beisbol => 1, Futbol => 2. *
     * Auth: Logueado => 0, Deslogueado => 1.              *
     ******************************************************/
    var today    = $("#today").val();
    var url      = "";

    if(folder_tabs == 0){

        if(auth == 0){

            url = url_ajax + "/usuario/ver-mis-competiciones/todas-mis-competiciones";

        }

        $("#my-ul-all-mobile").html("");
        $("#my-ul-baseball-mobile").html("");
        $("#my-ul-football-mobile").html("");
    }

    if(folder_tabs == 1){

        if(auth == 0){

            url = url_ajax + "/usuario/ver-mis-competiciones/mis-competiciones-de-beisbol";

        }

        $("#my-ul-all-mobile").html("");
        $("#my-ul-baseball-mobile").html("");
    }

    if(folder_tabs == 2){

        if(auth == 0){

            url = url_ajax + "/usuario/ver-mis-competiciones/mis-competiciones-de-futbol";

        }

        $("#my-ul-all-mobile").html("");
        $("#my-ul-football-mobile").html("");
    }

    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"date": today, "type_game_id": folder_tabs},
        success: function(data){
            //console.log("=======>>"+data);
            var information = jQuery.parseJSON(data);
            add_rows_my_lobby_mobile(folder_tabs, information, auth);
        }
    });
}

/************************************************************************
*   Funcion: add_rows_lobby                                             *
*   Descripcion: Permite agregar las filas en la tabla de competiciones.*
*   Parametros de entrada:                                              *
*                           +folder_tabs: Pestaña seleccionada.         *
*                           +information: Informacion completa de las   *
*                                         competiciones.                *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function add_rows_lobby(folder_tabs, information, auth){

     /******************************************************
     * folder_tabs: Todas => 0, Beisbol => 1, Futbol => 2. *
     * Auth: Logueado => 0, Deslogueado => 1.              *
     ******************************************************/
     var today      = $("#today").val();
     var array_days = ['', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];

     $(information).each(function(index, element){
         $(element.featured_competitions).each(function(i, competition){

             var competition_date    = competition.date.split("-");
             var competition_day     = competition_date[2];
             var competition_month   = parseInt(competition_date[1]) - 1;
             var competition_year    = competition_date[0];
             var date                = new Date(competition_year, competition_month, competition_day);
             var date_future         = new Date(competition_year, competition_month, competition_day, competition.hour, '00', '00')
             var today_today         = new Date();

             competition_month = competition_month + 1;
             if(competition_month < 10){
                 competition_month = "0" + competition_month;
             }
             var row = "<tr>"+
                            "<td class='tdimg1'>";
                                 if(competition.season_format == 11){
                                     row = row +"<img src='images/BolaMLB.png' class='tabimgtablet' alt='MLB'>";
                                 }
                                 if(competition.season_format == 12){
                                     row = row +"<img src='images/BolaLVBP.png' class='tabimgtablet' alt='LVBP'>";
                                 }
                                 if(competition.season_format == 13){
                                     row = row +"<img src='images/BolaLIDOM.png' class='tabimgtablet' alt='LIDOM'>";
                                 }
                                 if(competition.season_format == 27){
                                     row = row +"<img src='images/BolaLIGA.png' class='tabimgtablet' alt='LaLiga'>";
                                 }
                                 if(competition.season_format == 28){
                                     row = row +"<img src='images/BolaUCL.png' class='tabimgtablet' alt='UCL'>";
                                 }
                            row = row + "</td>"+
                            "<td class='tdimg2'>"+
                                "<img src='images/ico/star.png' class='Startd' alt='star'>"+
                            "</td>"+
                            "<td class='tdcomp2 notdpad' id='tdcomp'>";
                                if(competition.season_format == 11){
                                    row = row + "<a onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                     row = row + "<a onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.name+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdinscr2 notdpad'>"+
                                 "<span>";
                                        if(competition.type_competition == 0){
                                            row = row + "<img src='/images/ico/no-space.png' class='candado'>";
                                        }
                                        if(competition.type_competition == 1){
                                            row = row + "<img src='/images/ico/lock.png' class='candado'>";
                                        }
                                        if(competition.type_competition == 1){
                                            row = row + "<img src='/images/ico/ticket.png' class='candado'>";
                                        }
                                 row = row + "</span>"+
                                 competition.enrolled + "/" + competition.max_user +
                            "</td>"+
                            "<td class='tdentr2 notdpad'>";
                                if(competition.free == 0){
                                    row = row + "<span>"+
                                                    "<img src='/images/ico/multiple.png' class='multiple'>"+
                                                "</span>";
                                }

                                row = row + competition.cost_entry.toLocaleString('de-DE') + " Bs."+
                            "</td>"+
                            "<td class='RepColor tdpremio2 notdpad'>";
                                if(competition.pote == 0){
                                    row = row + "<span>"+
                                                    "<img src='/images/ico/aumento.png' class='tdAumenico'>"+
                                                "</span>";
                                }
                                if(competition.pote == 0){
                                    row = row + "<span>"+
                                                    "<img src='/images/ico/garantizado.png' class='tdGaranico'>"+
                                                "</span>";
                                }

                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                 if(competition.season_format == 13){
                                     row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                 }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.cost_garanteed.toLocaleString('de-DE') + " Bs."+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdfecha2 notdpad'>"+
                                array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                            "</td>"+
                            "<td class='tdhora2 notdpad'>"+
                                competition.hour + ":00 "+ competition.hour_format +
                            "</td>"+
                            "<td class='notdpad'>";
                                if(competition.date == today){
                                    row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                    "00:00:00"+
                                                "</span>";
                                }
                                if(competition.date > today){
                                    var difference  = (date_future.getTime() - today_today.getTime()) / 1000;
                                    var days        = Math.floor(difference / 86400) + 1;

                                    row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                    "+" + days + " días"+
                                                "</span>";
                                }
                                row = row + "</td>"+
                            "<td class='tdentrar2'>";
                                if(competition.season_format == 11){
                                    row = row + "<a onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                 if(competition.season_format == 13){
                                     row = row + "<a onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                 }
                                if(competition.season_format == 27){
                                    row = row + "<a onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + "<div class='BtnEntrar2'>ENTRAR</div>"+
                                                "</a>"+
                            "</td>"+
                     "</tr>";
             if(folder_tabs == 0){
                 $("#table-all-no-mobile").append(row);
             }
             if(folder_tabs == 1){
                 $("#table-baseball-no-mobile").append(row);
             }
             if(folder_tabs == 2){
                 $("#table-football-no-mobile").append(row);
             }
         });

         $(element.no_featured_competitions).each(function(j, competition){

             var competition_date    = competition.date.split("-");
             var competition_day     = competition_date[2];
             var competition_month   = parseInt(competition_date[1]) - 1;
             var competition_year    = competition_date[0];
             var date                = new Date(competition_year, competition_month, competition_day);
             var date_future         = new Date(competition_year, competition_month, competition_day, competition.hour, '00', '00')
             var today_today         = new Date();

             competition_month = competition_month + 1;
             if(competition_month < 10){
                 competition_month = "0" + competition_month;
             }

             var row = "<tr>"+
                            "<td class='tdimg1'>";
                                if(competition.season_format == 11){
                                    row = row +"<img src='/images/BolaMLB.png' class='tabimgtablet' alt='MLB'>";
                                }
                                if(competition.season_format == 12){
                                    row = row +"<img src='/images/BolaLVBP.png' class='tabimgtablet' alt='LVBP'>";
                                }
                                 if(competition.season_format == 13){
                                     row = row +"<img src='/images/BolaLIDOM.png' class='tabimgtablet' alt='LIDOM'>";
                                 }
                                if(competition.season_format == 27){
                                    row = row +"<img src='/images/BolaLIGA.png' class='tabimgtablet' alt='LaLiga'>";
                                }
                                if(competition.season_format == 28){
                                    row = row +"<img src='/images/BolaUCL.png' class='tabimgtablet' alt='UCL'>";
                                }
                            row = row + "</td>"+
                            "<td class='tdimg2'>"+
                                "<img src='/images/ico/no-space.png' class='Startd' alt='star'>"+
                            "</td>"+
                            "<td class='tdcomp2 notdpad' id='tdcomp'>";
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                 if(competition.season_format == 13){
                                     row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                 }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.name+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdinscr2 notdpad'>"+
                                "<span>";
                                     if(competition.type_competition == 0){
                                         row = row + "<img src='/images/ico/no-space.png' class='candado'>";
                                     }
                                     if(competition.type_competition == 1){
                                         row = row + "<img src='/images/ico/lock.png' class='candado'>";
                                     }
                                     if(competition.type_competition == 2){
                                         row = row + "<img src='/images/ico/ticket.png' class='candado'>";
                                     }
                                row = row + "</span>"+
                                competition.enrolled + "/" + competition.max_user +
                            "</td>"+
                            "<td class='tdentr2 notdpad'>";
                                 if(competition.free == 0){
                                     row = row + "<span>"+
                                                    "<img src='/images/ico/multiple.png' class='multiple'>"+
                                                 "</span>";
                                 }
                                 row = row + competition.cost_entry.toLocaleString('de-DE') + " Bs."+
                            "</td>"+
                            "<td class='RepColor tdpremio2 notdpad'>";
                                 if(competition.pote == 0){
                                     row = row + "<span>"+
                                         "<img src='/images/ico/aumento.png' class='tdAumenico'>"+
                                         "</span>";
                                 }
                                 if(competition.pote == 1){
                                     row = row + "<span>"+
                                                    "<img src='/images/ico/garantizado.png' class='tdGaranico'>"+
                                                 "</span>";
                                 }
                                 if(competition.season_format == 11){
                                     row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                 }
                                 if(competition.season_format == 12){
                                     row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                 }
                                 if(competition.season_format == 13){
                                     row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                 }
                                 if(competition.season_format == 27){
                                     row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                 }
                                 if(competition.season_format == 28) {
                                     row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                 }

                                                    row = row + competition.cost_garanteed.toLocaleString('de-DE') + " Bs."+
                                                 "</a>"+
                            "</td>"+
                            "<td class='tdfecha2 notdpad'>"+
                                array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                            "</td>"+
                            "<td class='tdhora2 notdpad'>"+
                                competition.hour + ":00 "+ competition.hour_format +
                            "</td>"+
                            "<td class='notdpad'>";
                                if(competition.date == today){
                                    row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                    "00:00:00"+
                                                "</span>";
                                }
                                if(competition.date > today){
                                    var difference  = (date_future.getTime() - today_today.getTime()) / 1000;
                                    var days        = Math.floor(difference / 86400) + 1;

                                    row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                    "+" + days + " días"+
                                                "</span>";
                                }
                            row = row + "</td>"+
                            "<td class='tdentrar2'>";
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                 if(competition.season_format == 13){
                                     row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                 }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + "<div class='BtnEntrar2'>ENTRAR</div>"+
                                                "</a>"+
                            "</td>"+
                      "</tr>";

             if(folder_tabs == 0){
                 $("#table-all-no-mobile").append(row);
             }
             if(folder_tabs == 1){
                 $("#table-baseball-no-mobile").append(row);
             }
             if(folder_tabs == 2){
                 $("#table-football-no-mobile").append(row);
             }
         });
     });
}

/************************************************************************
*   Funcion: add_rows_my_lobby                                          *
*   Descripcion: Permite agregar las filas en la tabla de competiciones.*
*   Parametros de entrada:                                              *
*                           +folder_tabs: Pestaña seleccionada.         *
*                           +information: Informacion completa de las   *
*                                         competiciones.                *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function add_rows_my_lobby(folder_tabs, information, auth){

    /******************************************************
    * folder_tabs: Todas => 0, Beisbol => 1, Futbol => 2. *
    * Auth: Logueado => 0, Deslogueado => 1.              *
    ******************************************************/
    var today      = $("#today").val();
    var array_days = ['', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];

    $(information).each(function(index, element){

        $(element.featured_competitions).each(function(i, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);
            var date_future         = new Date(competition_year, competition_month, competition_day, competition.hour, '00', '00')
            var today_today         = new Date();

            competition_month = competition_month + 1;

            if(competition_month < 10){
                competition_month = "0" + competition_month;
            }

            var row = "<tr>"+
                            "<td class='tdimg1'>";
                                if(competition.season_format == 11){
                                    row = row +"<img src='../images/BolaMLB.png' class='tabimgtablet' alt='MLB'>";
                                }
                                if(competition.season_format == 12){
                                    row = row +"<img src='../images/BolaLVBP.png' class='tabimgtablet' alt='LVBP'>";
                                }
                                if(competition.season_format == 13){
                                    row = row +"<img src='../images/BolaLIDOM.png' class='tabimgtablet' alt='LIDOM'>";
                                }
                                if(competition.season_format == 27){
                                    row = row +"<img src='../images/BolaLIGA.png' class='tabimgtablet' alt='LaLiga'>";
                                }
                                if(competition.season_format == 28){
                                    row = row +"<img src='../images/BolaUCL.png' class='tabimgtablet' alt='UCL'>";
                                }
                            row = row + "</td>"+
                            "<td class='tdimg2'>"+
                                "<img src='../images/ico/star.png' class='Startd' alt='star'>"+
                            "</td>"+
                            "<td class='tdcomp2 notdpad' id='tdcomp'>";
                                if(competition.season_format == 11){
                                    row = row + "<a onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.name+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdinscr2 notdpad'>"+
                                "<span>";
                                    if(competition.type_competition == 0){
                                        row = row + "<img src='../images/ico/no-space.png' class='candado'>";
                                    }
                                    if(competition.type_competition == 1){
                                        row = row + "<img src='../images/ico/lock.png' class='candado'>";
                                    }
                                    if(competition.type_competition == 1){
                                        row = row + "<img src='../images/ico/ticket.png' class='candado'>";
                                    }
                                row = row + "</span>"+
                                competition.enrolled + "/" + competition.max_user +
                            "</td>"+
                            "<td class='tdentr2 notdpad'>";
                                if(competition.free == 0){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/multiple.png' class='multiple'>"+
                                                "</span>";
                                }
                                row = row + competition.cost_entry.toLocaleString('de-DE') + " Bs."+
                            "</td>"+
                            "<td class='RepColor tdpremio2 notdpad'>";
                                if(competition.pote == 0){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/aumento.png' class='tdAumenico'>"+
                                                "</span>";
                                }
                                if(competition.pote == 0){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/garantizado.png' class='tdGaranico'>"+
                                                "</span>";
                                }
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.cost_garanteed.toLocaleString('de-DE') + " Bs."+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdfecha2 notdpad'>"+
                                array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                            "</td>"+
                            "<td class='tdhora2 notdpad'>"+
                                competition.hour + ":00 "+ competition.hour_format +
                            "</td>"+
                            "<td class='notdpad'>";
                                if(competition.date == today){
                                    row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                    "00:00:00"+
                                                "</span>";
                                }
                                if(competition.date > today){
                                    var difference  = (date_future.getTime() - today_today.getTime()) / 1000;
                                    var days        = Math.floor(difference / 86400) + 1;

                                    row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                    "+" + days + " días"+
                                                "</span>";
                                }
                            row = row + "</td>"+
                            "<td class='tdentrar2'>";
                                if(competition.season_format == 11){
                                    row = row + "<a onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + "<div class='BtnEntrar2'>ENTRAR</div>"+
                                                "</a>"+
                            "</td>"+
                    "</tr>";
            if(folder_tabs == 0){
                $("#my-table-all-no-mobile").append(row);
            }
            if(folder_tabs == 1){
                $("#my-table-baseball-no-mobile").append(row);
            }
            if(folder_tabs == 2){
                $("#my-table-football-no-mobile").append(row);
            }
        });

        $(element.no_featured_competitions).each(function(j, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);
            var date_future         = new Date(competition_year, competition_month, competition_day, competition.hour, '00', '00')
            var today_today         = new Date();

            competition_month = competition_month + 1;
            if(competition_month < 10){
                competition_month = "0" + competition_month;
            }

            var row = "<tr>"+
                            "<td class='tdimg1'>";
                                if(competition.season_format == 11){
                                    row = row +"<img src='../images/BolaMLB.png' class='tabimgtablet' alt='MLB'>";
                                }
                                if(competition.season_format == 12){
                                    row = row +"<img src='../images/BolaLVBP.png' class='tabimgtablet' alt='LVBP'>";
                                }
                                if(competition.season_format == 13){
                                    row = row +"<img src='../images/BolaLIDOM.png' class='tabimgtablet' alt='LIDOM'>";
                                }
                                if(competition.season_format == 27){
                                    row = row +"<img src='../images/BolaLIGA.png' class='tabimgtablet' alt='LaLiga'>";
                                }
                                if(competition.season_format == 28){
                                    row = row +"<img src='../images/BolaUCL.png' class='tabimgtablet' alt='UCL'>";
                                }
                            row = row + "</td>"+
                            "<td class='tdimg2'>"+
                                "<img src='../images/ico/no-space.png' class='Startd' alt='star'>"+
                            "</td>"+
                            "<td class='tdcomp2 notdpad' id='tdcomp'>";
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.name+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdinscr2 notdpad'>"+
                                "<span>";
                                    if(competition.type_competition == 0){
                                        row = row + "<img src='../images/ico/no-space.png' class='candado'>";
                                    }
                                    if(competition.type_competition == 1){
                                        row = row + "<img src='../images/ico/lock.png' class='candado'>";
                                    }
                                    if(competition.type_competition == 2){
                                        row = row + "<img src='../images/ico/ticket.png' class='candado'>";
                                    }
                                row = row + "</span>"+
                                competition.enrolled + "/" + competition.max_user +
                            "</td>"+
                            "<td class='tdentr2 notdpad'>";
                                if(competition.free == 0){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/multiple.png' class='multiple'>"+
                                                "</span>";
                                }
                                row = row + competition.cost_entry.toLocaleString('de-DE') + " Bs."+
                            "</td>"+
                            "<td class='RepColor tdpremio2 notdpad'>";
                                if(competition.pote == 0){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/aumento.png' class='tdAumenico'>"+
                                                "</span>";
                                }
                                if(competition.pote == 1){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/garantizado.png' class='tdGaranico'>"+
                                                "</span>";
                                }
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.cost_garanteed.toLocaleString('de-DE') + " Bs."+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdfecha2 notdpad'>"+
                                array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                            "</td>"+
                            "<td class='tdhora2 notdpad'>"+
                                competition.hour + ":00 "+ competition.hour_format +
                            "</td>"+
                            "<td class='notdpad'>";
                                if(competition.date == today){
                                    row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                    "00:00:00"+
                                                "</span>";
                                }
                                if(competition.date > today){
                                    var difference  = (date_future.getTime() - today_today.getTime()) / 1000;
                                    var days        = Math.floor(difference / 86400) + 1;

                                    row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                    "+" + days + " días"+
                                                "</span>";
                                }
                            row = row + "</td>"+
                            "<td class='tdentrar2'>";
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + "<div class='BtnEntrar2'>ENTRAR</div>"+
                                                "</a>"+
                            "</td>"+
                    "</tr>";

            if(folder_tabs == 0){
                $("#my-table-all-no-mobile").append(row);
            }
            if(folder_tabs == 1){
                $("#my-table-baseball-no-mobile").append(row);
            }
            if(folder_tabs == 2){
                $("#my-table-football-no-mobile").append(row);
            }
        });

        $(element.featured_competitions_yesterday).each(function(k, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);
            var date_future         = new Date(competition_year, competition_month, competition_day, competition.hour, '00', '00')
            var today_today         = new Date();

            competition_month = competition_month + 1;

            if(competition_month < 10){
                competition_month = "0" + competition_month;
            }

            var row = "<tr>"+
                            "<td class='tdimg1'>";
                                if(competition.season_format == 11){
                                    row = row +"<img src='../images/BolaMLB.png' class='tabimgtablet' alt='MLB'>";
                                }
                                if(competition.season_format == 12){
                                    row = row +"<img src='../images/BolaLVBP.png' class='tabimgtablet' alt='LVBP'>";
                                }
                                if(competition.season_format == 13){
                                    row = row +"<img src='../images/BolaLIDOM.png' class='tabimgtablet' alt='LIDOM'>";
                                }
                                if(competition.season_format == 27){
                                    row = row +"<img src='../images/BolaLIGA.png' class='tabimgtablet' alt='LaLiga'>";
                                }
                                if(competition.season_format == 28){
                                    row = row +"<img src='../images/BolaUCL.png' class='tabimgtablet' alt='UCL'>";
                                }
                            row = row + "</td>"+
                            "<td class='tdimg2'>"+
                                "<img src='../images/ico/star.png' class='Startd' alt='star'>"+
                            "</td>"+
                            "<td class='tdcomp2 notdpad' id='tdcomp'>";
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.name+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdinscr2 notdpad'>"+
                                "<span>";
                                    if(competition.type_competition == 0){
                                        row = row + "<img src='../images/ico/no-space.png' class='candado'>";
                                    }
                                    if(competition.type_competition == 1){
                                        row = row + "<img src='../images/ico/lock.png' class='candado'>";
                                    }
                                    if(competition.type_competition == 2){
                                        row = row + "<img src='../images/ico/ticket.png' class='candado'>";
                                    }
                                row = row + "</span>"+
                                competition.enrolled + "/" + competition.max_user +
                            "</td>"+
                            "<td class='tdentr2 notdpad'>";
                                if(competition.free == 0){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/multiple.png' class='multiple'>"+
                                                "</span>";
                                }
                                row = row + competition.cost_entry.toLocaleString('de-DE') + " Bs."+
                            "</td>"+
                            "<td class='RepColor tdpremio2 notdpad'>";
                                if(competition.pote == 0){
                                    row = row + "<span>"+
                                        "<img src='../images/ico/aumento.png' class='tdAumenico'>"+
                                        "</span>";
                                }
                                if(competition.pote == 1){
                                    row = row + "<span>"+
                                        "<img src='../images/ico/garantizado.png' class='tdGaranico'>"+
                                        "</span>";
                                }
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.cost_garanteed.toLocaleString('de-DE') + " Bs."+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdfecha2 notdpad'>"+
                                array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                            "</td>"+
                            "<td class='tdhora2 notdpad'>"+
                                competition.hour + ":00 "+ competition.hour_format +
                            "</td>"+
                            "<td class='notdpad'>";
                                row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                "Finalizado"+
                                            "</span>";
                            row = row + "</td>"+
                            "<td class='tdentrar2'>";
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + "<div class='BtnEntrar2' style='background-color: #c5c5c5;'>ENTRAR</div>"+
                                                "</a>"+
                            "</td>"+
                    "</tr>";

            if(folder_tabs == 0){
                $("#my-table-all-no-mobile").append(row);
            }
            if(folder_tabs == 1){
                $("#my-table-baseball-no-mobile").append(row);
            }
            if(folder_tabs == 2){
                $("#my-table-football-no-mobile").append(row);
            }
        });

        $(element.no_featured_competitions_yesterday).each(function(l, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);
            var date_future         = new Date(competition_year, competition_month, competition_day, competition.hour, '00', '00')
            var today_today         = new Date();

            competition_month = competition_month + 1;

            if(competition_month < 10){
                competition_month = "0" + competition_month;
            }

            var row = "<tr>"+
                            "<td class='tdimg1'>";
                                if(competition.season_format == 11){
                                    row = row +"<img src='../images/BolaMLB.png' class='tabimgtablet' alt='MLB'>";
                                }
                                if(competition.season_format == 12){
                                    row = row +"<img src='../images/BolaLVBP.png' class='tabimgtablet' alt='LVBP'>";
                                }
                                if(competition.season_format == 13){
                                    row = row +"<img src='../images/BolaLIDOM.png' class='tabimgtablet' alt='LIDOM'>";
                                }
                                if(competition.season_format == 27){
                                    row = row +"<img src='../images/BolaLIGA.png' class='tabimgtablet' alt='LaLiga'>";
                                }
                                if(competition.season_format == 28){
                                    row = row +"<img src='../images/BolaUCL.png' class='tabimgtablet' alt='UCL'>";
                                }
                            row = row + "</td>"+
                            "<td class='tdimg2'>"+
                                "<img src='../images/ico/no-space.png' class='Startd' alt='star'>"+
                            "</td>"+
                            "<td class='tdcomp2 notdpad' id='tdcomp'>";
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.name+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdinscr2 notdpad'>"+
                                "<span>";
                                    if(competition.type_competition == 0){
                                        row = row + "<img src='../images/ico/no-space.png' class='candado'>";
                                    }
                                    if(competition.type_competition == 1){
                                        row = row + "<img src='../images/ico/lock.png' class='candado'>";
                                    }
                                    if(competition.type_competition == 2){
                                        row = row + "<img src='../images/ico/ticket.png' class='candado'>";
                                    }
                                row = row + "</span>"+
                                competition.enrolled + "/" + competition.max_user +
                            "</td>"+
                            "<td class='tdentr2 notdpad'>";
                                if(competition.free == 0){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/multiple.png' class='multiple'>"+
                                                "</span>";
                                }
                                row = row + competition.cost_entry.toLocaleString('de-DE') + " Bs."+
                            "</td>"+
                            "<td class='RepColor tdpremio2 notdpad'>";
                                if(competition.pote == 0){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/aumento.png' class='tdAumenico'>"+
                                                "</span>";
                                }
                                if(competition.pote == 1){
                                    row = row + "<span>"+
                                                    "<img src='../images/ico/garantizado.png' class='tdGaranico'>"+
                                                "</span>";
                                }
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + competition.cost_garanteed.toLocaleString('de-DE') + " Bs."+
                                                "</a>"+
                            "</td>"+
                            "<td class='tdfecha2 notdpad'>"+
                                array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                            "</td>"+
                            "<td class='tdhora2 notdpad'>"+
                                competition.hour + ":00 "+ competition.hour_format +
                            "</td>"+
                            "<td class='notdpad'>";
                                row = row + "<span id='"+competition.id+"' style='font-weight:bold;'>"+
                                                "Finalizado"+
                                            "</span>";
                            row = row + "</td>"+
                            "<td class='tdentrar2'>";
                                if(competition.season_format == 11){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,11,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 12){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,12,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 13){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,13,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 27){
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,27,"+competition.id+","+auth+")'>";
                                }
                                if(competition.season_format == 28) {
                                    row = row + "<a class='tdPremio' onclick='modal_competition(1,28,"+competition.id+","+auth+")'>";
                                }
                                                    row = row + "<div class='BtnEntrar2' style='background-color: #c5c5c5;'>ENTRAR</div>"+
                                                "</a>"+
                            "</td>"+
                    "</tr>";

            if(folder_tabs == 0){
                $("#my-table-all-no-mobile").append(row);
            }
            if(folder_tabs == 1){
                $("#my-table-baseball-no-mobile").append(row);
            }
            if(folder_tabs == 2){
                $("#my-table-football-no-mobile").append(row);
            }
        });
    });
}

/************************************************************************
*   Funcion: add_rows_lobby_mobile                                      *
*   Descripcion: Permite agregar las filas en la tabla de competiciones *
*               del usuario.                                            *
*   Parametros de entrada:                                              *
*                           +folder_tabs: Pestaña seleccionada.         *
*                           +information: Informacion completa de las   *
*                                         competiciones.                *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function add_rows_lobby_mobile(folder_tabs, information, auth){

    /******************************************************
    * folder_tabs: Todas => 0, Beisbol => 1, Futbol => 2. *
    * Auth: Logueado => 0, Deslogueado => 1.              *
    ******************************************************/
    var today      = $("#today").val();
    var array_days = ['', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];

    $(information).each(function(index, element){

        $(element.featured_competitions).each(function (i, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);

            competition_month = competition_month + 1;

            if(competition_month < 10){
                competition_month = "0" + competition_month;
            }

            var row = "";

            if(competition.season_format == 11){
                row = row + "<a onclick='modal_competition(1,11," + competition.id + ", " + auth + ")'>";
            }

            if(competition.season_format == 12){
                row = row + "<a onclick='modal_competition(1,12," + competition.id + ", " + auth + ")'>";
            }

            if(competition.season_format == 13){
                row = row + "<a onclick='modal_competition(1,13," + competition.id + ", " + auth + ")'>";
            }

            if(competition.season_format == 27){
                row = row + "<a onclick='modal_competition(1,27," + competition.id + ", " + auth + ")'>";
            }

            if(competition.season_format == 28){
                row = row + "<a onclick='modal_competition(1,28," + competition.id + ", " + auth + ")'>";
            }
                                row = row + "<li class='tmovli'>" +
                                                "<div class='divico'>" +
                                                    "<img src='/images/ico/star.png' class='Star'>" +
                                                "</div>" +
                                                "<h4 class='h4tmovil'>" +
                                                    competition.name +
                                                "</h4>"+
                                                "<div class='tmovilimg'>";
                                                    if(competition.season_format == 11){
                                                        row = row + "<img src='/images/BolaMLB.png' alt='MLB'>";
                                                    }
                                                    if(competition.season_format == 12){
                                                        row = row + "<img src='/images/ico/BolaLVBP.png' alt='LVBP'>";
                                                    }
                                                    if(competition.season_format == 13){
                                                        row = row + "<img src='/images/ico/BolaLIDOM.png' alt='LIDOM'>";
                                                    }
                                                    if(competition.season_format == 27){
                                                        row = row + "<img src='/images/ico/BolaLIGA.png' alt='LaLiga'>";
                                                    }
                                                    if(competition.season_format == 28){
                                                        row = row + "<img src='/images/ico/BolaUCL.png' alt='UCL'>";
                                                    }
                                                row = row + "</div>" +
                                                "<div class='tmovdatos'>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                                                            " " + competition.hour + ":00 " + competition.hour_format +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if(competition.type_competition == 0){
                                                                row = row + "<img src='/images/ico/white-space.png' class='Garanico'>";
                                                            }
                                                            if(competition.type_competition == 1){
                                                                row = row + "<img src='/images/ico/lock.png' class='Garanico'>";
                                                            }
                                                            if(competition.type_competition == 2){
                                                                row = row + "<img src='/images/ico/ticket.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Entrada</span>" +
                                                             competition.cost_entry.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            "<span>Inscritos</span>" +
                                                             competition.enrolled + "/" + competition.max_user +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if(competition.pote == 0){
                                                                row = row + "<img src='/images/ico/aumento.png' class='Aumenico'>";
                                                            }
                                                            if(competition.pote == 1){
                                                                row = row + "<img src='/images/ico/garantizado.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Premio</span>" +
                                                             competition.cost_garanteed.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                "</div>" +
                                                "<div class='next'>" +
                                                    "<img src='/images/ico/next.png' class='Aumenico'>" +
                                                "</div>" +
                                                "<div class='next2'>" +
                                                    "<img src='/images/ico/next2.png' class='next21'>" +
                                                "</div>" +
                                            "</li>" +
                            "</a>";

            if (folder_tabs == 0) {
                $("#ul-all-mobile").append(row);
            }

            if (folder_tabs == 1) {
                $("#ul-baseball-mobile").append(row);
            }

            if (folder_tabs == 2) {
                $("#ul-football-mobile").append(row);
            }
        });

        $(element.no_featured_competitions).each(function (j, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);

            competition_month = competition_month + 1;

            if(competition_month < 10){
                competition_month = "0" + competition_month;
            }

            var row = "";

            if(competition.season_format == 11){
                row = row + "<a onclick='modal_competition(1,11," + competition.id + ", " + auth + ")'>";
            }

            if(competition.season_format == 12){
                row = row + "<a onclick='modal_competition(1,12," + competition.id + ", " + auth + ")'>";
            }

            if(competition.season_format == 13){
                row = row + "<a onclick='modal_competition(1,13," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 27){
                row = row + "<a onclick='modal_competition(1,27," + competition.id + ", " + auth + ")'>";
            }

            if(competition.season_format == 28){
                row = row + "<a onclick='modal_competition(1,28," + competition.id + ", " + auth + ")'>";
            }
                                row = row + "<li class='tmovli'>" +
                                                "<div class='divico'>" +
                                                    "<img src='images/ico/white-space.png' class='Star'>" +
                                                "</div>" +
                                                "<h4 class='h4tmovil'>" +
                                                    competition.name +
                                                "</h4>"+
                                                "<div class='tmovilimg'>";
                                                    if(competition.season_format == 11){
                                                        row = row + "<img src='images/BolaMLB.png' alt='MLB'>";
                                                    }
                                                    if(competition.season_format == 12){
                                                        row = row + "<img src='images/ico/BolaLVBP.png' alt='LVBP'>";
                                                    }
                                                    if(competition.season_format == 13){
                                                        row = row + "<img src='images/ico/BolaLIDOM.png' alt='LIDOM'>";
                                                    }
                                                    if(competition.season_format == 27){
                                                        row = row + "<img src='images/ico/BolaLIGA.png' alt='LaLiga'>";
                                                    }
                                                    if(competition.season_format == 28){
                                                        row = row + "<img src='images/ico/BolaUCL.png' alt='UCL'>";
                                                    }
                                                row = row + "</div>" +
                                                "<div class='tmovdatos'>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                                                            " " + competition.hour + ":00 " + competition.hour_format +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if(competition.type_competition == 0){
                                                                row = row + "<img src='images/ico/white-space.png' class='Garanico'>";
                                                            }
                                                            if(competition.type_competition == 1){
                                                                row = row + "<img src='images/ico/lock.png' class='Garanico'>";
                                                            }
                                                            if(competition.type_competition == 2){
                                                                row = row + "<img src='images/ico/ticket.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Entrada</span>" +
                                                            competition.cost_entry.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            "<span>Inscritos</span>" +
                                                            competition.enrolled + "/" + competition.max_user +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if(competition.pote == 0){
                                                                row = row + "<img src='images/ico/aumento.png' class='Aumenico'>";
                                                            }
                                                            if(competition.pote == 1){
                                                                row = row + "<img src='images/ico/garantizado.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Premio</span>" +
                                                            competition.cost_garanteed.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                "</div>" +
                                                "<div class='next'>" +
                                                    "<img src='images/ico/next.png' class='Aumenico'>" +
                                                "</div>" +
                                                "<div class='next2'>" +
                                                    "<img src='images/ico/next2.png' class='next21'>" +
                                                "</div>" +
                                            "</li>" +
                            "</a>";
            if (folder_tabs == 0) {
                $("#ul-all-mobile").append(row);
            }

            if (folder_tabs == 1) {
                $("#ul-baseball-mobile").append(row);
            }

            if (folder_tabs == 2) {
                $("#ul-football-mobile").append(row);
            }

        });
    });
};

/************************************************************************
*   Funcion: add_rows_my_lobby_mobile                                   *
*   Descripcion: Permite agregar las filas en la tabla de competiciones *
*               del usuario.                                            *
*   Parametros de entrada:                                              *
*                           +folder_tabs: Pestaña seleccionada.         *
*                           +information: Informacion completa de las   *
*                                         competiciones.                *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function add_rows_my_lobby_mobile(folder_tabs, information, auth){

    /******************************************************
    * folder_tabs: Todas => 0, Beisbol => 1, Futbol => 2. *
    * Auth: Logueado => 0, Deslogueado => 1.              *
    ******************************************************/
    var today      = $("#today").val();
    var array_days = ['', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];

    $(information).each(function(index, element){

        $(element.featured_competitions).each(function (i, competition){

            var competition_date = competition.date.split("-");
            var competition_day = competition_date[2];
            var competition_month = parseInt(competition_date[1]) - 1;
            var competition_year = competition_date[0];
            var date = new Date(competition_year, competition_month, competition_day);

            competition_month = competition_month + 1;

            if (competition_month < 10) {
                competition_month = "0" + competition_month;
            }

            var row = "";

            if (competition.season_format == 11) {
                row = row + "<a onclick='modal_competition(1,11," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 12) {
                row = row + "<a onclick='modal_competition(1,12," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 13) {
                row = row + "<a onclick='modal_competition(1,13," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 27) {
                row = row + "<a onclick='modal_competition(1,27," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 28) {
                row = row + "<a onclick='modal_competition(1,28," + competition.id + ", " + auth + ")'>";
            }
                                row = row + "<li class='tmovli'>" +
                                                "<div class='divico'>" +
                                                    "<img src='../images/ico/star.png' class='Star'>" +
                                                "</div>" +
                                                "<h4 class='h4tmovil'>" +
                                                    competition.name +
                                                "</h4>"+
                                                "<div class='tmovilimg'>";
                                                    if (competition.season_format == 11) {
                                                        row = row + "<img src='../images/BolaMLB.png' alt='MLB'>";
                                                    }
                                                    if (competition.season_format == 12) {
                                                        row = row + "<img src='../images/ico/BolaLVBP.png' alt='LVBP'>";
                                                    }
                                                    if (competition.season_format == 13) {
                                                        row = row + "<img src='../images/ico/BolaLIDOM.png' alt='LIDOM'>";
                                                    }
                                                    if (competition.season_format == 27) {
                                                        row = row + "<img src='../images/ico/BolaLIGA.png' alt='LaLiga'>";
                                                    }
                                                    if (competition.season_format == 28) {
                                                        row = row + "<img src='../images/ico/BolaUCL.png' alt='UCL'>";
                                                    }
                                                row = row + "</div>" +
                                                "<div class='tmovdatos'>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                                                            " " + competition.hour + ":00 " + competition.hour_format +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if (competition.type_competition == 0) {
                                                                row = row + "<img src='../images/ico/white-space.png' class='Garanico'>";
                                                            }
                                                            if (competition.type_competition == 1) {
                                                                row = row + "<img src='../images/ico/lock.png' class='Garanico'>";
                                                            }
                                                            if (competition.type_competition == 2) {
                                                                row = row + "<img src='../images/ico/ticket.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Entrada</span>" +
                                                            competition.cost_entry.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            "<span>Inscritos</span>" +
                                                            competition.enrolled + "/" + competition.max_user +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if (competition.pote == 0) {
                                                                row = row + "<img src='../images/ico/aumento.png' class='Aumenico'>";
                                                            }
                                                            if (competition.pote == 1) {
                                                                row = row + "<img src='../images/ico/garantizado.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Premio</span>" +
                                                            competition.cost_garanteed.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                "</div>" +
                                                "<div class='next'>" +
                                                    "<img src='../images/ico/next.png' class='Aumenico'>" +
                                                "</div>" +
                                                "<div class='next2'>" +
                                                    "<img src='../images/ico/next2.png' class='next21'>" +
                                                "</div>" +
                                "</li>" +
                            "</a>";
            if (folder_tabs == 0) {
                $("#my-ul-all-mobile").append(row);
            }

            if (folder_tabs == 1) {
                $("#my-ul-baseball-mobile").append(row);
            }

            if (folder_tabs == 2) {
                $("#my-ul-football-mobile").append(row);
            }

        });

        $(element.no_featured_competitions).each(function (j, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);

            competition_month = competition_month + 1;

            if (competition_month < 10) {
                competition_month = "0" + competition_month;
            }

            var row = "";

            if (competition.season_format == 11) {
                row = row + "<a onclick='modal_competition(1,11," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 12) {
                row = row + "<a onclick='modal_competition(1,12," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 13) {
                row = row + "<a onclick='modal_competition(1,13," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 27) {
                row = row + "<a onclick='modal_competition(1,27," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 28) {
                row = row + "<a onclick='modal_competition(1,28," + competition.id + ", " + auth + ")'>";
            }
                                row = row + "<li class='tmovli'>" +
                                                "<div class='divico'>" +
                                                    "<img src='../images/ico/white-space.png' class='Star'>" +
                                                "</div>" +
                                                "<h4 class='h4tmovil'>" +
                                                    competition.name +
                                                "</h4>"+
                                                "<div class='tmovilimg'>";
                                                    if (competition.season_format == 11) {
                                                        row = row + "<img src='../images/BolaMLB.png' alt='MLB'>";
                                                    }
                                                    if (competition.season_format == 12) {
                                                        row = row + "<img src='../images/ico/BolaLVBP.png' alt='LVBP'>";
                                                    }
                                                    if (competition.season_format == 13) {
                                                        row = row + "<img src='../images/ico/BolaLIDOM.png' alt='LIDOM'>";
                                                    }
                                                    if (competition.season_format == 27) {
                                                        row = row + "<img src='../images/ico/BolaLIGA.png' alt='LaLiga'>";
                                                    }
                                                    if (competition.season_format == 28) {
                                                        row = row + "<img src='../images/ico/BolaUCL.png' alt='UCL'>";
                                                    }
                                                row = row + "</div>" +
                                                "<div class='tmovdatos'>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                                                            " " + competition.hour + ":00 " + competition.hour_format +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if (competition.type_competition == 0) {
                                                                row = row + "<img src='../images/ico/white-space.png' class='Garanico'>";
                                                            }
                                                            if (competition.type_competition == 1) {
                                                                row = row + "<img src='../images/ico/lock.png' class='Garanico'>";
                                                            }
                                                            if (competition.type_competition == 2) {
                                                                row = row + "<img src='../images/ico/ticket.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Entrada</span>" +
                                                            competition.cost_entry.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            "<span>Inscritos</span>" +
                                                            competition.enrolled + "/" + competition.max_user +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if (competition.pote == 0) {
                                                                row = row + "<img src='../images/ico/aumento.png' class='Aumenico'>";
                                                            }
                                                            if (competition.pote == 1) {
                                                                row = row + "<img src='../images/ico/garantizado.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Premio</span>" +
                                                            competition.cost_garanteed.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                "</div>" +
                                                "<div class='next'>" +
                                                    "<img src='../images/ico/next.png' class='Aumenico'>" +
                                                "</div>" +
                                                "<div class='next2'>" +
                                                    "<img src='../images/ico/next2.png' class='next21'>" +
                                                "</div>" +
                                "</li>" +
                        "</a>";

            if (folder_tabs == 0) {
                $("#my-ul-all-mobile").append(row);
            }

            if (folder_tabs == 1) {
                $("#my-ul-baseball-mobile").append(row);
            }

            if (folder_tabs == 2) {
                $("#my-ul-football-mobile").append(row);
            }

        });

        $(element.featured_competitions_yesterday).each(function (k, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);

            competition_month = competition_month + 1;

            if (competition_month < 10) {
                competition_month = "0" + competition_month;
            }

            var row = "";

            if (competition.season_format == 11){
                row = row + "<a onclick='modal_competition(1,11," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 12){
                row = row + "<a onclick='modal_competition(1,12," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 13){
                row = row + "<a onclick='modal_competition(1,13," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 27){
                row = row + "<a onclick='modal_competition(1,27," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 28){
                row = row + "<a onclick='modal_competition(1,28," + competition.id + ", " + auth + ")'>";
            }

                                row = row + "<li class='tmovli'>" +
                                                "<div class='divico'>" +
                                                    "<img src='../images/ico/star.png' class='Star'>" +
                                                "</div>" +
                                                "<h4 class='h4tmovil'>" +
                                                    competition.name +
                                                "</h4>"+
                                                "<div class='tmovilimg'>";
                                                    if (competition.season_format == 11){
                                                        row = row + "<img src='../images/BolaMLB.png' alt='MLB'>";
                                                    }
                                                    if (competition.season_format == 12){
                                                        row = row + "<img src='../images/ico/BolaLVBP.png' alt='LVBP'>";
                                                    }
                                                    if (competition.season_format == 13){
                                                        row = row + "<img src='../images/ico/BolaLIDOM.png' alt='LIDOM'>";
                                                    }
                                                    if (competition.season_format == 27){
                                                        row = row + "<img src='../images/ico/BolaLIGA.png' alt='LaLiga'>";
                                                    }
                                                    if (competition.season_format == 28){
                                                        row = row + "<img src='../images/ico/BolaUCL.png' alt='UCL'>";
                                                    }
                                                row = row + "</div>" +
                                                "<div class='tmovdatos'>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                                                            " " + competition.hour + ":00 " + competition.hour_format +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if (competition.type_competition == 0){
                                                                row = row + "<img src='../images/ico/white-space.png' class='Garanico'>";
                                                            }
                                                            if (competition.type_competition == 1){
                                                                row = row + "<img src='../images/ico/lock.png' class='Garanico'>";
                                                            }
                                                            if (competition.type_competition == 2){
                                                                row = row + "<img src='../images/ico/ticket.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Entrada</span>" +
                                                            competition.cost_entry.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            "<span>Inscritos</span>" +
                                                            competition.enrolled + "/" + competition.max_user +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if (competition.pote == 0){
                                                                row = row + "<img src='../images/ico/aumento.png' class='Aumenico'>";
                                                            }
                                                            if (competition.pote == 1){
                                                                row = row + "<img src='../images/ico/garantizado.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Premio</span>" +
                                                            competition.cost_garanteed.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                "</div>" +
                                                "<div class='next' style='background-color: red;'>" +
                                                    "<img src='../images/ico/next.png' class='Aumenico'>" +
                                                "</div>" +
                                                "<div class='next2'>" +
                                                    "<img src='../images/ico/next2.png' class='next21'>" +
                                                "</div>" +
                                "</li>" +
                           "</a>";

            if (folder_tabs == 0) {
                $("#my-ul-all-mobile").append(row);
            }

            if (folder_tabs == 1) {
                $("#my-ul-baseball-mobile").append(row);
            }

            if (folder_tabs == 2) {
                $("#my-ul-football-mobile").append(row);
            }

        });

        $(element.no_featured_competitions_yesterday).each(function (l, competition){

            var competition_date    = competition.date.split("-");
            var competition_day     = competition_date[2];
            var competition_month   = parseInt(competition_date[1]) - 1;
            var competition_year    = competition_date[0];
            var date                = new Date(competition_year, competition_month, competition_day);

            competition_month = competition_month + 1;

            if (competition_month < 10) {
                competition_month = "0" + competition_month;
            }

            var row = "";

            if (competition.season_format == 11) {
                row = row + "<a onclick='modal_competition(1,11," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 12) {
                row = row + "<a onclick='modal_competition(1,12," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 13) {
                row = row + "<a onclick='modal_competition(1,13," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 27) {
                row = row + "<a onclick='modal_competition(1,27," + competition.id + ", " + auth + ")'>";
            }

            if (competition.season_format == 28) {
                row = row + "<a onclick='modal_competition(1,28," + competition.id + ", " + auth + ")'>";
            }

                                row = row + "<li class='tmovli'>" +
                                                "<div class='divico'>" +
                                                    "<img src='../images/ico/white-space.png' class='Star'>" +
                                                "</div>" +
                                                "<h4 class='h4tmovil'>" +
                                                    competition.name +
                                                "</h4>"+
                                                "<div class='tmovilimg'>";
                                                    if (competition.season_format == 11){
                                                        row = row + "<img src='../images/BolaMLB.png' alt='MLB'>";
                                                    }
                                                    if (competition.season_format == 12){
                                                        row = row + "<img src='../images/ico/BolaLVBP.png' alt='LVBP'>";
                                                    }
                                                    if (competition.season_format == 13){
                                                        row = row + "<img src='../images/ico/BolaLIDOM.png' alt='LIDOM'>";
                                                    }
                                                    if (competition.season_format == 27){
                                                        row = row + "<img src='../images/ico/BolaLIGA.png' alt='LaLiga'>";
                                                    }
                                                    if (competition.season_format == 28){
                                                        row = row + "<img src='../images/ico/BolaUCL.png' alt='UCL'>";
                                                    }
                                                row = row + "</div>" +
                                                "<div class='tmovdatos'>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            array_days[date.getDay()] + " " + competition_day + "-" + competition_month +
                                                            " " + competition.hour + ":00 " + competition.hour_format +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if (competition.type_competition == 0){
                                                                row = row + "<img src='../images/ico/white-space.png' class='Garanico'>";
                                                            }
                                                            if (competition.type_competition == 1){
                                                                row = row + "<img src='../images/ico/lock.png' class='Garanico'>";
                                                            }
                                                            if (competition.type_competition == 2){
                                                                row = row + "<img src='../images/ico/ticket.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Entrada</span>" +
                                                            competition.cost_entry.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                    "<div class='div1'>" +
                                                        "<p>" +
                                                            "<span>Inscritos</span>" +
                                                            competition.enrolled + "/" + competition.max_user +
                                                        "</p>" +
                                                        "<div class='tmovtabico'>";
                                                            if (competition.pote == 0){
                                                                row = row + "<img src='../images/ico/aumento.png' class='Aumenico'>";
                                                            }
                                                            if (competition.pote == 1){
                                                                row = row + "<img src='../images/ico/garantizado.png' class='Garanico'>";
                                                            }
                                                        row = row + "</div>" +
                                                        "<p>" +
                                                            "<span>Premio</span>" +
                                                            competition.cost_garanteed.toLocaleString('de-DE') + " Bs." +
                                                        "</p>" +
                                                    "</div>" +
                                                "</div>" +
                                                "<div class='next' style='background-color: red;'>" +
                                                    "<img src='../images/ico/next.png' class='Aumenico'>" +
                                                "</div>" +
                                                "<div class='next2'>" +
                                                    "<img src='../images/ico/next2.png' class='next21'>" +
                                                "</div>" +
                                "</li>" +
                        "</a>";

            if (folder_tabs == 0) {
                $("#my-ul-all-mobile").append(row);
            }

            if (folder_tabs == 1) {
                $("#my-ul-baseball-mobile").append(row);
            }

            if (folder_tabs == 2) {
                $("#my-ul-football-mobile").append(row);
            }

        });
    });
};

/************************************************************************
*   Funcion: modal_competition                                          *
*   Descripcion: Permite cargar el modal con toda la informacion de la  *
*                competicion solicitada.                                *
*   Parametros de entrada:                                              *
*                           +sport: Deporte de la competicion.          *
*                           +league: Liga de la competicion.            *
*                           +id_competition: Id de la competicion que   *
*                                            desea ver el usuario.      *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado.                       *
************************************************************************/
function modal_competition(sport, league, id_competition, auth){

    var url = "";

    if(auth == 1){

        url = url_ajax + "/modal-competicion";

    }else{

        url = url_ajax + "/usuario/modal-competicion";

    }

    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"competition_id": id_competition},
        success: function(data){

            $("#competition_name").html("");
            $("#mobile_competition_enrolled").html("");
            $("#mobile_competition_cost_entry").html("");
            $("#mobile_competition_cost_garanteed").html("");
            $("#mobile_competition_min_user").html("");
            $("#competition_info").html("");
            $("#competition_description").html("");
            $("#competition_password").html("");
            $("#competition_users").html("");
            $("#competition_awards").html("");
            $("#login_competition_id").html("");
            $("#login_competition_date").html("");
            $("#login_competition_input_name").html("");
            $("#competition_id_create").html("");
            $("#competition_date_create").html("");
            $("#competition_input_name_create").html("");
            $("#competition_id_enroll").html("");
            $("#competition_date_enroll").html("");
            $("#competition_input_name_enroll").html("");
            $("#button_create").html("");
            $("#button_enroll").html("");

            //console.log("=======>>"+data);
            var info = jQuery.parseJSON(data);
            add_info(info, sport, league, id_competition, auth);
        }
    });
}

/************************************************************************
*   Funcion: add_info                                                   *
*   Descripcion: Permite agregar en el modal la informacion de la       *
*                competicion solicitada.                                *
*   Parametros de entrada:                                              *
*                           +info: Informacion de la competicion que el *
*                                  usuario desea ver.                   *
*                           +sport: Deporte.                            *
*                           +league: Liga.                              *
*                           +id_competition: Id de la competicion que   *
*                                            desea ver el usuario.      *
*                           +auth: Valor para saber si el usuario está  *
*                                  o no logueado. (1 => deslogueado     *
*                                                  0 => logueado).      *
************************************************************************/
function add_info(info, sport, league, id_competition, auth){

    var competition_name;
    var competition_date;
    var competition_info;
    var competition_enrolled;
    var competition_cost_entry;
    var competition_min_user;
    var competition_description;
    var competition_type_competition;
    var competition_cost_garanteed;
    var competition_users   =   "<thead>"+
                                    "<tr>"+
                                        "<th>Usuario</th>"+
                                        "<th>Puntos</th>"+
                                        "<th>Posición</th>"+
                                    "</tr>"+
                                "</thead>";

    var competition_awards  =   "<thead>"+
                                    "<tr>"+
                                        "<th>Lugar</th>"+
                                        "<th>Cantidad</th>"+
                                    "</tr>"+
                                "</thead>";
    var button_create       = "";
    var button_enroll       = "";

    var today               = $("#today").val();
    //var first_game          = parseInt($("#first_game").val());
    var hour                = parseInt($("#hour").val());
    var cost_garanteed;

    var first_game_mlb          = parseInt($("#first_game_mlb").val());
    var first_game_lvbp         = parseInt($("#first_game_lvbp").val());
    var first_game_lidom        = parseInt($("#first_game_lidom").val());
    var first_game_laliga       = parseInt($("#first_game_laliga").val());
    var first_game_ucl          = parseInt($("#first_game_ucl").val());

    if (league == 11){
        var first_game = first_game_mlb;
    }

    if (league == 12){
        var first_game = first_game_lvbp;
    }

    if (league == 13){
        var first_game = first_game_lidom;
    }

    if (league == 27){
        var first_game = first_game_laliga;
    }
    if (league == 28){
        var first_game = first_game_ucl;
    }

    $(info).each(function(index, element){

        $(element.competition).each(function(i, competition){

            competition_name        = competition.name;

            if($(window).width() <= 450){
                competition_enrolled        =   "<tr>"+
                                                    "<td><b>Inscritos: </b>"+competition.enrolled+"/"+competition.max_user+"</td>"+
                                                "</tr>";
                competition_cost_entry      =   "<tr>"+
                                                    "<td><b>Entrada: </b>"+competition.cost_entry.toLocaleString('de-DE')+" Bs.</td>"+
                                                "</tr>";
                competition_cost_garanteed  =   "<tr>"+
                                                    "<td><b>Premios: </b>"+competition.cost_garanteed.toLocaleString('de-DE')+" Bs.</td>"+
                                                "</tr>";
                competition_min_user        =   "<tr>"+
                                                    "<td><b>Mín. Usuarios: </b>"+competition.min_user+"</td>"+
                                                "</tr>";
            }
            else{
                competition_info =  "<tr>"+
                                        "<td><b>Inscritos: </b>"+competition.enrolled+"/"+competition.max_user+"</td>"+
                                        "<td><b>Entrada: </b>"+competition.cost_entry.toLocaleString('de-DE')+" Bs.</td>"+
                                        "<td><b>Premios: </b>"+competition.cost_garanteed.toLocaleString('de-DE')+" Bs.</td>"+
                                        "<td><b>Mín. Usuarios: </b>"+competition.min_user+"</td>"+
                                    "</tr>";
            }

            cost_garanteed = competition.cost_garanteed;
            competition_description = competition.description;

            if(competition.type_competition == 1){
                competition_type_competition    = "<input type='text' placeholder='Introduzca contraseña' class='form-control2' id='password'>";
                button_create = button_create + "<a onclick='login_modal_competition(1,"+sport+","+league+","+id_competition+",1,"+auth+")' class='btn btn-default btn-primary4'>CREAR EQUIPO</a>";
                button_enroll = button_enroll + "<a onclick='login_modal_competition(3,"+sport+","+league+","+id_competition+",1,"+auth+")' class='btn btn-default btn-primary4'>INSCRIBIR EQUIPO</a>";
            }
            if(competition.type_competition == 0){
                button_create = button_create + "<a onclick='login_modal_competition(1,"+sport+","+league+","+id_competition+",0,"+auth+")' class='btn btn-default btn-primary4'>CREAR EQUIPO</a>";
                button_enroll = button_enroll + "<a onclick='login_modal_competition(3,"+sport+","+league+","+id_competition+",0,"+auth+")' class='btn btn-default btn-primary4'>INSCRIBIR EQUIPO</a>";
            }

            competition_date = competition.date;

            if(competition.date < today){
                button_create   = "";
                button_enroll   = "";
            }

            if(competition.date == today){
                if(competition.enrolled == competition.max_user || hour >= first_game){
                    button_create   = "";
                    button_enroll   = "";
                }
            }

        });

        if($(element.users).length == 0){
            var cont;
            for (cont = 0; cont < 8; cont++) {

                competition_users = competition_users + "<tr>"+
                                                            "<td></td>"+
                                                            "<td></td>"+
                                                            "<td></td>"+
                                                        "</tr>";
            }
        }else{

            var cont = 1;

            $(element.users).each(function(j, users){
                if(auth == 0){
                    competition_users = competition_users + "<tr>"+
                                                                "<td>";
                                                                    if(competition_date == today){
                                                                        if(hour >= first_game){
                                                                            competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/usuario/lista-de-oponentes/"+id_competition+"/"+users.lineup_id+"'>"+users.username+"</a>";
                                                                            //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/usuario/lista-de-oponentes/"+id_competition+"/"+users.lineup_id+"'>"+users.username+"</a>";
                                                                        }
                                                                        else{
                                                                            competition_users = competition_users + users.username;
                                                                        }
                                                                    }

                                                                    if(competition_date < today){
                                                                        competition_users = competition_users + "<a href='https:///www.fantasycobra.com.ve/usuario/lista-de-oponentes/"+id_competition+"/"+users.lineup_id+"'>"+users.username+"</a>";
                                                                        //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/usuario/lista-de-oponentes/"+id_competition+"/"+users.lineup_id+"'>"+users.username+"</a>";
                                                                    }

                                                                    if(competition_date > today){
                                                                        competition_users = competition_users + users.username;
                                                                    }
                                                                competition_users = competition_users + "</td>"+
                                                                "<td>";
                                                                    if(competition_date == today) {
                                                                        if (hour >= first_game) {
                                                                            competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/usuario/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.points + "</a>";
                                                                            //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/usuario/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.points + "</a>";
                                                                        }
                                                                        else {
                                                                            competition_users = competition_users + users.points;
                                                                        }
                                                                    }

                                                                    if(competition_date < today) {
                                                                        competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/usuario/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.points + "</a>";
                                                                        //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/usuario/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.points + "</a>";

                                                                    }

                                                                    if(competition_date > today){
                                                                        competition_users = competition_users + users.points;
                                                                    }
                                                                competition_users = competition_users + "</td>"+
                                                                "<td>";
                                                                    if(competition_date == today) {
                                                                        if (hour >= first_game) {
                                                                            competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/usuario/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + cont + "°</a>";
                                                                            //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/usuario/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + cont + "°</a>";
                                                                        }
                                                                        else {
                                                                            competition_users = competition_users + cont + "°";
                                                                        }
                                                                    }

                                                                    if(competition_date < today) {
                                                                        competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/usuario/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + cont + "°</a>";
                                                                        //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/usuario/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + cont + "°</a>";
                                                                    }

                                                                    if(competition_date > today) {
                                                                        competition_users = competition_users + cont + "°";
                                                                    }
                                                                competition_users = competition_users + "</td>"+
                                                                "</tr>";
                }else{
                    competition_users = competition_users + "<tr>"+
                                                                "<td>";
                                                                    if(competition_date == today) {
                                                                        if (hour >= first_game) {
                                                                            competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.username + "</a>";
                                                                            //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.username + "</a>";
                                                                        }
                                                                        else {
                                                                            competition_users = competition_users + users.username;
                                                                        }
                                                                    }

                                                                    if(competition_date < today) {
                                                                        competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.username + "</a>";
                                                                        //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.username + "</a>";
                                                                    }

                                                                    if(competition_date > today) {
                                                                        competition_users = competition_users + users.username;
                                                                    }
                                                                competition_users = competition_users + "</td>"+
                                                                "<td>";
                                                                    if(competition_date == today) {
                                                                        if (hour >= first_game) {
                                                                            competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.points + "</a>";
                                                                            //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.points + "</a>";
                                                                        }
                                                                        else {
                                                                            competition_users = competition_users + users.points;
                                                                        }
                                                                    }

                                                                    if(competition_date < today) {
                                                                        competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.points + "</a>";
                                                                        //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + users.points + "</a>";
                                                                    }

                                                                    if(competition_date < today) {
                                                                        competition_users = competition_users + users.points;
                                                                    }
                                                                competition_users = competition_users + "</td>"+
                                                                "<td>";
                                                                    if(competition_date == today) {
                                                                        if (hour >= first_game) {
                                                                            competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + cont + "°</a>";
                                                                            //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + cont + "°</a>";
                                                                        }
                                                                        else {
                                                                            competition_users = competition_users + cont + "°";
                                                                        }
                                                                    }

                                                                    if(competition_date < today) {
                                                                        competition_users = competition_users + "<a href='https://www.fantasycobra.com.ve/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + cont + "°</a>";
                                                                        //competition_users = competition_users + "<a href='http://localhost/fantasy-cobra-dominicana/public/lista-de-oponentes/" + id_competition + "/" + users.lineup_id + "'>" + cont + "°</a>";
                                                                    }

                                                                    if(competition_date < today) {
                                                                        competition_users = competition_users + cont + "°";
                                                                    }

                                                                competition_users = competition_users + "</td>"+

                                                            "</tr>";
                }
                cont++;
            });
        }

        if($(element.awards).length == 0){

            var cont;
            for (cont = 0; cont < 8; cont++) {

                competition_awards = competition_awards + "<tr>"+
                                                              "<td></td>"+
                                                              "<td></td>"+
                                                              "<td></td>"+
                                                          "</tr>";
                cont++;
            }
        }else{

            $(element.awards).each(function(k, awards){

                var award           = (cost_garanteed*(awards.range_pocental/100));
                competition_awards  = competition_awards + "<tr>"+
                                                              "<td>"+awards.win_percentage+"°</td>"+
                                                              "<td>"+award.toLocaleString('de-DE')+" Bs.</td>"+
                                                          "</tr>";
            });
        }
    });

    $("#competition_name").append(competition_name);

    if($(window).width() <= 450){

        $("#mobile_competition_enrolled").append(competition_enrolled);
        $("#mobile_competition_cost_entry").append(competition_cost_entry);
        $("#mobile_competition_cost_garanteed").append(competition_cost_garanteed);
        $("#mobile_competition_min_user").append(competition_min_user);

    }else{

        $("#competition_info").append(competition_info);

    }

    $("#competition_description").append(competition_description);
    $("#competition_password").append(competition_type_competition);
    $("#competition_users").append(competition_users);
    $("#competition_awards").append(competition_awards);

    $("#button_create").append(button_create);
    $("#button_enroll").append(button_enroll);

    $("#info_competition").modal("show");
}

/************************************************************************
*   Funcion: duration_competition                                       *
*   Descripcion: Permite agregar en el formulario de creacion de una    *
*                competicion los inputs de fecha segun sea el caso.     *
*   Parametros de entrada:                                              *
*                           +type: Duracion (corta o larga)             *
************************************************************************/
function duration_competition(type){

    if(type == 0){

        if ($(window).width() <= 450){

            $("#short_competition").css("display","block");
            $("#large_competition").css("display","none");
            $("#datepicker").attr("id", "datepicker");

        }else{

            $("#short_competition").css("display","block");
            $("#large_competition").css("display","none");
            $("#datepicker").attr("id", "datepicker");
        }

    }else{

        if ($(window).width() <= 450){

            $("#large_competition").css("display","block");
            $("#short_competition").css("display","none");

        }else{

            $("#large_competition").css("display","flex");
            $("#short_competition").css("display","none");

        }
    }
}

/************************************************************************
*   Funcion: privacy_competition                                        *
*   Descripcion: Permite agregar en el formulario de creacion de una    *
*                competicion el input de contraseña segun sea el caso.  *
*   Parametros de entrada:                                              *
*                           +type: Privacidad (publica o privada)       *
************************************************************************/
function privacy_competition(type){

    if(type == 0){

        $("#private_competition").css("display","none");
        $("#information").css("border-top","none");

    }else{

        $("#private_competition").css("display","flex");
        $("#information").css("border-top","1px dashed #eec133");
        var action = "<a onclick='action_password(0)' class='ShowPass' id='view'>Mostrar Contraseña</a>";
        $("#view").remove();
        $("#hidden").remove();
        $("#action_password").append(action);

    }
}

/************************************************************************
*   Funcion: action_password                                            *
*   Descripcion: Permite visualizar o esconder la contraseña que se le  *
*                esta colocando a la competicion al momento de crearla. *
*   Parametros de entrada:                                              *
*                           + action => Accion (mostar u ocultar)       *
************************************************************************/
function action_password(action){

    if($("#password_competition").val().length > 0){

        if(action == 0){

            $("#password_competition").attr("type", "text");
            var action = "<a onclick='action_password(1)' class='ShowPass' id='hidden'>Ocultar Contraseña</a>";
            $("#view").remove();
            $("#action_password").append(action);

        }else{

            $("#password_competition").attr("type", "password");
            var action = "<a onclick='action_password(0)' class='ShowPass' id='view'>Mostrar Contraseña</a>";
            $("#hidden").remove();
            $("#action_password").append(action);

        }
    }
}

/************************************************************************
*   Funcion:                                                            *
*   Descripcion: Permite otener los premios disponibles para cargarlos  *
*                combobox de premios al momento de crear competiciones. *
*                tambien permite modificar los valores del combobox que *
*                esta relacionado al maximo de jugadores.               *
*   Parametros de entrada: NA                                           *
************************************************************************/
$(document).ready(function(){

    var url     = "";
    url         = url_ajax + "/usuario/crear-competicion/obtener-premios";
    var min_user = 2;

    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: {"min_user": min_user},
        success: function(data){
            //console.log("=======>>"+data);
            var options = $("#awards").length;
            if(options > 0){
                $("#awards").children().remove();
            }

            var info = jQuery.parseJSON(data);
            $(info).each(function(index, element){
                var option = "<option value="+element.id_award+">"+element.description+"</option>";
                $(option).appendTo("#awards");
            });
        }
    });

    $("#min_user").change(function(){
        var min_user = $(this).val();
        $.ajax({
            url: url,
            type: "POST",
            async: true,
            data: {"min_user": min_user},
            success: function(data){
                //console.log("=======>>"+data);
                var options = $("#awards").length;
                if(options > 0){
                    $("#awards").children().remove();
                }

                var info = jQuery.parseJSON(data);
                $(info).each(function(index, element){
                    var option = "<option value="+element.id_award+">"+element.description+"</option>";
                    $(option).appendTo("#awards");
                });
            }
        });

        var min_user    = parseInt($(this).val());
        var options     = $("#max_user").length;

        if(options > 0){
            $("#max_user").children().remove();
        }

        while (min_user <= 20){
            var option  = "<option value="+min_user+">"+min_user+"</option>";
            $(option).appendTo("#max_user");
            min_user    = min_user + 1;
        }

        min_user = 25;

        while (min_user <= 50){
            var option  = "<option value="+min_user+">"+min_user+"</option>";
            $(option).appendTo("#max_user");
            min_user    = min_user + 5;
        }
    });
});

/************************************************************************
*   Funcion:                                                            *
*   Descripcion: Permite quitar el datepicker de los inputs para poder  *
*                evitar que se despligue el calendario en la version    *
*                movil.                                                 *
*   Parametros de entrada: NA                                           *
************************************************************************/
$(document).ready(function(){

    if($(window).width() <= 450){

        if(document.getElementById('datepicker')){
            document.getElementById('datepicker').id = 'start_date';
        }

        if(document.getElementById('datepicker_1')){
            document.getElementById('datepicker_1').id = 'start_date2';
        }

        if(document.getElementById('datepicker_2')){
            document.getElementById('datepicker_2').id = 'finish_date';
        }
    }
});


/************************************************************************
*   Funcion:                                                            *
*   Descripcion: Permite hacer el conteo regresivo del tiempo restante  *
*                para que arranque la competicion del dia actual.       *
*   Parametros de entrada: NA.                                          *
************************************************************************/
$(document).ready(function() {

    if($(window).width() > 450) {

        var url     =   "";
        var today   =   $("#today").val();
        url         =   url_ajax + "/tiempo-restante";
        var info     =  "";

        $.ajax({
            url: url,
            type: "POST",
            async: true,
            data: {"date": today},
            success: function (data) {
                info = jQuery.parseJSON(data);
            }
        });

        function timer_competition() {

            $(info).each(function (index, element) {

                $(element.featured_competition).each(function (i, competition) {

                    var competition_hour;
                    var competition_date = competition.date.split("-");
                    var day = competition_date[2];
                    var month = parseInt(competition_date[1]) - 1;
                    var year = competition_date[0];

                    if (competition.date == today) {

                        if (competition.hour_format == "PM") {

                            competition_hour = parseInt(competition.hour) + 12;
                            if (competition_hour == 24) {
                                competition_hour = competition_hour - 12;
                            }
                        }else{

                            competition_hour = competition.hour;
                        }

                        var date = new Date(year, month, day, competition_hour, '00', '00');
                        var today_today = new Date();
                        var days = 0;
                        var hours = 0;
                        var minuts = 0;
                        var seconds = 0;

                        if (date > today_today) {
                            //alert("ENTRE");
                            var difference = (date.getTime() - today_today.getTime()) / 1000;
                            days = Math.floor(difference / 86400);
                            difference = difference - (86400 * days);
                            hours = Math.floor(difference / 3600);
                            difference = difference - (3600 * hours);
                            minuts = Math.floor(difference / 60);
                            difference = difference - (60 * minuts);
                            seconds = Math.floor(difference);
                            if (hours < 10) {
                                hours = "0" + hours;
                            }
                            if (minuts < 10) {
                                minuts = "0" + minuts;
                            }
                            if (seconds < 10) {
                                seconds = "0" + seconds;
                            }

                            document.getElementById(competition.id).innerHTML = hours + ':' + minuts + ":" + seconds;
                        }
                        else {
                            document.getElementById(competition.id).innerHTML = "En proceso";
                        }
                    }

                });

                $(element.no_featured_competition).each(function (j, competition) {
                    var competition_hour;
                    var competition_date = competition.date.split("-");
                    var day = competition_date[2];
                    var month = parseInt(competition_date[1]) - 1;
                    var year = competition_date[0];

                    if (competition.date == today) {

                        if (competition.hour_format == "PM") {
                            competition_hour = parseInt(competition.hour) + 12;
                            if (competition_hour == 24) {
                                competition_hour = competition_hour - 12;
                            }
                        }
                        else {
                            competition_hour = competition.hour;
                        }

                        var date = new Date(year, month, day, competition_hour, '00', '00')
                        var today_today = new Date();
                        var days = 0;
                        var hours = 0;
                        var minuts = 0;
                        var seconds = 0;

                        if (date > today_today) {
                            //alert("ENTRE");
                            var difference = (date.getTime() - today_today.getTime()) / 1000;
                            days = Math.floor(difference / 86400);
                            difference = difference - (86400 * days);
                            hours = Math.floor(difference / 3600);
                            difference = difference - (3600 * hours);
                            minuts = Math.floor(difference / 60);
                            difference = difference - (60 * minuts);
                            seconds = Math.floor(difference);
                            if (hours < 10) {
                                hours = "0" + hours;
                            }
                            if (minuts < 10) {
                                minuts = "0" + minuts;
                            }
                            if (seconds < 10) {
                                seconds = "0" + seconds;
                            }

                            document.getElementById(competition.id).innerHTML = hours + ":" + minuts + ":" + seconds;

                        }
                        else {
                            document.getElementById(competition.id).innerHTML = "En proceso";
                        }
                    }

                });
            });
        }

        setInterval(timer_competition, 1000);
    }
});
