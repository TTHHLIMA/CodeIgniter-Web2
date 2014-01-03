<?php

if (!defined('BASEPATH'))
    exit('HH: no se encontro el directorio');

class Reportes extends CI_Controller {

    public function index() {
        if ($this->session->userdata('Datos_Session')) {
            $login = $this->session->userdata('Datos_Session');
            $data['xxxiduser'] = $login['xxxiduser'];
            $data['xxxnombres'] = $login['xxxnombres'];
            $data['xxxiniciales'] = $login['xxxiniciales'];
            $data['xxxnivel'] = $login['xxxnivel'];
            $data['xxxactivo'] = $login['xxxactivo'];
            $data['xxxcoordinador'] = $login['xxxcoordinador'];
            $this->load->vars($data);
            $this->load->view('marqueting/header/header_compania');
            $this->load->view('menu/menuSuperior');
            $this->load->view('clientes/reporte');
            $this->load->view('footer/footer');
        } else {
            //sino inicio sesion redirecciono
            redirect('login', 'refresh');
        }
    }

}
