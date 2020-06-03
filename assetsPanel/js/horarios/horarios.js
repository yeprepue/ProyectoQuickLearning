$(document).ready(function(){
  $('.clockpicker').clockpicker({
    //autoclose: true,
    //twelvehour: true
  });

  //$("#dias").multiselect();
});



$(document).ready(function(){

  var base_url = $('#base_url').val();

    $("#formHorario").validate({
        rules: {
          profesor:{
            required: true
          },
          nameClass: {
            required: true
          },
          fechaClase:{
            required: true
          },
          hora_clase:{
            required: true
          },
          description:{
            required: true
          }
        },
        messages: {
          
          profesor:{
            required: "Obligatory field"
          },
          nameClass: {
            required: "Obligatory field"
          },
          fechaClase:{
            required: "Obligatory field"
          },
          hora_clase:{
            required: "Obligatory field"
          },
          description:{
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/insertTime",
                type: "POST",
                data: $("#formHorario").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    $("#formHorario")[0].reset();
                    //setTimeout(login,3000);

                    //rango 1
            document.getElementById('rango1_leecion1').style.display="none";
            document.getElementById('rango1_leecion2').style.display="none";
            document.getElementById('rango1_leecion3').style.display="none";
            //end 1

            //rango 2
            document.getElementById('rango2_leecion1').style.display="none";
            document.getElementById('rango2_leecion2').style.display="none";
            document.getElementById('rango2_leecion3').style.display="none";
            //end rango dos

            //rango 3
            document.getElementById('rango3_leecion1').style.display="none";
            document.getElementById('rango3_leecion2').style.display="none";
            document.getElementById('rango3_leecion3').style.display="none";
            //end rango 3

            document.getElementById('contenedorRango').style.display="none";
                }
                if(response.code != 1){
                    $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                    $("#formHorario")[0].reset();

                    //rango 1
            document.getElementById('rango1_leecion1').style.display="none";
            document.getElementById('rango1_leecion2').style.display="none";
            document.getElementById('rango1_leecion3').style.display="none";
            //end 1

            //rango 2
            document.getElementById('rango2_leecion1').style.display="none";
            document.getElementById('rango2_leecion2').style.display="none";
            document.getElementById('rango2_leecion3').style.display="none";
            //end rango dos

            //rango 3
            document.getElementById('rango3_leecion1').style.display="none";
            document.getElementById('rango3_leecion2').style.display="none";
            document.getElementById('rango3_leecion3').style.display="none";
            //end rango 3

            document.getElementById('contenedorRango').style.display="none";
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });

    //actualizar horario
    $("#formActualizarHorario").validate({
        rules: {
          clase:{
            required: true
          },
          salon_clase:{
            required: true
          },
          profesor:{
            required: true
          },
          hora_clase:{
            required: true
          },
          dias:{
            required: true
          }
        },
        messages: {
          clase:{
            required: "Obligatory field"
          },
          salon_clase:{
            required: "Obligatory field"
          },
          profesor:{
            required: "Obligatory field"
          },
          hora_clase:{
            required: "Obligatory field"
          },
          dias:{
            required: "Obligatory field"
          }
        },
        submitHandler: function(form){
    
            $.ajax({

                url: base_url + "Panel/actualizarHorario",
                type: "POST",
                data: $("#formActualizarHorario").serialize(),
                
            }).done(function(data){
          
                var response = $.parseJSON(data);
                
                if(response.code == 1){
                    $.growl.notice({title: "hello", message: response.mensaje, duration: 3000 });
                    //$("#formActualizarHorario")[0].reset();
                    setTimeout(tablasHorarios,3000);
                }
                if(response.code != 1){
                    $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                    //$("#formActualizarHorario")[0].reset();
                }
                
            }).fail(function() {
                    alert( "error" );
                })
            .always(function() {
            });

        }
    });
});


function tablasHorarios(){
  var base_url = $('#base_url').val();
  window.location = base_url + "Panel/mostrarHorarios";
} 


function cargarIdHorario(id){
  $("#id_horario").val(id);
}

$("#btnEliminarHorario").click(function(){
    var base_url = $("#base_url").val();
    $.ajax({
        type: "POST",
        url: base_url + "Panel/eliminarHorario",
        data: $("#formEliminarHorario").serialize(),
        success: function(respuesta){
          var response = $.parseJSON(respuesta);
                
          if(response.code == 1){
            $.growl.notice({title: "hello", message: response.mensaje, duration: 2000 });
            setTimeout(tablasHorarios,2000);
          }   
        },
        dataType: "html"
    });
});

function mostrarRngos(option){
  if (option == "Interactive station") {
    document.getElementById('contenedorRango').style.display="";

  }else{
    document.getElementById('contenedorRango').style.display="none";

    //rango 1
    document.getElementById('rango1_leecion1').style.display="none";
    document.getElementById('rango1_leecion2').style.display="none";
    document.getElementById('rango1_leecion3').style.display="none";
    //end 1

    //rango 2
    document.getElementById('rango2_leecion1').style.display="none";
    document.getElementById('rango2_leecion2').style.display="none";
    document.getElementById('rango2_leecion3').style.display="none";
    //end rango dos

    //rango 3
    document.getElementById('rango3_leecion1').style.display="none";
    document.getElementById('rango3_leecion2').style.display="none";
    document.getElementById('rango3_leecion3').style.display="none";
    //end rango 3

  }
}


function mostarLecciones(option){
  if (option == 1) {
    document.getElementById('rango1_leecion1').style.display="";
    document.getElementById('rango1_leecion2').style.display="";
    document.getElementById('rango1_leecion3').style.display="";

    //rango 2
    document.getElementById('rango2_leecion1').style.display="none";
    document.getElementById('rango2_leecion2').style.display="none";
    document.getElementById('rango2_leecion3').style.display="none";
    //end rango dos

    //rango 3
    document.getElementById('rango3_leecion1').style.display="none";
    document.getElementById('rango3_leecion2').style.display="none";
    document.getElementById('rango3_leecion3').style.display="none";
    //end rango 3
  }else if (option==2){
    document.getElementById('rango2_leecion1').style.display="";
    document.getElementById('rango2_leecion2').style.display="";
    document.getElementById('rango2_leecion3').style.display="";

    //rango 1
    document.getElementById('rango1_leecion1').style.display="none";
    document.getElementById('rango1_leecion2').style.display="none";
    document.getElementById('rango1_leecion3').style.display="none";
    //end 1

    //rango 3
    document.getElementById('rango3_leecion1').style.display="none";
    document.getElementById('rango3_leecion2').style.display="none";
    document.getElementById('rango3_leecion3').style.display="none";
    //end rango 3
  }else if(option==3){
    document.getElementById('rango3_leecion1').style.display="";
    document.getElementById('rango3_leecion2').style.display="";
    document.getElementById('rango3_leecion3').style.display="";

    //rango 1
    document.getElementById('rango1_leecion1').style.display="none";
    document.getElementById('rango1_leecion2').style.display="none";
    document.getElementById('rango1_leecion3').style.display="none";
    //end 1

    //rango 2
    document.getElementById('rango2_leecion1').style.display="none";
    document.getElementById('rango2_leecion2').style.display="none";
    document.getElementById('rango2_leecion3').style.display="none";
    //end rango dos
  }
}


$("#btnGuardarLeccion").click(function(){
    var base_url = $("#base_url").val();
    $.ajax({
        type: "POST",
        url: base_url + "Panel/guardarLeccion",
        data: $("#formAgregarLeccion").serialize(),
        success: function(respuesta){
          var response = $.parseJSON(respuesta);
                
          if(response.code == 1){
            $.growl.notice({title: "hello", message: response.mensaje, duration: 2000 });
            setTimeout(refrescarCalendario,2000);

          } 

          if(response.code != 1){
              $.growl.error({title: response.titulo, message: response.mensaje, duration: 3000 });
                   //$("#formActualizarHorario")[0].reset();
            setTimeout(refrescarCalendario,2000);
            
          } 

        },
        dataType: "html"
    });
});

function refrescarCalendario(){
  location.reload();
}






