$(function(){

    $('.deleteRowButton').on('click', function(){

        return confirm("Deseja realmente excluir esse registro?");
    });


    $.extend($.inputmask.defaults, {
        'autounmask': true
    });

    $(".inputmask-date").inputmask("d/m/y", {autoUnmask: true});
    $(".inputmask-cpf").inputmask({"mask": "999.999.999-99"});






});
