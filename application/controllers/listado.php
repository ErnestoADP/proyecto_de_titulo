<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listado extends CI_Controller
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

		$data['session'] = $session_activo;

		$this->load->model('Delincuente_model'); //se carga modelo delincuente
		$this->load->model('Comuna_model'); //se carga modelo comuna
		$this->load->model('Delito_model'); //se carga modelo comuna


		$resultado_delincuentes = $this->delincuente_model->obtener_delincuentes(); // se llama la funcion obtener_comuna del modelo comuna


		foreach ($resultado_delincuentes as $delincuente) {
			$delincuente->fk_comuna = $this->comuna_model->obtener_una_comuna($delincuente->fk_comuna);
		}

		$data['delincuentes'] = $resultado_delincuentes;


		$this->load->view('template/header');
		$this->load->view('delincuente/listado_delincuente', $data);
	}

	public function eliminar($id)
	{

		$this->load->model('Delincuente_model'); //se carga modelo delincuente
		$this->delincuente_model->eliminar_delincuente($id);

		// Para redireccionar a la vista del listado
		$base_url = str_replace('application/', '', base_url());
		redirect($base_url . 'listado_delincuente');
	}
}
