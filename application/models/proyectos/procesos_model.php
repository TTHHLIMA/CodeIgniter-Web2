<?php

class Procesos_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

//HH: Botones de navegacion Compania     

    public function buscar_tareas_nivel_filtro($filtro = "") {

        if ($filtro === "") {
            $xfiltro = " ";
        } else {
            $xfiltro = "  and  r.coordinador='" . $filtro . "' ";
        }

        $Sql = "SELECT r.id, r.pedido,
                r.alias,
                r.coordinador,
                r.proceso,
                r.usuario,
                (select usuarios_estado.descripcion from usuarios_estado where usuarios_estado.idusuarios_estado = r.estado ) as estado,
                r.fecha,
                r.hora,
                r.proyecto_terminado, 
                r.visto 
                FROM  `r_cambios_estados` as r , pedido as p 
                where r.pedido = p.idpedido and p.proyectoterminado ='N' 
                " . $xfiltro . " 
                 order by r.fecha desc, r.hora desc";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function actualizar_r_cambios_estados($array, $xid = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($xid <> "") {
            $error = 0; //HH: flag para saber si esta vacio el id
            $res = $this->db->update('r_cambios_estados', $array, array('id' => $xid));
        } else {
            $mensaje = "Error: xID esta vacio. ";
            $error = 1;
        }

        if (!$res) {
            if ($error === 0) {
                $msg = $this->db->_error_message();
                $num = $this->db->_error_number();
                return "Error(" . $num . ") " . $msg;
            }
            if ($error === 1) {
                return $mensaje;
            }
        } else {
            return false;
        }
    }

    function buscar_proceso_idpedido($idpedido = "") {
        $Sql = "";
        $Sql = "SELECT  pedido.idpedido ,compania.alias_com , 
                 (select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador , 
                 DATE_FORMAT(pedido.fechaentrega, '%d/%m/%Y') AS fechaentrega, 
                 pedido.realizadopor1 as salto_linea, 
                 pedido.realizadopor2 as formateo,  
                 pedido.realizadopor3 as pre_traduccion, 
                 pedido.realizadopor7 as traduccion , 
                 cotizacion.cant_combinaciones ,
                 cotizacion.idioma_origen , 
                 cotizacion.idioma_final , 
                 pedido.realizadopor4 as traduccion_final , 
                 pedido.realizadopor5 as formato_final , 
                 pedido.realizadopor6 ,  
                 pedido.realizadopor8 as correccion  
                 FROM compania, contacto, requerimientos, cotizacion,  pedido where compania.idcompania = contacto.idcompania and 
                 contacto.idcontacto = requerimientos.id_contacto and requerimientos.idrequerimiento = cotizacion.idrequerimiento and cotizacion.idcotizacion = pedido.idcotizacion and 
                 pedido.proyectoterminado='N' and pedido.idpedido='" . $idpedido . "' order by  pedido.fechaentrega limit 0,1";

        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //HH: consultas

    function consultar_Pedido_Salto($idpedido = "") {
        $Sql = "";
        $Sql = "select idpedido , realizadopor1 , hora1 , PDFGlobal , saltolinea , chekearttx , observacion5 , proc_conf_salto_linea
				from pedido where idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consultar_userformPrepFormateo($idpedido = "") {
        $Sql = "";
        $Sql = "select idpedido , realizadopor2 , hora2 , editacionformateo , ttx1 , realizadopor6 , hora3,  editaciontextofoto, observacion1, proc_conf_formateo
				from pedido where idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consultar_userformPrepPreTrad($idpedido = "") {
        $Sql = "";
        $Sql = "select idpedido , realizadopor3 , hora4 , analisistm , 1roexporteus99 as proexporteus99 , pretransl75 , traducir100,
					2doexporteus99 as sdoexporteus99,
					borrarunidadesnotraducibles,
					alfabetic,
					rtffortrans,
					crearttx,
					analisisfinal,
					preparacionter,
					observacion2,
					proc_conf_pre_traduccion
				from pedido where idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consultar_userformPrepTrad($idpedido = "") {
        $Sql = "";
        $Sql = "select idpedido , realizadopor7 , Mskhora7, Chktraduccion, Chkarchivofinal, txtobservacion7 , proc_conf_traduccion	from pedido where idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consultar_userformPrepCorre($idpedido = "") {
        $Sql = "";
        $Sql = "select idpedido , realizadopor8 , observacion8 , proc_conf_correccion	from pedido where idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consultar_userformVerFinTrad($idpedido = "") {
        $Sql = "";
        $Sql = "select idpedido , actualizaciontm, realizadopor4, horafinal1, traduccionfinal, cleanup, observacion3, proc_conf_traduccion_final from pedido where idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consultar_userformVerFinFormFin($idpedido = "") {
        $Sql = "";
        $Sql = "select idpedido , 
	realizadopor5, 
	horafinal2,
	formatofinal,
	cambiaridioma,
	actualizarindice1,
	pocisionamiento,
	estiloletra,
	mayusculaminuscula,
	numerodecimales,
	codigosfinal,
	actualizarindice2,
	verificarmayusmin,
	observacion4,
	proc_conf_formato_final
	from pedido where idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //HH: filtro de usuarios

    function consultar_user($nivel, $iduser) {
        if ($nivel === "1") {
            $Sql = "";
            $Sql = "select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where e.idestado = ue.idestado order by ue.id_usuarios, e.orden ";
        }
        if ($nivel === "2") {
            $Sql = "";
            $Sql = "select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ";
        }
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function listar_user() {
        $Sql = "";
        $Sql = "select ue.id_usuarios ,ue.idusuarios_estado , ue.descripcion ,ue.idestado , e.orden  from usuarios_estado ue, estado e where e.idestado = ue.idestado order by ue.id_usuarios, e.orden ";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //HH: busquedas


    function buscar_userSaltoLinea($iduser, $idpedido) {
        $Sql = "";
        $Sql = "select * from pedido where realizadopor1 in (select idusuarios_estado from usuarios_estado where id_usuarios = '" . $iduser . "' ) and  idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscar_userFormateo($iduser, $idpedido) {
        $Sql = "";
        $Sql = "select * from pedido where realizadopor2 in (select idusuarios_estado from usuarios_estado where id_usuarios = '" . $iduser . "' ) and  idpedido='" . $idpedido . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscar_userPreTraduccion($iduser, $idpedido) {
        $Sql = "";
        $Sql = "select * from pedido where realizadopor3 in (select idusuarios_estado from usuarios_estado where id_usuarios = '" . $iduser . "' ) and  idpedido='" . $idpedido . "'";
        //echo $Sql;
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscar_userTraduccion($iduser, $idpedido) {
        $Sql = "";
        $Sql = "select * from pedido where realizadopor7 in (select idusuarios_estado from usuarios_estado where id_usuarios = '" . $iduser . "' ) and  idpedido='" . $idpedido . "'";
        //echo $Sql;
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscar_userCorreccion($iduser, $idpedido) {
        $Sql = "";
        $Sql = "select * from pedido where realizadopor8 in (select idusuarios_estado from usuarios_estado where id_usuarios = '" . $iduser . "' ) and  idpedido='" . $idpedido . "'";
        //echo $Sql;
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscar_userTraduccionFinal($iduser, $idpedido) {
        $Sql = "";
        $Sql = "select * from pedido where realizadopor4 in (select idusuarios_estado from usuarios_estado where id_usuarios = '" . $iduser . "' ) and  idpedido='" . $idpedido . "'";
        //echo $Sql;
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscar_userFormatoFinal($iduser,$idpedido) {
        $Sql = "";
        /*$Sql = "SELECT distinct pedido.idpedido as idpedido,
                                     compania.alias_com as alias, 
                                     (select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador,
                                     pedido.realizadopor1 as salto_linea, 
                                     pedido.realizadopor2 as formateo,  
				     pedido.realizadopor3 as pre_traduccion,
                                     pedido.realizadopor7 as traduccion , 
                                     pedido.realizadopor4 as traduccion_final , 
                                     pedido.realizadopor5 as formato_final , 
                                     pedido.realizadopor8 as correccion, 
                                     pedido.proyectoterminado
                    FROM  compania, contacto, requerimientos, cotizacion,  pedido 
                    where compania.idcompania = contacto.idcompania and 
                                     contacto.idcontacto = requerimientos.id_contacto and 
                                     requerimientos.idrequerimiento = cotizacion.idrequerimiento and  
                                     cotizacion.idcotizacion = pedido.idcotizacion and 
                                     pedido.proyectoterminado='N'  and  
                                     pedido.idpedido='" . $idpedido . "'";
         * 
         */
        $Sql = "";
        $Sql = "select * from pedido where realizadopor5 in (select idusuarios_estado from usuarios_estado where id_usuarios = '" . $iduser . "' ) and  idpedido='" . $idpedido . "'";

        //echo $Sql;
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function busca_listar_procesos_admin_filtro($iduser, $inic_coordinador) {
        $Sql = "";
        $xCoordValue="";
        //echo "model: iduser=" . $iduser . "  - inic_coordinador=" . $inic_coordinador;
        if ($inic_coordinador == 'JSM') {
            $xCoordValue = " and pedido.coordinador='Juan Salas Marin' ";
        }
        if ($inic_coordinador == 'FSM') {
            $xCoordValue = " and pedido.coordinador='Flormira Salas Marin' ";
        }
        if ($inic_coordinador == '') {
            $xCoordValue = "";
        }
        $Sql = "SELECT  pedido.idpedido ,
                                                compania.alias_com , 
						(select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador , 
						DATE_FORMAT(pedido.fechaentrega, '%d/%m/%Y') AS fechaentrega, 
                                                pedido.realizadopor1 as salto_linea, 
                                                pedido.realizadopor2 as formateo,  
						pedido.realizadopor3 as pre_traduccion, 
                                                pedido.realizadopor7 as traduccion , 
                                                cotizacion.cant_combinaciones ,
                                                cotizacion.idioma_origen , 
                                                cotizacion.idioma_final , 
                                                pedido.realizadopor4 as traduccion_final , 
                                                pedido.realizadopor5 as formato_final , 
                                                pedido.realizadopor6 ,  
                                                pedido.realizadopor8 as correccion                                                
                                                                 FROM compania, contacto, requerimientos, cotizacion,  pedido where compania.idcompania = contacto.idcompania and 
								 contacto.idcontacto = requerimientos.id_contacto and requerimientos.idrequerimiento = cotizacion.idrequerimiento and cotizacion.idcotizacion = pedido.idcotizacion and 
								 pedido.proyectoterminado='N' " . $xCoordValue . "
								 and
								(pedido.`realizadopor1` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor2` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor3` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor4` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor5` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor7` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
								pedido.`realizadopor8` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden )  )
								 order by  pedido.fechaentrega";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function busca_listar_procesos_admin_todos($inic_coordinador) {
        $Sql = "";
        if ($inic_coordinador == 'JSM') {
            $xCoordValue = " and pedido.coordinador='Juan Salas Marin' ";
        }
        if ($inic_coordinador == 'FSM') {
            $xCoordValue = " and pedido.coordinador='Flormira Salas Marin' ";
        }
        if ($inic_coordinador == '' || $inic_coordinador == 'Todos') {
            $xCoordValue = "";
        }
                        $Sql = "SELECT  pedido.idpedido ,
                                compania.alias_com , 
                                (select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador , 
                                 DATE_FORMAT(pedido.fechaentrega, '%d/%m/%Y') AS fechaentrega, 
                                 pedido.realizadopor1 as salto_linea, 
                                 pedido.realizadopor2 as formateo,  
                                 pedido.realizadopor3 as pre_traduccion, 
                                 pedido.realizadopor7 as traduccion , 
                                 cotizacion.cant_combinaciones ,
                                 cotizacion.idioma_origen , 
                                 cotizacion.idioma_final , 
                                 pedido.realizadopor4 as traduccion_final , 
                                 pedido.realizadopor5 as formato_final , 
                                 pedido.realizadopor6 ,  
                                 pedido.realizadopor8 as correccion                                                
                                         FROM compania, contacto, requerimientos, cotizacion,  pedido where compania.idcompania = contacto.idcompania and 
                                         contacto.idcontacto = requerimientos.id_contacto and requerimientos.idrequerimiento = cotizacion.idrequerimiento and cotizacion.idcotizacion = pedido.idcotizacion and 
                                         pedido.proyectoterminado='N' " . $xCoordValue . " order by  pedido.fechaentrega";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }    
    
    function busca_listar_procesos_usuario_todos($iduser="") {
        $Sql = "";
        $Sql = "SELECT distinct pedido.idpedido ,
                compania.alias_com , 
                                (select iniciales from coordinador where coordinador.nombre = pedido.coordinador limit 0,1 ) as coordinador , 
                                DATE_FORMAT(pedido.fechaentrega, '%d/%m/%Y') AS fechaentrega, 
                                pedido.realizadopor1 as salto_linea, 
                                pedido.realizadopor2 as formateo,  
                                pedido.realizadopor3 as pre_traduccion, 
                                pedido.realizadopor7 as traduccion , 
                                cotizacion.cant_combinaciones ,
                                cotizacion.idioma_origen , 
                                cotizacion.idioma_final , 
                                pedido.realizadopor4 as traduccion_final , 
                                pedido.realizadopor5 as formato_final , 
                                pedido.realizadopor6 , 
                                pedido.realizadopor8 as correccion,
                        proc_conf_salto_linea,
                        proc_conf_formateo,
                        proc_conf_pre_traduccion,
                        proc_conf_traduccion,
                        proc_conf_correccion,
                        proc_conf_traduccion_final,
                        proc_conf_formato_final,   
                        Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor1), 0) as user_salto_linea,
                        Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor2), 0) as user_formateo,
                        Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor3), 0) as user_pre_traduccion,
                        Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor7), 0) as user_traduccion,
                        Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor8), 0) as user_correccion,
                        Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor4), 0) as user_traduccion_final,
                        Coalesce((select id_usuarios from usuarios_estado where idusuarios_estado = realizadopor5), 0) as user_formato_final,
                        Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor1), 0) as estado_salto_linea,
                        Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor2), 0) as estado_formateo,
                        Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor3), 0) as estado_pre_traduccion,
                        Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor7), 0) as estado_traduccion,
                        Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor8), 0) as estado_correccion,
                        Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor4), 0) as estado_traduccion_final,
                        Coalesce((select idestado from usuarios_estado where idusuarios_estado = realizadopor5), 0) as estado_formato_final	                                                
                                                        FROM  compania, contacto, requerimientos, cotizacion,  pedido where compania.idcompania = contacto.idcompania and contacto.idcontacto = requerimientos.id_contacto and 
                                                        requerimientos.idrequerimiento = cotizacion.idrequerimiento and  cotizacion.idcotizacion = pedido.idcotizacion and pedido.proyectoterminado='N' and
                                                        (
                                                        pedido.`realizadopor1` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
                                                        pedido.`realizadopor2` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
                                                        pedido.`realizadopor3` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
                                                        pedido.`realizadopor4` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
                                                        pedido.`realizadopor5` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
                                                        pedido.`realizadopor7` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden ) or
                                                        pedido.`realizadopor8` IN (select ue.idusuarios_estado from usuarios_estado ue, estado e where e.idestado = ue.idestado and ue.id_usuarios ='" . $iduser . "' order by ue.id_usuarios, e.orden )      
                                                                                                                )
                                                        order by  pedido.fechaentrega";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }    
    
    
    
    
    function buscar_userReporteProceso($iduser, $idpedido) {
        $Sql = "";
        $Sql = "select * from pedido where realizadopor5 in (select idusuarios_estado from usuarios_estado where id_usuarios = '" . $iduser . "' ) and  idpedido='" . $idpedido . "'";
        //echo $Sql;
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function buscar_estado_mostrarInicialEstado($estado) {
        $Sql = "";
        $Sql = "select ue.descripcion , ue.idestado  from usuarios_estado ue where  ue.idusuarios_estado = '" . $estado . "'";
        
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function agregar_r_cambios_estados($array) {
        $res = "";
        $res = $this->db->insert('r_cambios_estados', $array);


        if (!$res) {
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            return "Error(" . $num . ") " . $msg;
        } else {
            return false;
        }
    }

    //HH: update de procesos




    function upd_procesos_estados($array, $idpedido = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($idpedido <> "") {
            $error = 0; //HH: flag para saber si esta vacio el id
            $res = $this->db->update('pedido', $array, array('idpedido' => $idpedido));
        } else {
            $mensaje = "Error: IdPedido esta vacio. ";
            $error = 1;
        }

        if (!$res) {
            if ($error === 0) {
                $msg = $this->db->_error_message();
                $num = $this->db->_error_number();
                return "Error(" . $num . ") " . $msg;
            }
            if ($error === 1) {
                return $mensaje;
            }
        } else {
            return false;
        }
    }

}

?>
