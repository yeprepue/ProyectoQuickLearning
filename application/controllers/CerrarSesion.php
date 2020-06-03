<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CerrarSesion extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("Usuario_model");

    }
    
    public function index(){
		$this->session->sess_destroy();

		$login = base_url();
        
        header('Location:' .$login);
	}   

}       

/*End of file CerrarSesion.php*/ 

?>