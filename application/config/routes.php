<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Usuario';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//registro
$route['Register'] = "Usuario/registro";
$route['Contact'] = "Usuario/contact";

//registro de profesores
$route['Register-teacher'] = "Panel/registerProfe";
//listado de profesores
$route['listado-profesores'] = "Panel/listadoProfesores";

//lostado de estudiantes
$route['listado-estudiantes'] = "Panel/listadoEstudiantes";

//para examenes
$route['Examns'] = "Panel/viewSubirExamenes";

//para horarios
$route['Schedule'] = "Panel/cargarHorarios";

//vista pra matricularce
$route['listadoHorario-estudiantes'] = "Panel/listadoHorarioParaEstudiantes";

//---------------------------admin monitor-----------------------------------
//perfiles de profesores data
$route['Profile-Teachpal'] = "Panel/profesoresPerfiles";

//---------------------------profesores-----------------------------------
//matriculados
$route['Enrolled'] = "Panel/dataMatriculaSegunProfesor";
$route['Calender-Teachpal'] = "Panel/calendarioProfesores";
//---------------------------estudiantes-----------------------------------
//solicitudes
$route['Requests'] = "Panel/Solicitudes";

//solictudes registradas
$route['Requests-registered'] = "Panel/dataSolicitudesEsudiantes";

//calendario
$route['Calendar'] = "Panel/calendario";

//Historial Estudiante
$route['Historial-Estudiantes'] = "Panel/historicoStudent";

//para calificar a estudiante
$route['Calificar-Teachpal'] = "Panel/vistaParaCalificarprofesores";

//profesores calificacos
$route['Teachpal-Calificados'] = "Panel/tablaHistorialPorfesores";

//vista para registrar referidos
$route['Register-referred'] = "Panel/vistaRegistarReferido";

//vista para buscar referidos
$route['Search-referred'] = "Panel/vistaMostrarReferidos";

//vista para el perfil del estudiante
$route['my-profile'] = "Panel/ProfileEstudiante";

//vista para informes
$route['Reports'] = "Panel/informes";
