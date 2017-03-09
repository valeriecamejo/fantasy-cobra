// Url global
var url_ajax = "https://www.fantasycobra.com.ve";
//var url_ajax = "http://localhost/fantasy-cobra-dominicana/public";
 //var url_ajax = "http://localhost/cobrave/fantasy-cobra-dominicana/public";


/************************************************************************
 *   Funcion: team_modal                                                 *
 *   Descripcion: Permite cargar el modal con toda la informacion del    *
 *                equipo solicitado.                                     *
 *   Parametros de entrada:                                              *
 *                           +team_id: Id del equipo que                 *
 ************************************************************************/
function team_modal(team_id,cont_teams,username){ 

    $.ajax({
        url: url_ajax + "/usuario/ver-equipos/modal-team",
        type: "POST",
        async: true,
        data: "team_id="+team_id,
        success: function(data){

            $("#lineup_salary").html("");
            $("#lineup_date").html("");
            $("#lineup_points").html("");
            $("#competition_modal").html("");
            $("#competition_name").html("");
            $("#competition_in").html("");
            $("#competition_cost_entry").html("");
            $("#competition_position").html("");
            $("#players_lineup").html("");
            //$("#buttonedit").html("");
            $('#activateedit').html('');
            //console.log("=======>>"+data);  
            var datos = jQuery.parseJSON(data);
            add_info_team(datos, team_id, cont_teams, username);
        }
    });
}

/************************************************************************
 *   Funcion: add_info_team                                              *
 *   Descripcion: Permite agregar en el modal la informacion del         *
 *                equipo solicitado.                                     *
 ************************************************************************/
function add_info_team(datos, team_id, cont_teams, username){

    var pos = '';
    var first_game      =   $('#first_game').val(); // Hora del primer juego del dia
    var hour            =   $('#hour').val();       // Hora del sistema
    var boton_edit      =   ''; // Construye el boton de editar
    var actual_date     =   moment().format("YYYY-MM-DD");  // Obtiene la fecha de hoy
    var date_lineup     =   0; // Obtengo le fecha del Lineup
    var lineup_id;  // Contiene el campo oculto con el id del Lineup a Editar
    var lineup_name;
    var lineup_salary = "<tr>" +
        "<td>" + "<b>Salario: </b></td>" +
        "</tr>";
    var lineup_date ="<tr>" +
        "<td>" + "<b>Fecha: </b>- - - - </td>" +
        "</tr>";
    var lineup_points = "<tr>" +
        "<td>" + "<b>Total Pts: </b>- - -</td>" +
        "</tr>";
    var competition_modal = '';
    var competition_name;
    var competition_in;
    var competition_cost_entry;
    var competition_position;
    var players_lineup = "<thead>"+
                            "<tr>"+
                                "<th>POS</th>"+
                                "<th>JUGADOR</th>"+
                                "<th>PUNTOS</th>"+
                            "</tr>"+
                        "</thead>";

    $(datos).each(function(index, element) {

        //----------------------Players-------------------
            $(element.players).each(function (j, players) {
                date_lineup = players.datelin;

                lineup_salary = "<tr>" +
                    "<td>" + "<b>Salario: </b>" + players.salary_rest + "</td>" +
                    "</tr>";

                lineup_date ="<tr>" +
                    "<td>" + "<b>Fecha: </b>"+ players.datelin + "</td>" +
                    "</tr>";

                if(players.pos=='OF1' || players.pos=='OF2' || players.pos=='OF3'){
                    pos = players.pos.substr(0,2);
                }else{
                    pos = players.pos.substr(0,3);
                }

                players_lineup = players_lineup +
                    "<tr>"+
                    "<td>"+pos+"</td>"+
                        "<td>"+players.name+"</td>"+
                        "<td>"+players.ppj+"</td>"+
                    "</tr>";

            });

        //-------------------Equipo------------------------


            $(element.team).each(function (i, team) {

                lineup_points = "<tr>" +
                    "<td>" + "<b>" + team.points + "</b></td>" +
                    "</tr>";

                competition_modal = competition_modal +
                    "<div class='panel-group lincompsinscr' id='accordion' role='tablist' aria-multiselectable='true'>"+
                        "<div class='panel panel-default backblack'>"+
                            "<a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseOne"+team.competition_id+"' aria-expanded='true' aria-controls='collapseOne'>"+
                                "<div class='panel-heading backhead' role='tab' id='headingOne'>"+
                                    "<h4 class='panel-title'>"+
                                    team.name+
                                    "<img src='../images/arrowd.png' class='icon-arrow-down' alt='flecha'>"+
                                    "</h4>"+
                                "</div>"+
                            "</a>"+
                            "<div id='collapseOne"+team.competition_id+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne'>"+
                                "<div class='panel-body'>"+
                                    "<table class='Tablacomplineups'>"+
                                        "<tbody>"+
                                            "<tr><td><b>Inscritos: </b>"+team.enrolled+"/"+team.max_user+"</td></tr>"+
                                            "<tr><td><b>Entrada: </b>"+team.cost_entry+" $.</td></tr>"+
                                            "<tr><td><b>Posición: </b>"+team.position+"</td></tr>"+
                                        "</tbody>"+
                                    "</table>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</div>";

            });

    });

   
    lineup_id = '<div id="buttonedit"><input type="hidden" name="team_id" id="team_id" value="'+team_id+'"></div>';
    
    if(date_lineup<actual_date){
        //alert('es menor');
        $('#activateedit').html('');

    }else if((hour >= first_game) && (date_lineup > actual_date)){
       

        boton_edit = lineup_id+'<button type="submit" class="btn btn-default btn-primary4"  style="margin: 5px 0px;">EDITAR EQUIPO</button>';
        $('#activateedit').append(boton_edit);

    }else if(parseInt(hour) >= parseInt(first_game) && (date_lineup == actual_date)){

        boton_edit = '<span style="color:#D8BD33;font-size: 15px">Las competiciones comenzaron</span>';
        $('#activateedit').append(boton_edit);

    }else{

        boton_edit = lineup_id+'<button type="submit" class="btn btn-default btn-primary4"  style="margin: 5px 0px;">EDITAR EQUIPO</button>';
        $('#activateedit').append(boton_edit);

    }

    //------------------- Campo Oculto con Id del Lineup a Editar  
   // lineup_id = '<div id="buttonedit"><input type="hidden" name="team_id" id="team_id" value="'+team_id+'"></div>';

    $("#lineup_salary").append(lineup_salary);
    $("#lineup_date").append(lineup_date);
    $("#lineup_points").append(lineup_points);
    $("#competition_modal").append(competition_modal);
    $("#players_lineup").append(players_lineup);
    //$("#buttonedit").append(lineup_id);
    $("#lineup_name").text(username+" "+cont_teams);
    $("#myModal").modal("show");
}

