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
                <h1 class="text-center mt-3">Load Schedules</h1>
                <form id="formHorario" class="shadow p-3 mb-5  rounded">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="headquarters">Headquarters</label>

                    <?php if($session['sede'] == 'rionegro'){?>
                        <select id="headquarters" name="headquarters" class="form-control" required>
                            <option value="rionegro">Rionegro</option>
                        </select> 
                    
                    <?php }elseif( $session['sede'] == 'medellin' ){?>
                        <select id="headquarters" name="headquarters" class="form-control" required>
                            <option value="medellin">Medellin</option>
                        </select> 

                    <?php }else{?>

                        <select id="headquarters" name="headquarters" class="form-control" required>
                            <option value="medellin">Medellin</option>
                            <option value="rionegro">Rionegro</option>
                        </select>

                    <?php } ?>           
                                
                            </div>
                        <div class="col-md-6">
                            <label for="titulo">Teachpal</label>
                            <select class="form-control" name="profesor" id="profesor" required>
                                <?php foreach ($profesores as  $value) { ?>

                                    <option value="<?php echo $value['firstname'];  ?>"><?php echo $value['firstname'];  ?></option>
                                   
                              <?php  } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="nameClass">Name class</label>
                          
                          <select name="nameClass" id="nameClass" class="form-control" required="" onchange="mostrarRngos(this.value)">
                              <option value="">Select</option>
                              <option value="Interactive station">Interactive station (Clases)</option>
                              <option value="Club">Club (Clubes)</option>
                              <option value="Explore station">Explore station (Laboratorio)</option>
                              <option value="Test">Test</option>
                              <option value="Speech">Speech</option>
                          </select>

                        </div>

                        <div class="form-group col-md-1">
                            <label for="libro">libro</label>
                            <select name="libro" id="libro" class="form-control" required="" >
                             <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option>  
                          </select>

                        </div>

                        <div style="display: none" class="form-group col-md-1" id="contenedorRango">
                            <label for="rango">Ragon</label>
                            <select name="rango" id="rango" class="form-control" required="" onchange="mostarLecciones(this.value)" >
                                <option value=""></option>
                             <option value="1">1-15</option>
                             <option value="2">16-30</option>
                             <option value="3">31-50</option>  
                          </select>

                        </div>

                        <!--rango 1 leeciones-->

                        <div style="display: none" id="rango1_leecion1" class="form-group col-md-2">
                            <label for="ran1_leccion1">Leccion 1</label>
                            <select name="ran1_leccion1" id="ran1_leccion1" class="form-control"  >
                             <?php for ($i=0; $i <= 15; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                              
                          </select>

                        </div>

                        <div style="display: none" id="rango1_leecion2" class="form-group col-md-2">
                            <label for="ran1_leccion2">Leccion 2</label>
                            <select name="ran1_leccion2" id="ran1_leccion1" class="form-control"  >
                             <?php for ($i=0; $i <= 15; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                               
                          </select>

                        </div>

                        <div style="display: none" id="rango1_leecion3" class="form-group col-md-2">
                            <label for="ran1_leccion3">Leccion 3</label>
                            <select name="ran1_leccion3" id="ran1_leccion1" class="form-control" required="" >
                             <?php for ($i=0; $i <= 15; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                             
                          </select>

                        </div>

                        <!--end rango 1 lecciones-->
                        
                        <!--rango 2 leeciones-->

                        <div style="display: none" id="rango2_leecion1" class="form-group col-md-2">
                            <label for="ran2_leccion1">Leccion 1</label>
                            <select name="ran2_leccion1" id="ran2_leccion1" class="form-control"  >
                                <option value="0">0</option>
                             <?php for ($i=16; $i <= 30; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                              
                          </select>

                        </div>

                        <div style="display: none" id="rango2_leecion2" class="form-group col-md-2">
                            <label for="ran2_leccion2">Leccion 2</label>
                            <select name="ran2_leccion2" id="ran2_leccion2" class="form-control"  >
                                <option value="0">0</option>
                             <?php for ($i=16; $i <= 30; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                               
                          </select>

                        </div>

                        <div style="display: none" id="rango2_leecion3" class="form-group col-md-2">
                            <label for="ran2_leccion3">Leccion 3</label>
                            <select name="ran2_leccion3" id="ran2_leccion3" class="form-control" required="" >
                                <option value="0">0</option>
                             <?php for ($i=16; $i <= 30; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                             
                          </select>

                        </div>

                        <!--end rango 2 lecciones-->

                        <!--rango 3 leeciones-->

                        <div style="display: none" id="rango3_leecion1" class="form-group col-md-2">
                            <label for="ran3_leccion1">Leccion 1</label>
                            <select name="ran3_leccion1" id="ran3_leccion1" class="form-control"  >
                                <option value="0">0</option>
                             <?php for ($i=31; $i <= 50; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                              
                          </select>

                        </div>

                        <div style="display: none" id="rango3_leecion2" class="form-group col-md-2">
                            <label for="ran3_leccion2">Leccion 2</label>
                            <select name="ran3_leccion2" id="ran3_leccion2" class="form-control"  >
                                <option value="0">0</option>
                             <?php for ($i=31; $i <= 50; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                               
                          </select>

                        </div>

                        <div style="display: none" id="rango3_leecion3" class="form-group col-md-2">
                            <label for="ran3_leccion3">Leccion 3</label>
                            <select name="ran3_leccion3" id="ran3_leccion3" class="form-control" required="" >
                                <option value="0">0</option>
                             <?php for ($i=31; $i <= 50; $i++) { ?> 
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                             
                          </select>

                        </div>

                        <!--end rango 3 lecciones-->

                        <div  class="form-group col-md-7">
                          <label for="fechaClase">Fecha</label>
                          <input type="date" class="form-control" id="fechaClase" name="fechaClase" required placeholder="Fecha de la clase">
                        </div>

                        
                        <div class="col-md-3">
                            <label for="hora_clase"><span class="text-white">Time</span></label>
                            <div class="input-group clockpicker " data-autoclose="true">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                <input type="text" class="form-control" value="07:00"  name="hora_clase" id="hora_clase" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="fechaClase">Color</label>
                          <input type="color" class="form-control" id="colorFondo" name="colorFondo" required placeholder="Color del evento">
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="description">Ingrese la description</label>
                            <textarea class="form-control" name="description" id="description" required></textarea>
                        </div>
   

                        <div class="col-md-12 text-center pt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                    
                </form>

                <div class="calendario">
                    
                </div>

            </div>

        </div>
        
    </div>


<?php 
	$this->load->view('template/footer')
?>