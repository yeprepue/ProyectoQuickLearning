

function validarRespuesta(){

    var base_url = $("#base_url").val();
	$.ajax({

        url: base_url + "Panel/validarRespuestaExamen",
        type: "POST",
        data: $("#formRespuesta").serialize(),
                
        }).done(function(data){
          
            var response = $.parseJSON(data);
                
            if(response.code == 1){
               $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
               //$("#formExamns")[0].reset();
                    //setTimeout(login,3000);
            }
            if(response.code != 1){
                $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                //$("#formExamns")[0].reset();
            }
                
        }).fail(function() {
            alert( "error" );
        })
        .always(function() {
        });
}
