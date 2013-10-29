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
        $this->load->model('marqueting/llamada_model');
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

//HH: botones de navegacion llamadas
     //HH: botones de navegacion contactos
    public function buscar_llamada_siguiente($idllamada_actual = '', $idcontacto_actual = '') {
        $data['llamada'] = $this->llamada_model->buscar_llamada_siguiente($idllamada_actual, $idcontacto_actual);
        //var_dump($data['llamada']);
        if ($data['llamada'] === False) {
            $data['llamada'] = $this->llamada_model->buscar_llamada_idllamada($idllamada_actual);
        }
        $data['countLlamadas'] = $this->llamada_model->total_registros_llamada($idcontacto_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioLlamadas');
    }

    public function buscar_llamada_anterior($idllamada_actual = '', $idcontacto_actual = '') {
        $data['llamada'] = $this->llamada_model->buscar_llamada_anterior($idllamada_actual, $idcontacto_actual);
        if ($data['llamada'] === False) {
            $data['llamada'] = $this->llamada_model->buscar_llamada_idllamada($idllamada_actual);
        }
        $data['countLlamadas'] = $this->llamada_model->total_registros_llamada($idcontacto_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioLlamadas');
    }

    public function buscar_llamada_ultimo($idcontacto_actual = '') {
        $data['llamada'] = $this->llamada_model->buscar_llamada_ultimo($idcontacto_actual);
        $data['countLlamadas'] = $this->llamada_model->total_registros_llamada($idcontacto_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioLlamadas');
    }

    public function buscar_llamada_primero($idcontacto_actual = '') {
        $data['llamada'] = $this->llamada_model->buscar_llamada_primero($idcontacto_actual);
        $data['countLlamadas'] = $this->llamada_model->total_registros_llamada($idcontacto_actual);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioLlamadas');
    }

    
    public function count_llamadas($idcontacto) {
        echo $this->llamada_model->total_registros_llamada($idcontacto);
    }
    
    
    public function formulario_llamadas($idcontacto = "") {
        $data['llamada'] = NULL;
        $data['countLlamadas'] = $this->llamada_model->total_registros_llamada($idcontacto);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioLlamadas');
    }    
    
     public function buscar_llamadas_idllamada($idcontacto = "", $idllamada = "") {
        $data['llamada'] = $this->llamada_model->buscar_llamada_idllamada($idllamada);
        $data['countLlamadas'] = $this->llamada_model->total_registros_llamada($idcontacto);
        $this->load->vars($data);
        $this->load->view('marqueting/formularioLlamadas');
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
        $techni_forum = ($this->input->post("chktechniforum") === "on") ? "1" : "0"; //HH: Permisos
        $reportes_tt = ($this->input->post("chkreportett") === "on") ? "1" : "0"; //HH: Permisos
        $exportado = '0';
        $retirado = ($this->input->post("chkretirado") === "on") ? "1" : "0";
        $reportes_tt_com = ($this->input->post("chkreportettcom") === "on") ? "1" : "0"; //HH: Permisos
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
                'techni_forum' => $techni_forum,
                'reportes_tt' => $reportes_tt,
                'retirado' => $retirado,
                'reportes_tt_com' => $reportes_tt_com,
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

    function proceso_mantenimiento_llamada($opcion = "", $idcontacto = "") {
        //var_dump($idcontacto);
        $idllamada = $this->input->post("txtidLlamada");
        $xidcontacto = ($this->input->post("txtXidContacto") === "") ? $idcontacto : $this->input->post("txtXidContacto");
        $usuario = $this->input->post("cbousuario1");
        $fecha_llamada = $this->input->post("txtfecha_llamada");
        $fecha_carta_html = "0000-00-00"; //HH: cartas html directa
        $nota = $this->input->post("txtnotaContacto");
        $volver_llamar = $this->input->post("txtvolver_llamar");
        $fecha_cdirecta1_1 = "0000-00-00"; //HH: cartas html indirecta
        $chkCA1 = ($this->input->post("chkCa1") === "on") ? "1" : "0";
        $chkCA2 = ($this->input->post("chkCa2") === "on") ? "1" : "0";
        $chkCA3 = ($this->input->post("chkCa3") === "on") ? "1" : "0";
        $chkCC1 = ($this->input->post("chkCc1") === "on") ? "1" : "0";
        $chkCC2 = ($this->input->post("chkCc2") === "on") ? "1" : "0";
        $chkCD1 = ($this->input->post("chkCd1") === "on") ? "1" : "0";
        $chkCD2 = ($this->input->post("chkCd2") === "on") ? "1" : "0";
        $info_email = $this->input->post("txtprecio_email");
        $precio_email = $this->input->post("txtinfo_email");

        //var_dump($this->input->post("txtidContacto"));
        
        
        if ($opcion === "1") {//HH: agregar
            $idllamada = "";
            //echo "idcontacto:" . $idcontacto;
            $dataLlamada = array(
                'idllamada' => $idllamada,
                'idcontacto' => $xidcontacto,
                'usuario' => $usuario,
                'fecha_llamada' => $fecha_llamada,
                'fecha_carta_html' => $fecha_carta_html,
                'nota' => $nota,
                'volver_llamar' => $volver_llamar,
                'fecha_cdirecta1_1' => $fecha_cdirecta1_1,
                'chkCA1' => $chkCA1,
                'chkCA2' => $chkCA2,
                'chkCA3' => $chkCA3,
                'chkCC1' => $chkCC1,
                'chkCC2' => $chkCC2,
                'chkCD1' => $chkCD1,
                'chkCD2' => $chkCD2,
                'info_email' => $info_email,
                'precio_email' => $precio_email
            );
            $respuesta = $this->llamada_model->agregar_llamada($dataLlamada, $idcontacto);
        }
        if ($opcion === "2") { //HH: actualizar
            $dataLlamada = array(
                'idcontacto' => $xidcontacto,
                'usuario' => $usuario,
                'fecha_llamada' => $fecha_llamada,
                'fecha_carta_html' => $fecha_carta_html,
                'nota' => $nota,
                'volver_llamar' => $volver_llamar,
                'fecha_cdirecta1_1' => $fecha_cdirecta1_1,
                'chkCA1' => $chkCA1,
                'chkCA2' => $chkCA2,
                'chkCA3' => $chkCA3,
                'chkCC1' => $chkCC1,
                'chkCC2' => $chkCC2,
                'chkCD1' => $chkCD1,
                'chkCD2' => $chkCD2,
                'info_email' => $info_email,
                'precio_email' => $precio_email
            );
            $respuesta = $this->llamada_model->actualizar_llamada($dataLlamada, $idllamada);
        }
        if ($opcion === "3") { //HH: Eliminar
            $respuesta = $this->llamada_model->eliminar_llamada($idllamada);
        }
        if ($respuesta <> "") {
            echo $respuesta;
        }
    }

}