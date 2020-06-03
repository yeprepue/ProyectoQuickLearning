$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formRegister").validate({
        rules: {
          firstname:{
            required: true
          },
          lastname:{
            required: true
          },
          idpassport:{
            required: true
          },
          Document:{
            required: true
          },
          email: {
            required: true,
            email: true
          },
          headquarters: {
            required: true
          },
          pass: {
            required: true
          },
          pass2:{
            required: true
          }
        },
        messages: {
          firstname:{
            required: "Obligatory field"
          },
          lastname:{
            required: "Obligatory field"
          },
          idpassport:{
            required: "Obligatory field"
          },
          Document:{
            required: "Obligatory field"
          },
          email: {
            required: "Obligatory field",
            email: "Por favor ingrese un email valido"
          },
          headquarters: {
            required: "Obligatory field"
          },
          pass:{
            required: "Obligatory field"
          },
          pass2:{
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Usuario/registrarUsuario",
                type: "POST",
                data: $("#formRegister").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                  var options1 = {
                    'title': 'info',
                    'style': 'Default',
                    'message': response.mensaje,
                    'timeout': 10000,
                    'icon': 'info',
                }
                var n1 = new notify(options1);
                  n1.show();
                    $("#formRegister")[0].reset();
                    setTimeout(login,3000);
                }
                if(response.code != 1){
                  var options1 = {
                    'title': 'info',
                    'style': 'info',
                    'message': response.mensaje,
                    'timeout': 10000,
                    'icon': 'info',
                }
                var n1 = new notify(options1);
                  n1.show();
                    $("#formRegister")[0].reset();
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });
}); 


//redirecionar al login
function login(){
  var base_url = $('#base_url').val();
  window.location = base_url + "Login";
} 


function validarPass(){
  console.log("entro");
  var pass1 = $("#pass").val();
  var pass2 = $("#pass2").val();

  if (pass1 != pass2) {
    $("#msgError").html("Passwords do not match...");
  }else{
    $("#msgError").html("");
  }
}   
