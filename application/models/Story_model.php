<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Story_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function consultarNoticias()
    {
        $this->db->select('*');
        $this->db->from('noticias');

        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $result = $res->result();
            return $result;
        } else {
            return false;
        }
    }
}   

/*End of file Teachpal_model.php*/
