$(document).ready(function() {

       $('#loginForm').submit(function(event){

           var data = $( this ).serialize();

           var url = SITE_URL + 'relacionamento/login/proccess'

           $.post(url, data, function(response) {

               response = jQuery.parseJSON(response );

               if(response.success){

                   //@todo exibi perfis
               }
           });

       });


    $( ".esqueci-minha-senha" ).click( function(e){
        $(".recuperar_login").attr('style', 'height: 335px !important;');
        $(".pag_cadastre").hide();
        $(".area_personalizada").hide();
        $("#pag_esqueci_senha").show('slow');
        return false;

    });

    $( ".cadastre-se" ).click( function(e){
        $(".recuperar_login").attr('style', 'height: 510px !important;');
        $("#pag_esqueci_senha").hide();
        $(".area_personalizada").hide();
        $(".pag_cadastre").show('slow');

        return false;

    });

    $( ".area-personalizada" ).click( function(e){

        /*$(".recuperar_login").attr('style', 'height: 465px !important;');
        $("#pag_esqueci_senha").hide();
        $(".pag_cadastre").hide();
        $(".area_personalizada").show('slow');*/

        $('#loginForm').submit();

        return false;

    });

});