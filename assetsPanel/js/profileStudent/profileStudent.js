$("#foto").click(function(){
	document.getElementById('formEstudiante2').style.display="";
});




$(document).ready(function(){

    var base_url = $('#base_url').val();

    $("#formEstudiante2").validate({
        rules: {
          photoProfile: {
            required: true
          }
        },
        messages: {
          photoProfile: {
            required : "Obligatory field"
          }
        },
        submitHandler: function(form){

        	var formData = new FormData(document.getElementById('formEstudiante2'));
    
            $.ajax({

                url: base_url + "Panel/actualizarFoto",
                type: "post",
      			    dataType: "html",
      			    data: formData,
      			    cache: false,
      			    contentType: false,
      			    processData: false
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 2000 });
                    //$("#formTeacherDocument")[0].reset();
                    setTimeout(rediretProfile,2000);
                }
                if(response.code != 1){
                    $.growl.error({title: "hello", message: response.mensaje, duration: 2000 });
                    //$("#formTeacherDocument")[0].reset();
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });

});

function rediretProfile(){
   var base_url = $('#base_url').val();

   window.location = base_url + "my-profile";
}



$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formAtualizarEstudianteProfile").validate({
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
          Home_address:{
            required: "Obligatory field"
          },
          Home_stratus:{
            required: "Obligatory field"
          },
          Eps:{
            required: "Obligatory field"
          },
          Profesion_occupation:{
            required: "Obligatory field"
          },  
          email: {
            required: "Obligatory field",
            email: "Please enter a valid email"
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

                url: base_url + "Panel/updateEstudiante2",
                type: "POST",
                data: $("#formAtualizarEstudianteProfile").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "Hi", message: response.mensaje, duration: 3000 });
                    //$("#formAtualizarTeacher")[0].reset();
                    setTimeout(rediretProfile,3000);
                }
                if(response.code != 1){
                    $.growl.error({title: "Hi", message: response.mensaje, duration: 3000 });
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

$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formMatriculadoEstudiante").validate({
        rules: {
          Enroll_Nro_contrato:{
            required: true
          },
          Enroll_Nro_factura:{
            required: true
          },
          Enroll_fecha_incripcion:{
            required: true
          },
          Enroll_fecha_expir_program:{
            required: true
          }
        },
        messages: {
          Enroll_Nro_contrato:{
            required: "Obligatory field"
          },
          lastname:{
            Enroll_Nro_factura: "Obligatory field"
          },
          Enroll_fecha_incripcion:{
            required: "Obligatory field"
          },
          Enroll_fecha_expir_program:{
            required: "Obligatory field"
          },
          
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/updateEstudianteMatriculado",
                type: "POST",
                data: $("#formMatriculadoEstudiante").serialize(),
                
            }).done(function(data){
          
             
                    $.growl.notice({title: "Record enroll student", duration: 3000 });
                    //$("#formAtualizarTeacher")[0].reset();
                    setTimeout(tablasEstudiantes,3000);
                
             
                
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

