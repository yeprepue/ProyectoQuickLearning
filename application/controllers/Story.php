<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Story extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Story_model");
        $this->load->library('upload');

        $session = $this->session->all_userdata();

        //print_r($session);
        if ($session["isLoggedIn"] != true && $session["id_usuario"] == 0) {
            $base_url = base_url();
            redirect($base_url);
        }
    }

    public function index()
    {
        $this->load->view('story/story_view');
    }


    public function consultarNoticias()
    {
        $res = $this->Story_model->consultarNoticias();
        if ($res) {
            echo json_encode(array(
                "status" => 200,
                "data" => $res
            ));
        } else {
            echo json_encode(array(
                "status" => 404
            ));
        }
    }

    public function registrarNoticia()
    {
        $title = $this->input->post('image');
        $story = $this->input->post('story');
        $sede = $this->input->post('sede'); 

        // var_dump($_FILES['image']);
        // exit;

        $config =[
        "upload_path" =>  "./assets/images/uploads/",
        'allowed_types' => 'gif|jpg|png'
        ];

        $this->load->library("upload", $config);

        if ($this->upload->do_upload($_FILES['image']["tmp_name"])) {
            $data = array('upload_data' => $this->upload->data());
            var_dump('OK');
            exit;
        } else {
            var_dump('ERROR');
            //echo $this->upload->display_errors();
            exit;
        }


        // var_dump($title);
        // exit;

        $res = $this->story_model->registrarNoticia();
        if ($res) {
            echo json_encode(array(
                "status" => 200,
                "msj" => "Registrado correctamente"
            ));
        } else {
            echo json_encode(array(
                "status" => 404
            ));
        }
    }



    // private function cargarArchivos($config, $nombre)
    // {

    //     $this->load->library("upload", $config);
    //     if ($this->upload->do_upload($nombre)) {

    //         $dataFile = $this->upload->data();

    //         return $dataFile['file_name'];
    //     } else {
    //         $respuesta = array(
    //             'code' => 0,
    //             'mensaje' => $this->upload->display_errors()
    //         );

    //         echo json_encode($respuesta);
    //         //echo $this->upload->display_errors();
    //         return;
    //     }
    // }
}       

/*End of file Teachpal.php*/
