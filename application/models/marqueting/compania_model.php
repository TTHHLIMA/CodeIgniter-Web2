<?php

class Compania_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

//HH: Botones de navegacion Compania     

    public function buscar_compania_primero() {
        $query = $this->db->query("SELECT * FROM compania order by idcompania asc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_compania_siguiente($idcompania_actual) {
        $query = $this->db->query("SELECT * FROM compania WHERE idcompania > '" . $idcompania_actual . "' order by idcompania asc  LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_compania_ultimo() {
        $query = $this->db->query("SELECT * FROM compania order by idcompania desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_compania_anterior($idcompania_actual) {
        $query = $this->db->query("SELECT * FROM compania WHERE idcompania < '" . $idcompania_actual . "' order by idcompania desc  LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    //HH: Botones de navegacion Contactos 

    public function buscar_contacto_primero($idcompania_actual) {
        $query = $this->db->query("SELECT * FROM contacto where idcompania = '" . $idcompania_actual . "' order by idcontacto asc LIMIT 0,1");
        //echo "SELECT * FROM contacto where idcompania = '".$idcompania_actual."' order by idcontacto asc LIMIT 0,1";
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_contacto_ultimo($idcompania_actual) {
        $query = $this->db->query("SELECT * FROM contacto where idcompania = '" . $idcompania_actual . "' order by idcontacto desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_contacto_siguiente($idcompania_actual, $idcontacto_actual) {
        $query = $this->db->query("select * from contacto where idcontacto IN (SELECT idcontacto FROM contacto where idcompania = '" . $idcompania_actual . "') and  idcontacto > '" . $idcontacto_actual . "' order by idcontacto asc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_contacto_anterior($idcompania_actual, $idcontacto_actual) {
        $query = $this->db->query("select * from contacto where idcontacto IN (SELECT idcontacto FROM contacto where idcompania = '" . $idcompania_actual . "') and  idcontacto < '" . $idcontacto_actual . "' order by idcontacto desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_compania_idcompania($idcompania) {
        $query = $this->db->query("SELECT * FROM compania where idcompania = '" . $idcompania . "' LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_contacto_idcontacto($idcontacto_actual) {
        $query = $this->db->query("select * from contacto where idcontacto = '" . $idcontacto_actual . "'  LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }    
    
    function buscar_compania_nombre($nombre) {
        //$this->db->where('idcompania', $idcompania);
        $sql = "SELECT idcompania, nombre, (select nombre from pais where codigo=pais) as 'pais', calle, lugar, Codigo, web FROM compania WHERE nombre LIKE ? order by nombre limit 20";
        $query = $this->db->query($sql, array($nombre . "%"));
        //$query = $this->db->get('compania');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function listar_paises(){
        $query = $this->db->query("select codigo , nombre from pais order by nombre asc");
            if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        
    }
    
    //HH: Mantenimiento
    function actualizar_compania($array, $idcompania = "") {
        $res = "";
        $mensaje = "";
        $error = "";
        if ($idcompania <> "") {
            $error = 0; //HH: flag para saber si esta vacio el id
            //$res = $this->db->update('compania', $array, array('idcompania' => $idcompania));
        } else {
            $mensaje = "Error: IdCompania esta vacio. ";
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

    function eliminar_compania($idcompania = "") {
        $res = "";
        $mensaje = "";
        $error = 0; //HH: flag para saber si esta vacio el id

        if ($idcompania <> "") {
            $this->db->where('idcompania', $idcompania);
            $this->db->from('contacto');
            $count =  $this->db->count_all_results();
            if ($count>0){
                $error = 2; //HH: el regitro tiene contactos
                $mensaje ="El Registro tiene Contactos enlazados.";
            } else {
                $res = $this->db->delete('compania', array('idcompania' => $idcompania));
            }
        } else {
            $mensaje = "Error: IdCompania esta vacio. ";
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