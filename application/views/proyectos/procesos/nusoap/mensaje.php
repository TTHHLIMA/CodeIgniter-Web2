<?php
require_once('lib/nusoap.php');
$mensaje = $_GET['mensaje'];
echo $mensaje;
$wsdl = "http://www.techni-translate.de/cartas_tt/nusoap/server_email.php?wsdl";
$client = new nusoap_client($wsdl, 'wsdl');
$param = array('Mensaje' => $mensaje);
$respuesta = $client->call('EnviarEmail', $param);
echo ($respuesta);  
 
 ?>


