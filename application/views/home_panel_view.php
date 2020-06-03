<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
?>

            



                
                   <p style="font-size: 60px; padding-left: 20px; color:black">Welcome <?php echo $first.' '.$last?></p>
                
                     <!--columna central-->
                     <div class="col-sm-12 col-xm-12 col-md-12">
                    <div class="row">
                        <div class="col-md-12 col-lg-10" style="margin-right: 0px ;" >
                        <p style="padding-left: 30px; font-size: 30px; color:black" >Lessons and review sessions selected for you</p>
                            <!-----Leccion 1-->
                            <a href="#">
                                <div class="row lesson my-5 mx-5 margin1">
                                
                                    <div class="col-md-2" >
                                        <img src="<?php echo base_url()?>assetsPanel/imagenes/flama.png" class="img_lesson" >
                                    </div>
                                    <!--Nombre de la leccion-->
                                <div class="col-md-3" style="padding-left: 0px;">
                                    
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <!--barra de progreso-->
                                    <div class="col-md-5 my-3" width="50%">
                                        <div class="progreso">
                                            <div class="circulo bg-primary">
                                                <label>10%</label>
                                            </div>
                                            <div class="progress my-4">
                                                <div class="progress-bar" role="progressbar" style="width: 10%;"
                                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-----Leccion 2-->
                            <a href="#">
                                <div class="row lesson my-5 mx-5">
                                    <div class="col-md-2">
                                        <img src="<?php echo base_url()?>assetsPanel/imagenes/flama1.png" class="img_lesson" width="50" height="50">
                                    </div>
                                    <!--Nombre de la leccion-->
                                    <div class="col-md-3">
                                    
                                    </div>

                                    <div class="col-md-2">

                                    </div>
                                    <!--Barra de progreso-->
                                    <div class="col-md-5 my-3">
                                        <div class="progreso">
                                            <div class="circulo bg-primary">
                                                <label>25%</label>
                                            </div>
                                            <div class="progress my-4">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-----Leccion 3-->
                            <a href="#">
                            <div class="row lesson my-5 mx-5" style="margin-left: 0px;">
                                <div class="col-md-2">
                                    <img src="<?php echo base_url()?>assetsPanel/imagenes/flama2.png" class="img_lesson" width="50" height="50">
                                </div>
                                <!--Nombre de la leccion-->
                                <div class="col-md-3">
                                    
                                </div>
                                <div class="col-md-2">

                                </div>
                                <!-----Barra de progreso-->
                                <div class="col-md-5 my-3">
                                    <div class="progreso">
                                        <div class="circulo bg-primary">
                                            <label>41%</label>
                                        </div>
                                        <div class="progress my-4">
                                            <div class="progress-bar" role="progressbar" style="width: 41%;"
                                                aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
    
       

<?php 
	$this->load->view('template/footer')
?>
