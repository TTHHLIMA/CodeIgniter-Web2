<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Campana extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('marqueting/campana_marqueting/campana_model');
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
            $data['menu']="1";
            $this->load->vars($data);
            $this->load->view('marqueting/campana_marqueting/header/header_campana');
            $this->load->view('menu/menuSuperior');
            $this->load->view('marqueting/campana_marqueting/contenedorCampana');
            $this->load->view('footer/footer');
        } else {
            //sino inicio sesion redirecciono
            redirect('login', 'refresh');
        }
    }
    
    //HH: botones de navegacion Compania
    public function buscar_campana_siguiente($codigo_actual = '') {
        
        $data['campana'] = $this->campana_model->buscar_campana_siguiente($codigo_actual);
        //var_dump($data['campana']);
        
        if ($data['campana'] === False) {
            $data['campana'] = $this->campana_model->buscar_campana_codigo($codigo_actual);
        }
        
        $data['countCampana'] = $this->campana_model->total_de_registros("marqueting");
        $this->load->vars($data);
        $this->load->view('marqueting/campana_marqueting/formularioCampana_marqueting');
    }

    public function buscar_campana_anterior($codigo_actual = '') {
        $data['campana'] = $this->campana_model->buscar_campana_anterior($codigo_actual);
        if ($data['campana'] === False) {
            $data['campana'] = $this->campana_model->buscar_campana_codigo($codigo_actual);
        }
        $data['countCampana'] = $this->campana_model->total_de_registros("marqueting");
        $this->load->vars($data);
        $this->load->view('marqueting/campana_marqueting/formularioCampana_marqueting');
    }

    public function buscar_campana_ultimo() {
        $data['campana'] = $this->campana_model->buscar_campana_ultimo();
        $data['countCampana'] = $this->campana_model->total_de_registros("marqueting");
        $this->load->vars($data);
        $this->load->view('marqueting/campana_marqueting/formularioCampana_marqueting');
    }

    public function buscar_campana_primero() {
        $data['campana'] = $this->campana_model->buscar_campana_primero();
        $data['countCampana'] = $this->campana_model->total_de_registros("marqueting");
        $this->load->vars($data);
        //var_dump($data['operador']);
        $this->load->view('marqueting/campana_marqueting/formularioCampana_marqueting');
    }

    public function tareas($codigo_actual = '') {
        $data['tareas'] = $this->campana_model->buscar_tareas($codigo_actual);
        $data['pendientes'] = $this->campana_model->buscar_pendientes($codigo_actual);
        $data['finalizados'] = $this->campana_model->buscar_finalizados($codigo_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/campana_marqueting/formulariotareas');
    }
    
    public function procesos_tareas($codigo_actual = '' , $idcompania = '' , $grupo ='' , $orientacion='') {
        $this->campana_model->procesar_tareas($codigo_actual, $idcompania, $grupo , $orientacion);
        $data['tareas'] = $this->campana_model->buscar_tareas($codigo_actual);
        $data['pendientes'] = $this->campana_model->buscar_pendientes($codigo_actual);
        $data['finalizados'] = $this->campana_model->buscar_finalizados($codigo_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/campana_marqueting/formulariotareas');
    }
    
}