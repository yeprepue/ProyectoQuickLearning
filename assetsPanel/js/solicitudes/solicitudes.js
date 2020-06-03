

$(document).ready(function(){

  var base_url = $('#base_url').val();

    //actualizar horario
    $("#formSolitudes").validate({
        rules: {
          solicitud:{
            required: true
          },
          descripcion:{
            required: true
          }
        },
        messages: {
          solicitud:{
            required: "Obligatory field"
          },
          descripcion:{
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/insertSolicitud",
                type: "POST",
                data: $("#formSolitudes").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    $("#formSolitudes")[0].reset();
                   
                }
                if(response.code != 1){
                    $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                    $("#formSolitudes")[0].reset();
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });
});



function permitirSolicitud(id_solicitud,id_estudiante){

  //alert(id_solicitud);

  var base_url = $('#base_url').val();

  data = {
    id_solicitud : id_solicitud,
    id_estudiante : id_estudiante
  }

  $.ajax({

    url: base_url + "Panel/aprobarSolicitudEstudiante",
    type: "POST",
    data: data,
                
    }).done(function(data){
          
    var response = $.parseJSON(data);
                
    if(response.code == 1){
        $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
        //$("#formSolitudes")[0].reset();
                   
    }
    if(response.code != 1){
        $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
        //$("#formSolitudes")[0].reset();
    }
                
    }).fail(function() {
        alert( "error" );
    })
    .always(function() {
    });
}

//esto es para borrar la solicitud de suspension
function eliminarSolicitud(id_solicitud){
  
  var base_url = $('#base_url').val();

  data = {
    id_solicitud : id_solicitud
  }

  $.ajax({

    url: base_url + "Panel/deleteRequestSuspension",
    type: "POST",
    data: data,
                
    }).done(function(data){
          
    var response = $.parseJSON(data);
                
    if(response.code == 1){
        $.growl.notice({title: "Hi", message: response.mensaje, duration: 2000 });
        //$("#formSolitudes")[0].reset();
        setTimeout(redirectRequestRegistradas,2000);
                   
    }
    if(response.code != 1){
        $.growl.error({title: "Hi", message: response.mensaje, duration: 2000 });
        //$("#formSolitudes")[0].reset();
    }
                
    }).fail(function() {
        alert( "error" );
    })
    .always(function() {
    });
}


function redirectRequestRegistradas(){
    var base_url = $("#base_url").val();
    window.location=base_url+"Requests-registered";
}



//para estudiante

function verSolicitud(name){

    var base_url = $("#base_url").val();

    console.log("funciona");

    $.post( base_url + 'panel/sulicitudProcesadaEtudiante',
    {
        name: name
            
    }, function(data){
        $('.solicitudes').html(data);
    });
}


function mostrarCampoFecha(opcion){

    if (opcion == 2) {
        document.getElementById('fecha').style.display="";
        document.getElementById('censantiasCampos').style.display="none";
        document.getElementById('censantiasCampos2').style.display="none";


    }else if(opcion == 3){
        document.getElementById('fecha').style.display="none";
        document.getElementById('censantiasCampos').style.display="";
        document.getElementById('censantiasCampos2').style.display="";

    }else{
        document.getElementById('fecha').style.display="none";
        document.getElementById('censantiasCampos').style.display="none";
        document.getElementById('censantiasCampos2').style.display="none";

    }
}





