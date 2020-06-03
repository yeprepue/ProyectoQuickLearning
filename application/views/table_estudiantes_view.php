<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

        

     
              <div class="table-responsive shadow p-3 mb-5  rounded">
                <h1 class="text-center">Student list</h1>
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
                      <th >phone</th>
                      <th >Home address</th>
                      <th >Home stratus</th>
                      <th >Eps</th>
                      <th >Profesion occupation</th>
                      <th >Office address</th>

                      <th >Contract</th>
                      <th >Invoice</th>
                      <th >Registration</th>
                      <th >Expiration</th>

                      <th >Rol</th>
                      <th >enroll</th>
                      <th>Status</th>
                      
                      <th >Editar</th>
                      <th >Borrar</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($estudiantes as  $value) { ?>
                        
                        <tr>
                            <td><?php echo $value['firstname']?></td>
                            <td><?php echo $value['lastname']?></td>
                            <td><?php echo $value['idpassport']?></td>
                            <td><?php echo $value['Document']?></td>
                            <td><?php echo $value['email']?></td>
                            <td><?php echo $value['pass']?></td>
                            <td><?php echo $value['headquarters']?></td>

                            <td><?php echo $value['phone']?></td>
                            <td><?php echo $value['Home_address']?></td>
                            <td><?php echo $value['Home_stratus']?></td>
                            <td><?php echo $value['Eps']?></td>
                            <td><?php echo $value['Profesion_occupation']?></td>
                            <td><?php echo $value['Office_address']?></td>
                                
                            <td><?php echo $value['Enroll_Nro_contrato']?></td>
                            <td><?php echo $value['Enroll_Nro_factura']?></td>
                            <td><?php echo $value['Enroll_fecha_incripcion']?></td>
                            <td><?php echo $value['Enroll_fecha_expir_program']?></td>

                            <td><?php echo $value['rol']?></td>
                             <td>
                             <a class="btn btn-primary" href="<?php echo base_url().'Panel/Enrollstudent/'. $value['id_users'] ?>" role="button">Enroll</a>
                            </td>
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
                                <a class="btn btn-primary" href="<?php echo base_url().'Panel/vistaActualizarEstudiante/'. $value['id_users'] ?>" role="button">editar</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="cargarIdEstudiante(<?php echo $value['id_users'] ?>)">
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


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Deseas eliminar este Estudiante?</h3>
        <form id="formEliminarProfesor">
          <input type="hidden" name="id_estudiante" id="id_estudiante">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnEliminarEstudiante" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<?php 
	$this->load->view('template/footer')
?>