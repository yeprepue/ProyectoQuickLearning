<script src="<?php echo base_url()?>assetsPanel/menu/js/script.js"></script>
<script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
      integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"
      integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI="
      crossorigin="anonymous"
		>
	</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/core/main.js"></script>
  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/interaction/main.js"></script>
  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/daygrid/main.js"></script>
  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/timegrid/main.js"></script>
  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/list/main.js"></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today ',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      /*customButtons:{
        miBoton:{
          text:"boton 1",
          click:function(){
            alert("accion del boton");
          }
        }
      },*/
      editable: true,
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many events
      events: {
        url: '<?php echo base_url()?>Panel/dataFechas',
        failure: function() {
          document.getElementById('script-warning').style.display = 'block'
        }
      },
      /*events: [
        {
          title: 'All Day Event',
          start: '2020-01-24',
          color: "red",
          description: "clase del tema 1"
        }
      ],*/
      eventClick: function(info) {
        //alert('Event: ' + info.event.title);
        //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
        //alert('View: ' + info.view.type);

        // change the border color just for fun
        //info.el.style.borderColor = 'red';
        //console.log(info.event.extendedProps.description);

        $("#exampleModal").modal();
        $("#titulo").html(info.event.title);
        $("#description").html(info.event.extendedProps.description);

        $("#nameClass").val(info.event.title);
        $("#profesor").val(info.event.extendedProps.nameProfesor);
        $("#fechaClass").val(info.event.start);

        $("#id_horarios2").val(info.event.extendedProps.id_horarios2);

        var leccion1 = info.event.extendedProps.leccion1;
        var leccion2 = info.event.extendedProps.leccion2;
        var leccion3 = info.event.extendedProps.leccion3;

        //var rangoLibros = info.event.extendedProps.rango;
        $("#rangoLibros").val(info.event.extendedProps.rango);



        var totalLecciones = leccion1 + " - " + leccion2 + " - " + leccion3;


        $("#lecciones").html(totalLecciones);



      }
    });

    calendar.render();
  });



  $("#btnAgregarLeccion").click(function(){

        document.getElementById('formAgregarLeccion').style.display=""
    
      
      var rangoLibros = $("#rangoLibros").val();
        

      if (rangoLibros == 1) {
        document.getElementById('rangoCalendario1').style.display=""
        document.getElementById('rangoCalendario2').style.display="none"
        document.getElementById('rangoCalendario3').style.display="none"

      }else if(rangoLibros==2){
        document.getElementById('rangoCalendario2').style.display=""
        document.getElementById('rangoCalendario1').style.display="none"
        document.getElementById('rangoCalendario3').style.display="none"

      }else if(rangoLibros==3){
        document.getElementById('rangoCalendario3').style.display=""
        document.getElementById('rangoCalendario2').style.display="none"
        document.getElementById('rangoCalendario3').style.display="none"
      }

  });

</script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

     <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/jquery-form-validation/jquery.validate.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/jquery.growl/js/jquery.growl.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/registerTeacher/registerTeacher.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/actualizarTeacher/actualizarTeacher.js"></script>

   
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/actualizarEstudiante/actualizarEstudiante.js"></script>
    <!--script para registrar archivos de teachers-->
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/teacher/teacher.js"></script>

    <!--script para registrar examenes-->
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/examenes/examenes.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableTeacher').DataTable();
        });
    </script>

    <!-- Swiper JS -->
  <script src="<?php echo base_url()?>assetsPanel/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

  <!--script para registrar examenes-->
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/hacerExamen/hacerExamen.js"></script>

    <!--para la hora-->
   

    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/clockpicker/clockpicker.js"></script>

    
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/horarios/horarios.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/matricular/matricular.js"></script>

    <!--script for request-->
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/solicitudes/solicitudes.js"></script>

    <!--script para calificar al profesor
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/calificarProfesor/calificarProfesor.js"></script>
-->
    <!--script para referidos-->
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/registroReferido/registroReferido.js"></script>

    <!--script para profile of student-->
    <script type="text/javascript" src="<?php echo base_url() ?>assetsPanel/js/profileStudent/profileStudent.js"></script>

    <!--script para noticias-->
    <script type="text/javascript" src="<?php echo base_url()?>assetsPanel/js/noticias/noticias.js"></script>
        
.
