$(document).ready(function() {

    $('#formOcorrencia').submit(function(event){
        event.preventDefault();





        var values =  $(this).serialize();



        var url = SITE_URL + '/ocorrencia/proccess_form/';


        $.ajax({
            url: url,
            type: "post",
            data: values,
            dataType: "json",
            success: function(data ){

                if(data.success){

                    $('#message_box').html('');
                    $('#message_box').html(data.message);

                    $("#formOcorrencia input[type=text], #formOcorrencia textarea").val("");

                }else {

                    $('#message_box').html('');
                    $('#message_box').html(data.message);
                }


            }
        });



    });

});