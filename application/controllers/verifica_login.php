<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class verifica_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', '', TRUE);
    }

    function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtuser', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('txtpass', 'Password', 'trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_message('required', 'El  %s es requerido');
        if ($this->form_validation->run() == false) {
            $this->load->helper(array('form'));
            $this->load->view('header/header_login');
            $this->load->view('menu/menu_login');
            $this->load->view('login');
            $this->load->view('footer/footer_login');
            //HH: prueba
        } else {
            $login = $this->session->userdata('Datos_Session');
            //echo "dato:".$login['xxxnivel'];
            if ($login['xxxnivel'] === "1") {
                redirect('proyectos/procesos/proceso/', 'refresh');
            }
            if ($login['xxxnivel'] === "2") {
                redirect('proyectos/procesos/proceso/listar', 'refresh');
            }
            if ($login['xxxnivel'] === "3") { // Cliente
                redirect('clientes/reportes', 'refresh');
            }            
        }
    }

    function check_database($password) {

        $usernname = $this->input->post('txtuser');
        $password = $this->input->post('txtpass');
        $xtipo = 0;
        //echo $password;
        if (substr($password, 0, 1) == "Q") { //Contacto
            $result = $this->usuario_model->usuario_cliente($usernname, $password);
            $xtipo = 1; // HH:cliente
        } else {
            $result = $this->usuario_model->usuario_normal($usernname, $password);
            $xtipo = 2; // HH:Usuario TT
        }
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                if ($xtipo === 1) {
                    $sess_array = array(
                        'xxxiduser' => $row->idcontacto,
                        'xxxidconsorcio' => $row->idconsorcio,
                        'xxxidcompania' => $row->idcompania,
                        'xxxalias_comp' => $row->alias_com,
                        'xxxnombres' =>  $row->anrede . " " . $row->nombres . " " . $row->apellidos,
                        'xxxtipo' => "3",
                        'xxxnivel' => "3",
                        'xxxtechniforum' => $row->activo,
                        'xxxreportett' => $row->activo,
                        'xxxterminologias' => $row->activo,
                        'xxxsemaforo' => $row->activo,
                        'xxxcoordinador' => $row->coordinador
                    );                    
                } else {
                    $sess_array = array(
                        'xxxiduser' => $row->id_usuario,
                        'xxxnombres' => $row->nombres . " " . $row->apellidos,
                        'xxxiniciales' => strtoupper($row->iniciales),
                        'xxxnivel' => $row->id_nivel,
                        'xxxactivo' => $row->activo,
                        'xxxcoordinador' => $row->coordinador
                    );
                }
                $this->session->set_userdata('Datos_Session', $sess_array);
            }
            //echo "true";
            return true;
        } else {
            //echo "false";
            $this->form_validation->set_message('check_database', 'Datos invalidos del Usuario o Password');
            return false;
        }
    }

}

?>
