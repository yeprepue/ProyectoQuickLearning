<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

        <div class="row">
            <!-----Columna izquierda-->
            <div class="col-sm-12 col-md-12 col-lg-2 izquierda" style="padding-right: 0px;">
                <div class="courses">
                    <ul class="navbar-nav mr-auto">
                        <!-----Cursos-->
                        <li class="nav-item active1 py-2">

                            <div class="d-inline mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline text-white">Cursos</div>

                        </li>
                        <!-----Texto2-->
                        <li class="nav-item py-2">
                            <div class="d-inline mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline text-white">Texto 2</div>
                        </li>
                        <!-----Texto3-->
                        <li class="nav-item py-2">
                            <div class="d-inline  mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline  text-white">Texto 3</div>
                        </li>
                        <!-----Texto4-->
                        <li class="nav-item py-2">
                            <div class="d-inline mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline text-white">Texto 4</div>
                        </li>
                        <!-----Texto5-->
                        <li class="nav-item py-2">
                            <div class="d-inline mx-4 my-2">
                                <img src="<?php echo base_url()?>assetsPanel/imagenes/user.png" width="25" height="25" class="imagen_user">
                            </div>
                            <div class="d-inline text-white">Texto 5</div>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-10">

                <?php  //$actividad = 1; ?>

                <h1 class="text-center"><?php if ($examen){ echo $examen[0]['titulo'];} ?> </h1>

                <div style="display: flex; padding-top: 20px;">
                <?php if(isset($examen[0]['video']) && !empty($examen[0]['video']) ){ ?>

                    <div class="embed-responsive embed-responsive-16by9"  style="width: 100%; padding: 10px; margin: 10px">
                      <!--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>-->
                      <?php echo $examen[0]['video']; ?>
                    </div>
               <?php } ?>


               <h4 class="text-center"  style="display: flex; align-items: center; width: 100%; justify-content: center; "><?php if ($examen){$examen[0]['descripcion'];} ?> </h4>     

            
               </div>
                <!-- Swiper -->
                           
                <div class="swiper-container">
					<div class="swiper-wrapper">
						<?php

                            $form = 1;

                         foreach ($examen as $value) { ?>
    	    	
								<div class="swiper-slide">
								    
                                    <h3><?php echo $value['pregunta']?></h3>
                                      	
								</div>

						<?php 
							
                            $form++;	

							} ?>
								      
					</div>
								    <!-- Add Pagination -->
					<div class="swiper-pagination"></div>
								    <!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div> 

				<div class="d-flex justify-content-center">
	               <form  id="formRespuesta">
                    <input type="hidden" name="id_titulo" id="id_titulo" value="<?php if ($examen){ echo $examen[0]['id_titulo'];}?>">

                       <div class="form-group">
                            <label>Enter the answer</label>
                            <input type="text" name="respuesta" id="respuesta" class="form-control">
                        </div>

                    </form>    
					
				</div>	
				<div class="d-flex justify-content-center">
					<button type="button" class="btn btn-secondary">Skip</button>
					<button type="button" class="btn btn-success" onclick="validarRespuesta()">Qualify</button>
				</div>

        	</div>
         
<?php 
	$this->load->view('template/footer');
?>
