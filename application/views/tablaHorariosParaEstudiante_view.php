<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
  $session = $this->session->all_userdata();
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10">
              <h1 class="text-center pt-3">Schedule</h1>

              <div class="table-responsive shadow p-3 mb-5 bg-white rounded">

                  <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                    <thead class="thead-dark">
                      <tr>
                        <th>Class</th>
                        <th >classroom</th>
                        <th >profesor</th>
                        <th>Start Time</th>
                        <th >End time</th>
                        <th>Days</th>
                        <th>Enroll</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($horarios as  $value) { 

                        $minutos = 50*60;

                        $endTime = date("H:i",strtotime($value['hora_clase'])+$minutos);

                        $datos = $value['profesor'];

                      ?>
                          
                          <tr>
                              <td><?php echo $value['clase']?></td>
                              <td><?php echo $value['salon_clase']?></td>
                              <td><?php echo $value['profesor']?></td>
                              <td><?php echo $value['hora_clase']?></td>
                              <td><?php echo $endTime; ?></td>
                              <td><?php echo $value['dias']; ?></td>
                              
                              <td>
                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" onclick="cargarProfesorMatricula('<?php echo $datos ?>')">
                                    Enroll
                                  </button>
                              </td>
                          </tr>
                      
                      <?php } ?>
                    </tbody>
                  </table>
              </div>
            </div> 
        </div>
        
    </div>



    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
		Enroll</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>
        do you want to enroll?</h3>
        <form id="formMatricular">
            <input type="hidden" name="profesor" id="profesor">

          <input type="hidden" name="estudiante" id="estudiante" value="<?php echo $session['nombre']; ?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" id="btnMatricular" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

<?php 
	$this->load->view('template/footer')
?>