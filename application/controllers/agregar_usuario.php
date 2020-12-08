<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agregar_usuario extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		/** cargar modelo del login */
		$this->load->model('Login_model');

		/** cargar modelo del login */
		$this->load->model('jefezona_model');
	}

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
		$data['institucion'] = $this->jefezona_model->obtener_institucion(); // se llama la funcion obtener_institucion del modelo institucion
		$data['usuarios'] = $this->jefezona_model->obtener_rol(); // se llama la funcion obtener_institucion del modelo institucion

		$this->load->view('template/header');
		$this->load->view('formulario/form_agregar_usuario', $data);
	}
	// metodo que envia los datos del formulario al modelo
	public function addUsuario()
	{
		// Mandar datos del formulario al modelo "deliencuente_model"
		$this->load->model('usuario_model');
		$this->usuario_model->ingreso_usuario($_POST);

		// Para redireccionar a la vista del listado
		$base_url = str_replace('application/', '', base_url());
		redirect($base_url . 'listado_usuarios');
	}
}
