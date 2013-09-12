<?php

require_once 'lib/nusoap.php';
include 'DB/conexion.php';

$server = new soap_server;
$ns = "http://www.techni-translate.de/cartas_tt/nusoap/";
$server->configureWSDL("obtenerFirmas",$ns);
$server->wsdl->schematargetnamespace=$ns;
//Estructura de Producto
$server->wsdl->addComplexType(
        'producto', 'complexType', 'struct', 'all', '', 
        array(
            'Id_Com' => array('name' => 'Id_Com', 'type' => 'xsd:string'),
            'idcompania' => array('name' => 'idcompania', 'type' => 'xsd:string'),
            'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'))
);

//Coleccion de Productos
$server->wsdl->addComplexType(
        'productos', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:producto[]')), 'tns:producto'
);

$server->wsdl->addComplexType(
        'listadoproductos', 'complexType', 'struct', 'all', '', 
        array(
                'resultado' => array('name' => 'resultado', 'type' => 'xsd:integer'),
                'error' => array('name' => 'error', 'type' => 'xsd:string'),
                'datos' => array('name' => 'datos', 'type' => 'tns:productos'))
);

//registrar el WebMethod para obtener la lista de Productos
$server->register(
// nombre del metodo
        'obtenerproductos',
// lista de parametros
        array(
                'usuario' => 'xsd:string', 
                'password' => 'xsd:string', 
                'empresa' => 'xsd:integer'
            ),
// valores de return
        array('return' => 'tns:listadoproductos'),
// namespace
        $namespace,
// soapaction: (use default)
        false,
// style: rpc or document
        'rpc',
// use: encoded or literal
        'encoded',
// descripcion: documentacion del metodo
        'Obtener Listado de Productos'
);

function obtenerproductos($usuario, $password, $empresa) {
    $objrespuesta = array();


    $query = "SELECT Id_Com , idcompania, nombre  FROM `Compania` order by nombre ";
    $cn = Conectar();
    $rs = mysql_query($query, $cn);




    $datos = array();
    $i = 0;

    while ($row = mysql_fetch_array($rs)) {
        $datos[$i]['Id_Com'] = $row['Id_Com'];
        $datos[$i]['idcompania'] = $row['idcompania'];
        $datos[$i]['nombre'] = $row['nombre'];
        $i++;
    }
    $objrespuesta['datos'] = $datos;

    return $objrespuesta;
}

?>
