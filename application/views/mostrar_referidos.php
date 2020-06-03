<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10">
                <div class="shadow p-3 mb-5  rounded">
                    <h1 class="text-center">Search Referrals</h1>
                    <form id="formBuscarReferido">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="nameEstudiante">Nombre Estudiante</label>
                              <input type="text" class="form-control" id="nameEstudiante" name="nameEstudiante" required>
                            </div>
                         

                            <div class="col-md-6 pt-4 text-center">
                                <button id="btnBuscarReferido" type="button" class="btn btn-success">Search</button>
                                <button onclick="premiarEstrellaEstudiante();" id="btnEstrella" type="button" class="btn btn-default"><img height="20px" width="40px"  src="<?php echo base_url()?>assetsPanel/imagenes/Estrella.jpg"></button>
                            </div>
                        </div> 
                   
                    </form>

                    <div class="table-responsive mt-4">

                      <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                        <thead class="thead-dark">
                          <tr>
                            <th>Registered By</th>
                            <th>Full name</th>
                            <th>Type Document</th>
                            <th>Document number</th>
                            <th>Email</th>
                            <th>Phone</th>

                          </tr>
                        </thead>
                        <tbody id="dataReferidos">
                          
                        </tbody>
                      </table>
                    </div>
        
                </div>
            </div>
        </div>
        
    </div>

    

<?php 
	$this->load->view('template/footer')
?>