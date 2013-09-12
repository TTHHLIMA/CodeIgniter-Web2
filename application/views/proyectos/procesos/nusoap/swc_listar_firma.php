<?php
require 'lib/nusoap.php';




$oSoapClient = new nusoap_client('http://www.techni-translate.de/cartas_tt/nusoap/sw_listar_firma.php?wsdl', 'wsdl');
$resultado = $oSoapClient->call("obtenerFirmas", array ('usuario' => $usuario, 'password' => $password));

if( $resultado['error'] != '') echo $resultado['error'];

$productos_resultado = $resultado['RenglonFirma'];
foreach( $productos_resultado as $producto ) {
    echo $producto['nombre'];
}
?>
