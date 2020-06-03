$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formRegisterTeacher").validate({
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
          pass: {
            required: true
          },
          headquarters: {
            required: true
          },
          phone: {
            required: true
          },
          phone_reference: {
            required: true
          },
          direccion:{
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
          pass:{
            required: "Obligatory field"
          },
          headquarters: {
            required: "Obligatory field"
          },
          phone: {
            required: "Obligatory field"
          },
          phone_reference: {
            required: "Obligatory field"
          },
          direccion: {
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/registrarProfesor",
                type: "POST",
                data: $("#formRegisterTeacher").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    $("#formRegisterTeacher")[0].reset();
                    //setTimeout(login,3000);
                }
                if(response.code != 1){
                    $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                    $("#formRegisterTeacher")[0].reset();
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


