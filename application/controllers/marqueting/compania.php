<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//HH: para definir las sesiones y saber si puede visualizar
session_start();

class Compania extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('marqueting/compania_model');
        $this->load->helper(array('url', 'consola_helper'));
    }

    public function index() {
        if ($this->session->userdata('Datos_Session')) {
            $this->load->view('marqueting/header/header_compania');
            $this->load->view('menu/menuSuperior');
            $this->load->view('marqueting/compania');
            $this->load->view('contenedor/buscador_lista_Compania');
            $this->load->view('footer/footer');
        } else {
            //sino inicio sesion redirecciono
            redirect('login', 'refresh');
        }
    }

    //HH: botones de navegacion Compania
    public function buscar_compania_siguiente($idcompania_actual = '') {
        $data['compania'] = $this->compania_model->buscar_compania_siguiente($idcompania_actual);
        $data['paises'] = $this->compania_model->listar_paises();
        if ($data['compania'] === False) {
            $data['compania'] = $this->compania_model->buscar_compania_idcompania($idcompania_actual);
        }
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    public function buscar_compania_anterior($idcompania_actual = '') {
        $data['compania'] = $this->compania_model->buscar_compania_anterior($idcompania_actual);
        $data['paises'] = $this->compania_model->listar_paises();
        if ($data['compania'] === False) {
            $data['compania'] = $this->compania_model->buscar_compania_idcompania($idcompania_actual);
        }
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    public function buscar_compania_ultimo($idcompania_actual = '') {
        $data['compania'] = $this->compania_model->buscar_compania_ultimo();
        $data['paises'] = $this->compania_model->listar_paises();
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    public function buscar_compania_primero() {
        $data['compania'] = $this->compania_model->buscar_compania_primero();
        $data['paises'] = $this->compania_model->listar_paises();
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    //HH: botones de navegacion contactos
    public function buscar_contacto_siguiente($idcompania_actual = '', $idcontacto_actual = '') {
        $data['contacto'] = $this->compania_model->buscar_contacto_siguiente($idcompania_actual, $idcontacto_actual);
        if ($data['contacto'] === False) {
            $data['contacto'] = $this->compania_model->buscar_contacto_idcontacto($idcontacto_actual);
        }        
        $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_contacto_anterior($idcompania_actual = '', $idcontacto_actual = '') {
        $data['contacto'] = $this->compania_model->buscar_contacto_anterior($idcompania_actual, $idcontacto_actual);
        if ($data['contacto'] === False) {
            $data['contacto'] = $this->compania_model->buscar_contacto_idcontacto($idcontacto_actual);
        }
        $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_contacto_ultimo($idcompania_actual = '') {
        $data['contacto'] = $this->compania_model->buscar_contacto_ultimo($idcompania_actual);
         $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_contacto_primero($idcompania_actual = '') {
        $data['contacto'] = $this->compania_model->buscar_contacto_primero($idcompania_actual);
         $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_compania_idcompania($idcompania = '') {
        $data['compania'] = $this->compania_model->buscar_compania_idcompania($idcompania);
        $this->load->view('marqueting/formularioCompania', $data);
    }

    //HH: funcion para cargar al contacto
    public function mostrar_contacto() {
        $this->load->view('marqueting/formularioContacto');
    }

    //HH: funcion para el modal y filtrar las companias
    public function test() {
        $this->load->view('buscador');
    }

    public function filtrar_compania_nombre($nombre = null) {
        if ($nombre == null) {
            $data['lista_companias'] = array();
            $this->load->view("contenedor/lista_compania", $data);
        } else {

            $data['lista_companias'] = $this->compania_model->buscar_compania_nombre($nombre);
            $this->load->view("contenedor/lista_compania", $data);
        }
    }

    function proceso_mantenimiento($opcion = "") {
        $idcompania = $this->input->post("txtidcompania");
        $txtnombre = $this->input->post("txtnombre");
        $txtcalle = $this->input->post("txtcalle");
        $txtcodigo = $this->input->post("txtcodigo");
        $txtlugar = $this->input->post("txtlugar");
        
        //consola_google("Dato: " . $idcompania);
        
        $data = array(
            'nombre' => $txtnombre,
            'calle' => $txtcalle,
            'codigo' => $txtcodigo,
            'lugar' => $txtlugar
        );
           //$idcompania ="";
           if ($opcion === "1") {//HH: agregar
        }
        if ($opcion === "2") { //HH: actualizar
            $respuesta = $this->compania_model->actualizar_compania($data, $idcompania);
        }
        if ($opcion === "3") { //HH: Eliminar
            $respuesta = $this->compania_model->eliminar_compania($idcompania);
        }
        if ($respuesta <> "") {
            echo $respuesta;
        }
    }

}