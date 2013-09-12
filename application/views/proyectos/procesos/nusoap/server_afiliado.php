<?php

include 'DB/conexion.php';
require_once('lib/nusoap.php');
$miURL = 'http://www.techni-translate.de/cartas_tt/nusoap';
$server = new nusoap_server();
$server->configureWSDL('wsFirma', $miURL);
$server->wsdl->schemaTargetNamespace = $miURL;

/*$server->register('getXML', // Nombre de la funcion 
        array('id' => 'xsd:int', 'cpar' => 'xsd:int'), // Parametros de entrada 
        array('return' => 'xsd:string'), // Parametros de salida 
        $miURL);
*/
$server->register('getXML', // Nombre de la funcion 
        array(), // Parametros de entrada 
        array('return' => 'xsd:string'), // Parametros de salida 
        $miURL);

function getXML() {
    $query = "SELECT Id_Com , idcompania, nombre  FROM `Compania` order by nombre ";
    $cn = Conectar();
    $rs = mysql_query($query, $cn);
    $cont = 0;

    $contenido = '<?xml version="1.0" encoding="UTF-8"?> 
                <Clientes>';
    while ($row = mysql_fetch_array($rs)) {
        $contenido.=' <Firma>';
        $contenido.='<Id_Com>' . $row["Id_Com"] . '</Id_Com>';
        $contenido.='<idcompania>' . $row["idcompania"] . '</idcompania>';
        $contenido.='<nombre>' . $row["nombre"] . '</nombre>';
        $contenido.=' </Firma>';
    }
    $contenido.=' </Clientes>';
    $contenido = base64_encode($contenido);
    $rta = new soapval('return', 'xsd:string', $contenido);

    return $rta;
}

$server->service($HTTP_RAW_POST_DATA);
?> 
