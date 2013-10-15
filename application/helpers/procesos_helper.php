<?php

if (!defined('BASEPATH'))
    exit('No se tiene accesso');

function buscar($palabra) {
    $cadEspacio = " "; // espacio en blanco
    $pos = strpos(trim($palabra), $cadEspacio); // la posicion
    // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
    if ($pos === false) {
        //echo "La cadena '$findme' no fue encontrada en la cadena '$mystring'";
        return $palabra;
    } else {
        //echo "La cadena '$findme' fue encontrada en la cadena '$mystring'";
        //echo " y existe en la posición $pos";
        $xpalabra = strstr(trim($palabra), " ", true);
        return strtoupper($xpalabra);
    }
}

function ponerColorEstados($estado) {
    $pm = &get_instance();
    $pm->load->model("procesos_model");
    $proceso = $pm->procesos_model->buscar_estado_mostrarInicialEstado($estado);
    if ($proceso != null) {
        foreach ($proceso as $Col) {
            $xxEstado = "";
            $xxEstado = $Col->idestado;
        }
        if ($xxEstado === "1") {
            $xxColor = "style='color:red;'";
        }
        if ($xxEstado === "2") {
            $xxColor = "style='color:blue;'";
        }
        if ($xxEstado === "3") {
            $xxColor = "style='color:green;'";
        }
        
    } else {
        $xxColor="";
    }


    return $xxColor;
}

function mostrarInicialEstado($estado) {
    $pm = &get_instance();
    $pm->load->model("procesos_model");
    $proceso = $pm->procesos_model->buscar_estado_mostrarInicialEstado($estado);
    if ($proceso != null) {
        foreach ($proceso as $Col) {
            $xxDescripcion = "";
            $xxDescripcion = $Col->descripcion;
        }
    } else {
        $xxDescripcion="";
    }
    return $xxDescripcion;
}
?>
