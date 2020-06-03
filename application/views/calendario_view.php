<?php 
  $this->load->view('template/header');
  $this->load->view('template/menu');
    $session = $this->session->all_userdata();
?>
  

  <div class="main" style="width: 100%;">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

       


            <div class="col-lg-10">

                <h1 class="text-center my-3">Class calendar</h1>

                <div class="row">

                  <div class="col"></div>
                  <div class="col-10">
                    <div class="shadow p-3 mb-5  rounded" id='calendar'></div>
                  </div>
                  <div class="col"></div>
                </div>
            </div>

        </div>
        
    </div>



 <!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Name class : <span id="titulo"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div id="description"></div>
        <div id="lecciones"></div>


        <form id="formMatricular">
          <input type="hidden" name="fechaClass" id="fechaClass">
          <input type="hidden" name="profesor" id="profesor">

          <input type="hidden" name="nameClass" id="nameClass">

          <input type="hidden" name="estudiante" id="estudiante" value="<?php echo $session['nombre']; ?>">
        </form>



        <form id="formAgregarLeccion" style="display: none">
          <div class="form-row">

            <input type="hidden" name="rangoLibros" id="rangoLibros">

            <input type="hidden" name="id_horarios2" id="id_horarios2">

            <div style="display: none" id="rangoCalendario1" class="form-group col-md-2">
              <label for="ranCalendario1_leccion">Leccion </label>
                <select name="ranCalendario1_leccion" id="ranCalendario1_leccion" class="form-control"  >
                  <?php for ($i=0; $i <= 15; $i++) { ?> 
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php } ?>
                      
                </select>

            </div>

            <div style="display: none" id="rangoCalendario2" class="form-group col-md-2">
              <label for="ranCalendario2_leccion">Leccion </label>
                <select name="ranCalendario2_leccion" id="ranCalendario2_leccion" class="form-control"  >
                  <?php for ($i=16; $i <= 30; $i++) { ?> 
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php } ?>
                      
                </select>

            </div>

             <div style="display: none" id="rangoCalendario3" class="form-group col-md-2">
              <label for="ranCalendario3_leccion">Leccion </label>
                <select name="ranCalendario3_leccion" id="ranCalendario3_leccion" class="form-control"  >
                  <?php for ($i=31; $i <= 50; $i++) { ?> 
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php } ?>
                      
                </select>

            </div>


            <div class="col-md-12">
              <button type="button" id="btnGuardarLeccion" class="btn btn-primary">
              Guardar Leccion</button>
            </div>

          </div>  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <?php if ($session['rol'] == "estudiante") { ?>

        <button type="button" id="btnAgregarLeccion" class="btn btn-primary">
        Agregar Leccion</button>
          
        <button type="button" id="btnMatricular" class="btn btn-success">
        enroll</button>
        

      <?php } ?>
      </div>
    </div>
  </div>
</div>   




<?php 
  $this->load->view('template/footer');
?>
