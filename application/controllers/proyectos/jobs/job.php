<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//session_start();

class Job extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('proyectos/jobs/jobs_model');
        $this->load->helper(array('url', 'consola_helper', 'funciones_helper', 'procesos_helper'));
    }
    
    function index(){
        echo "Hola mnundo";
        echo date('h:i:s A');
        echo date("H:i:s");
        echo date("G:H:s");
    }
    
    function confirmacion($idproyecto ="" ,$idtraductor="" , $confir = "" ){
        $xidproyecto = base64_decode($idproyecto);
        $xidtraductor =  base64_decode($idtraductor);
        
        $data['orden_trabajo'] = $this->jobs_model->buscar_orden_trabajo($xidproyecto,$xidtraductor);
        if ($data['orden_trabajo'] != null) {
            foreach ($data['orden_trabajo'] as $Col) {
                if ($Col->respuesta==="0"){
                    $Booleano=false;
                    if ($confir==="3"){ // 3 i.B.  (confirmado)
                        $array_proyecto = array(
                            'estado' => "i.B." // Estado
                        );
                        $res=$this->jobs_model->update_estado_proyecto($array_proyecto, $xidproyecto,$xidtraductor);
                        if ($res===false){
                               $array_orden_trabajo = array(
                                    'estado' => "3", // Estado
                                    'respuesta' => "1" // Le dio Click
                                );
                                $this->jobs_model->update_estado_orden_trabajo($array_orden_trabajo, $xidproyecto,$xidtraductor);
                            echo "Proyecto Confirmado";
                            $Booleano=true;
                        } else {
                            echo $res;
                        }
                    }
                    if($confir==="2"){ // 2 Declinado (declinado)
                        $array_proyecto = array(
                            'estado' => "Declinado" // Estado
                        );
                        $res=$this->jobs_model->update_estado_proyecto($array_proyecto, $xidproyecto,$xidtraductor);
                        if ($res===false){
                               $array_orden_trabajo = array(
                                    'estado' => "2", // Estado
                                    'respuesta' => "1" // Le dio Click
                                );
                                $this->jobs_model->update_estado_orden_trabajo($array_orden_trabajo, $xidproyecto,$xidtraductor);                            
                            echo "Proyecto Rechazado";
                            $Booleano=true;
                        } else {
                            echo $res;
                        }
                    } 
                    if ($Booleano===false){
                        echo "Link sin estado por confirmar...";
                    }
                } else{
                    if ($Col->respuesta==="1"){
                        echo "Link ya confirmado...";
                    }
                }
            }
        }
    }
}
?>
