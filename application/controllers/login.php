<?php

if (!defined('BASEPATH'))
    exit('HH: no se encontro el directorio');

class Login extends CI_Controller {

    public function index() {
        $this->load->helper(array('form'));
        $this->load->view('header/header_login');
        $this->load->view('menu/menu_login');
        $this->load->view('login');
        $this->load->view('footer/footer_login');
    }

    function cerrar_sesion() {
        $this->session->unset_userdata('Datos_Session');
        session_start();
        session_destroy();
        redirect('login', 'refresh');
    }

}
