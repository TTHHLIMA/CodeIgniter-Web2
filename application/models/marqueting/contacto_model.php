<?php

class Contacto_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

    //HH: Mantenimiento

    public function nuevo_idcontacto() {
        $query = $this->db->query("SELECT concat('Q1',right(concat('0000',(substring(idcontacto,2) + 1)),4)) as idcontacto FROM `contacto` order by idcontacto desc limit 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_contacto_idcontacto($idcontacto) {
        $query = $this->db->query("SELECT * FROM contacto where idcontacto = '" . $idcontacto . "'");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function agregar_contacto($array, $idcontacto = "", $idcompania = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($idcontacto <> "") {
            if ($idcompania <> "") {
                $error = 0; //HH: flag para saber si esta vacio el id
                $res = $this->db->insert('contacto', $array);
            } else {
                $mensaje = "Error: IdCompania esta vacio. ";
                $error = 1;
            }
        } else {
            
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

    function actualizar_contacto($array, $idcontacto = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($idcontacto <> "") {
            $error = 0; //HH: flag para saber si esta vacio el id
            $res = $this->db->update('contacto', $array, array('idcontacto' => $idcontacto));
        } else {
            $mensaje = "Error: IdContacto esta vacio. ";
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

    function eliminar_contacto($idcontacto = "") {
        $res = "";
        $mensaje = "";
        $error = 0; //HH: flag para saber si esta vacio el id

        if ($idcontacto <> "") {
            $this->db->where('id_contacto', $idcontacto);
            $this->db->from('requerimientos');
            $count = $this->db->count_all_results();
            if ($count > 0) {
                $error = 2; //HH: el regitro tiene contactos
                $mensaje = "El Registro tiene Requerimientos enlazados.";
            } else {
                $res = $this->db->delete('contacto', array('idcontacto' => $idcontacto));
            }
        } else {
            $mensaje = "Error: IdContacto esta vacio. ";
            $error = 1;
        }

        if (!$res) {
            if ($error === 0) {
                $msg = $this->db->_error_message();
                $num = $this->db->_error_number();
                return "Error(" . $num . ") " . $msg;
            }
            if ($error > 0) {
                return $mensaje;
            }
        } else {
            return false;
        }
    }

}