<?php

if (!defined('BASEPATH'))
    exit('HH: no se encontro el directorio');

class Reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('marqueting/reportes_model');
        $this->load->helper(array('url', 'consola_helper', 'funciones_helper', 'procesos_helper'));
    }

   

    function filtro($idcompania = null ,$Filtrofecha = null  ) {
        if ($this->session->userdata('Datos_Session')) {
            $login = $this->session->userdata('Datos_Session');
            
            $data['xxxiduser'] = $login['xxxiduser'];
            $data['xxxnombres'] = $login['xxxnombres'];
            $data['xxxiniciales'] = $login['xxxiniciales'];
            $data['xxxnivel'] = $login['xxxnivel'];
            $data['xxxactivo'] = $login['xxxactivo'];
            $data['xxxcoordinador'] = $login['xxxcoordinador'];
            $data['menu']="2";            
            
            $data['Filtrofecha'] = $Filtrofecha;
            $data['idcompania'] = $idcompania;
            //echo $idcompania;
            $data['xReporte'] = $this->reportes_model->mostrar_reporte($idcompania, $Filtrofecha);
            //var_dump($data['xReporte']);
            $data['montos'] = array();
            if ($data['xReporte'] != null) {
                foreach ($data['xReporte'] as $row) {
                    array_push($data['montos'], $this->reportes_model->buscar_monto_x_pedido($row->idpedido));
                }
            }
            //var_dump($data['montos']);
            $this->load->vars($data);
            $this->load->view('marqueting/header/header_compania');
            $this->load->view('menu/menuSuperior');
            $this->load->view('marqueting/historial_reporte');
            $this->load->view('footer/footer');
        } else {
            //sino inicio sesion redirecciono
            redirect('login', 'refresh');
        }
    }

}
