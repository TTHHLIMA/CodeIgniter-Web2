<?php

if (!defined('BASEPATH'))
    exit('No se tiene accesso');

function xFecha($mifecha) {
    setlocale(LC_TIME, "esp");
    //$fecha="2013-05-27"; // fecha de una variable
    //$fecha=Date("Y/m/d"); // fecha del sistema
    // $fecha=$mifecha; // fecha del sistema
    $dia_let = ucwords(strftime("%A", strtotime($mifecha)));
    //ucwords convierte la primera letra a mayuscula
    $dia_num = strftime("%d", strtotime($mifecha));
    $mes_let = ucwords(strftime("%B", strtotime($mifecha)));
    //$ano_let= ucwords(strftime("%Y",strtotime($mifecha)));
    //$fecha_letras= $dia_let." ".$dia_num." de ".$mes_let." del ".$ano_let;
    $fecha_letras = $dia_let . " " . $dia_num . " de " . $mes_let;
    return htmlentities($fecha_letras);
}

function fecha_calendario($fecha_string) {
    //var_dump($fecha_string);
    if ($fecha_string === "0000-00-00") {
        $xfecha_string = "";
    } else {
        list($y, $m, $d) = explode("-", $fecha_string);
        if (checkdate($m, $d, $y)) {
            //echo "OK Date";
            $xfecha_string = date("d-m-Y", strtotime($fecha_string));
        } else {
            //echo "BAD Date";
            $xfecha_string = "";
        }
    }
    $fecha_string="";
    return $xfecha_string;
    
}
function fecha_calendario_inverso($fecha_string) {
    //var_dump($fecha_string);
    if ($fecha_string === "") {
        $xfecha_string = "0000-00-00";
    } else {
        list($d, $m, $y) = explode("-", $fecha_string);
        if (checkdate($m, $d, $y)) {
            //echo "OK Date";
            $xfecha_string = date("Y-m-d", strtotime($fecha_string));
        } else {
            //echo "BAD Date";
            $xfecha_string = "0000-00-00";
        }
    }
    $fecha_string="";
    return $xfecha_string;
    
}


function validar_link($cadena){
     $cad = substr(trim($cadena), 0, 1);
     if ($cad==="h" || $cad ==="H"){
         return $cadena;
     } else {
         return "http://" . $cadena;
     }
}

?>
