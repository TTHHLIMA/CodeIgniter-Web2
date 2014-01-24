<?php

class Operador_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

//HH: Botones de navegacion Operador     

    public function buscar_operador_primero() {
        $query = $this->db->query("SELECT * FROM operador order by codigo asc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_operador_siguiente($codigo_actual) {
        $query = $this->db->query("SELECT * FROM operador WHERE codigo > '" . $codigo_actual . "' order by codigo asc  LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_operador_ultimo() {
        $query = $this->db->query("SELECT * FROM operador order by codigo desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_operador_anterior($codigo_actual) {
        $query = $this->db->query("SELECT * FROM operador WHERE codigo < '" . $codigo_actual . "' order by codigo desc  LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function total_de_registros($tabla = "") {
        $num = $this->db->count_all($tabla);
        if ($num > 0) {
            return $num;
        } else {
            return false;
        }
    }

    public function buscar_operador_codigo($codigo_actual) {
        $query = $this->db->query("SELECT * FROM operador where codigo = '" . $codigo_actual . "' LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }


//HH: Botones de navegacion Llamada     

    public function buscar_llamada_primero($codigo_actual) {
        $query = $this->db->query("SELECT * FROM registros where codigo = '" . $codigo_actual . "' order by idregistro asc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_llamada_siguiente($codigo_actual, $idregistro_actual) {
        $query = $this->db->query("select * from registros where idregistro IN (SELECT idregistro FROM registros where codigo = '" . $codigo_actual . "') and  idregistro > '" . $idregistro_actual . "' order by idregistro asc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_llamada_ultimo($codigo_actual) {
        $query = $this->db->query("SELECT * FROM registros where codigo = '" . $codigo_actual . "' order by idregistro desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_llamada_anterior($codigo_actual, $idregistro_actual) {
        $query = $this->db->query("select * from registros where idregistro IN (SELECT idregistro FROM registros where codigo = '" . $codigo_actual . "') and  idregistro < '" . $idregistro_actual . "' order by idregistro desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_llamada_idregistro($idregistro_actual) {
        $query = $this->db->query("select * from registros where idregistro = '" . $idregistro_actual . "'  LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
     function total_registros_llamadas($codigo_actual) {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM registros where codigo = '" . $codigo_actual . "'");
        $row = $query->row();
        if ($query->num_rows() > 0) {
            return $row->total;
        } else {
            return false;
        }
    }   
    
    
    
    //HH: Funciones de mantenimiento Registros
    
    
        function agregar_registros($array, $codigo = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($codigo <> "") {
            $error = 0; //HH: flag para saber si esta vacio el id
            $res = $this->db->insert('registros', $array);
        } else {
            $mensaje = "Error: Codigo esta vacio. ";
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
    
    
     function actualizar_registros($array, $xidregistro = "", $codigo = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($codigo <> "") {
            $error = 0; //HH: flag para saber si esta vacio el id
            $res = $this->db->update('registros', $array, array('idregistro' => $xidregistro , 'codigo' => $codigo));
        } else {
            $mensaje = "Error: Codigo esta vacio. ";
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