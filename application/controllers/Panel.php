<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->library("pdf");
		$this->load->model("Usuario_model");
		$this->load->library("Correo");
		$session = $this->session->all_userdata();

        //print_r($session);
        if($session["isLoggedIn"] != true && $session["id_usuario"] == 0){ 
            $base_url = base_url();
            redirect($base_url);
        }
	}

	public function index()
	{
		
		$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);
		$estudiante = $this->Usuario_model->dataOneEstudiante($this->session->id_usuario);
		if (empty($estudiante)) { 
			$data = array(
			'title' => "Quick learning - Panel",
			'photo' => $photo[0]['photoProfile'],
			'first' => "admin",
			'last' => "");
		}else{
			$data = array(
				'title' => "Quick learning - Panel",
				'photo' => $photo[0]['photoProfile'],
				'first' => $estudiante[0]['firstname'],
				'last' => $estudiante[0]['lastname']
			);
		};

		$this->load->view('home_panel_view',$data);
	}

	public function registerProfe(){
		if ($this->session->rol == 'admin' || $this->session->rol == 'superAdmin' || $this->session->rol == 'monitor') {

			$data = array(
				'title' => "Quick learning - Register Teacher"
			);
			$this->load->view('register_teache_view',$data);
		}
	}

	public function registrarProfesor(){
		$data = $this->input->post(null,true);

		if(!isset($data["email"]) || empty($data["email"]) || !filter_var($data["email"], FILTER_VALIDATE_EMAIL) ){
            $response = array(
                "code"    =>    100,
                "mensaje" =>    "Ingrese un email valido"
            );
            echo json_encode($response);
            return;
        }

        if(!isset($data["pass"]) || empty($data["pass"])){
            $response = array(
                "code"    =>    200,
                "mensaje" =>    "password inválido"
            );
            echo json_encode($response);
            return;
        }


        //valido que el email no exita
        $exitsEmail = $this->Usuario_model->validarEmail($data["email"]);

        if (isset($exitsEmail) && !empty($exitsEmail)) {
        	$respuesta = array(
				'code' => 300,
				'mensaje' => "El Correo que ingreso ya esta Registrado"
			);
			echo json_encode($respuesta);
			return;
        }

		$idUser = $this->Usuario_model->guardarUser($data,'profesor');

        if ($idUser > 0 && isset($idUser)) {
        	$response = array(
                "code"    =>    1,
                "mensaje" =>    "Usuario registrado con exito"
            );
            echo json_encode($response);
            return;
        }else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => "Error al realizar el Registro"
			);
			echo json_encode($respuesta);
			return;
		}
	}

	public function listadoProfesores(){

		if ($this->session->rol == 'admin' || $this->session->rol == 'superAdmin' || $this->session->rol == 'monitor') {

			$profesores = $this->Usuario_model->dataTeacher($this->session->sede);

			$data = array(
				'title' => "Quick learning - Table teachers",
				'profesores' => $profesores
			);
			$this->load->view('table_teacher_view.php',$data);
		}	
	}

	public function  actualizarProfesor($idProfesor = null){

		if ($idProfesor != null) {

			$profesor = $this->Usuario_model->dataOneTeacher($idProfesor);

			if (count($profesor) > 0) {
				$data = array(
					'title' => "Quick learning - Update Teachpal",
					'profesor' => $profesor
				);
				
				$this->load->view('editar_profesor_view',$data);
			}
			
		}
	}

	public function updateTeacher(){
		$data = $this->input->post(null,true);

		if(!isset($data["email"]) || empty($data["email"]) || !filter_var($data["email"], FILTER_VALIDATE_EMAIL) ){
            $response = array(
                "code"    =>    100,
                "mensaje" =>    "Ingrese un email valido"
            );
            echo json_encode($response);
            return;
        }

        if ($data['cambiarPass'] == 1) {
        	 if(!isset($data["pass"]) || empty($data["pass"])){
	            $response = array(
	                "code"    =>    200,
	                "mensaje" =>    "password inválido"
	            );
	            echo json_encode($response);
	            return;
	        }
        }

        $this->Usuario_model->actualizarProfesor($data);

  
       $response = array(
	        "code"    =>    1,
	        "mensaje" =>    "Profesor Actualizado con exito"
	    );
	    echo json_encode($response);
	    return;
	}

	public function eliminarProfesor(){
		$data = $this->input->post(null,true);

		$this->Usuario_model->deleteProfesor($data['id_profesor']);

		$response = array(
	        "code"    =>    1,
	        "mensaje" =>    "Profesor Eliminadoo con exito"
	    );
	    echo json_encode($response);
	    return;
	}

	public function listadoEstudiantes(){

		if ($this->session->rol == 'admin' || $this->session->rol == 'superAdmin' || $this->session->rol == 'monitor') {

			$estudiantes = $this->Usuario_model->dataEstudiantes($this->session->sede);

			$data = array(
				'title' => "Quick learning - Table Students",
				'estudiantes' => $estudiantes
			);
			$this->load->view('table_estudiantes_view',$data);
		}	
	}

	public function vistaActualizarEstudiante($idEstudiante = null){

		if ($idEstudiante != null) {

			$estudiante = $this->Usuario_model->dataOneTeacher($idEstudiante);
			if (count($estudiante) > 0) {

				$data = array(
					'title' => "Quick learning - Update Student",
					'profesor' => $estudiante
				);
				$this->load->view('editar_estudiante_view',$data);
			}
			
		}

	}
	public function Enrollstudent($idEstudiante = null){

		if ($idEstudiante != null) {

			$estudiante = $this->Usuario_model->dataOneTeacher($idEstudiante);
			if (count($estudiante) > 0) {

				$data = array(
					'title' => "Quick learning - Enroll student",
					'profesor' => $estudiante
				);
				$this->load->view('matricular_estudiante_view',$data);
			}
			
		}

	}
	public function updateEstudiante(){
		$data = $this->input->post(null,true);

		if(!isset($data["email"]) || empty($data["email"]) || !filter_var($data["email"], FILTER_VALIDATE_EMAIL) ){
            $response = array(
                "code"    =>    100,
                "mensaje" =>    "Ingrese un email valido"
            );
            echo json_encode($response);
            return;
        }

        if ($data['cambiarPass'] == 1) {
        	 if(!isset($data["pass"]) || empty($data["pass"])){
	            $response = array(
	                "code"    =>    200,
	                "mensaje" =>    "password inválido"
	            );
	            echo json_encode($response);
	            return;
	        }
        }

        $this->Usuario_model->actualizarEtudiante($data);

  
       $response = array(
	        "code"    =>    1,
	        "mensaje" =>    "Estudiante Actualizado con exito"
	    );
	    echo json_encode($response);
	    return;
	}

	public function eliminarEstudiante(){
		$data = $this->input->post(null,true);

		$this->Usuario_model->deleteEstudiante($data['id_estudiante']);

		$response = array(
	        "code"    =>    1,
	        "mensaje" =>    "Estudiante Eliminado con exito"
	    );
	    echo json_encode($response);
	    return;
	}

	public function viewSubirExamenes(){
		if ($this->session->rol == 'admin' || $this->session->rol == 'superAdmin' || $this->session->rol == 'monitor') {

			$data = array(
				'title' => "Quick learning - Load exams"
			);
			$this->load->view('cargar_examenes_view',$data);
		}
	}

	public function cargarInputTitulo(){

		$titulos = $this->Usuario_model->dataTitle();

		$data = array(
			'titulos' => $titulos
		);

		$this->load->view('titulos_registrados_view',$data);
	}

	public function guardarTitulos(){
		$data = $this->input->post();

		$idTitulo = $this->Usuario_model->insertTitulos($data);

		if ($idTitulo > 0 && isset($idTitulo)) {
			$response = array(
		        "code"    =>    1,
		        "mensaje" =>    "Titulo  registrado con exito"
		    );
		    echo json_encode($response);
		    return;
		}else{
			$response = array(
		        "code"    =>    0,
		        "mensaje" =>    "Error al registrar titulo"
		    );
		    echo json_encode($response);
		    return;
		}
	}

	public function insertExamenes(){
		$data = $this->input->post();

		$idExamns = $this->Usuario_model->insertExamen($data);

		if ($idExamns > 0 && isset($idExamns)) {
			$response = array(
		        "code"    =>    1,
		        "mensaje" =>    "Test saved successfully"
		    );
		    echo json_encode($response);
		    return;
		}else{
			$response = array(
		        "code"    =>    0,
		        "mensaje" =>    "Error saving the exam"
		    );
		    echo json_encode($response);
		    return;
		}
	}

	public function mostrarExamenes(){
		$dataExamns = $this->Usuario_model->dataExamns();
		$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

		$data = array(
			'examen' => $dataExamns,
			'title' => "Quick learning - Realizar Examns",
			'photo' => $photo[0]['photoProfile']
		);

		$this->load->view('hacer_examns_view',$data);
	}

	public function validarRespuestaExamen(){
		$data = $this->input->post(null,true);

		$trueRespuesta = $this->Usuario_model->validRespuesta($data);

		if (count($trueRespuesta) > 0 ) {
			$respuesta = array(
				'code' => 1,
				'mensaje' => "respuesta correcta"
			);
			echo json_encode($respuesta);
			return;
		}else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => "respuesta incorrecta"
			);
			echo json_encode($respuesta);
			return;
		}
		
	}


	public function cargarHorarios(){

		if ($this->session->rol == 'admin' || $this->session->rol == 'superAdmin' || $this->session->rol == 'monitor' || $this->session->rol == 'secretaria') {
			$profesores = $this->Usuario_model->dataTeacher($this->session->sede);
			$data = array(
				'title' => "Quick learning - load schedules",
				'profesores' => $profesores
			);
			$this->load->view('horarios_view.php',$data);
		}
	}

	public function insertTime(){

		$data = $this->input->post(null,true);

		$fechaInicio = $data['fechaClase'] . " " .$data['hora_clase'];

		$start = date('Y-m-j H:i:s', strtotime($fechaInicio));

		$NuevaFecha = strtotime('+50 minute' , strtotime($fechaInicio)); 

		$end = date("Y-m-j H:i:s", $NuevaFecha);

		if ($data['rango'] == 1) {
			$leccion1 = $data['ran1_leccion1'];
			$leccion2 = $data['ran1_leccion2'];
			$leccion3 = $data['ran1_leccion3'];

		}elseif ($data['rango'] == 2) {
			$leccion1 = $data['ran2_leccion1'];
			$leccion2 = $data['ran2_leccion2'];
			$leccion3 = $data['ran2_leccion3'];
			
		}elseif ($data['rango'] == 3) {
			$leccion1 = $data['ran3_leccion1'];
			$leccion2 = $data['ran3_leccion2'];
			$leccion3 = $data['ran3_leccion3'];
		}

		//sumo para saber cuantas lecciones se registraron
		$leccionTotal = 0;
		if ($leccion1 > 0) {
			$leccionTotal++;
		}

		if ($leccion2 > 0) {
			$leccionTotal++;
		}

		if ($leccion3 > 0) {
			$leccionTotal++;
		}


		$insertHorario = array(
			'sede' => $data['headquarters'],
			'nameProfesor' => $data['profesor'],
			'title' => $data['nameClass'],
			'description' => $data['description'],
			'color' => $data['colorFondo'],
			'textColor' => "#fff",
			'start' => $start,
			'end' => $end,
			'libro' => $data['libro'],
			'rango' => $data['rango'],
			'leccion1' => $leccion1,
			'leccion2' => $leccion2,
			'leccion3' => $leccion3,
			'totalLeccion' => $leccionTotal
		);

		$idTime = $this->Usuario_model->insertHorario($insertHorario);

		if ($idTime > 0 && isset($idTime)) {
			$respuesta = array(
				'code' => 1,
				'mensaje' => "schedule successfully registered"
			);
			echo json_encode($respuesta);
			return;
		}else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => "error when registering the schedule"
			);
			echo json_encode($respuesta);
			return;
		}
	}

	public function mostrarHorarios(){

		if ($this->session->rol == 'admin' || $this->session->rol == 'superAdmin' || $this->session->rol == 'monitor' || $this->session->rol == 'secretaria') {
			
			$horarios = $this->Usuario_model->getHorarios($this->session->sede);

			$data = array(
				'title' => "Quick learning - schedule list",
				'horarios' => $horarios
			);

			$this->load->view('tabla_horarios_view',$data);
		}
		
	}

	public function viewEditHorario($id_horario = null){
		if ($id_horario != null) {
			$horario = $this->Usuario_model->getOneHorarios($id_horario);
			$profesores = $this->Usuario_model->dataTeacher($this->session->sede);
			$data = array(
				'title' => "Quick learning - Edit schedule",
				'horario' => $horario,
				'profesores' => $profesores
			);

			$this->load->view('editar_horario_view',$data);
		}
	}

	public function guardarLeccion(){
		$data = $this->input->post(null,true);

		$horario = $this->Usuario_model->getOneHorarios($data['id_horarios2']);

		if ($data['rangoLibros'] == 1) {
			$leccion = $data['ranCalendario1_leccion'];

		}elseif ($data['rangoLibros'] == 2) {
			$leccion = $data['ranCalendario2_leccion'];
			
		}elseif ($data['rangoLibros'] == 3) {
			$leccion = $data['ranCalendario3_leccion'];
		}


		if ($horario[0]['leccion1'] == 0) {
			
			$update = array(
				'leccion1' => $leccion
			);

			$this->Usuario_model->updateLecion($data['id_horarios2'],$update);

			$respuesta = array(
				'code' => 1,
				'mensaje' => "Leccion agregado con exito"
			);
			echo json_encode($respuesta);
			return;
		}

		if ($horario[0]['leccion2'] == 0) {
			
			$update = array(
				'leccion2' => $leccion
			);

			$this->Usuario_model->updateLecion($data['id_horarios2'],$update);

			$respuesta = array(
				'code' => 1,
				'mensaje' => "Leccion agregado con exito"
			);
			echo json_encode($respuesta);
			return;
		}

		if ($horario[0]['leccion3'] == 0) {
			
			$update = array(
				'leccion3' => $leccion
			);

			$this->Usuario_model->updateLecion($data['id_horarios2'],$update);

			$respuesta = array(
				'code' => 1,
				'mensaje' => "Leccion agregado con exito"
			);
			echo json_encode($respuesta);
			return;
		}

		$respuesta = array(
			'code' => 0,
			'mensaje' => "Todas las lecciones exiten"
		);
		echo json_encode($respuesta);
		return;
	}

	public function actualizarHorario(){
		$data = $this->input->post(null,true);

		$fechaInicio = $data['fechaClase'] . " " .$data['hora_clase'];

		$start = date('Y-m-j H:i:s', strtotime($fechaInicio));

		$NuevaFecha = strtotime('+50 minute' , strtotime($fechaInicio)); 

		$end = date("Y-m-j H:i:s", $NuevaFecha);

		$updateHorario = array(
			'sede' => $data['headquarters'],
			'title' => $data['profesor'],
			'description' => $data['description'],
			'color' => $data['colorFondo'],
			'textColor' => "#fff",
			'start' => $start,
			'end' => $end
		);

		$this->Usuario_model->updateHorario($updateHorario,$data['id_horarios2']);

		$respuesta = array(
			'code' => 1,
			'mensaje' => "Schedule updated successfully"
		);
		echo json_encode($respuesta);
		return;
	}

	public function eliminarHorario(){
		$data = $this->input->post(null,true);

		$this->Usuario_model->deleteHorario($data['id_horario']);

		$respuesta = array(
			'code' => 1,
			'mensaje' => "Schedule successfully removed"
		);
		echo json_encode($respuesta);
		return;
	}

	public function listadoHorarioParaEstudiantes(){
		if ($this->session->rol == 'estudiante') {
			
			$horarios = $this->Usuario_model->getHorarios();

			$data = array(
				'title' => "Quick learning - schedule list",
				'horarios' => $horarios
			);

			$this->load->view('tablaHorariosParaEstudiante_view',$data);
		}
	}

	public function matricularEstudiante(){
		$data = $this->input->post(null,true);

		$existMatricula = $this->Usuario_model->validarMatricula($data);

		if (count($existMatricula)>0) {
			$respuesta = array(
				'code' => 200,
				'mensaje' => "
					you are already enrolled with the teacher " . $existMatricula[0]['profesor']
			);
			echo json_encode($respuesta);
			return;
		}

		//valido la catidad de matriculados para las clases Interactive station:

		$cantidadEstudiantes = $this->Usuario_model->validarCantidadEstudiantesMatriculados($data['profesor'],$data['nameClass'],$data['fechaClass']);

		if ($data['nameClass'] == "Interactive station" && count($cantidadEstudiantes) > 1) {
			$respuesta = array(
				'code' => 200,
				'mensaje' => "Ya no hay cupos disponibles para matricularce"
			);
			echo json_encode($respuesta);
			return;
		}

		$idMatricula = $this->Usuario_model->insertMatricula($data);


		if ($idMatricula  > 0 && isset($idMatricula)) {
			$respuesta = array(
				'code' => 1,
				'mensaje' => "successfully enrolled"
			);
			echo json_encode($respuesta);
			return;
		}else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => "enrollment error"
			);
			echo json_encode($respuesta);
			return;
		}
	}

	public function dataMatriculaSegunProfesor(){
		if ($this->session->rol=="profesor" || $this->session->rol=="admin") {
			
			$dataProfesor = $this->Usuario_model->dataInfoUsers($this->session->id_usuario);

			$dataMatricula = $this->Usuario_model->dataMatricula($dataProfesor[0]['firstname']);

			$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

			$data = array(
				'matriculas' => $dataMatricula,
				'title' => "Quick learning - Enrolled",
				'photo' => $photo[0]['photoProfile']
			);

			$this->load->view("matriculados_view",$data);
		}
	}

	public function elminarMatricula(){
		$data = $this->input->post(null,true);

		$this->Usuario_model->deleteMatricula($data['id_matriculados']);

		$respuesta = array(
			'code' => 1,
			"mensaje" => "Registration successfully removed"
		);
		echo json_encode($respuesta);
		return;
	}

	public function Solicitudes(){
		if ($this->session->rol == 'estudiante') {

			$dataEstudiante = $this->Usuario_model->dataInfoUsers($this->session->id_usuario);

			$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

			$data = array(
				'title' => "Quick learning - Requests",
				'estudiante' => $dataEstudiante,
				'photo' => $photo[0]['photoProfile']
			);
			$this->load->view('solicitudesEstudiantes_view',$data);
		}
	}

	public function insertSolicitud(){
		$data = $this->input->post(null,true);

		$solictudResgistrada = $this->Usuario_model->validarSolictudEstudiante($data['estudiante'],$data['solicitud']);

		if (count($solictudResgistrada) > 0 && isset($solictudResgistrada)) {
			$respuesta = array(
				'code' => 500,
				'mensaje' => "Ya esta solicitud la ha ralizado, comuniquese con la administracion"
			);
			echo json_encode($respuesta);
			return;
		}

		if ($data['solicitud'] == 2) {
			//valido la fecha que no pase de 3 meses
			$fechaAcutual = date('Y-m-j');

			$dias	= (strtotime($fechaAcutual)-strtotime($data['fechaInactividad']))/86400;
			$diff 	= abs($dias); $dias = floor($dias);

			if ($diff > 91) {
				$respuesta = array(
					'code' => 0,
					'mensaje' => "The study is equal to or greater than 3 months, contact the administration"
				);
				echo json_encode($respuesta);
				return;
			}
		}

		


		$idRequest = $this->Usuario_model->guardarRequestEstudiante($data);

		if ($idRequest > 0 && isset($idRequest)) {
			$respuesta = array(
				'code' => 1,
				'mensaje' => "Solicitud realizada con exito"
			);
			echo json_encode($respuesta);
			return;
		}else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => "Error de Solicitud"
			);
			echo json_encode($respuesta);
			return;
		}
	}

	//metodo para ver solictudes registradas
	public function dataSolicitudesEsudiantes(){
		if ($this->session->rol == 'admin' || $this->session->rol == 'superAdmin' || $this->session->rol == 'monitor' ) {

			$dataSolicitudes = $this->Usuario_model->dataSolicitudesEstudiantes();

			$data = array(
				'title' => "Quick learning - Register Teacher",
				'solicitudes' => $dataSolicitudes
			);
			$this->load->view('solicitudesRegistradas_view',$data);
		}
	}

	public function sulicitudProcesadaEtudiante(){

		$data = $this->input->post(null,true);

		$solicitudes = $this->Usuario_model->dataSolicuitud($data['name']);

		$array = array(
			'solicitudes' => $solicitudes
		);

		$this->load->view('solicitud_aprobada', $array);
	}

	public function aprobarSolicitudEstudiante(){
		
		$data = $this->input->post(null,true);

		$dataOneSolicitud = $this->Usuario_model->dataOneSolicitud($data['id_solicitud']);

		//aqui valido que tipo de solicitud es para desactivar en caso de que sea la de suspension de estudio que es igual 2
		if ($dataOneSolicitud[0]['solicitud'] == 2) {
			$this->Usuario_model->desactivarEstudiante($data['id_estudiante']);

			$dataEstudiante = $this->Usuario_model->dataOneEstudiante($data['id_estudiante']);

			//envio el email al student de que su cuenta se ha supendido
			$this->correo->enviarEmailSuspension($dataEstudiante[0]['email']);
		}

		$this->Usuario_model->aprobarRequest($data['id_solicitud']);

		$respuesta = array(
			'code' => 1,
			"mensaje" => "Solicitud aprobada"
		);
		echo json_encode($respuesta);
		return;

	}

	public function profesoresPerfiles(){
		if ($this->session->rol == 'profesor' || $this->session->rol == "admin" || $this->session->rol == "superAdmin" || $this->session->rol == "monitor") {

			$profesores = $this->Usuario_model->dataTeacher2();

			$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

			$data = array(
				'title' => "Quick learning - Requests",
				'profesores' => $profesores,
				'photo' => $photo[0]['photoProfile']
			);
			$this->load->view('perfilesProfesores_view',$data);
		}
	}

	public function generatePdf($id_solicitud){

		if (isset($id_solicitud) && !empty($id_solicitud)) {
			
			$dataEstudiante = $this->Usuario_model->dataInfoUsers($this->session->id_usuario);

			//valdio que esta solicitud sea del estudiante que la solicito

			$dataSolicuitud = $this->Usuario_model->validarSolictudIdNameStudent($dataEstudiante[0]['firstname'],$id_solicitud);


			if (count($dataSolicuitud) > 0 && !empty($dataSolicuitud)) {

				if ($dataSolicuitud[0]['solicitud'] == 1) {

					$this->pdf->generarPdfIngles($dataEstudiante);
					
				}elseif($dataSolicuitud[0]['solicitud'] == 3){

					$solicitud = $this->Usuario_model->dataOneSolicitud($id_solicitud);

					$this->pdf->cesantias($dataEstudiante,$solicitud);

				}elseif($dataSolicuitud[0]['solicitud'] == 4){
					$this->pdf->pdfMatricula($dataEstudiante);
				}elseif($dataSolicuitud[0]['solicitud'] == 5){
					$this->pdf->pazSalvo($dataEstudiante);
				}
				
				//echo "existe";

				//elimino la solicitud
				//$this->Usuario_model->deleteSolicitud($id_solicitud);
				//$this->pdf->generarPdfEspanish();
				
			}else{
				echo "no exsite esta Solicitud";
			}

			
		}
		
	}

	//esto es para eliminar la suspension de estudios de los etudiantes
	public function deleteRequestSuspension(){
		$data = $this->input->post(null,true);

		$this->Usuario_model->deleteSolicitud($data['id_solicitud']);

		$respuesta = array(
			'code' => 1,
			'mensaje' => "Successfully deleted request"
		);
		echo json_encode($respuesta);
		return;
	}

	public function pdfPrueba(){
		$this->pdf->pazSalvo();
	}

	public function calendario(){
		$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

		$data = array(
				'title' => "Quick learning - Calendarios",
				'photo' => $photo[0]['photoProfile']
			);
		$this->load->view('calendario_view.php',$data);
	}

	public function dataFechas(){
		$data = $this->Usuario_model->dataFechas($this->session->sede);

		echo json_encode($data);
	}

	public function calendarioProfesores(){
		$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

		$data = array(
				'title' => "Quick learning - Horarios",
				'photo' => $photo[0]['photoProfile']
			);
		$this->load->view('calendario_profesores_view',$data);
	}

	public function buscarEstudiantes(){
		$data = $this->input->post(null,true);

		$dataMatricula = $this->Usuario_model->dataMatriculaSegunProfesorClass($data);

		$array = array(
			'matriculados' => $dataMatricula
		);

		$this->load->view('estudiantes_matriculados_view',$array);
	}

	//controlador para guardar la calificacion de un estudiante

	public function guardarCalificacion(){
		$data = $this->input->post(null,true);

		//valido que se alla selecionado al estudiante

		if (!isset($data ['estudiante']) && empty($data ['estudiante'])) {
			$respuesta = array(
				'code' => 0,
				'mensaje' => "Por favor tienes que selecionar a un estudiante"
			);
			echo json_encode($respuesta);
			return;
		}

		//valido que esta calificacion ya este registrada
		$dataCalificacion = $this->Usuario_model->validarCalificacionEstudiante($data['estudiante'],$data['profesor'],$data['clase']);

		if (count($dataCalificacion) && isset($dataCalificacion)) {
			$respuesta = array(
				'code' => 0,
				'mensaje' => "Ya has calificado a este estudiante en esta clase"
			);
			echo json_encode($respuesta);
			return;
		}
		//end validacion

		$idCalificacion = $this->Usuario_model->insertCalificacion($data);

		if ($idCalificacion > 0) {
			$respuesta = array(
				'code' => 1,
				'mensaje' => "Estudiante Calificado con extio"
			);
			echo json_encode($respuesta);
			return;
		}else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => "Error al calificar al estudiante"
			);
			echo json_encode($respuesta);
			return;
		}
	}

	public function historicoStudent(){

		if ($this->session->rol == 'estudiante' ) {

			//buso el hotorial de este estudiante

			$dataHistorial = $this->Usuario_model->dataHistorialStudent($this->session->nombre);

			$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

			$data = array(
				'title' => "Quick learning - Notas",
				'historico' => $dataHistorial,
				'photo' => $photo[0]['photoProfile']
			);

			$this->load->view('historico_estudiante_view',$data);
		}
	}

	public function vistaParaCalificarprofesores(){
		
		if ($this->session->rol == 'admin' || $this->session->rol == 'estudiante') {

			$profesores = $this->Usuario_model->dataTeacher($this->session->sede);

			$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

			$data = array(
				'title' => "Quick learning - Calificar Techpal",
				'profesores' => $profesores,
				'photo' => $photo[0]['photoProfile']
			);

			$this->load->view('calificar_profesor_view',$data);
		}
	}

	public function guardarCalificacionProfesor(){
		$data = $this->input->post(null,true);

		$data['fechaCalificacion'] = date('Y-m-j H:i:s');

		$idHistorial = $this->Usuario_model->insertCalificacionProfesor($data);

		if ($idHistorial > 0) {
			$respuesta = array(
				'code' => 1,
				'mensaje' => "Calificacion guardada con exito"
			);
			echo json_encode($respuesta);
			return;
		}else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => "Error al calificar al profesor"
			);
			echo json_encode($respuesta);
			return;
		}
	}

	//vista de profesores calificados
	public function tablaHistorialPorfesores(){

		$historialProfsor = $this->Usuario_model->dataHistorialPorfesor($this->session->sede);
		$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

		$data = array(
			'title' => "Techpal Calificados",
			'historial' => $historialProfsor,
			'photo' => $photo[0]['photoProfile']
		);

		$this->load->view('tabla_historial_profesores',$data);
	}

	public function vistaRegistarReferido(){
		
		if ($this->session->rol == 'estudiante' ) {

			$dataEstudiante = $this->Usuario_model->dataInfoUsers($this->session->id_usuario);

			$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

			$data = array(
				'title' => "Quick learning - Registrar Referido",
				'nameEstudiante' => $dataEstudiante[0]['firstname'],
				'photo' => $photo[0]['photoProfile']
			);

			$this->load->view('registrarReferido_view',$data);
		}
	}

	public function guardarDatosReferido(){
		$data = $this->input->post(null,true);

		if(!isset($data["email"]) || empty($data["email"]) || !filter_var($data["email"], FILTER_VALIDATE_EMAIL) ){
            $response = array(
                "code"    =>    100,
                "mensaje" =>    "Ingrese un email valido"
            );
            echo json_encode($response);
            return;
        }


        $idReferido = $this->Usuario_model->insertReferido($data);

        if ($idReferido > 0) {
        	$response = array(
                "code"    =>    1,
                "mensaje" =>    "Se ha realiazdo el registro con exito"
            );
            echo json_encode($response);
            return;
        }else{
        	$response = array(
                "code"    =>    1,
                "mensaje" =>    "Error al realizar el registro"
            );
            echo json_encode($response);
            return;
        }

	}

	public function vistaMostrarReferidos(){
		if ($this->session->rol == 'superAdmin' || $this->session->rol == 'admin' ) {

			$data = array(
				'title' => "Quick learning - Show Referrals"
			);

			$this->load->view('mostrar_referidos',$data);
		}
	}

	public function dataReferidos(){
		$data = $this->input->post(null,true);

		$referidos = $this->Usuario_model->getReferidos($data['estudiante']);

		$data = array(
			"referidos" => $referidos
		);

		$this->load->view("dataReferidos_view",$data);
	}

	//metdo para llamar a la vista de perfil del estudiante
	public function ProfileEstudiante(){
		if ($this->session->rol == "estudiante") {
			
			$estudiante = $this->Usuario_model->dataOneEstudiante($this->session->id_usuario);

			$data = array(
				'title' => "Quick learning - My Profile",
				'estudiante' => $estudiante,
				'photo' => $estudiante[0]['photoProfile']
			);

			$this->load->view('profile_sudent_view',$data);
		}
	}

	public function actualizarFoto(){

		$data = $this->input->post(null,true);

		$config = array(
			"upload_path" => "./assetsPanel/imagenes",
			'allowed_types' => "png|jpg|jpeg"
		);

		$photoProfile = $this->cargarArchivos($config,'photoProfile');

	    $fotoRegistrada = $this->Usuario_model->getPhoto($data['id_estudiante']);

	    if ($fotoRegistrada[0]['photoProfile'] != "perfil.jpg") {
	    	unlink("./assetsPanel/imagenes/".$fotoRegistrada[0]['photoProfile']);
	    }

		$this->Usuario_model->updatePhotoStudent($photoProfile ,$data['id_estudiante']);

		$respuesta = array(
			'code' => 1,
			"mensaje" => "photo updated successfully"
		);
		echo json_encode($respuesta);
		return;
	}

	private function cargarArchivos($config,$nombre){

		$this->load->library("upload", $config);

		if($this->upload->do_upload($nombre)){
			
			$dataFile = $this->upload->data();
			
			return $dataFile['file_name'];

		}else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => $this->upload->display_errors()
			);

			echo json_encode($respuesta);
			//echo $this->upload->display_errors();
			return;
		}
	}

	public function updateEstudiante2(){
		$data = $this->input->post(null,true);

		if(!isset($data["email"]) || empty($data["email"]) || !filter_var($data["email"], FILTER_VALIDATE_EMAIL) ){
            $response = array(
                "code"    =>    100,
                "mensaje" =>    "Ingrese un email valido"
            );
            echo json_encode($response);
            return;
        }

        if ($data['cambiarPass'] == 1) {
        	 if(!isset($data["pass"]) || empty($data["pass"])){
	            $response = array(
	                "code"    =>    200,
	                "mensaje" =>    "password inválido"
	            );
	            echo json_encode($response);
	            return;
	        }
        }

        $this->Usuario_model->actualizarEtudiante2($data);

  
       $response = array(
	        "code"    =>    1,
	        "mensaje" =>    "Related updated profile"
	    );
	    echo json_encode($response);
	    return;
	}

	public function updateEstudianteMatriculado(){
		$data = $this->input->post(null,true);
        $this->Usuario_model->actualizarEstudianteMatriculado($data);
       $response = array(
	        "code"    =>    1,
	        "mensaje" =>    "Related updated profile"
	    );
	    echo json_encode($response);
	    return;
	}

	public function sumarEsrella(){
		$data = $this->input->post(null,true);

		if (!isset($data['estudiante']) || empty($data['estudiante']) ) {
			$respuesta = array(
				'code' => 0,
				'mensaje' => "I do not select a student"
			);
			echo json_encode($respuesta);
			return;
		}

		$this->Usuario_model->guardarEstrella($data['estudiante']);
		
		$respuesta = array(
			'code' => 1,
			'mensaje' => "the star was added successfully"
		);
		echo json_encode($respuesta);
		return;
	}

	//metodo para mostrar botones para genrar informes
	public function informes(){

		if ($this->session->rol == 'superAdmin' || $this->session->rol == 'admin' ) {

			$data = array(
				'title' => "Quick learning - Reports"
			);

			$this->load->view('informes_view',$data);
		}
	}

	public function generateReports($opcion = null){
		
		if ($opcion != null) {


			$dataStudent=$this->Usuario_model->dataEstuaintesParaReportes($opcion);

			$data = array(
				'registros' => $dataStudent,
				'option' => $opcion
			);

			$this->load->view('excel',$data);
			
			/*if ($opcion == 1) {
				$title = "general students"; 
				
				$dataStudent=$this->Usuario_model->dataEstuaintesParaReportes($opcion);

				$data = array(
					'registros' => $dataStudent,
					'option' => $opcion
				);

				$this->load->view('excel',$data);

			}else if($opcion == 2){
				$title = "active students";

				$dataStudent=$this->Usuario_model->dataEstuaintesParaReportes($opcion);

				$data = array(
					'registros' => $dataStudent,
					'option' => $opcion
				);

				$this->load->view('excel',$data);
			}*/
		}
	}


}
