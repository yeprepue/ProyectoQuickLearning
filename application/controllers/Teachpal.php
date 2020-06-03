<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachpal extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("Teachpal_model");
		$this->load->model("Usuario_model");

        $session = $this->session->all_userdata();

        //print_r($session);
        if($session["isLoggedIn"] != true && $session["id_usuario"] == 0){ 
            $base_url = base_url();
            redirect($base_url);
        }

    }
    
    public function index(){
    	$photo = $this->Usuario_model->getPhoto($this->session->id_usuario);

    	$data = array(
			'title' => "Resgitry Information",
			'photo' => $photo[0]['photoProfile']
		);
		$this->load->view('teachpal/registry_information_view',$data);
	} 

	public function insertInformation(){
		$data = $this->input->post(null,true);

		/*$dataDocumentacion = $this->Teachpal_model->validarDocumentacion($data['id_profesor']);

		if (count($dataDocumentacion) > 0 && isset($dataDocumentacion)) {
			$respuesta = array(
				'code' => 0,
				"mensaje" => "Your documentation is already registered" 
			);
			echo json_encode($respuesta);
			return;
		}*/


		$config = array(
			"upload_path" => "./assetsPanel/documentos",
			'allowed_types' => "png|jpg|pdf|jpeg|docx"
		);

		//$photoProfile = $this->cargarArchivos($config,'photoProfile');
		$cv= $this->cargarArchivos($config,'cv');

		$update = array(
			'cv' => $cv,
			'experiment' => $data['experiment'],
			'description' => $data['description']
		);

		$idDocumnet = $this->Teachpal_model->updateDocumtation($update,$data['id_profesor']);

		if ($idDocumnet > 0 && isset($idDocumnet)) {
			$respuesta = array(
				'code' => 1,
				'mensaje' => "Documentation registered successfully"
			);
			echo json_encode($respuesta);
			return;
		}else{
			$respuesta = array(
				'code' => 0,
				'mensaje' => "Error when registering the documentation"
			);
			echo json_encode($respuesta);
			return;
		}
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

}       

/*End of file Teachpal.php*/ 

?>