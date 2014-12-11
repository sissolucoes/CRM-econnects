$(document).ready(function(e) {
        $(".filtros dl.dropdown_row dt a").click( function(e){
           $(this).remove();
        });


});


$(document).ready(function() {
       
    $(".btn_buscar").click(function() {
        document.location.href='?resultado=1';
    });


    $(".dropdown dt a").click(function() {
        $(this).parent().parent().find("dd ul").toggle();
        $(".insp_row, .historico, .col_segurados, .scroll_table, .cota_row, .obs_row, .obs_row02, .scroll_drop").mCustomScrollbar({
          mouseWheel: true,
          autoDraggerLength: false,
          scrollButtons: false
        });         
        
        
        return false;
    });

    $(".dropdown dd ul li a").click(function() {
        var text = $(this).html();
        $(this).parent().parent().parent().parent().find("dt a span").html(text);
        $(".dropdown dd ul").hide();
        return false;
    });

    $(".dropdown-cnpj dd ul li a").click(function() {
        var text = $(this).html();

        var tem = false;
        $( ".left_column dl.dropdown_row dt a" ).each(function( index ) {
            if(text == $( this ).text() ){
                tem = true;
            }

        });

        if(tem == false){
            $( ".left_column dl.dropdown_row").append('<dt><a href="#"><span>' + text + '</span></a></dt>');

            $(".left_column dl.dropdown_row dt a").click( function(e){
                $(this).remove();
            });

        }
        return false;
    });


    $(".dropdown-produto dd ul li a").click(function() {
        var text = $(this).html();

        var tem = false;
        $( ".center_column dl.dropdown_row dt a" ).each(function( index ) {
            if(text == $( this ).text() ){
                tem = true;
            }

        });

        if(tem == false){
            $( ".center_column dl.dropdown_row").append('<dt><a href="#"><span>' + text + '</span></a></dt>');

            $(".center_column dl.dropdown_row dt a").click( function(e){
                $(this).remove();
            });

        }
        return false;
    });


    function getSelectedValue(id) {
        return $("#" + id).find("dt a span.value").html();

    }

    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if ((! $clicked.parents().hasClass("dropdown")) && (!$clicked.parents().hasClass("ui-datepicker-header")) && (!$clicked.parents().hasClass("ui-datepicker-prev")) && (!$clicked.parents().hasClass("ui-datepicker-next"))) {
            $(".dropdown dd ul").hide();
        }
                                                          //    
        if (! $clicked.parents().hasClass("period")){
            var text = '';
            var sInicio = $("#data_inicial").val();
            var sFim = $("#data_final").val();
            if((sInicio != '') && (sFim != '')){
                text =  sInicio + ' a ' + sFim;
                //text =  $("#data_inicial").val() + ' a ' + $("#data_final").val();
                //console.log($("#data_inicial").val());
                //console.log($("#data_final").val());
                console.log(text);
                var tem = false;
                $( ".right_column dl.dropdown_row dt a" ).each(function( index ) {
                    if(text == $( this ).text() ){
                        tem = true;
                    }

                });

                if(tem == false){
                    $( ".right_column dl.dropdown_row").append('<dt><a href="#"><span>' + text + '</span></a></dt>');

                    $(".right_column dl.dropdown_row dt a").click( function(e){
                        $(this).remove();
                    });
                }
             $("#data_inicial").val('');
             $("#data_final").val('');                
            }
         



        }


    });


});
