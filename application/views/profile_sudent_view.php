<?php 
    $this->load->view('template/header');
    $this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10">
                <h1 class="text-center mt-3">Personal Information</h1>
                <form id="formAtualizarEstudianteProfile" class="shadow p-3 mb-5  rounded">
                    <input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $estudiante[0]['id_users'] ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="firstname">First Name</label>
                          <input type="text" class="form-control" id="firstname" name="firstname" required value="<?php echo $estudiante[0]['firstname'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="lastname" class="form-control" id="lastname" required value="<?php echo $estudiante[0]['lastname'] ?>">
                        </div>
                      
                        <div class="form-group col-md-6">
                            <label for="idpassport">ID</label>
                            <input type="number" name="idpassport" class="form-control" id="idpassport" required value="<?php echo $estudiante[0]['idpassport'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            
                            <label for="Document">Document</label>
                            <select id="Document" name="Document" class="form-control" required>
                                <option value="<?php echo $estudiante[0]['Document'] ?>"><?php echo $estudiante[0]['Document'] ?></option>
                                <option value="C.C">C.C </option>
                                <option value="T.I">T.I</option>
                                <option value="C.E">C.E</option>
                                <option value="Passport">Passport</option>
                            </select>
                           
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?php echo $estudiante[0]['email'] ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Home_address">Home address</label>
                            <input type="text" class="form-control" id="Home_address" name="Home_address" required value="<?php echo $estudiante[0]['Home_address'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Home_stratus">Home stratus</label>
                            <input type="number" class="form-control" id="Home_stratus" name="Home_stratus" required value="<?php echo $estudiante[0]['Home_stratus'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="eps">EPS</label>
                            <input type="text" class="form-control" id="eps" name="eps" required value="<?php echo $estudiante[0]['Eps'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="profesion_occupation">Profesion occupation</label>
                            <input type="text" class="form-control" id="profesion_occupation" name="profesion_occupation" required value="<?php echo $estudiante[0]['Profesion_occupation'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="office_address">Office address</label>
                            <input type="text" class="form-control" id="office_address" name="office_address"  value="<?php echo $estudiante[0]['Office_address'] ?>">
						</div>
						<div class="form-group col-md-6">
                            <label for="etnias">Etnias</label>
                            <input type="text" class="form-control" id="etnias" name="etnias"  value="<?php echo $estudiante[0]['etnias'] ?>">
                        </div>

                        <div class="form-group col-md-6">

                            <label>Change Password</label><br><br>
                            <input  type="radio" name="cambiarPass" id="cambiarPassSI" value="1" onclick="mostrarPass(this.value)">
                              <label class="form-check-label" for="exampleRadios1" >
                                YES
                              </label>

                            <input  type="radio" name="cambiarPass" id="cambiarPassNO" value="0" checked onclick="mostrarPass(this.value)">
                              <label class="form-check-label" for="exampleRadios1" >
                                NOT
                              </label>
                                   
                        </div>

                        <div id="onPass" class="form-group col-md-4" style="display: none">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" required >
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="headquarters">Headquarters</label>
                            <select id="headquarters" name="headquarters" class="form-control" required>
                                <option value="<?php echo $estudiante[0]['headquarters'] ?>"><?php echo $estudiante[0]['headquarters'] ?>"</option>
                            
                            </select>
                        </div> 

                        <div  class="form-group col-md-4" >
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" value="<?php echo $estudiante[0]['phone']; ?>">
                        </div>


                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button id="foto" type="button" class="btn btn-success">Picture</button>
                        </div>
                    </div> 
               
                </form>

                <form id="formEstudiante2" class="shadow p-3 mb-5  rounded" style="display: none;">
                    <input type="hidden" name="id_estudiante" id="id_estudiante" value="<?php echo $estudiante[0]['id_users'] ?>">
                    <div class="form-row">
                        <div class="col-md-12 text-center">
                            <img src=" <?php echo base_url().'assetsPanel/imagenes/'.$estudiante[0]['photoProfile']; ?> " class="" alt="foto_perfil" width="100" height="100">
                        </div>
                        <div class="col-md-12 pt-2 text-center">
                            <label for="photoProfile">
                                Profile Picture
                            </label>
                            <input type="file" name="photoProfile" id="photoProfile">
                        </div>

                        
                        <div class="col-md-12 pt-2 text-center">
                            <button type="submit" id="btnActualizarFotoPerfil" class="btn btn-success">Update Photo of Profile</button>
                        </div>
                    </div>    

                </form>

            </div>


        </div>
        
    </div>


<?php 
    $this->load->view('template/footer')
?>
