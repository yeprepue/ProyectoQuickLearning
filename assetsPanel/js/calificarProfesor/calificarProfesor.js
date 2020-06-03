
$("#btnCalificarProfesor").click(function(){
	
	var base_url = $("#base_url").val();

	var profesor = $('input:radio[name=idProfesor_Sede]:checked').val();

	profesor = profesor.split('||');
	//alert(profesor[1]);

	data = {
    calificadoPor: $("#calificadoPor").val(),
		sede : profesor[1],
		profesor : profesor[0],
		punctuality : $("#punctuality").val(),
    uniform : $("#uniform").val(),
    neatness : $("#neatness").val(),
    methodology : $("#methodology").val(),
    instructions : $("#instructions").val(),
    enthusiam : $("#enthusiam").val(),
		observaciones : $("#observaciones").val()
	}

	$.ajax({
        type: "POST",
        url: base_url + "Panel/guardarCalificacionProfesor",
        data: data,
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


window.addEventListener("load", function() {
  formCalificarProfesor.punctuality.addEventListener("keypress", soloNumeros, false);
  formCalificarProfesor.uniform.addEventListener("keypress", soloNumeros, false);
  formCalificarProfesor.neatness.addEventListener("keypress", soloNumeros, false);
  formCalificarProfesor.methodology.addEventListener("keypress", soloNumeros, false);
  formCalificarProfesor.instructions.addEventListener("keypress", soloNumeros, false);
  formCalificarProfesor.enthusiam.addEventListener("keypress", soloNumeros, false);

});

//Solo permite introducir numeros.
function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 53) {
    e.preventDefault();
  }
}
