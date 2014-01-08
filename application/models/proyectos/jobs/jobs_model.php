<?php

class Jobs_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

    function buscar_orden_trabajo($idproyecto = "", $idtraductor="") {
        $Sql = "";
        $Sql = "SELECT * FROM `confirmacion_orden_trabajo` where idproyecto ='". $idproyecto ."' and idtraductor='" . $idtraductor . "'";
        $query = $this->db->query($Sql);
        if ($query->num_rows() > 0) {
            return $query->result(); // encontrado
        } else {
            return false; // no encontrado
        }
    }
    
    function update_estado_proyecto($array,$idproyecto = "", $idtraductor="") {
        
        $res = "";
        $res = $this->db->update('proyectos', $array, array('idproyecto' => $idproyecto,'idtraductor' => $idtraductor));
        //echo "dato= " . $idproyecto ." - " . $idtraductor ." - " . $this->db->_error_number();
        if (!$res) {
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            return "Error(" . $num . ") " . $msg;
        } else {
            return false;
        }
    }    
    function update_estado_orden_trabajo($array,$idproyecto = "", $idtraductor="") {
        
        $res = "";
        $res = $this->db->update('confirmacion_orden_trabajo', $array, array('idproyecto' => $idproyecto,'idtraductor' => $idtraductor));
        //echo "dato= " . $idproyecto ." - " . $idtraductor ." - " . $this->db->_error_number();
        if (!$res) {
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            return "Error(" . $num . ") " . $msg;
        } else {
            return false;
        }
    }    
}