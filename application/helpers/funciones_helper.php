<?php
if (!defined('BASEPATH'))
    exit('No se tiene accesso');
function xFecha($mifecha){
    setlocale(LC_TIME,"esp");
    //$fecha="2013-05-27"; // fecha de una variable
    //$fecha=Date("Y/m/d"); // fecha del sistema
   // $fecha=$mifecha; // fecha del sistema
    $dia_let= ucwords(strftime("%A",strtotime($mifecha))); 
    //ucwords convierte la primera letra a mayuscula
    $dia_num= strftime("%d",strtotime($mifecha));
    $mes_let= ucwords(strftime("%B",strtotime($mifecha)));
    //$ano_let= ucwords(strftime("%Y",strtotime($mifecha)));
    //$fecha_letras= $dia_let." ".$dia_num." de ".$mes_let." del ".$ano_let;
    $fecha_letras= $dia_let." ".$dia_num." de ".$mes_let;
    return htmlentities($fecha_letras);
}
?>
