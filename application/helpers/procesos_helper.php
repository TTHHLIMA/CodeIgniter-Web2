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
    $base = DataBase::getInstance();
    $xSql = "";
    $xSql = "select ue.idestado  from usuarios_estado ue where  ue.idusuarios_estado = '" . $estado . "'";
    $base->setQuery($xSql);
    $RsSql = $base->loadObjectList();
    $NrRes = "";
    $NrRes = count($RsSql);
    if ($NrRes > 0) { // imprimo los datos 	
        foreach ($RsSql as $Col) {
            $xxEstado = "";
            $xxEstado = $Col->idestado;
        }
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
    return $xxColor;
}

function mostrarInicialEstado($estado) {
    $base = DataBase::getInstance();
    $xSql = "";
    $xSql = "select ue.descripcion  from usuarios_estado ue where  ue.idusuarios_estado = '" . $estado . "'";
    $base->setQuery($xSql);
    $RsSql = $base->loadObjectList();
    $NrRes = "";
    $NrRes = count($RsSql);
    if ($NrRes > 0) { // imprimo los datos 	
        foreach ($RsSql as $Col) {
            $xxDescripcion = "";
            $xxDescripcion = $Col->descripcion;
        }
    }
    return $xxDescripcion;
}

?>
