<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verifica_login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model','',TRUE);
    }
    
    function index(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtuser','Usuario','trim|required|xss_clean');
        $this->form_validation->set_rules('txtpass','Password','trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_message('required', 'El  %s es requerido');
        if ($this->form_validation->run()==false){
            $this->load->helper(array('form'));
            $this->load->view('header/header_login');
            $this->load->view('menu/menu_login');           
            $this->load->view('login');
            $this->load->view('footer/footer_login');
            //HH: prueba
        }else {
            redirect('marqueting/compania','refresh');
            
        }
    }
    
    function check_database($password){
        
        $usernname=$this->input->post('txtuser');
        $result = $this->usuario_model->usuario_normal($usernname,$password);
        if($result){
            $sess_array = array();
            foreach ($result as $row){
                $sess_array = array(
                    'xxxiduser' => $row['id_usuario'],
                    'xxxnombres' => $row['nombres']." ".$row['apellidos'],
		    'xxxiniciales' => strtoupper($row['iniciales']),
		    'xxxnivel' => $row['id_nivel'],
		    'xxxactivo' => $row['activo'],
                    'xxxcoordinador' => $row['coordinador']
                );
                $this->session->set_userdata('Datos_Session',$sess_array);
            }
            return true;
        } else {
            $this->form_validation->set_message('check_database','Datos invalidos del Usuario o Password');
            return false;
        }
    }
    
}

?>
