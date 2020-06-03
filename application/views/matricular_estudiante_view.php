<?php 
    $this->load->view('template/header');
    $this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10">
                
                <form id="formMatriculadoEstudiante" class="shadow p-3 mb-5  rounded">
                <h1 class="text-center mt-3">Enroll student - <?php echo $profesor[0]['firstname'].' '.$profesor[0]['lastname'] ?></h1>
                <div class="form-row">
                    <input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $profesor[0]['id_users'] ?>">
                   
                        <div class="form-group col-md-6">
                            <label for="Enroll_Nro_contrato">Contract number</label>
                            <input type="text" class="form-control" id="Enroll_Nro_contrato" name="Enroll_Nro_contrato" required value="<?php echo $profesor[0]['Enroll_Nro_contrato'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Enroll_Nro_factura">Invoice number</label>
                            <input type="text" class="form-control" id="Enroll_Nro_factura" name="Enroll_Nro_factura" required value="<?php echo $profesor[0]['Enroll_Nro_factura'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Enroll_fecha_incripcion">Registration date</label>
                            <input type="date" class="form-control" id="Enroll_fecha_incripcion" name="Enroll_fecha_incripcion" required value="<?php echo $profesor[0]['Enroll_fecha_incripcion'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Enroll_fecha_expir_program">Expiration date of the program</label>
                            <input type="date" class="form-control" id="Enroll_fecha_expir_program" name="Enroll_fecha_expir_program" required value="<?php echo $profesor[0]['Enroll_fecha_expir_program'] ?>">
                        </div>
                       

                       

                       

                      


                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Record enrolled</button>
                        </div>
                    </div> 
               
                </form>

            </div>


        </div>
        
    </div>


<?php 
    $this->load->view('template/footer')
?>