$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formContacto").validate({
        rules: {
          name:{
            required: true
          },
          email: {
            required: true,
            email: true
          },
          phone: {
            required: true
          },
          headquarters: {
            required: true
          },
          message:{
            required: true
          }
        },
        messages: {
          name:{
            required: "Obligatory field"
          },
          email: {
            required: "Obligatory field",
            email: "Por favor ingrese un email valido"
          },
          phone: {
            required: "Obligatory field"
          },
          headquarters:{
            required: "Obligatory field"
          },
          message:{
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Usuario/enviarEmail",
                type: "POST",
                data: $("#formContacto").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                  var options1 = {
                    'title': 'Error',
                    'style': 'error',
                    'message': response.mensaje,
                    'timeout': 3000,
                    'icon': 'warning',
                }
                var n1 = new notify(options1);
                  n1.show();
                    $("#formContacto")[0].reset();
                    //setTimeout(login,3000);
                }
                if(response.code != 1){
                  var options1 = {
                    'title': 'Success',
                    'style': 'info',
                    'message': response.mensaje,
                    'timeout': 3000,
                    'icon': 'info',
                }
                var n1 = new notify(options1);
                  n1.show();
                    $("#formContacto")[0].reset();
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });
}); 
