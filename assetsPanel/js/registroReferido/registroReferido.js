var base_url = $('#base_url').val();

$(document).ready(function(){


    $("#formRegisterReferido").validate({
        rules: {
          nameCompleto:{
            required: true
          },
          Document:{
            required: true
          },
          numeroDocumento:{
            required: true
          },
          email: {
            required: true,
            email: true
          },
          phone: {
            required: true
          }
        },
        messages: {
          nameCompleto:{
            required: "Obligatory field"
          },
          Document:{
            required: "Obligatory field"
          },
          numeroDocumento:{
            required: "Obligatory field"
          },
          email: {
            required: "Obligatory field",
            email: "Por favor ingrese un email valido"
          },
          phone: {
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/guardarDatosReferido",
                type: "POST",
                data: $("#formRegisterReferido").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    $("#formRegisterReferido")[0].reset();
                    //setTimeout(login,3000);
                }
                if(response.code != 1){
                    $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                    $("#formRegisterReferido")[0].reset();
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

$("#btnBuscarReferido").click(function(){

    var base_url = $("#base_url").val();
    
    $.post( base_url + 'Panel/dataReferidos',
    {
      estudiante: $("#nameEstudiante").val()

    }, function(data){
      $('#dataReferidos').html(data);
    });
});


//esta function es para  agregarle las estrellas a llos estudiantes

function premiarEstrellaEstudiante(){
  var estudiante = $("#nameEstudiante").val();

  //console.log(estudiante);

  var data = {
    estudiante : estudiante
  }

  $.ajax({

    url: base_url + "Panel/sumarEsrella",
    type: "POST",
    data: data,
                
  }).done(function(data){
          
      var response = $.parseJSON(data);
                
      if(response.code == 1){
        $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
        //$("#formRegisterReferido")[0].reset();
                    //setTimeout(login,3000);
      }
      if(response.code != 1){
          $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
          //$("#formRegisterReferido")[0].reset();
      }
                
    }).fail(function() {
            alert( "error" );
        })
    .always(function() {
    });
}


