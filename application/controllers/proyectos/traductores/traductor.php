<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Traductor extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('proyectos/traductores/traductor_model');
        $this->load->helper(array('url', 'consola_helper', 'funciones_helper', 'procesos_helper'));
    }

    function index() {
        if ($this->session->userdata('Datos_Session')) {
            $login = $this->session->userdata('Datos_Session');
            
            $data['xxxiduser'] = $login['xxxiduser'];
            $data['xxxnombres'] = $login['xxxnombres'];
            $data['xxxiniciales'] = $login['xxxiniciales'];
            $data['xxxnivel'] = $login['xxxnivel'];
            $data['xxxactivo'] = $login['xxxactivo'];
            $data['xxxcoordinador'] = $login['xxxcoordinador'];
            $data['menu']="4";            
            
            $this->load->vars($data);
            $this->load->view('proyectos/traductores/header/header_reportePedidosAbiertos');
            $this->load->view('menu/menuSuperior');
            $this->load->view('proyectos/traductores/contenedorPedidosAbiertos');
            $this->load->view('proyectos/traductores/footer/footer_reportePedidosAbiertos');
        } else {
            echo "No tiene permisos.";
        }
    }

    function listar() {
        $data['pedidos'] = $this->traductor_model->listar_pedidos_abiertos();
        $this->load->vars($data);
        $this->load->view('proyectos/traductores/listarPedidosAbiertos');
    }

}

?>
