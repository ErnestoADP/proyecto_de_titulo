<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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

		$this->load->library('session');
		$this->session->sess_destroy();

		$this->load->model('Login_model'); //se carga modelo del login
		$data['institucion'] = $this->login_model->obtener_institucion(); // se llama la funcion obtener_institucion del modelo institucion

		$this->load->view('template/header');
		$this->load->view('login/login', $data);
	}

	public function loginDeUsuario()
	{
		$this->load->model('Login_model'); //se carga modelo del login
		$validacion = $this->login_model->obtener_usuario_por_correo($_POST);

		$base_url = str_replace('application/', '', base_url());


		if ($_POST) {
			switch ($validacion['code']) {
				case 'ERRINS':
					// redirect($base_url . 'error_login/institucion_incorrecta');
					header("Location: http://localhost:4200/error_login/institucion_incorrecta");
					break;
				case 'ERRPASS':
					// redirect($base_url . 'error_login/clave_incorrecta');
					header("Location: http://localhost:4200/error_login/clave_incorrecta");
					break;

				default:
					header("Location: http://localhost:4200/home");
					break;
			}
		}
	}
}
