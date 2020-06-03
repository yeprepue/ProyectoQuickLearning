
$(document).ready(function(){

    var base_url = $('#base_url').val();

    $("#formTeacherDocument").validate({
        rules: {
          photoProfile: {
            required: true
          },
          cv: {
            required: true
          },
          experiment: {
            required: true
          },
          Description: {
            required: true
          }
        },
        messages: {
          photoProfile: {
            required : "Obligatory field"
          },
          cv: {
            required: "Obligatory field"
          },
          experiment: {
            required: "Obligatory field"
          },
          Description: {
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){

        	var formData = new FormData(document.getElementById('formTeacherDocument'));
    
            $.ajax({

                url: base_url + "Teachpal/insertInformation",
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
                    $("#formTeacherDocument")[0].reset();
                }
                if(response.code != 1){
                    $.growl.error({title: "hello", message: response.mensaje, duration: 2000 });
                    $("#formTeacherDocument")[0].reset();
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });

});

$("#fotoTeacher").click(function(){
  document.getElementById('formTeacher2').style.display="";
});




$(document).ready(function(){

    var base_url = $('#base_url').val();

    $("#formTeacher2").validate({
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

          var formData = new FormData(document.getElementById('formTeacher2'));
    
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
                    setTimeout(redirtTeacher,2000);
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

function redirtTeacher(){
  var base_url = $('#base_url').val();
  window.location = base_url + "Teachpal"
}
