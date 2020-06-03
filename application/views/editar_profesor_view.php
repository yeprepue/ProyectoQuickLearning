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
                        <!-----texto1-->
                        <a href="#">
                            <li class="nav-item active1 py-2">

                                <div class="d-inline mx-4 my-2">
                                    <img src="<?php echo base_url()?>assetsPanel/imagenes/calendario.png" width="35" height="35" class="imagen_user">
                                </div>
                                <div class="d-inline text-white">Schedule</div>

                            </li>
                        </a>
                        <!-----Texto2-->
                        <a href="">
                            <li class="nav-item py-2">
                                <div class="d-inline  mx-4 my-2">
                                    <img src="<?php echo base_url()?>assetsPanel/imagenes/perfilteachpal.png" width="35" height="35" class="imagen_user">
                                </div>
                                <div class="d-inline  text-white">Teachpal Profile</div>
                            </li>
                        </a>
                        <!-----Texto4-->
                        <a href="#">
                            <li class="nav-item py-2">
                                <div class="d-inline mx-4 my-2">
                                    <img src="<?php echo base_url()?>assetsPanel/imagenes/registrteachpal.png" width="35" height="35" class="imagen_user">
                                </div>
                                <div class="d-inline text-white">Registry Teachpal</div>
                            </li>
                        </a>
                        <!-----Texto5-->
                        <a href="#">
                            <li class="nav-item py-2">
                                <div class="d-inline mx-4 my-2">
                                    <img src="<?php echo base_url()?>assetsPanel/imagenes/listteachpal.png" width="35" height="35" class="imagen_user">
                                </div>
                                <div class="d-inline text-white">List Teachpal</div>
                            </li>
                        </a>   
                        <!-----Texto6-->
                        <a href="#">
                            <li class="nav-item py-2">
                                <div class="d-inline mx-4 my-2">
                                    <img src="<?php echo base_url()?>assetsPanel/imagenes/estudiantes.png" width="35" height="35" class="imagen_user">
                                </div>
                                <div class="d-inline text-white">Students list</div>
                            </li>
                        </a>
                         <!-----Texto7-->
                         <a href="">
                            <li class="nav-item py-2">
                                <div class="d-inline mx-4 my-2">
                                    <img src="<?php echo base_url()?>assetsPanel/imagenes/peticiones.png" width="35" height="35" class="imagen_user">
                                </div>
                                <div class="d-inline text-white">Requests</div>
                            </li>
                        </a>
                        <!-----Texto8-->
                        <a href="#">
                            <li class="nav-item py-2">
                                <div class="d-inline mx-4 my-2">
                                    <img src="<?php echo base_url()?>assetsPanel/imagenes/user7.png" width="25" height="25" class="imagen_user">
                                </div>
                                <div class="d-inline text-white">Load exams</div>
                            </li>
                        </a>


                    </ul>
                </div>
            </div>

            <div class="col-lg-10">
                <h1 class="text-center mt-3" style="font-feature-settings: arial; font-size: 60px">Edit teacher</h1>
                <form id="formAtualizarTeacher" class="shadow p-3 mb-5  rounded">
                    <input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $profesor[0]['id_users'] ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="firstname">First Name</label>
                          <input type="text" class="form-control" id="firstname" name="firstname" required value="<?php echo $profesor[0]['firstname'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="lastname" class="form-control" id="lastname" required value="<?php echo $profesor[0]['lastname'] ?>">
                        </div>
                      
                        <div class="form-group col-md-6">
                            <label for="idpassport">ID</label>
                            <input type="number" name="idpassport" class="form-control" id="idpassport" required value="<?php echo $profesor[0]['idpassport'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            
                            <label for="Document">Document</label>
                            <select id="Document" name="Document" class="form-control" required>
                                <option value="<?php echo $profesor[0]['Document'] ?>"><?php echo $profesor[0]['Document'] ?></option>
                                <option value="C.C">C.C </option>
                                <option value="T.I">T.I</option>
                                <option value="C.E">C.E</option>
                                <option value="Passport">Passport</option>
                            </select>
                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?php echo $profesor[0]['email'] ?>">
                        </div>
                        <div class="form-group col-md-6">

                            <label>Change Password</label><br><br>
                            <input  type="radio" name="cambiarPass" id="cambiarPassSI" value="1" onclick="mostrarPass(this.value)">
                              <label class="form-check-label" for="exampleRadios1" >
                                SI
                              </label>

                            <input  type="radio" name="cambiarPass" id="cambiarPassNO" value="0" checked onclick="mostrarPass(this.value)">
                              <label class="form-check-label" for="exampleRadios1" >
                                NO
                              </label>
                                   
                        </div>

                        <div id="onPass" class="form-group col-md-4" style="display: none">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" required >
                        </div>
                         
                        <div class="form-group col-md-4">
                            <label for="headquarters">Headquarters</label>
                            <select id="headquarters" name="headquarters" class="form-control" required>
                                <option value="<?php echo $profesor[0]['headquarters'] ?>"><?php echo $profesor[0]['headquarters'] ?></option>
                            <option value="medellin">Medellín</option>
                            <option value="rionegro">Rionegro</option>
                            </select>
                        </div> 
                        <div class="form-group col-md-4">
                                <label for="phone">phone</label>
                                <input type="number" name="phone" class="form-control" id="phone" required value="<?php echo $profesor[0]['phone'] ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone_reference">phone Reference</label>
                                <input type="number" name="phone_reference" class="form-control" id="phone_reference" required value="<?php echo $profesor[0]['phone_reference'] ?>">
                            </div>

                        <div class="form-group col-md-4">
                            <label for="headquarters">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="<?php echo $profesor[0]['status'] ?>">
                                    <?php 
                                        if ($profesor[0]['status'] == 1) {
                                            echo "Active";
                                        }else{
                                            echo "Suspended";
                                        }
                                    ?>  

                                </option>
                            <option value="0">Suspended</option>
                            <option value="1">Active</option>
                            </select>
                        </div> 

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div> 
               
                </form>
            </div>
        </div>
        
    </div>


<?php 
	$this->load->view('template/footer')
?>