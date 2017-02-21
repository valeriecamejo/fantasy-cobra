$(function(){
    var menor;
    // Promocion Cajita 1
    var promo_1_min = $('#min_1').val();
    var promo_1_max = $('#max_1').val();
    var promo_1_perc = $('#percentage_1').val();

    // Promocion Cajita 2
    var promo_2_min = $('#min_2').val();
    var promo_2_max = $('#max_2').val();
    var promo_2_perc = $('#percentage_2').val();

    // Promocion Cajita 3
    var promo_3_min = $('#min_3').val();
    var promo_3_max = $('#max_3').val();
    var promo_3_perc = $('#percentage_3').val();

    // Promocion Cajita 4
    var promo_4_min = $('#min_4').val();
    var promo_4_max = $('#max_4').val();
    var promo_4_perc = $('#percentage_4').val();


    if( promo_1_min  !== undefined){

        $('#menor').html(promo_1_min);

    }else if( promo_2_min !== undefined){

        $('#menor').html(promo_2_min);

    }else if(promo_3_min !== undefined){

        $('#menor').html(promo_3_min);

    }else if(promo_4_min !== undefined){

        $('#menor').html(promo_4_min);

    }else{

        menor = 1000;
        $('#menor').html(menor);
    }
    //$('#menor').html(promo_1_min);

    //alert(promo_4_min);
    $('#montod').keyup(function(){

        var monto = parseFloat($('#montod').val());
        var bono = 0;
        var total=0;

        if(parseFloat(monto)>=parseFloat(promo_1_min) && parseFloat(monto)<=parseFloat(promo_1_max)){

            bono = monto * parseFloat(promo_1_perc/100);
            total = monto*parseFloat(promo_1_perc/100) + monto;

        }else if(parseFloat(monto) >= parseFloat(promo_2_min) && parseFloat(monto)<=parseFloat(promo_2_max)){

            bono = monto * parseFloat(promo_2_perc/100);
            total = monto*parseFloat(promo_2_perc/100) + monto;
        }else if(parseFloat(monto) >= parseFloat(promo_3_min) && parseFloat(monto)<=promo_3_max){

            bono = monto * parseFloat(promo_3_perc/100);
            total = monto*parseFloat(promo_3_perc/100) + monto;
        }else if(parseFloat(monto) >= parseFloat(promo_4_min) && parseFloat(monto)<=parseFloat(promo_4_max)){

            bono = monto * parseFloat(promo_4_perc/100);
            total = monto*parseFloat(promo_4_perc/100) + monto;
        }else if(parseFloat(monto)>=parseFloat(promo_4_max)){

            bono = monto * parseFloat(promo_4_perc/100);
            total = monto*parseFloat(promo_4_perc/100) + monto;
        }else{

            bono = 0;
            total = monto;
        }

        if(isNaN(monto)){
            total = 0;
            $('#total').val(total);
        }

        $('#total').val(total.toFixed(2));
        $('#bono').val(bono.toFixed(2));
        $('#verifymount').val(monto.toFixed(2));

    });
});