<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|poi
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['listado_delincuente'] = 'listado';
$route['formulario'] = 'formulario';
$route['home'] = 'home';
$route['operador'] = 'operador';

$route['editar_clave'] = 'editar_clave';


$route['php_file'] = 'denerar_pdf';



// 'controller/method/parametro'
$route['editar/(:num)'] = 'editar/editarVistaDelincuente/$1';
$route['editar_usuario/(:num)'] = 'editar_usuario/editarVistaUsuario/$1';
$route['add_delito/(:num)'] = 'add_delito/addDelito/$1'; //aqui
$route['detalle_delincuente/(:num)'] = 'detalle_delincuente/mostrarDatos/$1'; //aqui
$route['listadoOperador'] = 'listadoOperador';
$route['listado_usuarios'] = 'listadoJefezona';
$route['listado_delitos'] = 'listado_compilado';
$route['agregar_usuario'] = 'agregar_usuario';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Routes de errores 
$route['error_login/clave_incorrecta'] = 'custom_error';
$route['error_login/institucion_incorrecta'] = 'custom_error';
