<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Usuario_model");
	}

	public function index()
	{
		$this->load->view('public/home_view');
	}

	public function registro(){
		$data = array(
			'title' => "Quick Learning - Register"
		);
		$this->load->view('public/register_view',$data);
	}

	public function registrarUsuario(){
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

        if(!isset($data["pass2"]) || empty($data["pass2"])){
            $response = array(
                "code"    =>    20,
                "mensaje" =>    "password inválido"
            );
            echo json_encode($response);
            return;
        }

        if ($data['pass'] != $data['pass2']) {
        	$response = array(
                "code"    =>    80,
                "mensaje" =>    "Las contraseñas no coiciden"
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


        $idUser = $this->Usuario_model->guardarUser($data,'estudiante');

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

	public function contact(){
		$data = array(
			'title' => "Quick learning - Contact"
		);
		$this->load->view('public/contact_view',$data);
	}

    public function enviarEmail(){
        $data = $this->input->post(null,true);
       

        if(!isset($data["email"]) || empty($data["email"]) || !filter_var($data["email"], FILTER_VALIDATE_EMAIL) ){
            $response = array(
                "code"    =>    100,
                "mensaje" =>    "usuario invalido"
            );
            echo json_encode($response);
            return;
        }

        $url = 'https://api.elasticemail.com/v2/email/send';

        try{
                $post = array('from' => 'ricardojavier8058@gmail.com',
                'fromName' => 'Solicitud de informacion',
                'apikey' => 'f962b888-8d64-46f8-b78d-ba0931ef3cf8',
                'subject' => 'Cursos',
                'to' => 'fuentesricardo1995@gmail.com',
                'template' => 'cursos',
                'merge_name' => $data["name"],
                'merge_email' => $data["email"],
                'merge_phone' => $data["phone"],
                'isTransactional' => false);
                
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $post,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));
                
                $result=curl_exec($ch);
                curl_close($ch);
                
            $response = array(
                "code"    => 1,
                "mensaje" => "Su Peticion se envio correctamente pronto lo contactaremos"
            );
            echo json_encode($response);
            return;
        }
        catch(Exception $ex){
            //echo $ex->getMessage();
            $response = array(
                "code"    => 0,
                "mensaje" => "Ha ocurrido un error"
            );
            echo json_encode($response);
            return;
        }
    }
}

/*End Usuario.php*/
