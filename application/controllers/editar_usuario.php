<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editar_usuario extends CI_Controller
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
	}

	// Metodo que carga la vista con el dato agregado
	public function editarVistaUsuario()
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


		$id = $this->uri->segment(2);

		$this->load->model('Institucion_model'); //se carga modelo comuna
		$data['institucion'] = $this->institucion_model->obtener_institucion(); // se llama la funcion obtener_comuna del modelo comuna


		$data['usuario'] = $this->usuario_model->obtener_porID_usuario($id); // se llama la funcion obtener_comuna del modelo comuna

		$this->load->view('template/header');
		$this->load->view('editar_usuario', $data);
	}

	public function editar_resgistro($id)
	{
		$usuario = $_POST;

		$this->load->model('usuario_model');
		$this->usuario_model->editar_usuario($usuario, $id);


		// Para redireccionar a la vista del listado
		$base_url = str_replace('application/', '', base_url());
		redirect($base_url . 'listado_usuarios');
	}
}
