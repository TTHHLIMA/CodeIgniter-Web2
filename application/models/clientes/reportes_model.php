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

    function mostrar_reporte($idcontacto, $filtro = null) {
        if ($filtro != null) {
            $query = $this->db->query("SELECT contacto.idcontacto,concat(contacto.apellidos , ' ' ,  contacto.nombres) as nombre ,compania.idcompania ,cotizacion.idcotizacion , pedido.idpedido ,pedido.fechaentrega,cotizacion.idioma_origen,cotizacion.idioma_final,cotizacion.word, cotizacion.excel,cotizacion.ppt ,cotizacion.formato, cotizacion.cant_combinaciones ,cotizacion.total_euro,cotizacion.total_us,cotizacion.euros,cotizacion.us , requerimientos.numero_req_cli , requerimientos.fecha , pedido.numero_ped_cli, pedido.fecha_ped_cli , pedido.fecha_envio , pedido.term_estrac FROM compania, contacto, requerimientos, cotizacion, pedido   where pedido.idcotizacion = cotizacion.idcotizacion and cotizacion.idrequerimiento = requerimientos.idrequerimiento and cotizacion.euros = 'S' and requerimientos.id_contacto= contacto.idcontacto and contacto.idcompania = compania.idcompania and compania.idcompania in (select distinct (k.idcompania) from contacto as k where k.reportes_tt = 1 or k.reportes_tt_com = 1 ) and idcontacto ='" . $idcontacto . "' and year(pedido.fecha_envio) = '".$filtro."' order by requerimientos.fecha desc");
        } else {
            $query = $this->db->query("SELECT contacto.idcontacto,concat(contacto.apellidos , ' ' ,  contacto.nombres) as nombre ,compania.idcompania ,cotizacion.idcotizacion , pedido.idpedido ,pedido.fechaentrega,cotizacion.idioma_origen,cotizacion.idioma_final,cotizacion.word, cotizacion.excel,cotizacion.ppt ,cotizacion.formato, cotizacion.cant_combinaciones ,cotizacion.total_euro,cotizacion.total_us,cotizacion.euros,cotizacion.us , requerimientos.numero_req_cli , requerimientos.fecha , pedido.numero_ped_cli, pedido.fecha_ped_cli , pedido.fecha_envio , pedido.term_estrac FROM compania, contacto, requerimientos, cotizacion, pedido   where pedido.idcotizacion = cotizacion.idcotizacion and cotizacion.idrequerimiento = requerimientos.idrequerimiento and cotizacion.euros = 'S' and requerimientos.id_contacto= contacto.idcontacto and contacto.idcompania = compania.idcompania and compania.idcompania in (select distinct (k.idcompania) from contacto as k where k.reportes_tt = 1 or k.reportes_tt_com = 1 ) and idcontacto ='" . $idcontacto . "' order by requerimientos.fecha desc");
        }
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