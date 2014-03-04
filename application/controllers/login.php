<?php

if (!defined('BASEPATH'))
    exit('HH: no se encontro el directorio');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        //$this->load->model('captcha_model');
        //$this->load->helper('captcha');
               $this->load->helper(array('form', 'url', 'captcha'));
    }

    public function index() {
        // Captcha
        //  //eliminar la imagen
        $this->deleteImage();
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
                'img_height' => 40,
                'expiration' => 7200
        );

        $cap = create_captcha($vals);
        $data['image'] = $cap['image'];

        if (file_exists(base_url() . "captcha/" . $this->session->userdata['image']))
            unlink(base_url() . "captcha/" . $this->session->userdata['image']);

        $this->session->set_userdata(array('captcha' => $captcha, 'image' => $cap['time'] . '.jpg'));
        // 
        // Captcha
        //$data['capcha'] = $this->captcha_model->setCaptcha();
        //var_dump($data['capcha']);
        $this->load->vars($data);
        $this->load->helper(array('form'));
        $this->load->view('header/header_login');
        //$this->load->view('menu/menu_login');
        $this->load->view('login');
        $this->load->view('footer/footer_login');
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

    
    function cerrar_sesion() {
        $this->session->unset_userdata('Datos_Session');
        session_start();
        session_destroy();
        redirect('login', 'refresh');
    }

}
