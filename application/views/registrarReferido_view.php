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
                <div class="shadow p-3 mb-5  rounded mt-3">
                    <h1 class="text-center">Mis Estrellas</h1>
                    <?php if ($session['estrellas'] > 0) { ?>
                        <ul class="list-group list-group-horizontal">

                         <?php for ($i=0; $i < $session['estrellas'] ; $i++){ ?>

                            <li class="list-group-item">
                                <img width="25px" height="20px" src="<?php echo base_url() ?>assetsPanel/imagenes/Estrella.jpg">
                            </li>

                         <?php } ?>

                        </ul>

                  <?php }else{ ?>
                        <h5 class="text-center">You don't have your first star yet</h5>
                   <?php } ?>     
                </div>
                <div class="shadow p-3 mb-5  rounded">
                    <h2 class="text-center">Register referido</h2>
                    <form id="formRegisterReferido">
                        <input type="hidden" name="estudiante" id="estudiante" value="<?php echo $session['nombre']; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="nameCompleto">Nombre completo</label>
                              <input type="text" class="form-control" id="nameCompleto" name="nameCompleto" required>
                            </div>
                            

                            <div class="form-group col-md-6">
                                
                                <label for="Document">Document</label>
                                <select id="Document" name="Document" class="form-control" required>
                                    <option value="C.C">C.C </option>
                                    <option value="T.I">T.I</option>
                                    <option value="C.E">C.E</option>
                                    <option value="Passport">Passport</option>
                                </select>
                               
                            </div>
                          
                            <div class="form-group col-md-6">
                                <label for="numeroDocumento">Number Document</label>
                                <input type="number" name="numeroDocumento" class="form-control" id="numeroDocumento" required>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            

                            <div class="form-group col-md-6">
                                <label for="phone">phone</label>
                                <input type="number" name="phone" class="form-control" id="phone" required>
                            </div> 

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div> 
                   
                    </form>
        
                </div>
            </div>
        </div>
        
    </div>

    

<?php 
	$this->load->view('template/footer')
?>