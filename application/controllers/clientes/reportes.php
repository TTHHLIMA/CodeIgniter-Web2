<?php

if (!defined('BASEPATH'))
    exit('HH: no se encontro el directorio');

class Reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('clientes/reportes_model');
        $this->load->helper(array('url', 'consola_helper', 'funciones_helper', 'procesos_helper'));
    }

    public function index() {
        if ($this->session->userdata('Datos_Session')) {
            $login = $this->session->userdata('Datos_Session');
            $data['xxxiduser'] = $login['xxxiduser'];
            $data['xxxnombres'] = $login['xxxnombres'];
            $data['xxxnivel'] = $login['xxxnivel'];
            $data['xxxactivo'] = "";
            $data['xxxcoordinador'] = "";
            $data['xxxidcontacto'] = $login['xxxiduser'];
            $data['xxxiniciales'] = $login['xxxusuario'];


            $data['xUsuarios'] = $this->reportes_model->mostrar_contacto_idcontacto($login['xxxiduser']);
            $data['xReporte'] = $this->reportes_model->mostrar_reporte($login['xxxiduser'], null);
            //var_dump($data['xReporte']);
            $data['montos'] = array();
            foreach ($data['xReporte'] as $row) {
                array_push($data['montos'], $this->reportes_model->buscar_monto_x_pedido($row->idpedido));
            }
            //var_dump($data['montos']);
            $this->load->vars($data);
            $this->load->view('clientes/header/header_reporte');
            $this->load->view('menu/menuSuperior');
            $this->load->view('clientes/reporte');
            $this->load->view('footer/footer');
        } else {
            //sino inicio sesion redirecciono
            redirect('login', 'refresh');
        }
    }

    function filtro($Filtrofecha = null) {
        if ($this->session->userdata('Datos_Session')) {
            $login = $this->session->userdata('Datos_Session');
            $data['xxxiduser'] = $login['xxxiduser'];
            $data['xxxnombres'] = $login['xxxnombres'];
            $data['xxxnivel'] = $login['xxxnivel'];
            $data['xxxactivo'] = "";
            $data['xxxcoordinador'] = "";
            $data['xxxidcontacto'] = $login['xxxiduser'];
            $data['xxxiniciales'] = $login['xxxusuario'];
            $data['Filtrofecha'] = $Filtrofecha;

            
            $data['xUsuarios'] = $this->reportes_model->mostrar_contacto_idcontacto($login['xxxiduser']);
            $data['xReporte'] = $this->reportes_model->mostrar_reporte($login['xxxiduser'], $Filtrofecha);
            //var_dump($data['xReporte']);
            $data['montos'] = array();
            if ($data['xReporte'] != null) {
                foreach ($data['xReporte'] as $row) {
                    array_push($data['montos'], $this->reportes_model->buscar_monto_x_pedido($row->idpedido));
                }
            }
            //var_dump($data['montos']);
            $this->load->vars($data);
            $this->load->view('clientes/header/header_reporte');
            $this->load->view('menu/menuSuperior');
            $this->load->view('clientes/reporte');
            $this->load->view('footer/footer');
        } else {
            //sino inicio sesion redirecciono
            redirect('login', 'refresh');
        }
    }

}
