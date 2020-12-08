<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listado_compilado extends CI_Controller
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

        $this->load->model('Detalle_model'); //se carga modelo delincuente


        $hasDelito = $this->detalle_model->obtener_has_delito(); // se llama la funcion obtener_comuna del modelo comuna


        $data['delitos'] = $hasDelito;


        $this->load->view('template/header');
        $this->load->view('listado_compilado', $data);
    }
}
