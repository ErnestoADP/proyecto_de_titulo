<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulario extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		//cargar libreria session
		$this->load->library('session');
		//obtener coockie del usuario logueado
		$session_activo = $this->session->userdata();

		if (!$session_activo['logged_in']) {
			$base_url = str_replace('application/', '', base_url());
			redirect($base_url . 'login');
		}

		$url = $this->uri->segment(2);

		// $data['error'] = false;

		// if ($url === 'error') {
		// 	$data['error'] = true;
		// }

		$data['session'] = $session_activo;

		$this->load->model('Comuna_model'); //se carga modelo comuna
		$data['comunas'] = $this->comuna_model->obtener_comuna(); // se llama la funcion obtener_comuna del modelo comuna

		$this->load->model('Delito_model'); //se carga modelo comuna
		$data['delitos'] = $this->delito_model->obtener_delito(); // se llama la funcion obtener_comuna del modelo comuna

		$this->load->model('Sector_model'); //se carga modelo comuna
		$data['sectores'] = $this->sector_model->obtener_sector(); // se llama la funcion obtener_comuna del modelo comuna

		//se recorre el listado de comunas
		//foreach($comunas as $comuna){
		//	var_dump($comuna->nom_comuna);
		//}
		$this->load->view('template/header');
		$this->load->view('formulario', $data);
	}

	// metodo que envia los datos del formulario al modelo
	public function addDelincuente()
	{

	//die(var_dump($_POST));
		
		// Mandar datos del formulario al modelo "deliencuente_model"
		$this->load->model('Delincuente_model');
		$this->delincuente_model->ingreso_delincuente($_POST);


		// Para redireccionar a la vista del listado
		$base_url = str_replace('application/', '', base_url());
		redirect($base_url . 'listado_delincuente');
	}
}
