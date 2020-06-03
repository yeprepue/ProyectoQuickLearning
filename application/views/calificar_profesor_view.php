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

                <div class="table-responsive shadow p-3 mb-5  rounded">

                  <h1 class="text-center">Profesores a Calificar</h1>

                <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                  <thead class="thead-dark">
                    <tr>
                      <th>Techpal</th>
                      <th >Sede</th>
                      <th>Selecionar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($profesores as  $value) { 

                        $idProfesor_Sede = $value['firstname']."||".$value['sede'];

                    ?>
                        
                        <tr>
                            <td><?php echo $value['firstname']?></td>
                            <td><?php echo $value['sede']?></td>
                           
                            <td>
                                <input type="radio" name="idProfesor_Sede" id="idProfesor_Sede" value="<?php echo $idProfesor_Sede; ?>">
                            </td>
              
                        </tr>
                    
                    <?php } ?>
                  </tbody>
                </table>
                </div>

                <form class="table-responsive shadow p-3 mb-5  rounded" id="formCalificarProfesor" name="formCalificarProfesor">
                    <input type="hidden" name="calificadoPor" id="calificadoPor" value="<?php echo $session['nombre']; ?>">
                    
                    <div class="form-row">
                        <!--<div class="form-group col-md-6">
                            <label for="calificacion">Calificar</label>
                                <select id="calificacion" name="calificacion" class="form-control" required>
                                    <option value="Punctuality">Punctuality</option>
                                    <option value="Uniform">Uniform</option>
                                    <option value="Neatness">Neatness</option>
                                    <option value="Methodology">Methodology</option>
                                    <option value="Instructions">Instructions</option>
                                    <option value="Enthusiam">Enthusiam</option>
                                </select>
                        </div>-->
                        <!--<div class="form-group col-md-6">
                            <label for="calificacion">observaciones</label>
                                <textarea class="form-control" name="observaciones" id="observaciones"></textarea>
                        </div>-->

                    </div>    
                    
                    <div class="mt-2 form-group row text-center">
                        <label for="punctuality" class="col-sm-6 col-form-label">Punctuality</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="punctuality" name="punctuality" value="0" maxlength="1">
                        </div>
                    </div> 
                    <div class="mt-2 form-group row text-center">
                        <label for="uniform" class="col-sm-6 col-form-label">Uniform</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="uniform" name="uniform" value="0" maxlength="1">
                        </div>
                    </div> 

                    <div class="mt-2 form-group row text-center">
                        <label for="neatness" class="col-sm-6 col-form-label">Neatness</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="neatness" name="neatness" value="0"  maxlength="1">
                        </div>
                    </div>

                    <div class="mt-2 form-group row text-center">
                        <label for="methodology" class="col-sm-6 col-form-label">Methodology</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="methodology" name="methodology" value="0"  maxlength="1">
                        </div>
                    </div> 

                    <div class="mt-2 form-group row text-center">
                        <label for="instructions" class="col-sm-6 col-form-label">Instructions</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="instructions" name="instructions" value="0"  maxlength="1">
                        </div>
                    </div>
                    <div class="mt-2 form-group row text-center">
                        <label for="enthusiam" class="col-sm-6 col-form-label">Enthusiam</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="enthusiam" name="enthusiam" value="0"  maxlength="1">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="calificacion">observations</label>
                        <textarea class="form-control" name="observaciones" id="observaciones"></textarea>
                    </div>

                    <div class="col-md-12  text-center">
                        <button type="button" class="btn btn-primary" id="btnCalificarProfesor">Save</button>
                    </div>

                  


                </form>
              
            </div>
        </div>
        
    </div>


<?php 
	$this->load->view('template/footer')
?>