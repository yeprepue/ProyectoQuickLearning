$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formAtualizarEstudiante").validate({
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
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/updateEstudiante",
                type: "POST",
                data: $("#formAtualizarEstudiante").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    //$("#formAtualizarTeacher")[0].reset();
                    setTimeout(tablasEstudiantes,3000);
                }
                if(response.code != 1){
                    $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                    //$("#formAtualizarTeacher")[0].reset();
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
function tablasEstudiantes(){
  var base_url = $('#base_url').val();
  window.location = base_url + "listado-estudiantes";
} 


//pasar valor id para eliminar

function cargarIdEstudiante(id){
  $("#id_estudiante").val(id);
}


$("#btnEliminarEstudiante").click(function(){
    var base_url = $("#base_url").val();
    $.ajax({
        type: "POST",
        url: base_url + "Panel/eliminarEstudiante",
        data: $("#formEliminarProfesor").serialize(),
        success: function(respuesta){
          var response = $.parseJSON(respuesta);
                
          if(response.code == 1){
            $.growl.notice({title: "hello", message: response.mensaje, duration: 2000 });
            setTimeout(tablasEstudiantes,2000);
          }   
        },
        dataType: "html"
    });
});



