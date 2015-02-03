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
});