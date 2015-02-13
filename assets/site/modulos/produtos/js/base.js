$(document).ready(function() {


    /**
     * Deixa o bloco com a mesma da descrição
     */
    $("#img_produto").load(function() {

        $('#produtoDescricao').height($(this).height() -20);
    });


    $('a#aba_pf, a#aba_pj, a#aba_pe').click( function(e){
        obj = $(this).prop('id');
        switch(obj){
            case 'aba_pf':
                $('a#aba_pj').removeClass('active');
                $('a#aba_pe').removeClass('active');
                $('a#aba_pf').addClass('active');
                $('div#pj').addClass('hidden');
                $('div#pe').addClass('hidden');
                $('div#pf').removeClass('hidden');

                var img = SITE_BASE_URL +'assets/site/images/produto-seguro-viagem-turismo.jpg';
                $('#img_produto').attr('src', img );

                break;
            case 'aba_pj':
                $('a#aba_pf').removeClass('active');
                $('a#aba_pe').removeClass('active');
                $('a#aba_pj').addClass('active');
                $('div#pf').addClass('hidden');
                $('div#pe').addClass('hidden');
                $('div#pj').removeClass('hidden');

                var img = SITE_BASE_URL +'assets/site/images/produto-seguro-viagem-negocios.jpg';
                $('#img_produto').attr('src', img );

                break;
            case 'aba_pe':
                $('a#aba_pf').removeClass('active');
                $('a#aba_pj').removeClass('active');
                $('a#aba_pe').addClass('active');
                $('div#pf').addClass('hidden');
                $('div#pj').addClass('hidden');
                $('div#pe').removeClass('hidden');


                var img = SITE_BASE_URL +'assets/site/images/produto-seguro-viagem-estudos.jpg';
                $('#img_produto').attr('src', img );

                break;
        }
    });

});