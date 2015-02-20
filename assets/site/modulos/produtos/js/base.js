$(document).ready(function() {


    /**
     * Deixa o bloco com a mesma da descrição
     */

    $("#img_produto").one('load', function() {
        $('#produtoDescricao').height($(this).height() -20);
    }).each(function() {
        if(this.complete) $(this).load();
    });



    /** Abas dentro do produto */

    $('.btnShowAba').click( function(e){

        var id_aba = $(this).prop('id');

        $('.btnShowAba').removeClass('active');
        $(this).addClass('active');

                $('div#pj').addClass('hidden');
                $('div#pe').addClass('hidden');
                $('div#pf').removeClass('hidden');

        $('.abaConteudo').addClass('hidden');

        $('#conteudo_' + id_aba).removeClass('hidden');

         var img = $(this).data( "img" );

         $('#img_produto').attr('src', img );

    });



});