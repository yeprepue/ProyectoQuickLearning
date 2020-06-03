<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $title; ?></title>
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/img/quick.png"/>
	 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animacion.css">
    <!--mensaje emergente-->
    <link href="<?php echo base_url()?>dist/css/notify.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>dist/css/themes/flat.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url()?>dist/js/notify.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/js/plugins/jquery.growl/css/jquery.growl.css">

    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>


<body>

	<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
