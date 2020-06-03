function cargarProfesorMatricula(profesor){
  $("#profesor").val(profesor);
}

$("#btnMatricular").click(function(){
    var base_url = $("#base_url").val();
    $.ajax({
        type: "POST",
        url: base_url + "Panel/matricularEstudiante",
        data: $("#formMatricular").serialize(),
        success: function(respuesta){
          var response = $.parseJSON(respuesta);
                
          if(response.code == 1){
            $.growl.notice({title: "hello", message: response.mensaje, duration: 2000 });
            //setTimeout(tablasMatriculados,2000);
          } 

          if(response.code != 1){
              $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
              //$("#formHorario")[0].reset();
          }  
        },
        dataType: "html"
    });
});

function pasarIdMatricula(id){
  $("#id_matriculados").val(id);
}

//elimino la matricula
$("#btnEliminarMatricula").click(function(){
    var base_url = $("#base_url").val();
    $.ajax({
        type: "POST",
        url: base_url + "Panel/elminarMatricula",
        data: $("#formEliminarMatricula").serialize(),
        success: function(respuesta){
          var response = $.parseJSON(respuesta);
                
          if(response.code == 1){
            $.growl.notice({title: "hello", message: response.mensaje, duration: 2000 });
            setTimeout(tablasMatriculados,2000);
          } 

          if(response.code != 1){
              $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
              //$("#formHorario")[0].reset();
          }  
        },
        dataType: "html"
    });
});


function tablasMatriculados(){
  var base_url = $('#base_url').val();
  window.location = base_url + "Enrolled";
}

//esto es para calificar a los estudiantes
$("#calificar").click(function(){

  var base_url = $("#base_url").val();

  //var estudiante = $('input:radio[name=nameEstudianteMatriculado]:checked').val();
  //var profesor = $("#profesor").val();
  //var nameClass = $("#nameClass").val();
  //var calificarEstudiante = $("#calificarEstudiante").val();

  var data = {
      estudiante : $('input:radio[name=nameEstudianteMatriculado]:checked').val(),
      profesor : $("#profesor").val(),
      clase : $("#nameClass").val(),
      calificacion: $("#calificarEstudiante").val()
  }

  //console.log(profesor);
  //console.log(nameClass);
  //console.log(estudiante);
  //console.log(calificarEstudiante);

  $.ajax({

    type: "POST",
    url: base_url + "Panel/guardarCalificacion",
    data: data,
    success: function(respuesta){
      var response = $.parseJSON(respuesta);
                

      if (response.code != 1) {
          $.growl.error({title: "hello", message: response.mensaje, duration: 3000 });
      }
                
      if(response.code == 1){
        $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });      
      }
                
      },
      dataType: "html"
  });

});
