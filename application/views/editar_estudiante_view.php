<?php 
    $this->load->view('template/header');
    $this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10">
                <h1 class="text-center mt-3">Edit student</h1>
                <form id="formAtualizarEstudiante" class="shadow p-3 mb-5  rounded">
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

                            <label>Cambiar Contraseña</label><br><br>
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
                                <option value="<?php echo $profesor[0]['headquarters'] ?>"><?php echo $profesor[0]['headquarters'] ?>"</option>
                            <option value="medellin">Medellin</option>
                            <option value="rionegro">Rionegro</option>
                            </select>
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