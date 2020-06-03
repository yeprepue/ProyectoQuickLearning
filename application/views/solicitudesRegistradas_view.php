<?php 
  $this->load->view('template/header');
  $this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

        <div class="row">
            <!-----Columna izquierda-->
            <div class="col-sm-12 col-md-12 col-lg-2 izquierda" style="padding-right: 0px;">
                <div class="courses">
                    <ul class="navbar-nav mr-auto">
                        <!-----Cursos-->
                        <li class="nav-item active1 py-2">

                            <div class="d-inline mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline text-white">Cursos</div>

                        </li>
                        <!-----Texto2-->
                        <li class="nav-item py-2">
                            <div class="d-inline mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline text-white">Texto 2</div>
                        </li>
                        <!-----Texto3-->
                        <li class="nav-item py-2">
                            <div class="d-inline  mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline  text-white">Texto 3</div>
                        </li>
                        <!-----Texto4-->
                        <li class="nav-item py-2">
                            <div class="d-inline mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline text-white">Texto 4</div>
                        </li>
                        <!-----Texto5-->
                        <li class="nav-item py-2">
                            <div class="d-inline mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline text-white">Texto 5</div>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-10">
              <h1 class="text-center mt-3">Requests registered</h1>
              <div class="table-responsive shadow p-3 mb-5  rounded">

                      <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                        <thead class="thead-dark">
                          <tr>
                            <th>Id</th>
                            <th>Student</th>
                            <th>Request</th>
                            <th>Description</th>
                            <th>Allow</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($solicitudes as  $value) { 

                          ?>
                              
                              <tr>
                                  <td><?php echo $value['id_solicitudes']?></td>
                                  <td><?php echo $value['estudiante']?></td>
                                  <td>
                                  <?php 
                                    if ($value['solicitud'] == 1) {
                        echo "Study certificate";
                    }elseif($value['solicitud'] == 3){
                      echo "Layoff letter";                        
                    }elseif($value['solicitud'] == 4){
                      echo "Enrollment certificate";
                    }elseif($value['solicitud'] == 5)
                    {
                      echo "Update payment certificate";
                    }else{
                      echo "Frozen process letter";
                    }
                                  ?>
                                  </td>
                                  <td><?php echo $value['descripcion']?>

                                  <?php if($value['solicitud'] == 2){ ?>

                                    <hr>Suspension deadline
                                    <?php echo $value['fechaInactividad']?>

                                  <?php } ?>
                                    
                                  </td>
                                  <td>
                                    <button type="button" class="btn btn-success" onclick="permitirSolicitud('<?php echo $value["id_solicitudes"]?>','<?php echo $value["id_estudiante"] ?>')">Allow</button>
                                  </td>
                                  <td>
                                    <button type="button" class="btn btn-danger" onclick="eliminarSolicitud('<?php echo $value["id_solicitudes"]?>')">Delete</button>
                                  </td>
                                  
                                  
                              </tr>
                          
                          <?php } ?>
                        </tbody>
                      </table>
                      </div>
            
            </div>
         
<?php 
  $this->load->view('template/footer');
?>