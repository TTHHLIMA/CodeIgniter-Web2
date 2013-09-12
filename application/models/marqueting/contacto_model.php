<?php

class Contacto_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

    function mostrarContacto() {
        $query = $this->db->get('contacto');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        } else {
            return false;
        }
    }

    function buscarContactoIdCompania($idcompania) {
        $this->db->where('idcompania', $idcompania);
        $query = $this->db->get('contacto');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

//obtenemos el total de filas para hacer la paginación
    function count_contacto_compania($idcompania) {
        //$consulta = $this->db->get('compania');
        //return $consulta->num_rows();
                return $this->db->count_all_results('contacto');
    }

    public function list_mensajes($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('compania');
        return $query->result();
    }

}