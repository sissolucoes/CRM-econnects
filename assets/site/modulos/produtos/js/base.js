$(document).ready(function() {


    /**
     * Deixa o bloco com a mesma da descrição
     */
    $("#img_produto").load(function() {

        $('#produtoDescricao').height($(this).height() -20);
    });

});