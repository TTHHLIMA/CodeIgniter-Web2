<?php

class Procesos_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

//HH: Botones de navegacion Compania     

    public function buscar_tareas_nivel_filtro($filtro="") {

        if ($filtro===""){
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
    
    

}

?>
