$(document).ready(function() {

    $(".comboCategorias").change(function(){



        var url = ADMIN_URL + "/produto_categorias/get_categoria_by_tipo_pessoa/" + $("#tipo_pessoa").val();

        $.ajax({
            url: url,
            type: "GET",
            cache: false,
            dataType: "json",
            beforeSend: function( xhr ) {


            },
            success: function(json){
                var options = ' <option value=""></option>';
                $.each(json.rows, function(key, value){

                    options += '<option value="' + value.produto_categoria_id + '">' + value.nome + '</option>';
                });

                $("#produto_categoria_id").html(options);


            }
        });

    });

});