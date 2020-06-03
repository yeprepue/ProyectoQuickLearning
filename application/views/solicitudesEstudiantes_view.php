<?php 
  $this->load->view('template/header');
  $this->load->view('template/menu');
 
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>


            <div class="col-lg-10">
              <h1 class="text-center">Make Request</h1>
             
                <form class="shadow p-3 mb-5  rounded" id="formSolitudes" >
                  <input type="hidden" name="id_estudiante" id="id_estudiante" value="<?php echo $session['id_usuario']; ?>">

                  <input type="hidden" name="estudiante" id="estudiante" value="<?php echo $estudiante[0]['firstname']; ?>">
                  <div class="form-row">

                  <div class="col-md-6 form-group">
                    <label for="solicitud">type of request</label>
                    <select class="form-control" name="solicitud" id="solicitud" onchange="mostrarCampoFecha(this.value);">
                      <option value=""></option>  
                      <option value="1">Student Certificate</option>
                      <option value="2">Frozen process letter</option>
                      <option value="3">Layoff letter</option>
                      <option value="4">Enrollment certificate</option>
                      <option value="5">Update payment certificate</option>

                    </select>
                  </div>

                  <div class="col-md-6 form-group" id="fecha" style="display: none;">
                    <label for="fechaInactividad">Suspension date</label>
                    <input type="date" name="fechaInactividad" id="fechaInactividad" class="form-control">
                  </div>
                  
                    <div id="censantiasCampos" class="col-md-3 form-group" style="display: none;">
                      <label for="precio">      
                        I ride a retired
                      </label>
                      <input type="number" class="form-control" name="precio" id="precio">
                    </div>
                    <div id="censantiasCampos2" class="col-md-3 form-group" style="display: none;">
                      <label for="fondo">      
                        Background
                      </label>
                      <input type="text" class="form-control" name="fondo" id="fondo">
                    </div>
                  

                  <div class="col-md-8 form-group">
                    <label for="descripcion">Description</label>
                      <textarea class="form-control" class="" name="descripcion" id="descripcion" required></textarea>
                  </div>

                  <div class="col-md-12 text-center pt-5">
                        <button type="submit" class="btn btn-success">Apply for</button>
                        <button type="button" class="btn btn-primary" onclick="verSolicitud('<?php echo $estudiante[0]["firstname"]; ?>')">My Requests</button>
                  </div>

                </div>
                  
                </form>

                <div class="solicitudes pt-5 shadow p-3 mb-5  rounded">
                  
                </div>
            
            </div>

         
<?php 
  $this->load->view('template/footer');
?>