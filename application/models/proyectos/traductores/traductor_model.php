<?php

class Traductor_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }
    
     function listar_pedidos_abiertos() {
        $Sql = "";
        $Sql = "select 
                        distinct compania.idcompania , compania.alias_com , contacto.idcontacto, 
                        requerimientos.idrequerimiento, cotizacion.idcotizacion, 
                        cotizacion.idioma_origen, cotizacion.cant_combinaciones, cotizacion.idioma_final , 
                        pedido.idpedido
                from 
                        compania , contacto, requerimientos, cotizacion , pedido 
                where 
                        compania.idcompania = contacto.idcompania and 
                        contacto.idcontacto = requerimientos.id_contacto and 
                        requerimientos.idrequerimiento = cotizacion.idrequerimiento and 
                        cotizacion.idcotizacion = pedido.idcotizacion and 
                pedido.proyectoterminado = 'N'	
                order by compania.alias_com";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result(); // encontrado
        } else {
            return false; // no encontrado
        }
    }
    
    
    function listar_traducciones($idpedido){
        $sql="";
        $sql = "select proyectos.idproyecto , proyectos.idiomaorigen , proyectos.idioma_final , (select concat(apellidos ,', ', nombres) from traductores where idtraductor = proyectos.idtraductor) as traductor , proyectos.estado , proyectos.ftp_zip from  pedido , proyectos Where  proyectos.traduccion = 'S' and  proyectos.idpedido = '".$idpedido."' group by proyectos.idioma_final order by proyectos.idioma_final";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0){
            return $query->result();
        } else {
            return false;
        }
    }
    
    function listar_correciones($idpedido){
        $sql="";
        $sql = "select proyectos.idproyecto , proyectos.idiomaorigen , proyectos.idioma_final , (select concat(apellidos ,', ', nombres) from traductores where idtraductor = proyectos.idtraductor) as traductor , proyectos.estado , proyectos.ftp_zip from  pedido , proyectos Where   proyectos.lectorado = 'S' and proyectos.traduccion = 'N'  and  proyectos.idpedido = '".$idpedido."' group by proyectos.idioma_final order by proyectos.idioma_final";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0){
            return $query->result();
        } else {
            return false;
        }        
    }

}