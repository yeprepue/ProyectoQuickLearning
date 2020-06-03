<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

    public function __construct() 
	  {
		  parent::__construct();
    }

    public function guardarUser($data,$rol){
      $db = $this->db;

      //data para la tabla users
      $insert1 = array(
        'email' => $data['email'],
        'pass' => md5($data['pass']),
        'rol' => $rol,
        'sede' => $data['headquarters'],
        'status' => '1'
      );

      $db->insert("users",$insert1);
      $idUsers = $db->insert_id();

      if ($rol == "profesor") {
        //data para la tabla info del user
        $insert2 = array(
          'id_users' => $idUsers,
          'firstname' => $data['firstname'],
          'lastname' => $data['lastname'],
          'idpassport' => $data['idpassport'],
          'Document' => $data['Document'],
          'headquarters' => $data['headquarters'],
          'phone'=> $data['phone'],
          'phone_reference' => $data['phone_reference']
        );
      }else{
        $insert2 = array(
          'id_users' => $idUsers,
          'firstname' => $data['firstname'],
          'lastname' => $data['lastname'],
          'idpassport' => $data['idpassport'],
          'Document' => $data['Document'],
          'headquarters' => $data['headquarters']
        );
      }
      
      

      $db->insert('infousers',$insert2);
      $idInfoUser = $db->insert_id();

      //ingreso la imagen predeterminada
      
        $foto = array(
          'id_users' => $idUsers,
          'photoProfile' => "perfil.jpg"
        );

        $db->insert('documentacion', $foto);
        $idDocumentatio = $db->insert_id();
   
      

      return $idInfoUser;
    }

    public function validarEmail($email){
      $db = $this->db;
      $db->where('email', $email);
      $data = $db->get('users')->result_array();
      return $data;
    }

    public function validarUsuario($usuraio, $pass){
    	$db = $this->db;
    	$db->where('email', $usuraio);
    	$db->where("pass", $pass);
    	$data = $db->get('users')->result_array();
    	return $data;
    }

    public function dataTeacher($sede){
      $db = $this->db;
      $db->from("users u");

      $db->join("infousers i", "i.id_users = u.id_users");

      $db->where('rol', 'profesor');

      //en dado caso si entra el email

      if ($sede == "rionegro" || $sede == "medellin") {
       $db->where('sede', $sede);
      }

      $data = $db->get()->result_array();

      return $data;
    }

    public function dataOneTeacher($idProfesor){
      $db = $this->db;
      $db->from("users u");

      $db->join("infousers i", "i.id_users = u.id_users");

      $db->where('u.id_users', $idProfesor);

      $data = $db->get()->result_array();

      return $data;
    }

    public function dataOneEstudiante($id_estudiante){
      $db = $this->db;
      $db->from("users u");

      $db->join("infousers i", "i.id_users = u.id_users");

      $db->join("documentacion d", "d.id_users = u.id_users");
      $db->where('u.id_users', $id_estudiante);

      $data = $db->get()->result_array();

      return $data;
    }

    public function actualizarProfesor($data){
      $db = $this->db;

      if ($data['cambiarPass'] == 1) {
        //data para la tabla users
        $update1 = array(
          'email' => $data['email'],
          'pass' => md5($data['pass']),
          'status' => $data['status']
        );

      }else{
        $update1 = array(
          'email' => $data['email'],
          'status' => $data['status']
        );
      }

      $db->where('id_users', $data['id_profesor']);
      $db->update("users",$update1);
      
      //data para la tabla info del user
      $update2 = array(
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'idpassport' => $data['idpassport'],
        'Document' => $data['Document'],
        'headquarters' => $data['headquarters'],
        'phone'=> $data['phone'],
        'phone_reference' => $data['phone_reference']
      );

      $db->where('id_users', $data['id_profesor']);
      $db->update("infousers",$update2);

   }

   public function deleteProfesor($id){
    $db = $this->db;

    $db->delete('infousers', array('id_users' =>  $id));
    $db->delete('users', array('id_users' =>  $id));

   }

    public function dataInfoUsers($idUsers){
      $db = $this->db;
      $db->where('id_users', $idUsers);
      $data = $db->get('infousers')->result_array();
      return $data;
    }

    public function actualizarEtudiante($data){
      $db = $this->db;

      if ($data['cambiarPass'] == 1) {
        //data para la tabla users
        $update1 = array(
          'email' => $data['email'],
          'pass' => md5($data['pass']),
          'status' => $data['status']
        );

      }else{
        $update1 = array(
          'email' => $data['email'],
          'status' => $data['status']
        );
      }

      $db->where('id_users', $data['id_profesor']);
      $db->update("users",$update1);
      
      //data para la tabla info del user
      $update2 = array(
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'idpassport' => $data['idpassport'],
        'Document' => $data['Document'],
        'headquarters' => $data['headquarters']
      );

      $db->where('id_users', $data['id_profesor']);
      $db->update("infousers",$update2);

   }

    public function dataEstudiantes($sede){
      $db = $this->db;
      $db->from("users u");

      $db->join("infousers i", "i.id_users = u.id_users");

      $db->where('rol', 'estudiante');

      if ($sede == "rionegro" || $sede == "medellin") {
       $db->where('sede', $sede);
      }

      $data = $db->get()->result_array();

      return $data;
    }


    public function deleteEstudiante($id){
    $db = $this->db;

    $db->delete('infousers', array('id_users' =>  $id));
    $db->delete('users', array('id_users' =>  $id));

    }


   public function insertExamen($insert){
      $db = $this->db;
      $db->insert("examenes",$insert);
      $idExamns = $db->insert_id();
      return $idExamns;
   }

   public function dataExamns(){
    $db = $this->db;
      $db->from("titulo t");

      $db->join("examenes e", "e.id_titulo = t.id_titulo");

      $db->where('t.numero_examen', 1);
      $db->where('t.curso', 1);

      $data = $db->get()->result_array();

      return $data;
   }

   public function insertTitulos($insert){
      $db = $this->db;
      $db->insert("titulo",$insert);
      $idTitulo = $db->insert_id();
      return $idTitulo;
   }

   public function dataTitle(){
    $db = $this->db;
    return $db->get('titulo')->result_array();
   }

   public function validRespuesta($data){
    $db = $this->db;

    $db->where('id_titulo',$data['id_titulo']);
    $db->where('respuesta',$data['respuesta']);

    $dataRespuesta =  $db->get('examenes')->result_array();

    return $dataRespuesta;
   }

   public function insertHorario($data){
      $db = $this->db;
      $db->insert("horarios2",$data);
      $idTime = $db->insert_id();
      return $idTime;
   }

   public function getHorarios($sede){
    $db = $this->db;

    if ($sede == "rionegro" || $sede == "medellin") {
       $db->where('sede', $sede);
    }
    return $db->get('horarios2')->result_array();

   }

   public function getOneHorarios($id){
    $db = $this->db;
    $db->where('id_horarios2',$id);
    return $db->get('horarios2')->result_array();
   }

   public function updateHorario($update, $id){
      $db = $this->db;

      $db->where('id_horarios2',$id);
      $db->update('horarios2',$update);
   }

   public function deleteHorario($idHorario){
      $db = $this->db;
      $db->delete('horarios2', array('id_horarios2' =>  $idHorario));
   }

   public function insertMatricula($data){
      $db = $this->db;
      $db->insert("matriculados",$data);
      $idMatricula = $db->insert_id();
      return $idMatricula;
   }

   //valdio la matricula del estudiante y clase para evitar duplicacion
   public function validarMatricula($data){
      $db = $this->db;
      $db->where('fechaClass',$data['fechaClass']);
      $db->where('nameClass',$data['nameClass']);
      $db->where('estudiante',$data['estudiante']);
      return $db->get('matriculados')->result_array();
   }

   //validar cantidad de estudintes matriculados
   public function validarCantidadEstudiantesMatriculados($profesor,$nameClass,$fechaClass){
      $db = $this->db;
      $db->where('fechaClass',$fechaClass);

      $db->where('profesor',$profesor);
      $db->where('nameClass',$nameClass);

      return $db->get('matriculados')->result_array();
   }

   public function dataMatricula($profesor){
    $db = $this->db;
    $db->where('profesor',$profesor);
    return $db->get('matriculados')->result_array();
   }

   public function deleteMatricula($id_matricula){
    $db = $this->db;
      $db->delete('matriculados', array('id_matriculados' =>  $id_matricula));
   }

   //metodo paa guarar las solictudes de los estudiantes
   public function guardarRequestEstudiante($data){
      $db = $this->db;
      $db->insert("solicitudes",$data);
      $idRequest = $db->insert_id();
      return $idRequest;
   }

   //metodo que me devuelve todos las solicitudes
   public function dataSolicitudesEstudiantes(){
    $db = $this->db;
    return $db->get('solicitudes')->result_array();
   }

   //solictud de estudiante
   public function dataSolicuitud($name){
    $db = $this->db;
    $db->where('estudiante',$name);
    return $db->get('solicitudes')->result_array();
   }

   //aprubo la solictud cambiondo de estatus
   public function aprobarRequest($id){
      $db = $this->db;

      $data = array(
        'status' => 1
      );

      $db->where('id_solicitudes',$id);
      $db->update('solicitudes',$data);

   }

   //busco la data de una sola solicitud
   public function dataOneSolicitud($id_solicitud){
      $db = $this->db;
      $db->where('id_solicitudes',$id_solicitud);
      return $db->get('solicitudes')->result_array();
   }

   //desactivar al estudiante por medio de su solicitud
   public function desactivarEstudiante($idUsers){
      $db = $this->db;

      $data = array(
        'status' => 0
      );

      $db->where('id_users',$idUsers);
      $db->update('users',$data);
   }

   public function validarSolictudEstudiante($name,$solicitud){
    $db = $this->db;
    $db->where('estudiante',$name);
    $db->where('solicitud',$solicitud);
    return $db->get('solicitudes')->result_array();
   }

   //valido la solicitud con el id y el nombre
   public function validarSolictudIdNameStudent($name,$solicitud){
    $db = $this->db;
    $db->where('id_solicitudes',$solicitud);
    $db->where('estudiante',$name);
    return $db->get('solicitudes')->result_array();
   }
   //metodo para eliminar la solicud del certificado de estudio
   public function deleteSolicitud($id_solicitud){
      $db = $this->db;
      $db->delete('solicitudes', array('id_solicitudes' =>  $id_solicitud));
   }


   //data de profesore con sus documentos y fotos
   public function dataTeacher2(){
      $db = $this->db;
      $db->from("users u");

      $db->join("infousers i", "i.id_users = u.id_users");
      $db->join("documentacion d", "d.id_users = u.id_users");

      $db->where('rol', 'profesor');

      $data = $db->get()->result_array();

      return $data;
    }

    public function dataFechas($sede){
      $db = $this->db;
      if ($sede == "rionegro" || $sede == "medellin") {
        $db->where('sede', $sede);
      }
      return $db->get('horarios2')->result_array();
    }

    public function updateLecion($id_horarios2,$data){
      $db = $this->db;
      $db->where('id_horarios2', $id_horarios2);
      $db->update("horarios2",$data);
    }

    public function dataMatriculaSegunProfesorClass($data){
      $db = $this->db;
      $db->where('profesor', $data['profesor']);
      $db->where('nameClass', $data['nameClass']);
      return $db->get('matriculados')->result_array();
    }

    //para guardar la calificacion
    public function insertCalificacion($data){
      $db = $this->db;
      $db->insert("historialcalificacion",$data);
      $idRequest = $db->insert_id();
      return $idRequest;
    }

    //data de calificacion segun  student name
    public function dataHistorialStudent($nameEstudiante){
      $db = $this->db;
      $db->where('estudiante', $nameEstudiante);

      return $db->get('historialcalificacion')->result_array();
    }

    //para validar que ya la calificacion esta hecha
    public function validarCalificacionEstudiante($nameEstudiante,$profesor,$clase){
      $db = $this->db;
      $db->where('estudiante', $nameEstudiante);
      $db->where('profesor', $profesor);
      $db->where('clase', $clase);

      return $db->get('historialcalificacion')->result_array();
    }

    public function insertCalificacionProfesor($data){
      $db = $this->db;
      $db->insert("historailprofesor",$data);
      $idRequest = $db->insert_id();
      return $idRequest;
    }

    //data de las calificaciones de los profesores
    public function dataHistorialPorfesor($sede){
      $db = $this->db;
      if ($sede == "rionegro" || $sede == "medellin") {
        $db->where('sede', $sede);
      }
      return $db->get('historailprofesor')->result_array();
    }

    //insert registar datos del referido
    public function insertReferido($data){
      $db = $this->db;
      $db->insert("referidos",$data);
      $idReferido = $db->insert_id();
      return $idReferido;
    }

    //data referidos segun id del user que lo registro
    public function getReferidos($estudiante){
      $db = $this->db;
      $db->where('estudiante', $estudiante);
      return $db->get('referidos')->result_array();
    }

    public function getPhoto($id_users){
      $db = $this->db;
      $db->where('id_users', $id_users);
      return $db->get('documentacion')->result_array();
    }

    public function updatePhotoStudent($photo,$id_users){
      $db = $this->db;

      $data = array(
        'photoProfile' => $photo
      );

      $db->where('id_users',$id_users);
      $db->update('documentacion',$data);
    }

    public function actualizarEtudiante2($data){
      $db = $this->db;

      if ($data['cambiarPass'] == 1) {
        //data para la tabla users
        $update1 = array(
          'email' => $data['email'],
          'pass' => md5($data['pass'])
        );

      }else{
        $update1 = array(
          'email' => $data['email']
        );  
      }

      $db->where('id_users', $data['id_profesor']);
      $db->update("users",$update1);
      
      //data para la tabla info del user
      $update2 = array(
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'idpassport' => $data['idpassport'],
        'Document' => $data['Document'],
        'headquarters' => $data['headquarters'],
        
        'Home_address' => $data['Home_address'],
        'Home_stratus' => $data['Home_stratus'],
        'eps' => $data['eps'],
        'profesion_occupation' => $data['profesion_occupation'],
				'office_address' => $data['office_address'],
				'etnias' => $data['etnias'],

        'phone' => $data['phone']

      );

      $db->where('id_users', $data['id_profesor']);
      $db->update("infousers",$update2);

   }

   public function actualizarEstudianteMatriculado($data){
    $db = $this->db;
    
    //data para la tabla info del user
    $update2 = array(
      'Enroll_Nro_contrato' => $data['Enroll_Nro_contrato'],
      'Enroll_Nro_factura' => $data['Enroll_Nro_factura'],
      'Enroll_fecha_incripcion' => $data['Enroll_fecha_incripcion'],
      'Enroll_fecha_expir_program' => $data['Enroll_fecha_expir_program'],
      'headquarters' => $data['headquarters']
    );

    $db->where('id_users', $data['id_profesor']);
    $db->update("infousers",$update2);

 }

   public function guardarEstrella($estudiante){
    $db = $this->db;

    $db->select('estrellas');
    $db->where('email',$estudiante);
    $db->where('rol','estudiante');

    $dataStudent = $db->get('users')->result_array();

    $totalEstrellas =  $dataStudent[0]['estrellas'] + 1;

    $update = array(
      'estrellas' => $totalEstrellas
    );

    $db->where('email',$estudiante);
    $db->where('rol','estudiante');
    $db->update('users',$update);

   }

   public function dataEstuaintesParaReportes($option){
    $db = $this->db;

      

      if ($option==1) {
        $db->from("users u");
        $db->join("infousers i", "i.id_users = u.id_users");
        $db->where('rol','estudiante');
      }elseif($option==2){
        $db->from("users u");
        $db->join("infousers i", "i.id_users = u.id_users");
        $db->where('rol','estudiante');
        $db->where('status',1);
      }elseif ($option==3) {
        # code...
      }elseif ($option==4) {
        $db->from("solicitudes s");
        $db->join("users u", "u.id_users = s.id_estudiante");
        $db->join("infousers i", "i.id_users = s.id_estudiante");
        $db->where('solicitud',2);
        $db->where('rol','estudiante');

      }

      $data = $db->get()->result_array();
      return $data;

   }

}   

/*End of file Usuario_model.php*/ 
