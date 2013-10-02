<?php
if (!defined('BASEPATH'))
    exit('No se tiene accesso');
//si no existe la función consola_google la creamos
if (!function_exists('consola_google')) {
    //HH: creo la funcion consola_google 
    function consola_google($data) {
        if (is_array($data)) { //HH: preguntamos si es un arreglo
            //HH: creo los parametros de salida
            echo "<script type='text/javascript'>";
            echo "var var_dump = '";
            echo json_encode($data); //HH: muestro los datos formato json
            echo "';";
            echo "console.log(var_dump);"; //HH: agrego mi datos en la consola de google
            echo "</script>";  
        } else {
            echo "<script type='text/javascript'>console.log('" . $data . "');</script>";
        }
    }

}



