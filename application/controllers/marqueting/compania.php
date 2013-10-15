<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//HH: para definir las sesiones y saber si puede visualizar
session_start();

class Compania extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('marqueting/compania_model');
        $this->load->model('marqueting/contacto_model');
        $this->load->helper(array('url', 'consola_helper'));
    }

    public function index() {
        if ($this->session->userdata('Datos_Session')) {
            $login = $this->session->userdata('Datos_Session');
            $data['xxxiduser'] = $login['xxxiduser'];
            $data['xxxnombres'] = $login['xxxnombres'];
            $data['xxxiniciales'] = $login['xxxiniciales'];
            $data['xxxnivel'] = $login['xxxnivel'];
            $data['xxxactivo'] = $login['xxxactivo'];
            $data['xxxcoordinador'] = $login['xxxcoordinador'];
            $this->load->vars($data);
            $this->load->view('marqueting/header/header_compania');
            $this->load->view('menu/menuSuperior');
            $this->load->view('marqueting/compania');
            $this->load->view('contenedor/buscador_lista_Compania');
            $this->load->view('footer/footer');
        } else {
            //sino inicio sesion redirecciono
            redirect('login', 'refresh');
        }
    }

    //HH: botones de navegacion Compania
    public function buscar_compania_siguiente($idcompania_actual = '') {
        $data['compania'] = $this->compania_model->buscar_compania_siguiente($idcompania_actual);
        $data['paises'] = $this->compania_model->listar_paises();
        $data['consorcios'] = $this->compania_model->listar_consorcio();
        if ($data['compania'] === False) {
            $data['compania'] = $this->compania_model->buscar_compania_idcompania($idcompania_actual);
        }
        $data['ferias'] = $this->compania_model->buscar_ferias_idcompania($data['compania'][0]->idcompania);
        $data['categorias'] = $this->compania_model->buscar_categorias_idcompania($data['compania'][0]->idcompania);
        $data['partner'] = $this->compania_model->buscar_partner_idcompania($data['compania'][0]->idcompania);
        $data['countCompania'] = $this->compania_model->total_de_registros("compania");
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    public function buscar_compania_anterior($idcompania_actual = '') {
        $data['compania'] = $this->compania_model->buscar_compania_anterior($idcompania_actual);
        $data['paises'] = $this->compania_model->listar_paises();
        $data['consorcios'] = $this->compania_model->listar_consorcio();
        if ($data['compania'] === False) {
            $data['compania'] = $this->compania_model->buscar_compania_idcompania($idcompania_actual);
        }
        $data['ferias'] = $this->compania_model->buscar_ferias_idcompania($data['compania'][0]->idcompania);
        $data['categorias'] = $this->compania_model->buscar_categorias_idcompania($data['compania'][0]->idcompania);
        $data['partner'] = $this->compania_model->buscar_partner_idcompania($data['compania'][0]->idcompania);
        $data['countCompania'] = $this->compania_model->total_de_registros("compania");
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    public function buscar_compania_ultimo($idcompania_actual = '') {
        $data['compania'] = $this->compania_model->buscar_compania_ultimo();
        $data['paises'] = $this->compania_model->listar_paises();
        $data['ferias'] = $this->compania_model->buscar_ferias_idcompania($data['compania'][0]->idcompania);
        $data['consorcios'] = $this->compania_model->listar_consorcio();
        $data['categorias'] = $this->compania_model->buscar_categorias_idcompania($data['compania'][0]->idcompania);
        $data['partner'] = $this->compania_model->buscar_partner_idcompania($data['compania'][0]->idcompania);
        $data['countCompania'] = $this->compania_model->total_de_registros("compania");
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    public function buscar_compania_primero() {
        $data['compania'] = $this->compania_model->buscar_compania_primero();
        $data['paises'] = $this->compania_model->listar_paises();
        $data['ferias'] = $this->compania_model->buscar_ferias_idcompania($data['compania'][0]->idcompania);
        $data['consorcios'] = $this->compania_model->listar_consorcio();
        $data['categorias'] = $this->compania_model->buscar_categorias_idcompania($data['compania'][0]->idcompania);
        $data['partner'] = $this->compania_model->buscar_partner_idcompania($data['compania'][0]->idcompania);
        $data['countCompania'] = $this->compania_model->total_de_registros("compania");
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    //HH: botones de navegacion contactos
    public function buscar_contacto_siguiente($idcompania_actual = '', $idcontacto_actual = '') {
        $data['contacto'] = $this->compania_model->buscar_contacto_siguiente($idcompania_actual, $idcontacto_actual);
        $data['idiomas'] = $this->compania_model->listar_idiomas();
        if ($data['contacto'] === False) {
            $data['contacto'] = $this->compania_model->buscar_contacto_idcontacto($idcontacto_actual);
        }
        $data['countContactos'] = $this->compania_model->total_registros_contacto($idcompania_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_contacto_anterior($idcompania_actual = '', $idcontacto_actual = '') {
        $data['contacto'] = $this->compania_model->buscar_contacto_anterior($idcompania_actual, $idcontacto_actual);
        $data['idiomas'] = $this->compania_model->listar_idiomas();
        if ($data['contacto'] === False) {
            $data['contacto'] = $this->compania_model->buscar_contacto_idcontacto($idcontacto_actual);
        }
        $data['countContactos'] = $this->compania_model->total_registros_contacto($idcompania_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_contacto_ultimo($idcompania_actual = '') {
        $data['contacto'] = $this->compania_model->buscar_contacto_ultimo($idcompania_actual);
        $data['idiomas'] = $this->compania_model->listar_idiomas();
        $data['countContactos'] = $this->compania_model->total_registros_contacto($idcompania_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_contacto_primero($idcompania_actual = '') {
        $data['contacto'] = $this->compania_model->buscar_contacto_primero($idcompania_actual);
        $data['idiomas'] = $this->compania_model->listar_idiomas();
        $data['countContactos'] = $this->compania_model->total_registros_contacto($idcompania_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_contacto_idcontacto($idcontacto = "", $idcompania = "") {
        $data['contacto'] = $this->contacto_model->buscar_contacto_idcontacto($idcontacto);
        $data['idiomas'] = $this->compania_model->listar_idiomas();
        $data['countContactos'] = $this->compania_model->total_registros_contacto($idcompania);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function formulario_contacto($idcompania = "") {
        $data['contacto'] = NULL;
        $data['idiomas'] = $this->compania_model->listar_idiomas();
        $data['countContactos'] = $this->compania_model->total_registros_contacto($idcompania);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioContacto');
    }

    public function buscar_compania_idcompania($idcompania = '') {
        $data['compania'] = $this->compania_model->buscar_compania_idcompania($idcompania);
        $data['paises'] = $this->compania_model->listar_paises();
        $data['consorcios'] = $this->compania_model->listar_consorcio();
        $data['ferias'] = $this->compania_model->buscar_ferias_idcompania($data['compania'][0]->idcompania);
        $data['categorias'] = $this->compania_model->buscar_categorias_idcompania($data['compania'][0]->idcompania);
        $data['partner'] = $this->compania_model->buscar_partner_idcompania($data['compania'][0]->idcompania);
        $data['countCompania'] = $this->compania_model->total_de_registros("compania");
        $this->load->vars($data);
        $this->load->view('marqueting/formularioCompania');
    }

    //HH: funcion para cargar al contacto
    public function mostrar_contacto() {
        $this->load->view('marqueting/formularioContacto');
    }

    public function count_contacto($idcompania) {
        echo $this->compania_model->total_registros_contacto($idcompania);
    }

    //HH: funcion para el modal y filtrar las companias
    public function test() {
        $this->load->view('buscador');
    }

    public function filtrar_compania_nombre($nombre = null) {
        if ($nombre == null) {
            $data['lista_companias'] = array();
            $this->load->view("contenedor/lista_compania", $data);
        } else {

            $data['lista_companias'] = $this->compania_model->buscar_compania_nombre($nombre);
            $this->load->view("contenedor/lista_compania", $data);
        }
    }

    function proceso_mantenimiento($opcion = "") {
        $idcompania = $this->input->post("txtidcompania");
        $txtnombre = $this->input->post("txtnombre");
        $correo_postal = "";
        $txtcalle = $this->input->post("txtcalle");
        $txtlugar = $this->input->post("txtlugar");
        $txtcodigo = $this->input->post("txtcodigo");
        $cboPais = $this->input->post("cboPais");
        $txttelefono = $this->input->post("txttelefono");
        $txtfax = $this->input->post("txtfax");
        $txtmail = $this->input->post("txtmail");
        $txtweb = $this->input->post("txtweb");
        $txtweb2 = $this->input->post("txtweb2");
        $txtperfilCliente = $this->input->post("txtperfilCliente");
        $txtproducto = $this->input->post("txtproducto");
        $cboprocedencia = $this->input->post("cboprocedencia");
        $cboAnalisis = $this->input->post("cboAnalisis");
        $pendiente = ($this->input->post("chkpendiente") === "on") ? "S" : "N";
        $departamento = "";
        $cboconsorcio = $this->input->post("cboconsorcio");
        $alias_com = "";
        $terminologias = "0";
        $exportado = "0";
        $nocontactar = "N";
        $paralizado = "N";
        $nota = "";
        $chkoem = ($this->input->post("chkoem") === "on") ? "1" : "0";
        $chkmasch = ($this->input->post("chkmasch") === "on") ? "1" : "0";
        $chkdistri = ($this->input->post("chkdistri") === "on") ? "1" : "0";
        $chkfach = ($this->input->post("chkfach") === "on") ? "1" : "0";
        $chkprivat = ($this->input->post("chkprivat") === "on") ? "1" : "0";
        $chksonst = ($this->input->post("chksonst") === "on") ? "1" : "0";
        $cboWirtschaftslage = $this->input->post("cboWirtschaftslage");
        $chkdict = ($this->input->post("chkdict") === "on") ? "1" : "0";
        $fecha_dict = "0000-00-00";

        $respuesta = "";


        if ($opcion === "1") {//HH: agregar
            $idcompania = "";
            $result = $this->compania_model->nuevo_idcompania();
            foreach ($result as $row) {
                $idcompania = $row->idcompania;
            }

            $dataCompa = array(
                'idcompania' => $idcompania,
                'nombre' => $txtnombre,
                'correo_postal' => $correo_postal,
                'calle' => $txtcalle,
                'lugar' => $txtlugar,
                'Codigo' => $txtcodigo,
                'pais' => $cboPais,
                'telefono' => $txttelefono,
                'fax' => $txtfax,
                'Mail' => $txtmail,
                'web' => $txtweb,
                'interesante_link' => $txtweb2,
                'perfil_cliente' => $txtperfilCliente,
                'productos' => $txtproducto,
                'procedencia_cliente' => $cboprocedencia,
                'ana_abc' => $cboAnalisis,
                'pendiente' => $pendiente,
                'departamento' => $departamento,
                'idconsorcio' => $cboconsorcio,
                'alias_com' => $alias_com,
                'terminologias' => $terminologias,
                'exportado' => $exportado,
                'nocontactar' => $nocontactar,
                'paralizado' => $paralizado,
                'nota' => $nota,
                'oem' => $chkoem,
                'masch' => $chkmasch,
                'distri' => $chkdistri,
                'fach' => $chkfach,
                'privat' => $chkprivat,
                'sonst' => $chksonst,
                'bedarfinZukunft' => $cboWirtschaftslage,
                'dict' => $chkdict,
                'fecha_dict' => $fecha_dict
            );


            $data['compania_nom'] = $this->compania_model->buscar_compania_nombre_completo($txtnombre);
            if ($data['compania_nom'] <> False) {
                $respuesta = "Error: Nombre de Compania duplicado";
            } else {
                $respuesta = $this->compania_model->agregar_compania($dataCompa, $idcompania);
            }
        }
        if ($opcion === "2") { //HH: actualizar
            $dataCompa = array(
                'nombre' => $txtnombre,
                'calle' => $txtcalle,
                'lugar' => $txtlugar,
                'Codigo' => $txtcodigo,
                'pais' => $cboPais,
                'telefono' => $txttelefono,
                'fax' => $txtfax,
                'Mail' => $txtmail,
                'web' => $txtweb,
                'interesante_link' => $txtweb2,
                'perfil_cliente' => $txtperfilCliente,
                'productos' => $txtproducto,
                'procedencia_cliente' => $cboprocedencia,
                'ana_abc' => $cboAnalisis,
                'pendiente' => $pendiente,
                'idconsorcio' => $cboconsorcio,
                'oem' => $chkoem,
                'masch' => $chkmasch,
                'distri' => $chkdistri,
                'fach' => $chkfach,
                'privat' => $chkprivat,
                'sonst' => $chksonst,
                'bedarfinZukunft' => $cboWirtschaftslage,
                'dict' => $chkdict
            );
            $respuesta = $this->compania_model->actualizar_compania($dataCompa, $idcompania);
        }
        if ($opcion === "3") { //HH: Eliminar
            $respuesta = $this->compania_model->eliminar_compania($idcompania);
        }


        if ($respuesta <> "") {
            echo $respuesta;
        }
    }

    function proceso_mantenimiento_contacto($opcion = "", $idcompania = "") {

        $idcontacto = $this->input->post("txtidContacto");
        $idcompania = ($this->input->post("txtidCompania") === "") ? $idcompania : $this->input->post("txtidCompania");
        $anrede = $this->input->post("cboAndere");
        $nombres = $this->input->post("txtnomContacto");
        $apellidos = $this->input->post("txtapeContacto");
        $cargo = $this->input->post("txtcargoContacto");
        $departamento = $this->input->post("txtdepartamentoContacto");
        $telefono = $this->input->post("txttelefonoContacto");
        $fax = $this->input->post("txtfaxContacto");
        $mail = $this->input->post("txtmailcontacto");
        $contac_interes = ($this->input->post("chkcontacinteres") === "on") ? "S" : "N";
        $celular = $this->input->post("txtcelularContacto");
        $idioma = $this->input->post("cboIdioma");
        $techni_forum = '0';
        $reportes_tt = '0';
        $exportado = '0';
        $retirado = ($this->input->post("chkretirado") === "on") ? "1" : "0";
        $reportes_tt_com = '0';
        $chknich = ($this->input->post("chknich") === "on") ? "1" : "0";
        $fecha_datos_admin = '0000-00-00';
        $fecha_datos_user = '0000-00-00';



        $respuesta = "";

        if ($opcion === "1") {//HH: agregar
            $idcontacto = "";
            $result = $this->contacto_model->nuevo_idcontacto();
            foreach ($result as $row) {
                $idcontacto = $row->idcontacto;
            }
            $dataContacto = array(
                'idcontacto' => $idcontacto,
                'idcompania' => $idcompania,
                'anrede' => $anrede,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'cargo' => $cargo,
                'departamento' => $departamento,
                'telefono' => $telefono,
                'fax' => $fax,
                'mail' => $mail,
                'contac_interes' => $contac_interes,
                'celular' => $celular,
                'idioma' => $idioma,
                'techni_forum' => $techni_forum,
                'reportes_tt' => $reportes_tt,
                'exportado' => $exportado,
                'retirado' => $retirado,
                'reportes_tt_com' => $reportes_tt_com,
                'chknich' => $chknich,
                'fecha_datos_admin' => $fecha_datos_admin,
                'fecha_datos_user' => $fecha_datos_user
            );
            $respuesta = $this->contacto_model->agregar_contacto($dataContacto, $idcontacto, $idcompania);
        }
        if ($opcion === "2") { //HH: actualizar
            $dataContacto = array(
                'idcontacto' => $idcontacto,
                'idcompania' => $idcompania,
                'anrede' => $anrede,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'cargo' => $cargo,
                'departamento' => $departamento,
                'telefono' => $telefono,
                'fax' => $fax,
                'mail' => $mail,
                'contac_interes' => $contac_interes,
                'celular' => $celular,
                'idioma' => $idioma,
                'retirado' => $retirado,
                'chknich' => $chknich,
            );
            $respuesta = $this->contacto_model->actualizar_contacto($dataContacto, $idcontacto);
        }
        if ($opcion === "3") { //HH: Eliminar
            $respuesta = $this->contacto_model->eliminar_contacto($idcontacto);
        }
        if ($respuesta <> "") {
            echo $respuesta;
        }
    }

}