<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
		$data['ranking_comuna'] = $this->getResumeDataComuna();

		$this->load->view('template/header', $data);
		$this->load->view('home');
	}

	public function getResumeDataComuna()
	{
		$emptyArray = array();

		$this->load->model('Detalle_model'); //se carga modelo delincuente
		$hasDelito = $this->detalle_model->obtener_has_delito(); // se llama la funcion obtener_comuna del modelo comuna

		foreach ($hasDelito as $item) {
			$aux_array = array(
				'comuna' => $item->comuna_idcomuna,
				'clave' => $item->delito_iddelito,
			);

			array_push($emptyArray, $aux_array);
		}

		return $emptyArray;
	}
}
