<?php

require_once 'lib/nusoap.php';
include 'DB/conexion.php';
$server = new soap_server;
$server->configureWSDL('ListadoClientes',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('getallClientes',$ns);

function getallClientes() {

    $query = "SELECT Id_Com , idcompania, alias_com,  nombre  FROM `Compania` order by nombre ";
    $cn = Conectar();
    $rs = mysql_query($query, $cn);
    $cont = 1;
    while ($row = mysql_fetch_array($rs)) {
        $items[] = array('id_com'=>$row['Id_Com'],
                         'idcompania'=>$row['idcompania'],
                         'alias_com'=>$row['alias_com'],
                         'nombre'=>$row['nombre']
                         );
    }
    return $items;
}


$server->service($HTTP_RAW_POST_DATA);
?>
