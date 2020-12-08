<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom_error extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        /** cargar modelo del login */
        $this->load->model('Login_model');
    }

    public function index()
    {
        $segment = $this->uri->segment(2);

        $data['clave_incorrecta'] = ($segment === 'clave_incorrecta') ? true : false;
        $data['institucion_incorrecta'] = ($segment === 'institucion_incorrecta') ? true : false;

        $data['institucion'] = $this->login_model->obtener_institucion();
        $data['baseUrlLogin'] = str_replace('application/', '', base_url());

        $this->load->view('template/header');
        $this->load->view('errors/html/error_login', $data);
    }


    public function login_usuario()
    {
        $validacion = $this->login_model->obtener_usuario_por_correo($_POST);

        $base_url = str_replace('application/', '', base_url());

        switch ($validacion['code']) {
            case 'ERRINS':
                redirect($base_url . 'error_login/institucion_incorrecta');
                break;
            case 'ERRPASS':
                redirect($base_url . 'error_login/clave_incorrecta');
                break;

            default:
                redirect($base_url . 'home');
                break;
        }
    }
}
