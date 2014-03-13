<?php

class Campana_model extends CI_Model {

    public function construct() {
        parent::__construct();
        $this->load->database();
    }

//HH: Botones de navegacion Operador     

    public function buscar_Campana_primero() {
        $query = $this->db->query("SELECT * , (select feria.nombre from feria where idferia = confi_feria) as feria , (select pais.nombre from pais where codigo = confi_pais) as xpais FROM marqueting order by id_mar asc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_Campana_siguiente($codigo_actual) {
        $query = $this->db->query("SELECT * , (select feria.nombre from feria where idferia = confi_feria) as feria  , (select pais.nombre from pais where codigo = confi_pais) as xpais FROM marqueting WHERE id_mar > '" . $codigo_actual . "' order by id_mar asc  LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_Campana_ultimo() {
        $query = $this->db->query("SELECT * , (select feria.nombre from feria where idferia = confi_feria) as feria  , (select pais.nombre from pais where codigo = confi_pais) as xpais FROM marqueting order by id_mar desc LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_Campana_anterior($codigo_actual) {
        $query = $this->db->query("SELECT * , (select feria.nombre from feria where idferia = confi_feria) as feria  , (select pais.nombre from pais where codigo = confi_pais) as xpais FROM marqueting WHERE id_mar < '" . $codigo_actual . "' order by id_mar desc  LIMIT 0,1");
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

    public function buscar_Campana_codigo($codigo_actual) {
        $query = $this->db->query("SELECT marqueting.* , (select feria.nombre from feria where idferia = confi_feria) as feria  , (select pais.nombre from pais where codigo = confi_pais) as xpais FROM marqueting where id_mar = '" . $codigo_actual . "' LIMIT 0,1");
        if ($query->num_rows() === 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_tareas($codigo_actual) {
        $query = $this->db->query("SELECT m.id_mar, m.idcompania  as idcompania, case  when c.interesante_link <> '' then concat(m.nom_compania ,' ',' [Web 2]') else m.nom_compania End as firma , (select nombre from feria where feria.idferia = m.idferia) as feria , (select nombre from pais where pais.codigo = m.idpais ) as pais ,m.fecha_ingreso ,  case m.estado  when '0' then 'No Contactado' End as estado , case  when c.interesante_link <> '' then '[Web 2]' End  FROM `marqueting_compania` m , compania c  where id_mar ='" . $codigo_actual . "' and m.estado = '0' and m.idcompania = c.idcompania order by c.interesante_link desc , m.nom_compania ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_pendientes($codigo_actual) {
        $query = $this->db->query("SELECT m.id_mar, m.idcompania  as idcompania, case  when c.interesante_link <> '' then concat(m.nom_compania,' [Web 2]   ',m.fecha_modi , ' ',m.hora_modi) else concat(m.nom_compania,'   ',m.fecha_modi , ' ',m.hora_modi) End as firma , (select nombre from feria where feria.idferia = m.idferia) as feria , (select nombre from pais where pais.codigo = m.idpais ) as pais ,m.fecha_ingreso ,  case m.estado  when '0' then 'Contactado' End as estado FROM `marqueting_compania` m , compania c  where id_mar ='" . $codigo_actual . "' and m.estado = '1' and m.idcompania = c.idcompania order by c.interesante_link desc , m.nom_compania ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function buscar_finalizados($codigo_actual) {
        $query = $this->db->query("SELECT m.id_mar, m.idcompania  as idcompania, case  when c.interesante_link <> '' then concat(m.nom_compania,' [Web 2]   ',m.fecha_modi , ' ',m.hora_modi) else concat(m.nom_compania,'   ',m.fecha_modi , ' ',m.hora_modi) End as firma , (select nombre from feria where feria.idferia = m.idferia) as feria , (select nombre from pais where pais.codigo = m.idpais ) as pais ,m.fecha_ingreso ,  case m.estado  when '0' then 'Contactado' End as estado FROM `marqueting_compania` m , compania c  where id_mar ='" . $codigo_actual . "' and m.estado = '2' and m.idcompania = c.idcompania order by c.interesante_link desc , m.nom_compania ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function procesar_tareas($codigo_actual, $idcompania, $grupo , $orientacion) {
        // $orientacion = 1: ida ; 2: regreso
        if ($grupo === "0") { //Tarea
            if ($orientacion==="1"){ //de Tarea a Pendiente 
                $this->db->query("update marqueting_compania  set estado ='1' , fecha_modi = '" . date("Y-m-d") . "', hora_modi = '" . date("H:i:s") . "' where id_mar = '" . $codigo_actual . "' and idcompania ='" . $idcompania . "' ");
            } 
            if ($orientacion==="0"){ // De Pendiente a Tarea
                $this->db->query("update marqueting_compania  set estado ='0' , fecha_modi = '" . date("Y-m-d") . "', hora_modi = '" . date("H:i:s") . "' where id_mar = '" . $codigo_actual . "' and idcompania ='" . $idcompania . "' ");
            }             
        }
        if ($grupo === "1") { //Pendiente
            if ($orientacion==="1"){ // de Pendiente a Finalizado
                $this->db->query("update marqueting_compania  set estado ='2' , fecha_modi = '" . date("Y-m-d") . "', hora_modi = '" . date("H:i:s") . "' where id_mar = '" . $codigo_actual . "' and idcompania ='" . $idcompania . "' ");
            } 
            if ($orientacion==="0"){ // De Finalizado a Pendiente
                $this->db->query("update marqueting_compania  set estado ='1' , fecha_modi = '" . date("Y-m-d") . "', hora_modi = '" . date("H:i:s") . "' where id_mar = '" . $codigo_actual . "' and idcompania ='" . $idcompania . "' ");
            }  
        }
        if ($grupo === "2") { //Finalizado
            if ($orientacion==="1"){ // de Tarea a Finalizado
                $this->db->query("update marqueting_compania  set estado ='2' , fecha_modi = '" . date("Y-m-d") . "', hora_modi = '" . date("H:i:s") . "' where id_mar = '" . $codigo_actual . "' and idcompania ='" . $idcompania . "' ");
            } 
            if ($orientacion==="0"){ // De Finalizado a Tarea
                $this->db->query("update marqueting_compania  set estado ='0' , fecha_modi = '" . date("Y-m-d") . "', hora_modi = '" . date("H:i:s") . "' where id_mar = '" . $codigo_actual . "' and idcompania ='" . $idcompania . "' ");
            }  
        }        
        return false;
    }

}

?>