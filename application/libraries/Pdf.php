<?php 

// Require composer autoload
require_once 'vendor/autoload.php';

/**
 * clase para generar el pedf de las reservas
 */
class Pdf {

	public function generarPdfIngles($dataEstudiante){

    $names = ucwords($dataEstudiante[0]['firstname']);
    $apellidos = ucwords($dataEstudiante[0]['lastname']);

    $nameApellidos = $names . " " . $apellidos;

    $fechaGenerate = date('jD F \of  Y ');


		$html = '

			<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <style type="text/css">
      .contenedor {
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto;
      }

      .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
          margin-bottom: .5rem;
          font-weight: 500;
          line-height: 1.2;
      }

      h1, h2, h3, h4, h5, h6 {
          margin-top: 0;
          margin-bottom: .5rem;
      }


      .text-center {
          text-align: center!important;
      }
      /*textos y etiquetas p*/
      .text-justify {
          text-align: justify!important;
      }
      p {
          margin-top: 0;
      }

      .text-break {
          word-break: break-word!important;
          overflow-wrap: break-word!important;
      }
      /**/

      .pb-3, .py-3 {
          padding-bottom: 1rem!important;
      }
      .pt-5, .py-5 {
          padding-top: 3rem!important;
      }

      .lista{
        list-style: none;
        padding-left: 10%;
      }
      .parrafo{
      	padding-left: 10%
      }
      body {
        margin: 0;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
      }
      .h3, h3 {
          font-size: 1.75rem;
      }
    </style>

  </head>
  <body>

  <div id="imagen" style="position: relative; ">

      <img width="100%" height="100%" src="'.base_url().'assetsPanel/imagenes/fondo.jpg">
    </div>
  

    <div class="contenedor pt-5" style="position: absolute;  top: 200px; z-index: 2;">
      <p class="pb-3" style="padding-left: 30px;">Medellín, '. $fechaGenerate  .'</p>
      <h3 class="text-center pb-3">QUICK LEARNING S.A.S</h3>
      <p class="text-center pb-3" style="font-size: 16px;">
        Operating Resolution No. 2019500575 of the Secretary of Education of Medellin<br>
        and Resolution of Programs No. 201950061739 of the Secretary of Education of<br>
        Medellin
      </p>

      <h3 class="text-center pb-3">Hace Constar:</h3>
      <p class="parrafo" >
        That Ms. <b> ' . $nameApellidos  .  ' identified</b> with the id number '. $dataEstudiante[0]['Document'] .' <b> '. $dataEstudiante[0]['idpassport'] .'</b><br>de Caldas (ANT), is studying at our institute with our <b>PRIVATEACHER ENGLISH PROGRAM</b><br>methodology and has taken a placement test, in which she achieved a score of <b>B2- English<br>student.</b>
      </p><br>
      <p class="parrafo" >
        Our program consists until this of <b>480 hours</b> of classes and workshops including Grammar,<br>Listening, Movie, Song, Internal and External Interchanges, Pronounciation, Fórum, Idioms,<br>outdoor and activities.
      </p><br>

      <p class="parrafo" style="font-size: 16px;">
        This certificate is isseud at the request of the interested party for the pursposes it<br> deems appropriate.
      </p>
      <p class="parrafo" style="font-size: 16px;">Sincerely,</p>

      <p class="parrafo">
        <img src="'.base_url().'assetsPanel/imagenes/firma.jpg" width="200px" height="80px">
      </p>
      <ul class="lista">
        <li><b>Jhoana Alexandra Giraldo</b></li>
        <li>Academic Coordinator</li>
        <li>QUIC LEANING S.A.S</li>

      </ul>

    </div>

  </body>
</html>


		';

			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
				'format' => [250, 236],
				'orientation' => 'L'
			]);


			$mpdf->WriteHTML($html);

			
			$mpdf->Output();
			
			
	}

	public function generarPdfEspanish(){
		$html = '

		<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <style type="text/css">
      .contenedor {
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto;
          /*background-image:url("'.base_url().'assetsPanel/imagenes/fondo.jpg");*/

      }

      .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
          margin-bottom: .5rem;
          font-weight: 500;
          line-height: 1.2;
      }

      h1, h2, h3, h4, h5, h6 {
          margin-top: 0;
          margin-bottom: .5rem;
      }


      .text-center {
          text-align: center!important;
      }
      /*textos y etiquetas p*/
      .text-justify {
          text-align: justify!important;
      }
      p {
          margin-top: 0;
      }

      .text-break {
          word-break: break-word!important;
          overflow-wrap: break-word!important;
      }
      /**/

      .pb-3, .py-3 {
          padding-bottom: 1rem!important;
      }
      .pt-5, .py-5 {
          padding-top: 3rem!important;
      }

      .lista{
        list-style: none;
        padding-left: 10%;
      }
      .parrafo{
        padding-left: 8%
      }
      body {
        margin: 0;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left; 
      }
      .h3, h3 {
          font-size: 1.75rem;
      }
    </style>

  </head>
  <body>

  
  <div id="imagen" style="position: relative; ">

      <img width="100%" height="100%" src="'.base_url().'assetsPanel/imagenes/fondo.jpg">
    </div>
  
  

    <div class=" pt-5"   style="position: absolute;  top: 200px; z-index: 2;">

      <p class="pb-3" style="padding-left: 30px;">Medellín, 31st of Octuber, 2019</p>
      <h3 class="text-center pb-3">QUICK LEARNING S.A.S</h3>
      <p class="text-center pb-3" style="font-size: 16px;">
        Resolución de funcionamiento No. 201950057588 de la Secretaria de Educación de Medellin y Resolución de Programas No 201950057588 de la Secretria de Educación de<br> Medellin
      </p>

      <h3 class="text-center pb-3">Hace Constar:</h3>
      <p class="" >
        Que la Señorita. <b>DANIELA BUSTAMANTE GOMEZ</b>identificada con <b>C.C 1.214.747.136</b> de Medellin (ANT), asistio a la institución los dias 15 y 16 del mes y año en curso para culminar sus deligencias académicas, de inglés con la metodologia <b>PRIVATEACHER ENGLISH PROGRAM</b>.
      </p><br>
      <p class="" >
        Dicho programa consta de <b>480 horas</b> de asesorias e incluye talleres de Grammar,Listening, Movie, Song, Internal and External Interchang es, Pronounciation, Fórum, Idioms, outdoor and activities. Por lo cual el estudiante anteriormente mencionado debera asistir a un mínimo de 18 horas semanales, el horario escogido por nuestro estudiante es de lunes a viernes de 4:00p.m a 8:00p.m
      </p><br>

      <p class="" style="font-size: 16px;">
        <b>Se expide la presente constancia a solicitud del interesado para los fines que estime conveniente</b>.
      </p>
      <p class="" style="font-size: 16px;">
        Atentamente,
      </p>

      
      <p class="parrafo">
        <img src="'.base_url().'assetsPanel/imagenes/firma.jpg" width="200px" height="80px">
      </p>
      <ul class="lista">
        <li><b>Jhoana Alexandra Giraldo</b></li>
        <li>Academic Coordinator</li>
        <li>QUIC LEANING S.A.S</li>

      </ul>

    </div>


  </body>
</html>

		';

			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
				'format' => [250, 236],
				'orientation' => 'L'
			]);


			$mpdf->WriteHTML($html);

			
			$mpdf->Output();
	}


  public function pdfImagen(){

    $html = "
        <img src='".base_url()."assetsPanel/imagenes/fondo.jpg'>
    ";

    $mpdf = new \Mpdf\Mpdf([
      'mode' => 'utf-8',
      'format' => [250, 236],
      'orientation' => 'L'
    ]);


    $mpdf->WriteHTML($html);

    $mpdf->Output();
 
  }

  public function pdfMatricula($dataEstudiante){

    $names = ucwords($dataEstudiante[0]['firstname']);
    $apellidos = ucwords($dataEstudiante[0]['lastname']);

    $nameApellidos = $names . " " . $apellidos;

      $fechaGenerate = date('jD F \of  Y ');

      $html = '

      <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <style type="text/css">
      .contenedor {
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto;
      }

      .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
          margin-bottom: .5rem;
          font-weight: 500;
          line-height: 1.2;
      }

      h1, h2, h3, h4, h5, h6 {
          margin-top: 0;
          margin-bottom: .5rem;
      }


      .text-center {
          text-align: center!important;
      }
      /*textos y etiquetas p*/
      .text-justify {
          text-align: justify!important;
      }
      p {
          margin-top: 0;
      }

      .text-break {
          word-break: break-word!important;
          overflow-wrap: break-word!important;
      }
      /**/

      .pb-3, .py-3 {
          padding-bottom: 1rem!important;
      }
      .pt-5, .py-5 {
          padding-top: 3rem!important;
      }

      .lista{
        list-style: none;
        padding-left: 8%;
      }
      .parrafo{
        padding-left: 8%
      }
      body {
        margin: 0;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
      }
      .h3, h3 {
          font-size: 1.75rem;
      }
    </style>

  </head>
  <body>

  <div id="imagen" style="position: relative; ">

      <img width="100%" height="100%" src="'.base_url().'assetsPanel/imagenes/fondo.jpg">
    </div>
  

    <div class=" pt-5" style="position: absolute;  top: 200px; z-index: 2;">
      <p class="pb-3" style="padding-left: 30px;">Medellín, '. $fechaGenerate  .'</p>
      <h3 class="text-center ">“APRENDIZAJE RÁPIDO/ QUICK LEARNING S.A.S”</h3>
      <p class="text-center pb-3">NIT: 900.497.178-1.</p>

      <p class="text-center pb-3" style="font-size: 14px;">
        <b>Con Resolución No.201950057588 de 2019 Licencia de Funcionamiento y Resolución No. 201950061739 de 2019 Licencia de Programas.
          Vigilado por la Secretaría de Educación de Medellín.</b>

      </p>

      <h3 class="text-center pb-3">Certifies:</h3>
      <p class="" >
        Que el señor <b> ' . $nameApellidos  .  ' identified</b> identificado con '. $dataEstudiante[0]['Document'] .' <b> '. $dataEstudiante[0]['idpassport'] .'</b> de Medellín (Ant), está matriculado con nosotros, el señor anteriormente mencionado inicia sus clases en febrero del año en curso con la metodología <b>PRIVATEACHER ENGLISH PROGRAM</b>. se matriculo el día 11 de diciembre del año 2019 y finaliza el 11 de diciembre del año 2020.
      </p><br>
      <p class="" >
        Una vez el alumno inicie su proceso académico asistirá como mínimo 3 horas a la semana, con derecho a talleres de Grammar, Listening, Movie, Song, Internal and External Interchanges, Pronunciation, Idioms, outdoor and indoor activities. 
      </p><br>

      <p class="" style="font-size: 16px;">
        <b>Se expide la presente constancia a solicitud del interesado dirigido a Cooperativa Jhon F. Kennedy </b>
      </p>
      <p class="" style="font-size: 16px;">Atentamente,</p>

      <p class="parrafo">
        <img src="'.base_url().'assetsPanel/imagenes/firma.jpg" width="200px" height="80px">
      </p>
      <ul class="lista">
        <li><b>Jhoana Alexandra Giraldo</b></li>
        <li>Academic Coordinator</li>
        <li>QUIC LEANING S.A.S</li>

      </ul>

    </div>

  </body>
</html>


    ';

      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => [250, 236],
        'orientation' => 'L'
      ]);


      $mpdf->WriteHTML($html);

      
      $mpdf->Output();
}

  public function cesantias($dataEstudiante,$solicitud){

    $names = ucwords($dataEstudiante[0]['firstname']);
    $apellidos = ucwords($dataEstudiante[0]['lastname']);

    $nameApellidos = $names . " " . $apellidos;

    $fechaGenerate = date('jD F \of  Y ');

      $html = '

      <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <style type="text/css">
      .contenedor {
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto;
      }

      .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
          margin-bottom: .5rem;
          font-weight: 500;
          line-height: 1.2;
      }

      h1, h2, h3, h4, h5, h6 {
          margin-top: 0;
          margin-bottom: .5rem;
      }


      .text-center {
          text-align: center!important;
      }
      /*textos y etiquetas p*/
      .text-justify {
          text-align: justify!important;
      }
      p {
          margin-top: 0;
      }

      .text-break {
          word-break: break-word!important;
          overflow-wrap: break-word!important;
      }
      /**/

      .pb-3, .py-3 {
          padding-bottom: 1rem!important;
      }
      .pt-5, .py-5 {
          padding-top: 3rem!important;
      }

      .pb-2{
        padding-bottom 5px;
      }

      .lista{
        list-style: none;
      }
      .parrafo{
        padding-left: 8%
      }
      body {
        margin: 0;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
      }
      .h3, h3 {
          font-size: 1.75rem;
      }
    </style>

  </head>
  <body>

  <div id="imagen" style="position: relative; ">

      <img width="100%" height="100%" src="'.base_url().'assetsPanel/imagenes/fondo.jpg">
    </div>
  

    <div class=" pt-5" style="position: absolute;  top: 200px; z-index: 2;">
      <p class="pb-3" >Medellín, '. $fechaGenerate  .'</p>
      
      <p class=""><b>Señores</b></p>
      <p class=""><b>Protección</b></p>
      <p class=" pb-2"><b>Ciudad</b></p>
      
      <p class=" pb-3">Cordial saludo.</p>


      <p class=" pb-3" style="font-size: 14px;">
        El señor <b> ' . $nameApellidos  .  ' identified</b> con '. $dataEstudiante[0]['Document'] .' <b> '. $dataEstudiante[0]['idpassport'] .'</b> <b>de Girardota</b>. Se encuentra en proceso de inscripción en el programa de inglés PRIVATEACHER ENGLISH PROGRAM. Nuestras resoluciones son: <b> Resolución No.201950061739 Licencia de Programas académicos y Resolución No.201950057588 Licencia de Funcionamiento y en el SIET registrado como Aprendizaje Rápido/Quick Learning con código 9292</b>. 

      </p>

      <p class=" pb-2">
          Nuestro estudiante se matricula para los siguientes niveles:
      </p>

      <ul class="pb-2">
        <li>A1 -A2 código 044801</li>
        <li>B1 código 044802</li>
        <li>B2 Código 004803</li>

      </ul>

      
      <p class="pt-3" >
       Nuestro programa tiene una duración de 12 meses con horarios que oscilan de lunes a viernes de 7:00am a 9:00 pm y los sábados de 8:00am a 4:00pm. El usuario tendrá derecho de asistir mínimo 3 horas a la semana y máximo 18 horas, con derecho a talleres de Grammar, Listening, Movie, Song, Internal and External fun exchanges, Pronounciation, Tougue twister, Idioms, outdoor and indoor activities entre otros.  
      </p><br>
      <p class="" >
        El programa tiene un costo total de <b>$ '.$solicitud[0]["precio"].'</b> los cuales deberán ser consignados a la cuenta de la empresa educativa: <b>Quick Learning S.A.S cuenta de Bancolombia Ahorros No. 23417424687 </b>
      </p><br>

      <p class="" style="font-size: 16px;">
       <b> Se expide la presente constancia a solicitud del interesado para los fines de cesantías</b>. 
      </p>
      <p class="" style="font-size: 16px;">Atentamente,</p>

      <p class="">
        <img src="'.base_url().'assetsPanel/imagenes/firma.jpg" width="200px" height="80px">
      </p>
      <ul class="lista">
        <li><b>Jhoana Alexandra Giraldo</b></li>
        <li>Academic Coordinator</li>
        <li>QUIC LEANING S.A.S</li>
      </ul>

    </div>

  </body>
</html>


    ';

      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => [250, 236],
        'orientation' => 'L'
      ]);


      $mpdf->WriteHTML($html);

      
      $mpdf->Output();
  }


  public function pazSalvo($dataEstudiante){

    $names = ucwords($dataEstudiante[0]['firstname']);
    $apellidos = ucwords($dataEstudiante[0]['lastname']);

    $nameApellidos = $names . " " . $apellidos;
    
    $fechaGenerate = date('jD F \of  Y ');

      $html = '

      <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <style type="text/css">
      .contenedor {
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto;
      }

      .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
          margin-bottom: .5rem;
          font-weight: 500;
          line-height: 1.2;
      }

      h1, h2, h3, h4, h5, h6 {
          margin-top: 0;
          margin-bottom: .5rem;
      }


      .text-center {
          text-align: center!important;
      }
      /*textos y etiquetas p*/
      .text-justify {
          text-align: justify!important;
      }
      p {
          margin-top: 0;
      }

      .text-break {
          word-break: break-word!important;
          overflow-wrap: break-word!important;
      }
      /**/

      .pb-3, .py-3 {
          padding-bottom: 1rem!important;
      }
      .pt-5, .py-5 {
          padding-top: 3rem!important;
      }

      .lista{
        list-style: none;
        padding-left: 8%;
      }
      .parrafo{
        padding-left: 8%
      }
      body {
        margin: 0;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
      }
      .h3, h3 {
          font-size: 1.75rem;
      }
    </style>

  </head>
  <body>

  <div id="imagen" style="position: relative; ">

      <img width="100%" height="100%" src="'.base_url().'assetsPanel/imagenes/fondo.jpg">
    </div>
  

    <div class=" pt-5" style="position: absolute;  top: 200px; z-index: 2;">
      <p class="pb-3" style="padding-left: 30px;">Medellín, '. $fechaGenerate  .'</p>
      <h3 class="text-center ">“APRENDIZAJE RÁPIDO/QUICK LEARNING S.A.S”</h3>
      <p class="text-center pb-3">NIT. 900.497.178-1</p>

      <p class="text-center pb-3" style="font-size: 14px;">
        <b>Con Resolución No.201950057588 de 2019 Licencia de Funcionamiento y Resolución No. 201950061739 de 2019 Licencia de Programas.
Vigilado por la Secretaría de Educación de Medellín
.</b>

      </p>


      <p class="" >
        Hace constar que la señora <b> ' . $nameApellidos  .  ' identified</b> identificada '. $dataEstudiante[0]['Document'] .' <b> '. $dataEstudiante[0]['idpassport'] .'</b> se encuentra a <b>PAZ Y SALVO</b> por todo concepto con nuestra <b>INSTITUCIÓN EDUCATIVA</b>.
      </p><br>

      <p class="" >
        Cualquier información adicional favor comunicarse al PBX 444 80 27. 
      </p><br>

      <p class="pb-3" style="font-size: 16px;">
        <b>NOTA: <u>Este documento anula y deja sin validez cualquier otro documento que se haya firmado por el mismo concepto de factura, incluyendo el pagaré</u>.</b>
      </p>
      <p class="pb-3" style="font-size: 16px;">Atentamente,</p>

      <p class="parrafo">
        <img src="'.base_url().'assetsPanel/imagenes/firma.jpg" width="200px" height="80px">
      </p>
      <ul class="lista">
        <li><b>GERENCIA GENERAL</b></li>
      </ul>

    </div>

  </body>
</html>


    ';

      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => [250, 236],
        'orientation' => 'L'
      ]);


      $mpdf->WriteHTML($html);

      
      $mpdf->Output();
  }


  public function reports($title,$data){

  }


}



/*En  of file Pdf.php*/

?>