<?php

class Llamada_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

    //HH: Mantenimiento

    function agregar_llamada($array, $idcontacto = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($idcontacto <> "") {
            $error = 0; //HH: flag para saber si esta vacio el id
            $res = $this->db->insert('fecha_llamada_contacto', $array);
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

    function actualizar_llamada($array, $idllamada = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($idllamada <> "") {
            $error = 0; //HH: flag para saber si esta vacio el id
            $res = $this->db->update('fecha_llamada_contacto', $array, array('idllamada' => $idllamada));
        } else {
            $mensaje = "Error: IdLlamada esta vacio. ";
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

    function eliminar_llamada($idllamada = "") {
        $res = "";
        $mensaje = "";
        $error = 0; //HH: flag para saber si esta vacio el id

        if ($idllamada <> "") {
            $res = $this->db->delete('fecha_llamada_contacto', array('idllamada' => $idllamada));
        } else {
            $mensaje = "Error: IdLlamada esta vacio. ";
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

//HH: Botones de navegacion Contactos 

    public function buscar_llamada_primero($idcontacto_actual) {
        $query = $this->db->query("SELECT * FROM fecha_llamada_contacto where idcontacto = '" . $idcontacto_actual . "' order by idllamada asc LIMIT 0,1");
        //echo "SELECT * FROM contacto where idcompania = '".$idcompania_actual."' order by idcontacto asc LIMIT 0,1";
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_llamada_ultimo($idcontacto_actual) {
        $query = $this->db->query("SELECT * FROM fecha_llamada_contacto where idcontacto = '" . $idcontacto_actual . "' order by idllamada desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_llamada_siguiente($idllamada_actual, $idcontacto_actual) {
        $query = $this->db->query("select * from fecha_llamada_contacto where idllamada IN (SELECT idllamada FROM fecha_llamada_contacto where idcontacto = '" . $idcontacto_actual . "') and  idllamada > '" . $idllamada_actual . "' order by idllamada asc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_llamada_anterior($idllamada_actual, $idcontacto_actual) {
        $query = $this->db->query("select * from fecha_llamada_contacto where idllamada IN (SELECT idllamada FROM fecha_llamada_contacto where idcontacto = '" . $idcontacto_actual . "') and  idllamada < '" . $idllamada_actual . "' order by idllamada desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_llamada_idllamada($idllamada_actual) {
        $query = $this->db->query("select * from fecha_llamada_contacto where idllamada = '" . $idllamada_actual . "'  LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
        function total_registros_llamada($idcontacto) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM fecha_llamada_contacto where idcontacto = '" . $idcontacto . "'");
        $row = $query->row();
        if ($query->num_rows() > 0) {
            return $row->total;
        } else {
            return false;
        }
    }

}