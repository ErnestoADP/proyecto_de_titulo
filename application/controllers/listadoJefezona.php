<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListadoJefezona extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		/** cargar modelo del usuario_model */
		$this->load->model('usuario_model');

		/** cargar modelo del institucion_model */
		$this->load->model('institucion_model');
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

		$resultado_usuario = $this->usuario_model->obtener_usuarios();

		foreach ($resultado_usuario as $usuario) {
			$usuario->nombre_institucion_fk = $this->institucion_model->obtener_una_institucion($usuario->idinstitucion_fk);
		}

		$data['usuarios'] = $resultado_usuario;

		$this->load->view('template/header');
		$this->load->view('listado_usuarios', $data);
	}

	public function eliminar($id)
	{

		$this->load->model('usuario_model'); //se carga modelo delincuente
		$this->usuario_model->eliminar_usuario($id);

		// Para redireccionar a la vista del listado
		$base_url = str_replace('application/', '', base_url());
		redirect($base_url . 'listadojefezona');
	}
}
