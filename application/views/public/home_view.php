<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<title>Quick learning- Home</title>
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/img/quick.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="">
    <meta name="description" content="">

    <link href="http://fonts.googleapis.com/css?family=Kotta+One|Cantarell:400,700" rel="stylesheet" type="text/css">
    

    <!-- Not required: presentational-only.css only contains CSS for prettifying the demo -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/presentational-only/presentational-only.css">

    <!-- responsive-full-background-image.css stylesheet contains the code you want -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive-full-background-image.css">

    <!-- Not required: jquery.min.js and presentational-only.js is only used to demonstrate scrolling behavior of the viewport  -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <!--<script src="presentational-only/presentational-only.js"></script>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style2.css">
</head>

<body class="body">
    
    <?php 
        $this->load->view('templatePublic/menu'); 
        $this->load->view('templatePublic/footer'); 
    ?>

   