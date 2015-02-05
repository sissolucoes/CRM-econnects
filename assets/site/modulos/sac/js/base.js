$(document).ready(function() {


    $('.load_faq_categoria').click(function(event){

        
        var categoria_id = $(this).attr("href").substring(1);


        event.preventDefault();

        $("#container_faq_result").html('');


        var values = { name: "John", location: "Boston" };

        var url = SITE_URL + '/faq/buscar_por_categoria/' + categoria_id;


        $.ajax({
            url: url,
            type: "post",
            data: values,
            dataType: "html",
            success: function(html ){

                $('#but_pj').click();

                $("#container_faq_result").html(html);

                $('#nossos_produtos h2').click( function(e){
                    obj = $(this);
                    $('#nossos_produtos div.content').not(obj.siblings('div.content')).slideUp();
                    if(obj.hasClass('active')){
                        $('#nossos_produtos h2.active').removeClass('active');
                    } else {
                        $('#nossos_produtos h2.active').removeClass('active');
                        obj.addClass('active');
                    }
                    obj.siblings('div.content').slideToggle();
                });
            }
        });

        event.preventDefault();
    });


    $('.solicitacao').hover(function(){

        var over = $(this).data("over");
        var out = $(this).data("out");
        $(this).attr("src", over);
        $(this).attr('style', "width: 149px; height: 40px; position: relative; top: -2px; left: 2px;");
        $(this).mouseout(function(){
            $(this).attr("src", out);
        });
    });

    $('.ocorrencia').hover(function(){


        var over = $(this).data("over");
        var out = $(this).data("out");
        $(this).attr("src", over);
        $(this).attr('style', "width: 148px; height: 40px; position: relative; top: -2px; left: -1px;");
        $(this).mouseout(function(){
            $(this).attr("src", out);
        });
    });

    $('.solicitacao_relacionamento').hover(function(){
        var tipo = $(this).attr('tipo');
        $(this).attr("src", "../images/img_sac-email-"+tipo+"-cinza.png");
        $(this).attr('style', "width: 149px; height: 40px; position: relative; top: -2px; left: 2px;");
        $(this).mouseout(function(){
            $(this).attr("src", "../images/img_sac-email-"+tipo+".png");
        });
    });

    $('.ocorrencia_relacionamento').hover(function(){
        var tipo = $(this).attr('tipo');
        $(this).attr("src", "../images/img_sac-email-"+tipo+"-cinza.png");
        $(this).attr('style', "width: 148px; height: 40px; position: relative; top: -2px; left: -1px;");
        $(this).mouseout(function(){
            $(this).attr("src", "../images/img_sac-email-"+tipo+".png");
        });
    });

    $('.continuar').click(function(){
        $('#continuacao').show('fast');
        $(this).hide('fast');
    });


});