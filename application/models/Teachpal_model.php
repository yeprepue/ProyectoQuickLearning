<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachpal_model extends CI_Model{

  public function __construct() 
	{
		parent::__construct();
  }


  public function updateDocumtation($data,$id_users){
    $db = $this->db;

    $db->where('id_users',$id_users);

    $db->update('documentacion', $data);
    //$idDocumentatio = $db->insert_id();
    return 1;
  }

  public function validarDocumentacion($idprofesor){
    $db = $this->db;
    $db->where('id_users', $idprofesor);
    return $db->get('documentacion')->result_array();
  }
}   

/*End of file Teachpal_model.php*/ 