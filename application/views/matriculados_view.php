<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10 pt-3">

                <div class="table-responsive shadow p-3 mb-5  rounded">

                  <h1 class="text-center">Enrolled students</h1>

                <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                  <thead class="thead-dark">
                    <tr>
                      <th>Teachpal</th>
                      <th >Student</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($matriculas as  $value) {
                    ?>
                        
                        <tr>
                            <td><?php echo $value['profesor']?></td>
                            <td><?php echo $value['estudiante']?></td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="pasarIdMatricula(<?php echo $value['id_matriculados'] ?>)">
                                  Borrar
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
		Delete Enrollment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>do you want to delete this registration?</h3>
        <form id="formEliminarMatricula">
          <input type="hidden" name="id_matriculados" id="id_matriculados">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnEliminarMatricula" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<?php 
	$this->load->view('template/footer')
?>