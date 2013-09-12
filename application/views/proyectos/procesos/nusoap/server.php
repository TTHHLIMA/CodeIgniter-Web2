<?php
require_once("lib/nusoap.php");
$ns= "http://www.techni-translate.de/cartas_tt/nusoap/";
$server= new soap_server();
$server->configureWSDL('InteresDeVenta',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('CalcularInteres',
                    array('inversionSoles'=>'xsd:string'),
                    array('return'=>'xsd:string'),
                    $ns);

function CalcularInteres($inversionSoles){
    $monto=$inversionSoles * 0.15;
    return new soapval('return',
                        'xsd:string',
                        $monto);
}

$server->service($HTTP_RAW_POST_DATA);

?>