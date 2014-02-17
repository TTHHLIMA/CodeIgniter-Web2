<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Proceso extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('proyectos/procesos_model');
        $this->load->helper(array('url', 'consola_helper', 'funciones_helper', 'procesos_helper'));
    }

    public function index($filtro = "") {
        $data['menu'] = "3";
        $login = $this->session->userdata('Datos_Session');
        $data['xxxiduser'] = $login['xxxiduser'];
        $data['xxxnombres'] = $login['xxxnombres'];
        $data['xxxiniciales'] = $login['xxxiniciales'];
        $data['xxxnivel'] = $login['xxxnivel'];
        $data['xxxactivo'] = $login['xxxactivo'];
        $data['xxxcoordinador'] = $login['xxxcoordinador'];
        if ($login['xxxnivel'] === "1") {
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
            $this->load->vars($data);

            $this->load->view('proyectos/procesos/header/header_reporteCambioEstado');
            $this->load->view('menu/menuSuperior');
            $this->load->view('proyectos/procesos/contenido_reporteCambioEstado');
            $this->load->view('proyectos/procesos/footer/footer_reporteCambioEstado');
        } else {
            echo "No tiene permisos.";
        }
    }

    public function consultar($filtro = "") {
        $login = $this->session->userdata('Datos_Session');
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

    function panel($idpedido = "") {
        $login = $this->session->userdata('Datos_Session');
        $data['xxxiduser'] = $login['xxxiduser'];
        $data['xxxnombres'] = $login['xxxnombres'];
        $data['xxxiniciales'] = $login['xxxiniciales'];
        $data['xxxnivel'] = $login['xxxnivel'];
        $data['xxxactivo'] = $login['xxxactivo'];
        $data['xxxcoordinador'] = $login['xxxcoordinador'];
        if ($login['xxxnivel'] === "1") {
            $data['proceso'] = $this->procesos_model->buscar_proceso_idpedido($idpedido);
            $data['xIdP'] = $idpedido;
            $this->load->vars($data);
            $this->load->view('proyectos/procesos/header/header_proceso');
            $this->load->view('menu/menuSuperior');
            $this->load->view('proyectos/procesos/contenido_proceso');
            $this->load->view('proyectos/procesos/footer/footer_reporteCambioEstado');
        } else {
            echo "No tiene permiso.";
        }
    }

    function listar($xFiltro = "", $xCoord = "") {
        $data['menu'] = "4";
        $login = $this->session->userdata('Datos_Session');
        $data['xxxiduser'] = $login['xxxiduser'];
        $data['xxxnombres'] = $login['xxxnombres'];
        $data['xxxiniciales'] = $login['xxxiniciales'];
        $data['xxxnivel'] = $login['xxxnivel'];
        $data['xxxactivo'] = $login['xxxactivo'];
        $data['xxxcoordinador'] = $login['xxxcoordinador'];
        $data['xCoord'] = $xCoord;
        $data['xFiltro'] = $xFiltro;
        if ($login['xxxiduser'] <> "") {
            $this->load->vars($data);
            $this->load->view('proyectos/procesos/header/header_listar');
            $this->load->view('menu/menuSuperior');
            $this->load->view('proyectos/procesos/contenido_listar');
            $this->load->view('proyectos/procesos/footer/footer_reporteCambioEstado');
        } else {
            echo "expiro el tiempo de su sesion.";
        }
    }

    function proceso_ins_userReporteProceso($idpedido, $xValproceso) {

        if ($idpedido <> "" and $xValproceso <> "") {
            $login = $this->session->userdata('Datos_Session');
            $xxxiduser = $login['xxxiduser'];
            $Query = $this->procesos_model->buscar_userFormatoFinal($idpedido);
            //var_dump($Query);
            if ($Query != null) {
                foreach ($Query as $Col) {
                    $xalias = $Col->alias;
                    $xcoordinador = $Col->coordinador;
                    $xproceso = "";
                    $xusuario = $xxxiduser; // dato de la sesion
                    $salto_linea = $Col->salto_linea;
                    $formateo = $Col->formateo;
                    $pre_traduccion = $Col->pre_traduccion;
                    $traduccion = $Col->traduccion;
                    $traduccion_final = $Col->traduccion_final;
                    $formato_final = $Col->formato_final;
                    $correccion = $Col->correccion;
                    $xfecha = date("Ymd");
                    $xhora = date("H:i:s");
                    $xproyectoterminado = $Col->proyectoterminado;
                }

                $Sql = "";
                $Sql1 = "";
                switch ($xValproceso) {
                    case "1":
                        $xestado = $salto_linea;
                        $xproceso = "Salto de Linea";
                        $Sql1 = "UPDATE `pedido` SET 
                                `proc_conf_salto_linea` = 'S'
                                WHERE `pedido`.`idpedido` = '" . $idpedido . "';";
                        break;
                    case "2":
                        $xestado = $formateo;
                        $xproceso = "Formateo";
                        $Sql1 = "UPDATE `pedido` SET 
                                `proc_conf_formateo` = 'S'
                                WHERE `pedido`.`idpedido` = '" . $idpedido . "';";
                        break;
                    case "3":
                        $xestado = $pre_traduccion;
                        $xproceso = "Pre-Traduccion";
                        $Sql1 = "UPDATE `pedido` SET 
                                `proc_conf_pre_traduccion` = 'S'
                                WHERE `pedido`.`idpedido` = '" . $idpedido . "';";
                        break;
                    case "4":
                        $xestado = $traduccion;
                        $xproceso = "Traduccion";
                        $Sql1 = "UPDATE `pedido` SET 
                                `proc_conf_traduccion` = 'S'
                                WHERE `pedido`.`idpedido` = '" . $idpedido . "';";
                        break;

                    case "7":
                        $xestado = $correccion;
                        $xproceso = "Correccion";
                        $Sql1 = "UPDATE `pedido` SET 
                                `proc_conf_correccion` = 'S'
                                WHERE `pedido`.`idpedido` = '" . $idpedido . "';";
                        break;

                    case "5":
                        $xestado = $traduccion_final;
                        $xproceso = "Traduccion Final";
                        $Sql1 = "UPDATE `pedido` SET 
                                `proc_conf_traduccion_final` = 'S'
                                WHERE `pedido`.`idpedido` = '" . $idpedido . "';";
                        break;


                    case "6":
                        $xestado = $formato_final;
                        $xproceso = "Formato Final";
                        $Sql1 = "UPDATE `pedido` SET 
                                `proc_conf_formato_final` = 'S'
                                WHERE `pedido`.`idpedido` = '" . $idpedido . "';";
                        break;
                }


                $dataCambios = array(
                    'id' => NULL,
                    'pedido' => $idpedido,
                    'alias' => $xalias,
                    'coordinador' => $xcoordinador,
                    'proceso' => $xproceso,
                    'usuario' => $xusuario,
                    'estado' => $xestado,
                    'fecha' => $xfecha,
                    'hora' => $xhora,
                    'proyecto_terminado' => $xproyectoterminado
                );
                $this->db->query($Sql1);
                $respuesta = $this->procesos_model->agregar_r_cambios_estados($dataCambios);
            }

            if ($respuesta <> "") {
                echo $respuesta;
            }
        }
    }

    function upd_userformPrepSalto() {
        $valores = $this->input->post("myArray");
        $idpedido = $valores[0];
        $data = array(
            'realizadopor1' => $valores[1], // formateo , estadoCad
            'PDFGlobal' => $valores[2], //$ChkPDFGlobal 
            'saltolinea' => $valores[3], //$Chksaltolinea 
            'chekearttx' => $valores[4], //$Chkchekearttx
            'observacion5' => $valores[5], //$txtobservacion5 
            'proc_conf_salto_linea' => 'N'
        );
        $respuesta = $this->procesos_model->upd_procesos_estados($data, $idpedido);
    }

    function upd_userformPrepFormateo() {
        $valores = $this->input->post("myArray");
        $idpedido = $valores[0];
        $data = array(
            'realizadopor2' => $valores[1], // Estado
            'editacionformateo' => $valores[2], //Chkeditacionformateo 
            'ttx1' => $valores[3], //Chkttx1 
            'realizadopor6' => $valores[4], //Estado2 , $Cborealizadopor6
            'editaciontextofoto' => $valores[5], //Chkeditaciontextofoto 
            'observacion1' => $valores[6], //txtobservacion1 
            'proc_conf_formateo' => 'N'
        );
        $respuesta = $this->procesos_model->upd_procesos_estados($data, $idpedido);
    }

    function upd_userformPrepPreTrad() {
        $valores = $this->input->post("myArray");
        $idpedido = $valores[0];
        $data = array(
            'realizadopor3' => $valores[1], // Estado
            'analisistm' => $valores[2], //Chkanalisistm 
            '1roexporteus99' => $valores[3], //Chk1roexporteus99 
            'pretransl75' => $valores[4], //Chkpretransl75
            'traducir100' => $valores[5], //Chktraducir100 
            '2doexporteus99' => $valores[6], //Chk2doexporteus99 
            'borrarunidadesnotraducibles' => $valores[7], //Chkborrarunidadesnotraducibles 
            'alfabetic' => $valores[8], //Chkalfabetic 
            'rtffortrans' => $valores[9], //Chkrtffortrans 
            'crearttx' => $valores[10], //Chkcrearttx 
            'analisisfinal' => $valores[11], //Chkanalisisfinal 
            'preparacionter' => $valores[12], //Chkpreparacionter 
            'observacion2' => $valores[13], //txtobservacion2 
            'proc_conf_pre_traduccion' => 'N'
        );
        $respuesta = $this->procesos_model->upd_procesos_estados($data, $idpedido);
    }

    function upd_userformPrepTrad() {
        $valores = $this->input->post("myArray");
        $idpedido = $valores[0];
        $data = array(
            'realizadopor7' => $valores[1], // $traduccion
            'Chktraduccion' => $valores[2], //$Chktraduccion 
            'Chkarchivofinal' => $valores[3], //$Chkarchivofinal 
            'txtobservacion7' => $valores[4], //$txtobservacion7
            'proc_conf_traduccion' => 'N'
        );
        $respuesta = $this->procesos_model->upd_procesos_estados($data, $idpedido);
    }

    function upd_userformPrepCorre() {
        $valores = $this->input->post("myArray");
        $idpedido = $valores[0];
        $data = array(
            'realizadopor8' => $valores[1], // $correccion
            'observacion8' => $valores[2], //$txtobservacion8 
            'proc_conf_correccion' => 'N'
        );
        $respuesta = $this->procesos_model->upd_procesos_estados($data, $idpedido);
    }

    function upd_userformVerFinTrad() {
        $valores = $this->input->post("myArray");
        $idpedido = $valores[0];
        $data = array(
            'realizadopor4' => $valores[1], // Estado
            'actualizaciontm' => $valores[2], //ChkactualizaciontmCad 
            'traduccionfinal' => $valores[3], //ChktraduccionfinalCad 
            'cleanup' => $valores[4], //ChkCleanUpCad
            'observacion3' => $valores[5], //txtobservacion3Cad 
            'proc_conf_traduccion_final' => 'N'
        );
        $respuesta = $this->procesos_model->upd_procesos_estados($data, $idpedido);
    }

    function upd_userformVerFinFormFin() {
        $valores = $this->input->post("myArray");
        $idpedido = $valores[0];
        $data = array(
            'realizadopor5' => $valores[1], // Estado
            'formatofinal' => $valores[2], //ChkactualizaciontmCad 
            'cambiaridioma' => $valores[3], //ChktraduccionfinalCad 
            'actualizarindice1' => $valores[4], //ChkCleanUpCad
            'pocisionamiento' => $valores[5], //txtobservacion3Cad 
            'estiloletra' => $valores[6], //txtobservacion3Cad 
            'mayusculaminuscula' => $valores[7], //txtobservacion3Cad 
            'numerodecimales' => $valores[8], //txtobservacion3Cad 
            'codigosfinal' => $valores[9], //txtobservacion3Cad 
            'actualizarindice2' => $valores[10], //txtobservacion3Cad 
            'verificarmayusmin' => $valores[11], //txtobservacion3Cad 
            'observacion4' => $valores[12], //txtobservacion3Cad 
            'proc_conf_formato_final' => 'N'
        );
        $respuesta = $this->procesos_model->upd_procesos_estados($data, $idpedido);
    }

}

