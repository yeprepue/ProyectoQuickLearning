<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
	<title><?php echo $title;?></title>
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/img/quick.png"/> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animacion.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/nubes.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/js/plugins/jquery.growl/css/jquery.growl.css">

    <style type="text/css">
        .error {
            color: red;
        }
    </style>
    
    <meta name="theme-color" content="#000f9f" />
</head>

<style>
     ::placeholder {
        color: #01B2E3;
        font-weight: bold;
    }
</style>

<body>
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
    <!-- nav -->
    <div class="frame">
        <div class="plane-container">


        </div>
    </div>
    <div class="clouds">

        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px" height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud distant smaller">
            <path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
            c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
            C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
            S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z"/>
            </svg>

        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px" height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud small slow">
            <path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
            c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
            C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
            S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z"/>
            </svg>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px" height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud slower">
            <path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
            c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
            C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
            S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z"/>
            </svg>
    </div>

       <?php 
            $this->load->view('templatePublic/menu'); 
        ?>
        <!-- fin nav -->

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-5 fromhead ">
                    <div class="row box1">
                        <div class="col-xs-12 col-sm-12 col-lg-12 ">
                            <div class="imgContact"></div>
                        </div>
                    </div>
                </div>

                <!--<form method="POST " action="enviar_email.php ">-->
                <div class="col-xs-12 col-sm-12 col-lg-7 text-center frombody " id="formContact">
                    <div class="container">
                        <div class="contact-form">
                            <h2 class="m-5 text-center " style="font-weight: bold; color:white ">Contact Us</h2>
                            <form id="formContacto" style="margin-left:18%;">

                                <div class="row">

                                    <div class="form-group col-xs-12 col-sm-12 col-lg-12 ">
                                        <input type="text " class="form-control form-control-sm " placeholder="Name " name="name" id="name" required>
                                        
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-12 col-lg-12 ">
                                        <input type="email " class="form-control form-control-sm " placeholder="Email " name="email" id="email" required>
                                    </div>

                                    <div class=" form-group col-xs-12 col-sm-12 col-lg-6 ">
                                        <input type="number" class="form-control form-control-sm " placeholder="Phone " name="phone" id="phone" required>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-12 col-lg-6 ">
                                        <input type="text " class="form-control form-control-sm " placeholder="Headquarters " name="headquarters" id="headquarters" required>
                                    </div>

                                    <div class="form-group col-xs-12 col-sm-12 col-lg-12 ">
                                       <select class="form-control form-control-sm " name="pqr" id="pqr">
                                           <option>PQR</option>
                                           <option>Question</option>
                                           <option>Complaints</option>
                                           <option>Claims</option>

                                       </select>
                                    </div>


                                    <div class="form-group col-xs-12 col-sm-12 col-lg-12">
                                        <textarea required class="form-control " style="height: 150px;" placeholder="Message" name="message" id="message" rows="5 "></textarea>
                                    </div>

                                    <div class="form-group  col-sm-12 col-lg-12">
                                        <button type="submit " class="form-control btn-primary">Send</button>
                                    </div>
                                
                                </div>
                                <!--<div class="row envelope">
                                    <img class="pho" src="img/photo1.png" />
                                    <span class="tiangleL"></span>
                                    <span class="tiangleR"></span>
                                </div>-->

                            </form>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>

<?php 
    $this->load->view("templatePublic/footer");
?>
