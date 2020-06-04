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
    
    public function registrarNoticia($parametros){
        $datos= array(
            'title' => $parametros['title'],
            'story' => $parametros['story'],
            'image'=>$parametros['image'],
            'sede' =>$parametros['sede'],
            'state'  =>$parametros['state'],
        );
        $this->db->insert('noticias', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;  

    }

    public function statusChange($id_noticias)
    {
        $this->db->select('cursos');
        $this->db->from('noticias');
        $this->db->where('id_noticias', $id_noticias);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $fila = $row->state;
        }

        if ($fila == 1) {
            $estado = 0;
        } else {
            $estado = 1;
        }

        $datos = array(
            'state' => $estado
        );

        $this->db->where('id_noticias', $id_noticias);
        $this->db->update('noticias', $datos);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}   

/*End of file Teachpal_model.php*/
