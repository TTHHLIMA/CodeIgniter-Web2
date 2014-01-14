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
                    $errorMail="";
                    if ($confir==="3"){ // 3 i.B.  (confirmado)  //caso 1
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
                                $titulo="Proyecto " . $xidproyecto . " - Confirmado" ;
                                $dex="From: info@techni-translate.com\nContent-Type: text/html; charset=utf-8";
                                $para="hernanhuar@techni-translate.com";
                                //$para= $Col->coordinador_email;
                                $mensaje="Se confirmo el Pedido por email con los datos.<br>".
                                         "<b>Idproyecto = </b>" . $xidproyecto . "<br>" .
                                         "<b>traductor = </b>" . $xidtraductor . " - ". $Col->traductor_nombre ."<br>";
                                if (mail($para,$titulo,$mensaje,$dex)){
                                }else{
                                       $errorMail="Caso 1";
                                       echo "ErrorMail.";
                                }
                            $Booleano=true;
                        } else {
                            echo $res;
                        }
                    }
                    if($confir==="2"){ // 2 Declinado (declinado)  //caso 2
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
                                $titulo="Proyecto " . $xidproyecto . " - Rechazado" ;
                                $dex="From: info@techni-translate.com\nContent-Type: text/html; charset=utf-8";
                                $para="hernanhuar@techni-translate.com";
                                //$para= $Col->coordinador_email;
                                $mensaje="Se Rechazo el Pedido por email con los datos.<br>".
                                         "<b>Idproyecto = </b>" . $xidproyecto . "<br>" .
                                         "<b>traductor = </b>" . $xidtraductor . " - ". $Col->traductor_nombre ."<br>";
                                if (!mail($para,$titulo,$mensaje,$dex)){
                                       $errorMail="Caso 2";
                                }                                
                            echo "Proyecto Rechazado";
                            $Booleano=true;
                        } else {
                            echo $res;
                        }
                    } 
                    
                    if ($Booleano===false){  //caso 3
                        echo "Link sin estado por confirmar...";
                        $titulo="Link sin estado por confirmar...";
                        $dex="From: info@techni-translate.com\nContent-Type: text/html; charset=utf-8";
                        $para="hernanhuar@techni-translate.com";
                        $mensaje="Error al ingresar los datos.<br>".
                                 "<b>Link = </b>" . $this->config->base_url() . "/proyectos/jobs/job/confirmacion/".$xidproyecto."/".$xidtraductor."/".$confir."/ <br>" . 
                                 "<b>Idproyecto = </b>" . $xidproyecto . "<br>" .
                                 "<b>Idtraductor = </b>" . $xidtraductor . "<br>";
                        if (!mail($para,$titulo,$mensaje,$dex)){
                               $errorMail="Caso 3";
                        }
                    }
                    
                    
                    // HH: verificando si hay error en el enavio de email
                    if ($errorMail<>""){
                         $titulo="Error en el envio de email...";
                                $dex="From: hernanhuar@techni-translate.com\nContent-Type: text/html; charset=utf-8";
                                $para="hernanhuar@techni-translate.com";
                                $mensaje="error al enviar con la funcion mail: " . $errorMail;
                                mail($para,$titulo,$mensaje,$dex);
                    }
                    
                    
                } else{
                    if ($Col->respuesta==="1"){
                        echo "Link ya confirmado, comuniquese con el coordinador...";
                    }
                }
            }
        }
    }
}
?>
