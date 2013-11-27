<?php
if (!defined('BASEPATH'))
    exit('HH: no se encontro el directorio');

class Reportes extends CI_Controller {

    public function index() {
        $this->load->view('clientes/reporte');
    }

}
