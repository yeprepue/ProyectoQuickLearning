$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formAtualizarTeacher").validate({
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
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/updateTeacher",
                type: "POST",
                data: $("#formAtualizarTeacher").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    //$("#formAtualizarTeacher")[0].reset();
                    setTimeout(tablas,3000);
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
function tablas(){
  var base_url = $('#base_url').val();
  window.location = base_url + "listado-profesores";
} 


function mostrarPass(opcion){

  console.log(opcion);

  if (opcion == 1) {
    document.getElementById('onPass').style.display = "";
  }else{
    document.getElementById('onPass').style.display = "none";
  }

}

//pasar valor id para eliminar

function cargarIdprofesor(id){
  $("#id_profesor").val(id);
}


$("#btnEliminarProfesor").click(function(){
    var base_url = $("#base_url").val();
    $.ajax({
        type: "POST",
        url: base_url + "Panel/eliminarProfesor",
        data: $("#formEliminarProfesor").serialize(),
        success: function(respuesta){
          var response = $.parseJSON(respuesta);
                
          if(response.code == 1){
            $.growl.notice({title: "hello", message: response.mensaje, duration: 2000 });
            setTimeout(tablas,2000);
          }   
        },
        dataType: "html"
    });
});



