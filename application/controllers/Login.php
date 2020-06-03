<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Usuario_model");

		$session = $this->session->all_userdata();

        //print_r($session);
        if(isset($session["isLoggedIn"]) && $session["id_usuario"] > 0){ 
            redirect("panel");
        }	
	}

	public function index()
	{
		$data = array(
			'title' => "Quick learning - Login"
		);
		$this->load->view('public/login_view',$data);
	}

	//metodo para inicar session
	public function iniciarSesion(){

		$data = $this->input->post(null,true);

		//var_dump($data);

		if(!isset($data["email"]) || empty($data["email"]) || !filter_var($data["email"], FILTER_VALIDATE_EMAIL) ){
            $response = array(
                "code"    =>    100,
                "mensaje" =>    "usuario invalido"
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

        if(!isset($data["typeUser"]) || empty($data["typeUser"])){
            $response = array(
                "code"    =>    200,
                "mensaje" =>    "Selecione su tipo de usuario por favor."
            );
            echo json_encode($response);
            return;
        }

        if(!isset($data["sede"]) || empty($data["sede"])){
            $response = array(
                "code"    =>    200,
                "mensaje" =>    "Selecione su Sede por favor."
            );
            echo json_encode($response);
            return;
        }

        
        $usuario = $data["email"];
        $password = md5($data["pass"]);

        $resultado = $this->Usuario_model->validarUsuario($usuario, $password);

        if(count($resultado) > 0){

            if ($data['typeUser'] != $resultado[0]['rol']) {
                $response = array(
                    "code"    =>    200,
                    "mensaje" =>    "Usted no es este tipo de usuario."
                );
                echo json_encode($response);
                return;
            }

            if ($data['sede'] != $resultado[0]['sede']) {
                $response = array(
                    "code"    =>    200,
                    "mensaje" =>    "Usted no pertenece a esta Sede."
                );
                echo json_encode($response);
                return;
            }


            if ($resultado[0]['status'] == 1) {
                $this->session->set_userdata("isLoggedIn", true);
                $this->session->set_userdata("id_usuario", $resultado[0]["id_users"]);

                $this->session->set_userdata("nombre", $resultado[0]["email"]);
                $this->session->set_userdata("rol", $resultado[0]["rol"]);

                $this->session->set_userdata("sede", $resultado[0]["sede"]);

                $this->session->set_userdata("estrellas", $resultado[0]["estrellas"]);

                //busco el nombre de la foto
                $photo = $this->Usuario_model->getPhoto($resultado[0]["id_users"]);

                if (isset($photo) && !empty($photo)) {
                    $this->session->set_userdata("photo", $photo[0]["photoProfile"]);
                }
 
                //_________________________________
                    
                $response = array(
                  "code"    =>  1,
                  "mensaje" =>    "Inicio de sesión correcto."
                );
                echo json_encode($response);
                return;
            }else{
                $response = array(
                  "code"    =>  0,
                  "mensaje" =>    "Usted esta suspendido, por favor comuniquese con la administracion."
                );
                echo json_encode($response);
                return;
            }

        	
                
        }else{
            $response = array(
              "code"    =>  300,
              "mensaje" =>    "Usuario o password invalido."
            );
            echo json_encode($response);
            return;
        }

	}



}

/*End of file Login.php*/
