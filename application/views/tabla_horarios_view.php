<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10">

                <div class="table-responsive shadow p-3 mb-5  rounded">

                  <h1 class="text-center">Schedule classes</h1>

                <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                  <thead class="thead-dark">
                    <tr>
                      <th>Teacher</th>
                      <th >Description</th>
                      <th>Start Time</th>
                      <th >End time</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($horarios as  $value) { 

                    ?>
                        
                        <tr>
                            <td><?php echo $value['title']?></td>
                            <td><?php echo $value['description']?></td>
                           
                            <td><?php echo $value['start']?></td>
                
                            <td><?php echo $value['end']; ?></td>
                            
                  <td>
                                <a class="btn btn-primary" href="<?php echo base_url().'Panel/viewEditHorario/'. $value['id_horarios2'] ?>" role="button">edit</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="cargarIdHorario(<?php echo $value['id_horarios2'] ?>)">
                                  delete
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
		Delete Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to delete this Schedule?</h3>
        <form id="formEliminarHorario">
          <input type="hidden" name="id_horario" id="id_horario">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnEliminarHorario" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<?php 
	$this->load->view('template/footer')
?>