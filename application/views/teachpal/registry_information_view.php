<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
    $session = $this->session->all_userdata();
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10 pt-3">
                <h1 class="text-center">Profile record</h1>
                <form id="formTeacherDocument" class="shadow p-3 mb-5  rounded">
                    <input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $session['id_usuario']; ?>">
                    <div class="form-row">
                        <!--<div class="form-group col-md-6">
                          <label for="photoProfile">Photo Profile</label>
                          <input type="file" class="form-control" id="photoProfile" name="photoProfile" required>
                        </div>-->
                        <div class="form-group col-md-8">
                          <label for="cv">CV</label>
                          <input type="file" class="form-control" id="cv" name="cv" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="experiment">Experiment</label>
                            <textarea class="form-control" name="experiment" id="experiment" placeholder="Ingrese la direccion" required></textarea>
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Ingrese la direccion" required></textarea>
                        </div> 

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button id="fotoTeacher" type="button" class="btn btn-success">Picture</button>
                        </div>
                    </div> 
               
                </form>

                <form id="formTeacher2" class="shadow p-3 mb-5  rounded" style="display: none;">
                    <input type="hidden" name="id_estudiante" id="id_estudiante" value="<?php echo $session['id_usuario']; ?>">
                    <div class="form-row">
                        <div class="col-md-12 text-center">
                            <img src=" <?php echo base_url().'assetsPanel/imagenes/'.$photo; ?> " class="" alt="foto_perfil" width="100" height="100">
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