<?php 
  $this->load->view('template/header');
  $this->load->view('template/menu');
    $session = $this->session->all_userdata();
?>
  

  <div class="main" style="width: 100%;">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         


            <div class="col-lg-10">

                <h1 class="text-center my-3">My Classes</h1>

                <div class="row">

                  <div class="col"></div>
                  <div class="col-10">
                    <div class="shadow p-3 mb-5  rounded" id='calendar'></div>
                  </div>
                  <div class="col"></div>
                </div>
            </div>

        </div>
        
    </div>



 <!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title"><span id="titulo">Estudiantes Matriculados</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <table class="table table-striped table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Estudiante</th>
              <th>Select</th>
            </tr>
          </thead>
          <tbody id="estudiantes">
            
          </tbody>
        </table>

        <form id="formCalificar">

          <input type="hidden" name="profesor" id="profesor">
          <input type="hidden" name="nameClass" id="nameClass">

          <div class="form-row">
            <div class="form-group col-md-6">
                                
              <label for="calificarEstudiante">Calificar</label>
              <select id="calificarEstudiante" name="calificarEstudiante" class="form-control" required>
                <option value="">No Asistio</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
                <option value="Review">Review</option>
                <option value="Studying">Studying</option>
              </select>
                               
            </div>
       
            <div class="col-md-6" style="padding-top: 26px;">
              <button type="button" id="calificar" class="btn btn-primary">Calificar</button>
            </div>

        </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <?php if ($session['rol'] == "estudiante") { ?>
          
        <button type="button" id="btnMatricular" class="btn btn-success">
        enroll</button>

      <?php } ?>
      </div>
    </div>
  </div>
</div>   

<script src="<?php echo base_url()?>assetsPanel/fullCalendar/core/main.js"></script>
  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/interaction/main.js"></script>
  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/daygrid/main.js"></script>
  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/timegrid/main.js"></script>
  <script src="<?php echo base_url()?>assetsPanel/fullCalendar/list/main.js"></script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



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
        //$("#titulo").html(info.event.title);
        //$("#description").html(info.event.extendedProps.description);

        $("#nameClass").val(info.event.title);
        $("#profesor").val(info.event.extendedProps.nameProfesor);

        buscarMatriculados(info.event.extendedProps.nameProfesor, info.event.title);


      }
    });

    calendar.render();
  });


  //esta funcion me buscara a los estudiantes matriculados a una clase y a un profesor

  function buscarMatriculados(profesor, nameClass){

    var base_url = $("#base_url").val();
    
    $.post( base_url + 'Panel/buscarEstudiantes',
    {
      profesor: profesor,
      nameClass : nameClass

    }, function(data){
      $('#estudiantes').html(data);
    });

  }

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
        
</body>

</html>
