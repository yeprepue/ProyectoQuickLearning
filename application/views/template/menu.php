<?php
$session = $this->session->all_userdata();
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>FrontendFunn -</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assetsPanel/menu/css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top">
    <button class="navbar-toggler sideMenuToggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="#"> Quick learning</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <svg class="bi bi-gear" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10.837 3.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 016.377 5.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 01-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 011.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 012.692 1.115l.094.319c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 012.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 011.115-2.693l.319-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 01-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159a1.873 1.873 0 01-2.693-1.115l-.094-.319zm-2.633-.283c.527-1.79 3.064-1.79 3.592 0l.094.319a.873.873 0 001.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 00.52 1.255l.319.094c1.79.527 1.79 3.064 0 3.592l-.319.094a.873.873 0 00-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 00-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 00-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 00-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 00.52-1.255l-.16-.292c-.892-1.64.901-3.433 2.541-2.54l.292.159a.873.873 0 001.255-.52l.094-.319z" clip-rule="evenodd"></path>
        <path fill-rule="evenodd" d="M10 7.754a2.246 2.246 0 100 4.492 2.246 2.246 0 000-4.492zM6.754 10a3.246 3.246 0 116.492 0 3.246 3.246 0 01-6.492 0z" clip-rule="evenodd"></path>
      </svg></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


            <span class="text">Account <?php echo $this->session->name; ?></span>

          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url() ?>CerrarSesion">Log Out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="wrapper d-flex">
    <div class="sideMenu bg-mattBlackLight">
      <div class="sidebar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo base_url() ?>Panel" class="nav-link px-2">
              <i class="material-icons icon">
                home
              </i>
              <span class="text">Home</span>
            </a>
          </li>


          <!-----ESTUDIANTES-->
          <?php if ($this->session->rol == "estudiante") { ?>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>my-profile" class="nav-link px-2">
                <i class="material-icons icon">
                  perm_identity
                </i>
                <span class="text">My Profile</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                <img src="<?php echo base_url() ?>assetsPanel/imagenes/estudiantes.png" width="35" height="35" class="imagen_user">
                <span class="text">Students</span>
              </a>
              <div class="dropdown-menu">

                <a class="nav-link" href="<?php echo base_url() ?>Panel/mostrarExamenes">Curso 1</a>
                <a class="nav-link" href="<?php echo base_url() ?>Profile-Teachpal">
                  <a class="nav-link" href="<?php echo base_url() ?>Historial-Estudiantes">Mis Notas</a>
                  <a class="nav-link" href="<?php echo base_url() ?>Register-referred">Register Referral</a>
                  <a class="nav-link" href="<?php echo base_url() ?>Teachpal-Calificados">
                    Porfesores Calificados</a>

              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                <img src="<?php echo base_url() ?>assetsPanel/imagenes/calendario.png" width="35" height="35" class="imagen_user">
                <span class="text">Schedule</span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url() ?>Schedule">Class</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Calendar">Calendar</a>
              </div>
            </li>



            <div class="dropdown-divider"></div>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>mostrarExamenes" class="nav-link px-2">
                <i class="material-icons icon">
                  assignment
                </i>
                <span class="text">Course</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>Requests" class="nav-link px-2">
                <img src="<?php echo base_url() ?>assetsPanel/imagenes/peticiones.png" width="35" height="35" class="imagen_user">
                <span class="text">Requests</span>
              </a>
            </li>


          <?php } ?>
          <!-----PROFESORES-->
          <?php if ($this->session->rol == "profesor") { ?>
            <div class="dropdown-divider"></div>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                <img src="<?php echo base_url() ?>assetsPanel/imagenes/perfilteachpal.png" width="35" height="35" class="imagen_user">
                <span class="text">Teachpal</span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url() ?>Profile-Teachpal">
                  <i class="material-icons icon">account_box</i>
                  Profile</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Enrolled">
                  <i class="material-icons icon">done_all</i>
                  Enrolled</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Calender-Teachpal">
                  <i class="material-icons icon">perm_contact_calendar</i>
                  Calender</a>
              </div>
            </li>

          <?php } ?>
          <!-----SECRETARIA-->
          <?php if ($this->session->rol == "secretaria") { ?>
            <div class="dropdown-divider"></div>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                <img src="<?php echo base_url() ?>assetsPanel/imagenes/calendario.png" width="35" height="35" class="imagen_user">
                <span class="text">Schedules</span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url() ?>Schedule">
                  <i class="material-icons icon">perm_contact_calendar</i>
                  Load</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Panel/mostrarHorarios">
                  <i class="material-icons icon">date_range</i>
                  class</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Teachpal-Calificados">
                  <i class="material-icons icon">done_all</i>
                  Classifieds</a>
              </div>
            </li>

          <?php } ?>
          <!-----ADMIN-->
          <?php if ($session['rol'] == "admin" || $session['rol'] == "superAdmin" || $session['rol'] == "monitor") { ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                <i class="material-icons icon">
                  list
                </i>
                <span class="text">List</span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url() ?>listado-profesores"><i class="material-icons icon">
                    supervisor_account
                  </i>Teachers </a>
                <a class="dropdown-item" href="<?php echo base_url() ?>listado-estudiantes"><i class="material-icons icon">
                    perm_identity
                  </i>Students </a>
              </div>
            </li>


            <div class="dropdown-divider"></div>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                <i class="material-icons icon">
                  settings
                </i>
                <span class="text">Admin</span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url() ?>Register-teacher">Registry Teachpal </a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Panel/mostrarHorarios">List schedule </a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Examns">Examns</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Schedule">Load Schedules</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Requests-registered">Requests</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Profile-Teachpal">Teachpal Profile</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>Teachpal-Calificados">Porfesores Calificados</a>
              </div>
            </li>

          <?php } ?>


          <?php if ($session['rol'] == "admin" || $session['rol'] == "estudiante") { ?>

            <li class="nav-item">
              <a href="<?php echo base_url() ?>Calificar-Teachpal" class="nav-link px-2">
                <i class="material-icons icon">
                  trending_up
                </i>
                <span class="text">Qualify Teachpal</span>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?php echo base_url() ?>Calendar" class="nav-link px-2">
                <i class="material-icons icon">
                  today
                </i>
                <span class="text">Class Calendar</span>
              </a>
            </li>
          <?php } ?>

          <?php if ($session['rol'] == "superAdmin" || $session['rol'] == "admin") { ?>

            <li class="nav-item">
              <a href="<?php echo base_url() ?>Search-referred" class="nav-link px-2">
                <i class="material-icons icon">
                  trending_up
                </i>
                <span class="text">Search Referrals</span>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?php echo base_url() ?>Reports" class="nav-link px-2">
                <i class="material-icons icon">
                  picture_as_pdf
                </i>
                <span class="text">Reports</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url() ?>Story" class="nav-link px-2">
                <i class="material-icons icon">
                  picture_as_pdf
                </i>
                <span class="text">Stories</span>
              </a>
            </li>
          <?php } ?>



        </ul>
      </div>

    </div>
    <div class="content">