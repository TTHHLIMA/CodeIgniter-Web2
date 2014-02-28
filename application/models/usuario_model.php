<?php

class Usuario_model extends CI_Model {

    // HH: creo su contructor
    public function construct() {
        parent::__construct();
        $this->load->database();
    }

    function usuario_normal($usuario, $password) {
        $query = $this->db->query("SELECT * FROM `usuarios` where usuario = '" . $usuario . "' and password = '" . $password . "' limit 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    function usuario_cliente($usuario, $password) {
        $query = $this->db->query("select c.idconsorcio, c.idcompania, c.alias_com, q.idcontacto, q.anrede, q.nombres , q.apellidos , q.techni_forum , q.reportes_tt , c.terminologias , concat(c.alias_com,'-',left(UCase(q.nombres),2) , left(UCase(q.apellidos),2)) as usuario from contacto q, compania c where c.idcompania = q.idcompania and q.idcontacto ='" . $password . "' and c.alias_com ='" . $usuario . "' limit 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}