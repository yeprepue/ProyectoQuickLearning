$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formExamns").validate({
        rules: {
          pregunta:{
            required: true
          },
          respuesta:{
            required: true
          },
          numero_examen:{
            required: true
          }
        },
        messages: {
          pregunta:{
            required: "Obligatory field"
          },
          respuesta:{
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/insertExamenes",
                type: "POST",
                data: $("#formExamns").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    $("#formExamns")[0].reset();
                    //setTimeout(login,3000);
                }
                if(response.code != 1){
                    $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                    $("#formExamns")[0].reset();
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });
});

$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formCargarTiulos").validate({
        rules: {
          curso:{
            required: true
          },
          numero_examen:{
            required: true
          },
          titulo:{
            required: true
          },
          descripcion:{
            required: true
          }
        },
        messages: {
          curso:{
            required: "Obligatory field"
          },
          numero_examen:{
            required: "Obligatory field"
          },
          titulo:{
            required: "Obligatory field"
          },
          descripcion:{
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/guardarTitulos",
                type: "POST",
                data: $("#formCargarTiulos").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    $("#formCargarTiulos")[0].reset();
                    //setTimeout(login,3000);
                }
                if(response.code != 1){
                    $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                    $("#formCargarTiulos")[0].reset();
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });
});



$("#buscarDataTitle").click(function(){
  var base_url = $('#base_url').val();

  $.post( base_url + 'Panel/cargarInputTitulo',
    {
      op: 1

    }, function(data){
      $('#titulos_registrados').html(data);
  });

});

 


