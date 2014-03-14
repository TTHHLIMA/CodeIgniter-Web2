<?php

class Reportes_model extends CI_Model {

    // HH: creo su contructor
    public function construct() {
        parent::__construct();
        $this->load->database();
    }

    function mostrar_contacto_idcontacto($idcontacto) {
        $query = $this->db->query("select  c.idcontacto, c.idcompania, c.anrede, c.nombres , c.apellidos, c.mail , (select codigo from idiomas where nombre = c.idioma) as xIdioma , c.techni_forum, c.reportes_tt, c.reportes_tt_com , concat(co.alias_com,'-',left(UCase(c.nombres),2) , left(UCase(c.apellidos),2)) as Usuario from contacto c inner join compania co on c.idcompania = co.idcompania Where c.idcontacto='" . $idcontacto . "'");
        //var_dump($query);
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_nombre_firma($idcompania) {
        $query = $this->db->query("select  nombre from compania  where idcompania = '" . $idcompania . "'");
        //var_dump($query);
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    
    
    function mostrar_reporte($idcompania, $filtro = null) {
        if ($filtro != null) {
            $Sql = "
                    SELECT 
                    contacto.idcontacto,
                    concat(contacto.apellidos , ' ' ,  contacto.nombres) as nombre ,
                    compania.idcompania ,
                    cotizacion.idcotizacion , 
                    pedido.idpedido ,
                    pedido.fechaentrega,
                    cotizacion.idioma_origen,
                    cotizacion.idioma_final,
                    cotizacion.word, 
                    cotizacion.excel,
                    cotizacion.ppt ,
                    cotizacion.formato, 
                    cotizacion.cant_combinaciones ,
                    cotizacion.total_euro,
                    cotizacion.total_us,
                    cotizacion.euros,
                    cotizacion.us , 
                    requerimientos.numero_req_cli , 
                    requerimientos.fecha , 
                    pedido.numero_ped_cli, 
                    pedido.fecha_ped_cli , 
                    pedido.fecha_envio , 
                    pedido.term_estrac 
                    FROM compania 
                    INNER JOIN contacto ON compania.idcompania=contacto.idcompania
                    INNER JOIN requerimientos ON contacto.idcontacto=requerimientos.id_contacto 
                    LEFT JOIN cotizacion ON requerimientos.idrequerimiento=cotizacion.idrequerimiento
                    LEFT JOIN pedido ON cotizacion.idcotizacion=pedido.idcotizacion 
                    where 
                    compania.idcompania ='".$idcompania ."'
                     and year(requerimientos.fecha) = '" . $filtro . "' order by requerimientos.fecha desc    ";
            $query = $this->db->query($Sql);
        } else {
            $Sql = "
                    SELECT 
                    contacto.idcontacto,
                    concat(contacto.apellidos , ' ' ,  contacto.nombres) as nombre ,
                    compania.idcompania ,
                    cotizacion.idcotizacion , 
                    pedido.idpedido ,
                    pedido.fechaentrega,
                    cotizacion.idioma_origen,
                    cotizacion.idioma_final,
                    cotizacion.word, 
                    cotizacion.excel,
                    cotizacion.ppt ,
                    cotizacion.formato, 
                    cotizacion.cant_combinaciones ,
                    cotizacion.total_euro,
                    cotizacion.total_us,
                    cotizacion.euros,
                    cotizacion.us , 
                    requerimientos.numero_req_cli , 
                    requerimientos.fecha , 
                    pedido.numero_ped_cli, 
                    pedido.fecha_ped_cli , 
                    pedido.fecha_envio , 
                    pedido.term_estrac 
                    FROM compania 
                    INNER JOIN contacto ON compania.idcompania=contacto.idcompania
                    INNER JOIN requerimientos ON contacto.idcontacto=requerimientos.id_contacto 
                    LEFT JOIN cotizacion ON requerimientos.idrequerimiento=cotizacion.idrequerimiento
                    LEFT JOIN pedido ON cotizacion.idcotizacion=pedido.idcotizacion 
                    where 
                    compania.idcompania ='".$idcompania ."' 
                        order by requerimientos.fecha desc";
            $query = $this->db->query($Sql);
        }
        //var_dump($query);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscar_monto_x_pedido($idpedido) {
        $query = $this->db->query("SELECT detalle_factura.total , facturas.idpedido , facturas.idfactura FROM facturas , detalle_factura where detalle_factura.idfactura = facturas.idfactura and  facturas.estado_factura = 'N' and facturas.idpedido ='" . $idpedido . "'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}