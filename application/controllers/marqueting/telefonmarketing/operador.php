<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Operador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('marqueting/telefonmarketing/operador_model');
        $this->load->helper(array('url', 'consola_helper', 'funciones_helper', 'procesos_helper'));
    }

    function index() {
        if ($this->session->userdata('Datos_Session')) {
            $login = $this->session->userdata('Datos_Session');
            $data['xxxiduser'] = $login['xxxiduser'];
            $data['xxxnombres'] = $login['xxxnombres'];
            $data['xxxiniciales'] = $login['xxxiniciales'];
            $data['xxxnivel'] = $login['xxxnivel'];
            $data['xxxactivo'] = $login['xxxactivo'];
            $data['xxxcoordinador'] = $login['xxxcoordinador'];
            $this->load->vars($data);
            $this->load->view('marqueting/telefonmarketing/header/header_operador');
            $this->load->view('menu/menuSuperior');
            $this->load->view('marqueting/telefonmarketing/formularioOperador');
            $this->load->view('footer/footer');
        } else {
            //sino inicio sesion redirecciono
            redirect('login', 'refresh');
        }
    }

    //HH: botones de navegacion Compania
    public function buscar_operador_siguiente($codigo_actual = '') {
        $data['operador'] = $this->operador_model->buscar_operador_siguiente($codigo_actual);
        if ($data['operador'] === False) {
            $data['operador'] = $this->operador_model->buscar_operador_codigo($codigo_actual);
        }
        $data['countOperador'] = $this->operador_model->total_de_registros("operador");
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/formularioPersonaTM');
    }

    public function buscar_operador_anterior($codigo_actual = '') {
        $data['operador'] = $this->operador_model->buscar_operador_anterior($codigo_actual);
        if ($data['operador'] === False) {
            $data['operador'] = $this->operador_model->buscar_operador_codigo($codigo_actual);
        }
        $data['countOperador'] = $this->operador_model->total_de_registros("operador");
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/formularioPersonaTM');
    }

    public function buscar_operador_ultimo() {
        $data['operador'] = $this->operador_model->buscar_operador_ultimo();
        $data['countOperador'] = $this->operador_model->total_de_registros("operador");
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/formularioPersonaTM');
    }

    public function buscar_operador_primero() {
        $data['operador'] = $this->operador_model->buscar_operador_primero();
        $data['countOperador'] = $this->operador_model->total_de_registros("operador");
        $this->load->vars($data);
        //var_dump($data['operador']);
        $this->load->view('marqueting/telefonmarketing/formularioPersonaTM');
    }

    public function count_llamadas($codigo_actual) {
        echo $this->operador_model->total_registros_llamadas($codigo_actual);
    }

    //HH: botones de navegacion Llamadas
    public function buscar_llamada_siguiente($codigo_actual = '', $idregistro_actual = '') {
        $data['llamadas'] = $this->operador_model->buscar_llamada_siguiente($codigo_actual, $idregistro_actual);
        if ($data['llamadas'] === False) {
            $data['llamadas'] = $this->operador_model->buscar_llamada_idregistro($idregistro_actual);
        }
        $data['countLlamadas'] = $this->operador_model->total_registros_llamadas($codigo_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/formulariollamadasPersona');
    }

    public function buscar_llamada_anterior($codigo_actual = '', $idregistro_actual = '') {
        $data['llamadas'] = $this->operador_model->buscar_llamada_anterior($codigo_actual, $idregistro_actual);
        if ($data['llamadas'] === False) {
            $data['llamadas'] = $this->operador_model->buscar_llamada_idregistro($idregistro_actual);
        }
        $data['countLlamadas'] = $this->operador_model->total_registros_llamadas($codigo_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/formulariollamadasPersona');
    }

    public function buscar_llamada_ultimo($codigo_actual = '') {
        $data['llamadas'] = $this->operador_model->buscar_llamada_ultimo($codigo_actual);
        $data['countLlamadas'] = $this->operador_model->total_registros_llamadas($codigo_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/formulariollamadasPersona');
    }

    public function buscar_llamada_primero($codigo_actual = '') {
        $data['llamadas'] = $this->operador_model->buscar_llamada_primero($codigo_actual);
        $data['countLlamadas'] = $this->operador_model->total_registros_llamadas($codigo_actual);
        $this->load->vars($data);
        //var_dump($data['operador']);
        $this->load->view('marqueting/telefonmarketing/formulariollamadasPersona');
    }

    //HH: botones de navegacion Registros
    public function buscar_llamada_idregistro($codigo_actual = '', $idregistro_actual = '') {
        $data['llamadas'] = $this->operador_model->buscar_llamada_idregistro($idregistro_actual);
        $data['countLlamadas'] = $this->operador_model->total_registros_llamadas($codigo_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/formulariollamadasPersona');
    }

    public function formulario_llamada($codigo_actual = '') {
        $data['llamadas'] = NULL;
        $data['countLlamadas'] = $this->operador_model->total_registros_llamadas($codigo_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/formulariollamadasPersona');
    }

    //HH: Consulta de Registros por Tiempo
    public function buscar_registros_por_fechas($codigo_actual = '', $fecha_inicial = '', $fecha_final = '') {
        //consola_google("Codigo Actual = " . $codigo_actual . " fecha_inicial = " . $fecha_inicial . "$ fecha_final = " . $fecha_final );
        $data['registrosPorFechas'] = $this->operador_model->buscar_registros_por_fechas($codigo_actual, fecha_calendario_inverso($fecha_inicial), fecha_calendario_inverso($fecha_final));
        $this->load->vars($data);
        $this->load->view('marqueting/telefonmarketing/lista_registros_por_fechas');
    }

    //HH: Funcion de mantenimiento 


    function proceso_mantenimiento($opcion = "", $codigo = "") {
        $xidregistro = $this->input->post("txtllamCodigo");
        $xcodigo = ($this->input->post("txtxCodigo") === "") ? $codigo : $this->input->post("txtxCodigo");
        $xfecha_ingreso = $this->input->post("0000-00-00");
        $xhora_inicio = $this->input->post("txtllamHoraInicio");
        $xhora_final = $this->input->post("txtllamHoraFinal");
        $xllamadas = $this->input->post("cbollamLlamadas");
        $xsumatoria_horas = $this->input->post("txtllamTotalHoras");
        $xfecha = fecha_calendario_inverso($this->input->post("txtllamFecha"));
        $xzentrale = $this->input->post("cbollamZentrale");
        $xrichtiger = $this->input->post("cbollamRichtiger");
        $xrichtig = $this->input->post("cbollamRichtig");
        $respuesta = "";
        if ($opcion === "1") {//HH: agregar
            $xidregistro = "";
            $dataRegistro = array(
                'idregistro' => $xidregistro,
                'codigo' => $xcodigo,
                'fecha_ingreso' => $xfecha_ingreso,
                'hora_inicio' => $xhora_inicio,
                'hora_final' => $xhora_final,
                'llamadas' => $xllamadas,
                'sumatoria_horas' => $xsumatoria_horas,
                'fecha' => $xfecha,
                'zentrale' => $xzentrale,
                'richtiger' => $xrichtiger,
                'richtig' => $xrichtig
            );
            $respuesta = $this->operador_model->agregar_registros($dataRegistro, $xcodigo);
        }
        if ($opcion === "2") { //HH: actualizar
            $dataRegistro = array(
                'codigo' => $xcodigo,
                'fecha_ingreso' => $xfecha_ingreso,
                'hora_inicio' => $xhora_inicio,
                'hora_final' => $xhora_final,
                'llamadas' => $xllamadas,
                'sumatoria_horas' => $xsumatoria_horas,
                'fecha' => $xfecha,
                'zentrale' => $xzentrale,
                'richtiger' => $xrichtiger,
                'richtig' => $xrichtig
            );
            $respuesta = $this->operador_model->actualizar_registros($dataRegistro, $xidregistro, $xcodigo);
        }
        // if ($opcion === "3") { //HH: Eliminar
        //     $respuesta = $this->compania_model->eliminar_compania($idcompania);
        // }


        if ($respuesta <> "") {
            echo $respuesta;
        }
    }

}

?>
