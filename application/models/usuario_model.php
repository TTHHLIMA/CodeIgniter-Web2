<?php
class Usuario_model extends CI_Model{
    // HH: creo su contructor
    public function construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function usuario_normal($usuario, $password)
    {
        $query = $this->db->query("SELECT * FROM `usuarios` where usuario = '".$usuario."' and password = '".$password."' limit 0,1");
        if ($query->num_rows()===1)
            {
                return $query->result();
            } else {
                return false;
            }
    }
    
    
}