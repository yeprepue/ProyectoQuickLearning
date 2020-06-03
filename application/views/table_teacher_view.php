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
                <h1 class="text-center">Teacher list</h1>

                <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                  <thead class="thead-dark">
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th >ID</th>
                      <th >Document</th>
                      <th>Email</th>
                      <th >Password</th>
                      <th >Headquarters</th>
                      <th >Rol</th>
                      <th>Status</th>
                      <th >Editar</th>
                      <th >Borrar</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($profesores as  $value) { ?>
                        
                        <tr>
                            <td><?php echo $value['firstname']?></td>
                            <td><?php echo $value['lastname']?></td>
                            <td><?php echo $value['idpassport']?></td>
                            <td><?php echo $value['Document']?></td>
                            <td><?php echo $value['email']?></td>
                            <td><?php echo $value['pass']?></td>
                            <td><?php echo $value['headquarters']?></td>
                            
                            <td><?php echo $value['rol']?></td>
                            <td>
                              <?php 
                                if ($value['status'] == 1) { ?>
                                   <p  class="text-center" style=" border-radius: 2px; padding: 2px; background-color: #44ac6c; color: #fff;">
                                      Active</p> 
                              
                              <?php  }else { ?>
                                <p class="text-center"  style=" border-radius: 2px; padding: 2px; background-color: #dc3545;color: #fff;">Suspended</p> 
                              <?php }?>
                              
                            </td>
                            <td>
                                <a class="btn btn-primary" href="<?php echo base_url().'Panel/actualizarProfesor/'. $value['id_users'] ?>" role="button">Edit</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="cargarIdprofesor(<?php echo $value['id_users'] ?>)">
                                  Delete
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Profesor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Deseas eliminar este profesor?</h3>
        <form id="formEliminarProfesor">
          <input type="hidden" name="id_profesor" id="id_profesor">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnEliminarProfesor" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<?php 
	$this->load->view('template/footer')
?>