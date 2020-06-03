<?php 
    $this->load->view('template/header');
    $this->load->view('template/menu');
    $session = $this->session->all_userdata();
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <?php 
                //separo la hora de la fecha ya que viene un date time de la consutla

                $array = explode(" ", $horario[0]['start']);
            ?>


            <div class="col-lg-10">
                <h1 class="text-center mt-3">Load Schedules</h1>
                <form id="formActualizarHorario" class="shadow p-3 mb-5  rounded">

                    <input type="hidden" name="id_horarios2" value="<?php echo $horario[0]['id_horarios2']; ?>">
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
                            
                            <option value="<?php echo $horario[0]['sede'] ?>"><?php echo $horario[0]['sede'] ?></option>
                            <option value="medellin">Medellin</option>
                            <option value="rionegro">Rionegro</option>
                        </select>

                    <?php } ?>           
                                
                            </div>
                        <div class="col-md-6">
                            <label for="titulo">Teachpal</label>
                            <select class="form-control" name="profesor" id="profesor" required>

                                <option value="<?php echo $horario[0]['title']; ?>"><?php echo $horario[0]['title']; ?></option>
                                <?php foreach ($profesores as  $value) { ?>

                                    <option value="<?php echo $value['firstname'];  ?>"><?php echo $value['firstname'];  ?></option>
                                   
                              <?php  } ?>
                            </select>
                        </div>
                        

                        <div class="form-group col-md-4">
                          <label for="fechaClase">Fecha</label>
                          <input type="date" class="form-control" id="fechaClase" name="fechaClase" required placeholder="Fecha de la clase" value="<?php echo $array[0]; ?>">
                        </div>

                        
                        <div class="col-md-4">
                            <label for="hora_clase"><span class="text-white">Time</span></label>
                            <div class="input-group clockpicker " data-autoclose="true">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                <input type="text" class="form-control" value="<?php echo $array[1]; ?>"  name="hora_clase" id="hora_clase" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="fechaClase">Color</label>
                          <input type="color" class="form-control" id="colorFondo" name="colorFondo" required placeholder="Color del evento" value="<?php echo $horario[0]['color']; ?>">
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="description">Ingrese la description</label>
                            <textarea class="form-control" name="description" id="description" required>
                               <?php echo $horario[0]['description']; ?>
                            </textarea>
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