<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();
class Proceso extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('proyectos/procesos_model');
        $this->load->helper(array('url', 'consola_helper','funciones_helper'));
    }

    public function index($filtro = "") {
        $login = $this->session->userdata('Datos_Session');
        //var_dump($login['xxxiduser']);
        $data['xxxiduser'] = $login['xxxiduser'];
        $data['xxxnombres'] = $login['xxxnombres'];
        $data['xxxiniciales'] = $login['xxxiniciales'];
        $data['xxxnivel'] = $login['xxxnivel'];
        $data['xxxactivo'] = $login['xxxactivo'];
        $data['xxxcoordinador'] = $login['xxxcoordinador'];
        /*$data['xxxiduser'] = $this->session->userdata('Datos_Session')['xxxiduser'];
        $data['xxxnombres'] = $this->session->userdata('Datos_Session')['xxxnombres'];
        $data['xxxiniciales'] = $this->session->userdata('Datos_Session')['xxxiniciales'];
        $data['xxxnivel'] = $this->session->userdata('Datos_Session')['xxxnivel'];
        $data['xxxactivo'] = $this->session->userdata('Datos_Session')['xxxactivo'];
        $data['xxxcoordinador'] = $this->session->userdata('Datos_Session')['xxxcoordinador'];
        */
        
        switch ($filtro) {
            case "FSM":
                $data['xrbUsuarioCheked1'] = " checked ";
                $data['xrbUsuarioCheked2'] = "";
                $data['xrbUsuarioCheked3'] = "";
                break;
            case "JSM":
                $data['xrbUsuarioCheked1'] = "";
                $data['xrbUsuarioCheked2'] = " checked ";
                $data['xrbUsuarioCheked3'] = "";
                break;
            default:
                $data['xrbUsuarioCheked1'] = "";
                $data['xrbUsuarioCheked2'] = "";
                $data['xrbUsuarioCheked3'] = " checked ";
        }
        $data['procesos'] = $this->procesos_model->buscar_tareas_nivel_filtro($filtro = "");
        //var_dump($data['procesos']);
        $this->load->vars($data);

        $this->load->view('proyectos/procesos/header/header_reporteCambioEstado');
        $this->load->view('menu/menuSuperior');
        $this->load->view('proyectos/procesos/contenido_reporteCambioEstado');
        $this->load->view('proyectos/procesos/footer/footer_reporteCambioEstado');
    }

    public function consultar($filtro = "") {
       /* $data['xxxiduser'] = $this->session->userdata('Datos_Session')['xxxiduser'];
        $data['xxxnombres'] = $this->session->userdata('Datos_Session')['xxxnombres'];
        $data['xxxiniciales'] = $this->session->userdata('Datos_Session')['xxxiniciales'];
        $data['xxxnivel'] = $this->session->userdata('Datos_Session')['xxxnivel'];
        $data['xxxactivo'] = $this->session->userdata('Datos_Session')['xxxactivo'];
        $data['xxxcoordinador'] = $this->session->userdata('Datos_Session')['xxxcoordinador'];
        */
        $login = $this->session->userdata('Datos_Session');
        //var_dump($login['xxxiduser']);
        $data['xxxiduser'] = $login['xxxiduser'];
        $data['xxxnombres'] = $login['xxxnombres'];
        $data['xxxiniciales'] = $login['xxxiniciales'];
        $data['xxxnivel'] = $login['xxxnivel'];
        $data['xxxactivo'] = $login['xxxactivo'];
        $data['xxxcoordinador'] = $login['xxxcoordinador'];        
        switch ($filtro) {
            case "FSM":
                $data['xrbUsuarioCheked1'] = " checked ";
                $data['xrbUsuarioCheked2'] = "";
                $data['xrbUsuarioCheked3'] = "";
                break;
            case "JSM":
                $data['xrbUsuarioCheked1'] = "";
                $data['xrbUsuarioCheked2'] = " checked ";
                $data['xrbUsuarioCheked3'] = "";
                break;
            default:
                $data['xrbUsuarioCheked1'] = "";
                $data['xrbUsuarioCheked2'] = "";
                $data['xrbUsuarioCheked3'] = " checked ";
        }
        

        
        $data['procesos'] = $this->procesos_model->buscar_tareas_nivel_filtro($filtro);
        //var_dump($data['procesos']);
        $this->load->vars($data);

        $this->load->view('proyectos/procesos/header/header_reporteCambioEstado');
        $this->load->view('menu/menuSuperior');
        $this->load->view('proyectos/procesos/contenido_reporteCambioEstado');
        $this->load->view('proyectos/procesos/footer/footer_reporteCambioEstado');
    }
    
    
       function proceso_mantenimiento_reporte($id) {
        $respuesta = "";
            $data = array(
                'visto' => 'S'
            );
            $respuesta = $this->procesos_model->actualizar_r_cambios_estados($data, $id);
        
        if ($respuesta <> "") {
            echo $respuesta;
        }
    } 
    
}
