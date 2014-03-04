<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class verifica_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', '', TRUE);
        $this->load->library('session');
        $this->load->model('captcha_model');
        $this->load->helper('captcha');
        $this->load->helper(array('form', 'url', 'captcha'));
    }

    function index() {
        $this->load->library('form_validation');
 //eliminar la imagen
        $this->deleteImage();
        $this->form_validation->set_rules('txtuser', 'Usuario', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('word', 'Word', 'trim|required|xss_clean');
        $this->form_validation->set_rules('captcha', 'Captcha', 'callback_validate_captcha');
        $this->form_validation->set_rules('txtpass', 'Password', 'trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_message('required', 'El  %s es requerido');
        if ($this->form_validation->run() == false) {
            $this->load->helper(array('form'));

            // Captcha
            // 
            $original_string = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
            $original_string = implode("", $original_string);
            $captcha = substr(str_shuffle($original_string), 0, 6);





            //Field validation failed.  User redirected to login page
            $vals = array(
                'word' => $captcha,
                'img_path' => './captcha/',
                'img_url' => base_url() . 'captcha/',
                'font_path' => './captcha/fonts/coolveticarg.ttf',
                'img_width' => 150,
                'img_height' => 50,
                'expiration' => 7200
            );
            //var_dump($vals);
            $cap = create_captcha($vals);
            $data['image'] = $cap['image'];

            if (file_exists(base_url() . "captcha/" . $this->session->userdata['image']))
                unlink(base_url() . "captcha/" . $this->session->userdata['image']);

            $this->session->set_userdata(array('captcha' => $captcha, 'image' => $cap['time'] . '.jpg'));
            // 
            // Captcha


            $this->load->vars($data);
            $this->load->view('header/header_login');
            //$this->load->view('menu/menu_login');
            $this->load->view('login');
            $this->load->view('footer/footer_login');

            //            //HH: prueba
        } else {
            $login = $this->session->userdata('Datos_Session');
             //eliminar la imagen
            $this->deleteImage();
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

    public function deleteImage() {
        if (isset($this->session->userdata['image'])) {
            $lastImage = "./captcha/" . $this->session->userdata['image'];
            if (file_exists($lastImage)) {
                unlink($lastImage);
            }
        }
        return $this;
    }

    public function validate_captcha() {
        if ($this->input->post('captcha') != $this->session->userdata['captcha']) {
            $this->form_validation->set_message('validate_captcha', 'El codigo ingresado no coincide con el codigo de la imagen.');
            return false;
        } else {
            return true;
        }
    }

    function check_database($password) {

        $usernname = $this->input->post('txtuser');
        $password = $this->input->post('txtpass');
        $xtipo = 0;

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
                        'xxxnombres' => $row->anrede . " " . $row->nombres . " " . $row->apellidos,
                        'xxxtipo' => "3",
                        'xxxnivel' => "3",
                        'xxxtechniforum' => $row->techni_forum,
                        'xxxreportett' => $row->reportes_tt,
                        'xxxterminologias' => $row->terminologias,
                        'xxxusuario' => $row->usuario
                    );
                    //echo "true";
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
